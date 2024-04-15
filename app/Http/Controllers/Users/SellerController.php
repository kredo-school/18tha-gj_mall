<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\Seller;
use App\Models\Users\Country;
use App\Models\Users\Address;
use App\Models\Users\OrderLine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Query\JoinClause;

class SellerController extends Controller
{
    const LOCAL_FOLDER_PATH = 'public/images/sellers/';
    private $seller, $country, $address, $order_line;

    public function __construct(Seller $seller, Country $country, Address $address, OrderLine $order_line)
    {
        $this->seller = $seller;
        $this->country = $country;
        $this->address = $address;
        $this->order_line = $order_line;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        // define the dates
        $yesterday = date("Y-m-d", strtotime('-8 days'));
        $day_before_yesterday = date("Y-m-d", strtotime('-9 days'));

        $firstMonthDateOneYearBeforeNow = Carbon::now()->subYear()->startOfMonth();
        $firstMonthDateOneMonthBeforeNow = Carbon::now()->subMonth()->startOfMonth();

        $countYesterday = $this->getSellerOrders($yesterday, $yesterday)
            ->select(
                DB::raw("SUM(products.price * order_lines.qty) as total_amount"),
                DB::raw("SUM(order_lines.qty) as total_sales")
            )
            ->get();

        $countDayBeforeYesterday = $this->getSellerOrders($day_before_yesterday, $day_before_yesterday)
            ->select(
                DB::raw("SUM(products.price * order_lines.qty) as total_amount"),
                DB::raw("SUM(order_lines.qty) as total_sales")
            )
            ->get();

        $countCompare = round(($countYesterday[0]["total_sales"] / $countDayBeforeYesterday[0]["total_sales"] - 1) * 100, 2);
        $amountCompare = round(($countYesterday[0]["total_amount"] / $countDayBeforeYesterday[0]["total_amount"] - 1) * 100, 2);

        // Get data For list
        if (!empty($search)) {
            $orders = $this->order_line
                ->join('products', function (JoinClause $join) {
                    $join->on('order_lines.product_id', '=', 'products.id')
                        ->where('seller_id', Auth::guard("seller")->id());
                })
                ->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('description', 'LIKE', '%' . $search . '%');
                })
                ->select(
                    "products.name",
                    DB::raw("DATE_FORMAT(order_lines.created_at ,'%Y-%m-%d') as date"),
                    DB::raw("SUM(products.price * order_lines.qty) as total_amount"),
                    DB::raw("SUM(order_lines.qty) as total_sales")
                )
                ->groupBy('name', 'date')
                ->orderBy('date', 'desc')
                ->paginate(5);
        } elseif (!empty($startDate)) {
            $orders = $this->getSellerOrders($startDate, $endDate)
                ->select(
                    "products.name",
                    DB::raw("DATE_FORMAT(order_lines.created_at ,'%Y-%m-%d') as date"),
                    DB::raw("SUM(products.price * order_lines.qty) as total_amount"),
                    DB::raw("SUM(order_lines.qty) as total_sales")
                )
                ->groupBy('name', 'date')
                ->orderBy('date', 'desc')
                ->paginate(5);
        } else {
            $orders = $this->order_line
                ->join('products', function (JoinClause $join) {
                    $join->on('order_lines.product_id', '=', 'products.id')
                        ->where('seller_id', Auth::guard("seller")->id());
                })
                ->select(
                    "products.name",
                    DB::raw("DATE_FORMAT(order_lines.created_at ,'%Y-%m-%d') as date"),
                    DB::raw("SUM(products.price * order_lines.qty) as total_amount"),
                    DB::raw("SUM(order_lines.qty) as total_sales")
                )
                ->groupBy('name', 'date')
                ->orderBy('date', 'desc')
                ->paginate(5);
        }


        // Monthly Sales Plot

        $MonthlyData = $this->getPeriodData($this->getSellerOrders($firstMonthDateOneYearBeforeNow, Carbon::now()), "month");

        $month = [];
        $monthly_amount = [];
        foreach ($MonthlyData as $data) {
            $month[] = $data->month;
            $monthly_amount[] = $data->total_amount;
        }

        // Daily Sales Plot
        $DailyData = $this->getPeriodData($this->getSellerOrders($firstMonthDateOneMonthBeforeNow, Carbon::now()), "day");

        $data = json_decode($DailyData, true);
        $daily_output = [];
        $output = [];
        $names = [];
        $accum_amount = 0;

        foreach ($data as $keys => $values) {

            foreach ($values as $value) {
                $d = $value['day'];
                $totalAmount = $value['total_amount'];
                $daily_output['day'][] = $d;
                $daily_output['total_amount'][] = $totalAmount;
                $accum_amount = $accum_amount + $totalAmount;
                $daily_output['accum_amount'][] = $accum_amount;
            }
            $names[] = $keys;
            $output[$keys] = $daily_output;
            $output[$keys]['day'] = array_pad($output[$keys]['day'], 31, '');
            $output[$keys]['total_amount'] = array_pad($output[$keys]['total_amount'], 31, '');
            $output[$keys]['accum_amount'] = array_pad($output[$keys]['accum_amount'], 31, '');
            $daily_output = [];
            $accum_amount = 0;
        }


        return view("seller.dashboard", compact('yesterday', 'day_before_yesterday', 'countYesterday', 'countDayBeforeYesterday', 'countCompare', 'amountCompare', 'orders', 'MonthlyData',  'month', 'monthly_amount', 'output', 'names','startDate'));
    }

    private function getSellerOrders($start_date, $end_date)
    {

        $records = $this->order_line
            ->whereDate('order_lines.created_at', '>=', $start_date)
            ->whereDate('order_lines.created_at', '<=', $end_date)
            ->join('products', function (JoinClause $join) {
                $join->on('order_lines.product_id', '=', 'products.id')
                    ->where('seller_id', Auth::guard("seller")->id());
            });

        return $records;
    }

    private function getPeriodData($data, $period)
    {

        if ($period == "month") {
            $output = $data
                ->select(
                    DB::raw("DATE_FORMAT(order_lines.created_at ,'%Y-%m') as month"),
                    DB::raw("SUM(products.price * order_lines.qty) as total_amount"),
                    DB::raw("SUM(order_lines.qty) as total_sales")
                )
                ->groupBy("month")
                ->orderBy('month', 'asc')
                ->get();
        } elseif ($period == "day") {
            $output = $data
                ->select(
                    DB::raw("DATE_FORMAT(order_lines.created_at ,'%Y-%m-%d') as date"),
                    DB::raw("DATE_FORMAT(order_lines.created_at ,'%Y-%m') as month"),
                    DB::raw("DATE_FORMAT(order_lines.created_at ,'%d') as day"),
                    DB::raw("SUM(products.price * order_lines.qty) as total_amount"),
                    DB::raw("SUM(order_lines.qty) as total_sales")
                )
                ->groupBy("date", "month", "day")
                ->orderBy('date', 'asc')
                ->get()
                ->groupBy("month");
        } else {
            $output = [];
        }
        return $output;
    }


    public function show()
    {
        $target_seller = $this->seller->findOrFail(Auth::guard('seller')->id());
        $countries = $this->country->all();

        return view('seller.profile.editProfile')
            ->with('seller', $target_seller)
            ->with('countries', $countries);
    }

    public function update(Request $request)
    {

        $id = Auth::guard("seller")->id();
        DB::beginTransaction();
        $validatedData = $request->validate([
            // Profile
            'fname'        => 'required|max:255',
            'lname'        => 'required|max:255',
            'email'        => 'required|email',
            'phone'        => 'nullable',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'  => 'nullable',

            // Address
            'unitnumber'  => 'max:255',
            'street'    => 'max:255',
            'address1'  => 'required|max:255',
            'address2'  => 'max:255',
            'city'      => 'required|max:255',
            'postalcode'  => 'required|max:12',
            'country'   => 'required',

        ]);

        $seller = Seller::findOrFail($id);

        if ($seller->address_id) {
            try {
                // Find the relevant models
                $address = Address::findOrFail($seller->address_id);

                // Update customer details
                $seller->first_name = $validatedData['fname'];
                $seller->last_name = $validatedData['lname'];
                $seller->email = $validatedData['email'];
                $seller->phone_number = $validatedData['phone'];
                $seller->description = $validatedData['description'];

                if ($request->image) {
                    $this->deleteImage($seller->image);
                    $seller->avatar = $this->saveImage($request);
                }

                $seller->save();

                // Update address details
                $address->unit_number = $validatedData['unitnumber'];
                $address->street_number = $validatedData['street'];
                $address->address_line1 = $validatedData['address1'];
                $address->address_line2 = $validatedData['address2'];
                $address->postal_code = $validatedData['postalcode'];
                $address->city = $validatedData['city'];
                $address->country_code = $validatedData['country'];
                $address->region = $this->getRegion($validatedData['country']);

                $address->save();

                DB::commit();

                return redirect()->route('seller.profile.editProfile');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Update failed: ' . $e->getMessage());
                return back()->with('error', 'Failed to update seller information.');
            }
        } else {
            try {
                // Update customer details
                $seller->first_name = $validatedData['fname'];
                $seller->last_name = $validatedData['lname'];
                $seller->email = $validatedData['email'];
                $seller->phone_number = $validatedData['phone'];
                $seller->description = $validatedData['description'];

                if ($request->image) {
                    $this->deleteImage($seller->avatar);
                    $seller->avatar = $this->saveImage($request);
                }



                // Update address details
                $this->address->unit_number = $validatedData['unitnumber'];
                $this->address->street_number = $validatedData['street'];
                $this->address->address_line1 = $validatedData['address1'];
                $this->address->address_line2 = $validatedData['address2'];
                $this->address->postal_code = $validatedData['postalcode'];
                $this->address->city = $validatedData['city'];
                $this->address->country_code = $validatedData['country'];
                $this->address->region = $this->getRegion($validatedData['country']);

                $this->address->save();
                $seller->address_id = $this->address->id;
                $seller->save();

                DB::commit();

                return redirect()->route('seller.profile.editProfile');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Update failed: ' . $e->getMessage());
                return back()->with('error', 'Failed to update seller information.');
            }
        }
    }

    private function saveImage($request)
    {
        $img_name = time() . '.' . $request->image->extension();
        $request->image->storeAs(self::LOCAL_FOLDER_PATH, $img_name);

        return $img_name;
    }

    private function deleteImage($image_name)
    {
        $image_name = self::LOCAL_FOLDER_PATH . $image_name;

        if (Storage::disk('local')->exists($image_name)) {
            Storage::disk('local')->delete($image_name);
        }
    }

    private function getRegion($country_code)
    {
        $country = $this->country->where('alpha3', $country_code)->first();
        if ($country) {
            return $country->region;
        } else {
            return null;
        }
    }
}
