<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Products\Ad;
use App\Models\Users\Seller;
use App\Models\Users\Country;
use App\Models\Users\Address;
use App\Models\Orders\OrderLine;
use App\Models\PageView;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Query\JoinClause;
use function PHPUnit\Framework\isEmpty;
use Phpml\Regression\LeastSquares;
use Phpml\Dataset\ArrayDataset;

class SellerController extends Controller
{
    const LOCAL_FOLDER_PATH = 'public/images/sellers/';
    private $seller, $country, $address, $order_line;

    public function __construct(Seller $seller, Country $country, Address $address, OrderLine $order_line)
    {
        $this->seller  = $seller;
        $this->country = $country;
        $this->address = $address;
        $this->order_line = $order_line;
    }

    public function index(Request $request)
    {

        // Get parameters from url
        $search = $request->input('search');
        $dateRange = $request->input('daterange');
        // Split the string by '+' and extract start and end dates
        $date1 = substr($dateRange, 1, 8);
        $date2 = substr($dateRange, 11, 18);
        // Extract start date and end date
        $startDate = substr($date1, 0, 4) . '-' . substr($date1, 4, 2) . '-' . substr($date1, 6, 2);
        $endDate = substr($date2, 0, 4) . '-' . substr($date2, 4, 2) . '-' . substr($date2, 6, 2);

        // define the dates
        $yesterday = date("Y-m-d", strtotime('-1 days'));
        $day_before_yesterday = date("Y-m-d", strtotime('-2 days'));

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

        if (!isEmpty($countDayBeforeYesterday)) {
            $countCompare = round(($countYesterday[0]["total_sales"] / $countDayBeforeYesterday[0]["total_sales"] - 1) * 100, 2);
            $amountCompare = round(($countYesterday[0]["total_amount"] / $countDayBeforeYesterday[0]["total_amount"] - 1) * 100, 2);
        } else {
            $countCompare = "No data";
            $amountCompare = "No data";
        }

        // Get data For list
        if (!empty($search) | !empty($datarange)) {
            if (!empty($search) & !empty($datarange)) {
                $orders = $this->order_line
                    ->join('products', function (JoinClause $join) {
                        $join->on('order_lines.product_id', '=', 'products.id')
                            ->where('seller_id', Auth::guard("seller")->id());
                    })
                    ->where(function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%')
                            ->orWhere('description', 'LIKE', '%' . $search . '%');
                    })
                    ->whereDate('order_lines.created_at', '>=', date($startDate . "00:00:00"))
                    ->whereDate('order_lines.created_at', '<=', date($endDate . " 23:59:59"))
                    ->select(
                        "products.name",
                        DB::raw("DATE_FORMAT(order_lines.created_at ,'%Y-%m-%d') as date"),
                        DB::raw("SUM(products.price * order_lines.qty) as total_amount"),
                        DB::raw("SUM(order_lines.qty) as total_sales")
                    )
                    ->groupBy('name', 'date')
                    ->orderBy('date', 'desc')
                    ->paginate(5);
                $orders->withPath('/seller/dashboard');
                $orders->appends($request->all());
            } elseif (!empty($daterange)) {
                $orders = $this->order_line
                    ->join('products', function (JoinClause $join) {
                        $join->on('order_lines.product_id', '=', 'products.id')
                            ->where('seller_id', Auth::guard("seller")->id());
                    })
                    ->whereDate('order_lines.created_at', '>=', date($startDate . "00:00:00"))
                    ->whereDate('order_lines.created_at', '<=', date($endDate . " 23:59:59"))
                    ->select(
                        "products.name",
                        DB::raw("DATE_FORMAT(order_lines.created_at ,'%Y-%m-%d') as date"),
                        DB::raw("SUM(products.price * order_lines.qty) as total_amount"),
                        DB::raw("SUM(order_lines.qty) as total_sales")
                    )
                    ->groupBy('name', 'date')
                    ->orderBy('date', 'desc')
                    ->paginate(5);
                $orders->withPath('/seller/dashboard');
                $orders->appends($request->all());
            } elseif (!empty($search)) {
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
                $orders->withPath('/seller/dashboard');
                $orders->appends($request->all());
            }
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
        $samples = [];
        $m = 0;
        foreach ($MonthlyData as $data) {
            $m++;
            $samples[] = [$m];
            $month[] = $data->month;
            $monthly_amount[] = $data->total_amount;
        }

        if (count($month) > 1) {
            $regression = new LeastSquares(); // https://php-ml.readthedocs.io/en/latest/machine-learning/regression/least-squares/
            // Make the regresssion function  without this months
            $regression->train(array_slice($samples, 0, count($samples) - 1), array_slice($monthly_amount, 0, count($monthly_amount) - 1));
            $forecast = $regression->predict($samples); // Forecasting max recent 13 months
        } else {
            $forecast = array_fill(0, count($month), 0);
        }

        // Daily Sales Plot
        $DailyData = $this->getPeriodData($this->getSellerOrders($firstMonthDateOneMonthBeforeNow, Carbon::now()), "day");

        $data = json_decode($DailyData, true);
        $daily_output = [];
        $output = [];
        $names = [];
        $accum_amount = 0;
        $i = 0;
        foreach ($data as $keys => $values) {

            foreach ($values as $value) {
                $d = $value['day'];
                $totalAmount = $value['total_amount'];
                $daily_output['day'][] = $d;
                $daily_output['total_amount'][] = $totalAmount;
                $accum_amount = $accum_amount + $totalAmount;
                $daily_output['accum_amount'][] = $accum_amount;
            }
            $names[$i] = $keys;
            $output[$keys] = $daily_output;
            $output[$keys]['day'] = array_pad($output[$keys]['day'], 31, '0');
            $output[$keys]['total_amount'] = array_pad($output[$keys]['total_amount'], 31, '0');
            $output[$keys]['accum_amount'] = array_pad($output[$keys]['accum_amount'], 31, '0');
            $daily_output = [];
            $accum_amount = 0;
            $i++;
        }

        if (!empty($names)) {
            $Xvalues = $output[$names[0]]['day'];
        } else {
            $Xvalues = array_fill(0, 31, 0);
        }

        if (!empty($names)) {
            $LastMonthYvalues = $output[$names[0]]['accum_amount'];
        } else {
            $LastMonthYvalues = array_fill(0, 31, 0);
        }

        if (!empty($names)) {
            $thisMonthYvalues = $output[$names[1]]['accum_amount'];
        } else {
            $thisMonthYvalues = array_fill(0, 31, 0);
        }

        $seller_urls = ["http://127.0.0.1:8000/profile/" . Auth::guard("seller")->id()];
        $product_ids = Product::select("id")->where("seller_id", Auth::guard("seller")->id())->get();
        foreach ($product_ids as $product_id) {
            $seller_urls[] = "http://127.0.0.1:8000/productDetail/" . $product_id->id;
        }

        $pageviews = PageView::select(
            DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date"),
            DB::raw("COUNT(1) as pageviews"),
        )
            ->whereIn("url", $seller_urls)
            ->whereDate('created_at', '>', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $labels = $pageviews->pluck('date');
        $pageviews = $pageviews->pluck('pageviews');

        $rankings = PageView::select(
            DB::raw("CONCAT(SUBSTRING_INDEX(SUBSTRING_INDEX(url, '/', 4), '/', -1),'/',SUBSTRING_INDEX(SUBSTRING_INDEX(url, '/', 5), '/', -1)) as path"),
            DB::raw("COUNT(1) as pageviews"),
        )
            ->whereDate('created_at', '>', Carbon::now()->subDays(7))
            ->whereIn("url", $seller_urls)
            ->groupBy('path')
            ->orderBy('pageviews', 'desc')
            ->get();
        $paths = $rankings->pluck('path');
        $ranking_pageviews = $rankings->pluck('pageviews');

        $productsWithMessages = Product::where('seller_id', Auth::guard('seller')->id())
            ->with(['messages' => function ($query) {
                $query->whereNotNull('user_id');
            }])
            ->get();

        return view("seller.dashboard", compact('yesterday', 'day_before_yesterday', 'countYesterday', 'countDayBeforeYesterday', 'countCompare', 'amountCompare', 'orders', 'MonthlyData',  'month', 'monthly_amount', 'forecast', 'LastMonthYvalues', 'thisMonthYvalues', 'Xvalues', 'labels', 'pageviews', 'paths', 'ranking_pageviews', 'productsWithMessages'));
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

    public function showProfile($id)
    {
        $sellerProfile = $this->seller->findOrFail($id);
        $sellerProducts = $sellerProfile->sellerProducts($sellerProfile->id);;

        foreach ($sellerProducts as $product) {
            $this->calculateRatingProperties($product);
        }

        return view('seller.profile.sellerProfile')
            ->with('sellerProfile', $sellerProfile)
            ->with('sellerProducts', $sellerProducts);
    }

    private function calculateRatingProperties($product)
    {
        $totalReviews = $product->reviews->count();
        $averageRating = $product->reviews->avg('rating');

        // Add or update properties on the product object
        $product->averageRating = $averageRating;
        $product->totalReviews = $totalReviews;

        return $product;
    }
}
