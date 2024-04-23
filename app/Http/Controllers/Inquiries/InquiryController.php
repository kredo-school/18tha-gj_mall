<?php

namespace App\Http\Controllers\Inquiries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiries\Inquiry;
use App\Models\Inquiries\InquiryGenre;
use Illuminate\Support\Facades\Auth; //for authentication


class InquiryController extends Controller
{
    private $inquiry;
    private $inquiry_genre;
    
    public function __construct(Inquiry $inquiry, InquiryGenre $inquiry_genre)
    {
        $this->inquiry = $inquiry;
        $this->inquiry_genre = $inquiry_genre;
    }

    public function index()
    {
        $inquiries = $this->inquiry->where('inquiry_status_id', 3)->take(5)->get(); // Only solved.
        $inquiry_genres = $this->inquiry_genre->all();

        return view('inquiry')
            ->with('inquiries', $inquiries)
            ->with('inquiry_genres', $inquiry_genres);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1|max:50',
            'inquiry_genre' => 'required|between:1,4',
            'content' => 'required|min:1|max:1000'
        ]);

        $this->inquiry->title = $request->title;
        $this->inquiry->content = $request->content;
        $this->inquiry->customer_id = Auth::user()->id;
        $this->inquiry->genre_id = $request->inquiry_genre;
        $this->inquiry->inquiry_status_id = 1;
        $this->inquiry->save(); // insert the data into the database table

        return redirect()->back();
    }
}
