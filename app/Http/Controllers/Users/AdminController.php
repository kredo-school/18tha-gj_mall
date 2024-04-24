<?php

namespace App\Http\Controllers\Users;

use Exception;
use Carbon\Carbon;
use App\Models\Users\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Orders\OrderLine;
use App\Models\Products\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PageView;


class AdminController extends Controller
{

    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin      = $admin;
    }

    public function showDashboard()
    {
        $admin = $this->admin->findOrFail(Auth::guard('admin')->id());

        // Get sales data for yesterday and the day before yesterday
        list($yesterday_qty, $yesterday_sales) = $this->getSalesData(Carbon::yesterday());
        list($day_before_yesterday_qty, $day_before_yesterday_sales) = $this->getSalesData(Carbon::yesterday()->subDays(1));

        // Calculate sales change and percentage change
        $sales_change_qty = $yesterday_qty - $day_before_yesterday_qty;
        $sales_change_sales = $yesterday_sales - $day_before_yesterday_sales;

        $percentage_change_qty = $this->calculatePercentageChange($sales_change_qty, $day_before_yesterday_qty);
        $percentage_change_sales = $this->calculatePercentageChange($sales_change_sales, $day_before_yesterday_sales);

        // Get top products based on total sales
        $top_products_details = $this->getTopProducts(5);

        // Graph Part
        $currentYear = Carbon::now()->year;
        $monthlyYValues = $this->getMonthlySalesData($currentYear);
        $lastYear = $currentYear - 1;
        $monthlyYValues2 = $this->getMonthlySalesData($lastYear);
        $dailySalesData = $this->getDailySalesData();

        $pageviews = PageView::select(
            DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date"),
            DB::raw("COUNT(1) as pageviews"),
        )
            ->whereDate('created_at', '>', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $labels = $pageviews->pluck('date');
        $pageviews = $pageviews->pluck('pageviews');


        $rankings = PageView::select(
            DB::raw("SUBSTRING_INDEX(SUBSTRING_INDEX(url, '/', 4), '/', -1) as path"),
            DB::raw("COUNT(1) as pageviews"),
        )
            ->whereDate('created_at', '>', Carbon::now()->subDays(7))
            ->groupBy('path')
            ->orderBy('pageviews','desc')
            ->get();
        $paths = $rankings->pluck('path');
        $ranking_pageviews = $rankings->pluck('pageviews');

        // Graph Part End


        return view('admin.dashboard', [
            'admin' => $admin,
            'top_products' => $top_products_details,
            'yesterday_qty' => $yesterday_qty,
            'yesterday_sales' => $yesterday_sales,
            'percentage_change_qty' => $percentage_change_qty,
            'percentage_change_sales' => $percentage_change_sales,
            'monthlyYValues' => $monthlyYValues,
            'monthlyYValues2' => $monthlyYValues2,
            'dailySalesData' => $dailySalesData,
            'labels' => $labels,
            'pageviews' => $pageviews,
            'paths' => $paths,
            'ranking_pageviews' => $ranking_pageviews,
        ]);
    }

    // Using for Daily bar graph
    private function getDailySalesData()
    {
        $dailySalesData = [];
        $currentDay = Carbon::now()->startOfWeek();

        for ($i = 0; $i < 7; $i++) {
            $dayName = $currentDay->format('D');

            $dailySalesTotal = $this->getTotalSalesByDate($currentDay);

            $dailySalesData[$dayName] = $dailySalesTotal;

            $currentDay->addDay();
        }

        return $dailySalesData;
    }

    // Using for Monthly plot graph
    private function getMonthlySalesData($year)
    {
        $monthlySalesData = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthlySalesQuantity = $this->getSalesTotalByMonth($year, $month);

            $monthlySalesData[] = $monthlySalesQuantity;
        }

        return $monthlySalesData;
    }

    private function getSalesData($date)
    {
        $total_qty = $this->getTotalQuantityByDate($date);
        $total_sales = $this->getTotalSalesByDate($date);

        return [$total_qty, $total_sales];
    }

    private function calculatePercentageChange($change, $base)
    {
        if ($base != 0) {
            return ($change / $base) * 100;
        }

        return 0;
    }

    private function getTotalQuantityByDate($date)
    {
        return DB::table('order_lines')
            ->whereDate('created_at', $date)
            ->sum('qty');
    }

    private function getTotalSalesByDate($date)
    {
        return DB::table('order_lines')
            ->whereDate('created_at', $date)
            ->sum(DB::raw('qty * price'));
    }

    private function getSalesTotalByMonth($year, $month)
    {
        return DB::table('order_lines')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->sum(DB::raw('qty * price'));
    }

    private function getTopProducts($limit)
    {
        $top_products = DB::table('order_lines')
            ->select('product_id', DB::raw('SUM(qty * price) as total_sales'))
            ->groupBy('product_id')
            ->orderByDesc('total_sales')
            ->limit($limit)
            ->get();

        $top_product_ids = $top_products->pluck('product_id')->toArray();
        $top_products_details = Product::whereIn('id', $top_product_ids)->get();

        return $top_products_details;
    }

    public function index()
    {
        $admins = $this->admin->findOrFail(Auth::guard('admin')->id())->latest()->paginate(5);

        return view('admin.management.managementUser')
            ->with('admins', $admins);
    }

    // create users
    public function create()
    {
        $admins = $this->admin->all();
        // $admins = $this->admin->where(Auth::guard("admin")->id())->all();

        return view('admin.management.modal.create')
            ->with('admins', $admins);
    }

    // store() - save admin user on the db
    public function store(Request $request)
    {
        // $id = Auth::guard("admin")->id();
        DB::beginTransaction();

        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|string|max:255|unique:admin',
            'phone_number' => 'required|string|max:255',
            'password'     => 'required|string|max:255',
            'role'         => 'required|integer'
        ]);

        // $admin = Admin::findOrFail($id);

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
        // $admin = $this->admin->findOrFail(Admin::admin()->id);
        $admin = $this->admin->findOrFail($id);
        return view('admin.management.modal.edit')
            ->with('admin', $admin);
    }

    // update() - edit admin information
    public function update(Request $request, $id)
    {

        DB::beginTransaction();

        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => ['required', 'string', 'email', 'max:255', Rule::unique('admin')->ignore($id),],
            'phone_number' => 'required|string|max:255',
            'password'     => 'required|string|max:255',
            'role'         => 'required|integer'
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
        $admin = $this->admin->findOrFail($id);
        $this->admin->destroy($id);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if (!empty($search)) {
            $admins = $this->admin
                ->where(function ($query) use ($search) {
                    $query->where('first_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('role', 'LIKE', '%' . $search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else {
            $admins = $this->admin
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }

        return view("admin.management.managementUser", compact("admins"));
    }


}
