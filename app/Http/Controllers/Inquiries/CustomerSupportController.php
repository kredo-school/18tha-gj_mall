<?php

namespace App\Http\Controllers\Inquiries;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Inquiries\Inquiry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Inquiries\InquiryGenre;
use App\Models\Inquiries\InquiryStatus;
use Illuminate\Database\Query\JoinClause;

class CustomerSupportController extends Controller
{
    private $inquiry;
    private $inquiry_genre;
    private $inquiry_status;

    public function __construct(Inquiry $inquiry, InquiryGenre $inquiry_genre, InquiryStatus $inquiry_status)
    {
        $this->inquiry = $inquiry;
        $this->inquiry_genre = $inquiry_genre;
        $this->inquiry_status = $inquiry_status;
    }

    public function index()
    {

        $inquiries = Inquiry::select('id', 'title', 'content', 'answer', 'translated_answer', 'customer_id', 'genre_id', 'inquiry_status_id')->latest()->paginate(5);

        return view('admin.inquiry.customerSupport')->with('inquiries', $inquiries);
    }

    public function editAnswer($id)
    {
        $inquiry = $this->inquiry->findOrFail(Inquiry::inquiry()->id);
        return view('admin.inquiry.modal.customerStatus')->with('inquiries', $inquiries);
    }

    public function editTranslate($id)
    {
        $inquiry = $this->inquiry->findOrFail(Inquiry::inquiry()->id);

        return view('admin.inquiry.modal.translateStatus' | 'admin.inquiry.modal.customerStatus')
                ->with('inquiries', $inquiries);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $validateData = $request->validate([
            'answer'               => 'string|max:255',
            'translated_answer'    => 'string|max:255',
            'inquiry_status_id'    => 'required|integer',
        ]);

        try {
            // Find the admin record by its ID
            $inquiry = Inquiry::findOrFail($id);

            if (Arr::has($validateData, 'answer') && $validateData['answer'] !== null) {
                $inquiry->answer = $validateData['answer'];
                } else{
                $inquiry->translated_answer = $validateData['translated_answer'];
                }
                $inquiry->inquiry_status_id    = $validateData['inquiry_status_id'];
            
                // Save the changes
                $inquiry->save();

                // Commit the transaction
                DB::commit();

                // Redirect back with a success message
                Log::info('Inquiry updated successfully.');

                return redirect()->back()->with('success', 'Inquiry updated successfully.');
            } catch (Exception $e) {
                // Rollback the transaction
                DB::rollback();
                
                // Log the error
                Log::error('Error updating inquiry: ' . $e->getMessage());
                
                // Redirect back with an error message
                return back()->withInput()->withErrors(['error' => 'Error updating inquiry. Please try again.']);
        }
    }

    // destroy() - Delete admin user
    public function destroy($id)
    {
        $this->inquiry->destroy($id);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        if(!empty($search)) {
            $inquiries = $this->inquiry
                ->join('inquiry_genres', function (JoinClause $join){
                    $join->on('inquiry_genres.id', '=', 'inquiries.genre_id')
                        ->where('inquiries.customer_id', Auth::guard("customer")->id());
                })
                ->join('inquiry_status', function(JoinClause $join){
                    $join->on('inquiry_status.id', '=', 'inquiries.inquiry_status_id');
                })
                ->where(function ($query) use ($search){
                    $query->where('inquiry_genres.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('inquiry_status.status', 'LIKE', '%' . $search . '%')
                        ->orWhere('inquiries.title', 'LIKE', '%' . $search . '%');
                })
                ->orderBy('inquiries.created_at', 'desc')->paginate(5);
        } elseif(!empty($status)) {
            $inquiries = $this->inquiry
                ->join('inquiry_status', function (JoinClause $join) {
                    $join->on('inquiriy_status.id', '=', 'inquiries.inquiry_status_id');
            })
                ->where('inquiries.customer_id', Auth::guard("customer")->id())
                ->where('inquiry_status.id', $status)
                ->orderBy('inquiries.created_at', 'desc')
                ->paginate(5);
        }
        $inquiry_statuses = $this->inquiry_status->orderBy('id', 'asc')->paginate(5);
        $inquiries = $this->inquiry->orderBy('id', 'asc')->paginate(5);

        return view("admin.inquiry.customerSupport", compact("inquiries", "inquiry_statuses"));

    }
}

