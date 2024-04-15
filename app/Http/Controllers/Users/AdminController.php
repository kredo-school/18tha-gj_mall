<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Orders\OrderLine;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{

    private $admin, $order_line;

    public function __construct(Admin $admin, OrderLine $order_line)
    {
        $this->admin      = $admin;
        $this->order_line = $order_line;
    }

    public function showDashboard()
    {
        $admin = $this->admin->findOrFail(Auth::guard('admin')->id());

        $yesterday            = Carbon::yesterday();
        $day_before_yesterday = Carbon::yesterday()->subDays(1);

        $yesterday_total_sales_quantity = DB::table('order_lines')
            ->whereDate('created_at', $yesterday)
            ->sum('qty');

        $yesterday_total_sales_price = DB::table('order_lines')
            ->whereDate('created_at', $yesterday)
            ->sum(DB::raw('qty * price'));

        $day_before_yesterday_total_sales_quantity = DB::table('order_lines')
            ->whereDate('created_at', $day_before_yesterday)
            ->sum('qty');

        $day_before_yesterday_total_sales_price = DB::table('order_lines')
            ->whereDate('created_at', $day_before_yesterday)
            ->sum(DB::raw('qty * price'));

        $sales_change_quantity = $yesterday_total_sales_quantity - $day_before_yesterday_total_sales_quantity;
        $sales_change_price    = $yesterday_total_sales_price - $day_before_yesterday_total_sales_price;
    
        $percentage_change_quantity = ($sales_change_quantity != 0 && $day_before_yesterday_total_sales_quantity != 0) ? ($sales_change_quantity / $day_before_yesterday_total_sales_quantity) * 100 : 0;
        $percentage_change_price    = ($sales_change_price != 0 && $day_before_yesterday_total_sales_price != 0) ? ($sales_change_price / $day_before_yesterday_total_sales_price) * 100 : 0;

        // Calculate total sales for each product
        $top_products = DB::table('order_lines')
                        ->select('product_id', DB::raw('SUM(qty * price) as total_sales'))
                        ->groupBy('product_id')
                        ->orderByDesc('total_sales')
                        ->limit(5)
                        ->get();

        $top_product_ids      = $top_products->pluck('product_id')->toArray();
        $top_products_details = Product::whereIn('id', $top_product_ids)->get();

        return view('admin.dashboard')
                ->with('admin', $admin)
                ->with('top_products', $top_products_details)
                ->with('yesterday_total_sales_quantity', $yesterday_total_sales_quantity)
                ->with('yesterday_total_sales_price', $yesterday_total_sales_price)
                ->with('percentage_change_quantity', $percentage_change_quantity)
                ->with('percentage_change_price', $percentage_change_price);
    }

    public function index()
    {
        $admins = $this->admin->latest()->paginate(5);

        return view('admin.management.managementUser')
                ->with('admins', $admins);
    }

    // create users
    public function create()
    {
        $admins = $this->admin->all();

        return view('admin.management.modal.create')
                ->with('admins', $admins);

    }

    // store() - save admin user on the db
    public function store(Request $request)
    {
        DB::beginTransaction();
        
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|string|max:255|unique:admin',
            'phone_number' => 'required|string|max:255',
            'password'     => 'required|string|max:255',
            'role'         => 'required|string|max:255'
        ]);

        $admin = new Admin();
        $admin->first_name   = $request->input('first_name');
        $admin->last_name    = $request->input('last_name');
        $admin->email        = $request->input('email');
        $admin->phone_number = $request->input('phone_number');
        $admin->password     = Hash::make($request->input('password'));
        $admin->role         = $request->input('role');
        
        try {
            $admin->save();
            DB::commit();
            return redirect()->back()->with('success', 'Admin user created successfully.');

        } catch (\Exception $e) {
            Log::error('Error saving admin user: ' . $e->getMessage());
        }
    }

    // edit() - view the Edit page
    public function edit($id)
    {
        $admin = $this->admin->findOrFail(Admin::admin()->id);
        return view('admin.management.modal.edit')
                ->with('admin', $admin);
    }

    // update() - edit admin information
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        
        // Validate the incoming request data (optional)
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => ['required', 'string','email','max:255',Rule::unique('admin')->ignore($id),],
            'phone_number' => 'required|string|max:255',
            'password'     => 'required|string|max:255',
            'role'         => 'required|string|max:255'
        ]);

        try {
            // Find the admin record by its ID
            $admin = Admin::findOrFail($id);
            
            // Update the admin record with the new data
            $admin->first_name   = $request->input('first_name');
            $admin->last_name    = $request->input('last_name');
            $admin->email        = $request->input('email');
            $admin->phone_number = $request->input('phone_number');
            $admin->password     = Hash::make($request->input('password'));
            $admin->role         = $request->input('role');
            
            // Save the changes
            $admin->save();

            // Commit the transaction
            DB::commit();

            // Redirect back with a success message
            Log::info('Admin user updated successfully.');

            return redirect()->back()->with('success', 'Admin user updated successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction
            // DB::rollback();
            
            // Log the error
            Log::error('Error updating admin user: ' . $e->getMessage());
            
            // Redirect back with an error message
            return back()->withInput()->withErrors(['error' => 'Error updating user. Please try again.']);
        }
    }

    // destroy() - Delete admin user
    public function destroy($id)
    {
        $this->admin->destroy($id);

        return redirect()->back();
    }



}
