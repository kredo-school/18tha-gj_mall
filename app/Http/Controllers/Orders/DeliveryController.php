<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Models\Orders\OrderLine;
use App\Models\Orders\ShopOrder;
use App\Models\Orders\OrderStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\JoinClause;

class DeliveryController extends Controller
{
    private $shop_order, $order_line, $order_status;

    public function __construct(ShopOrder $shop_order, OrderLine $order_line, OrderStatus $order_status)
    {
        $this->shop_order = $shop_order;
        $this->order_line = $order_line;
        $this->order_status = $order_status;
    }

    public function show()
    {
        $seller_orders = $this->order_line
            ->join('products', function (JoinClause $join) {
                $join->on('products.id', '=', 'order_lines.product_id')->where('products.seller_id', Auth::guard("seller")->id());
            })
            ->paginate(5);

        $order_statuses = $this->order_status->orderBy('id', 'asc')->get();

        return view("admin.delivery.deliveryList", compact("order_statuses", "seller_orders"));
    }

    public function showDetail($id)
    {
        $order = $this->order_line->findOrFail($id);

        return view("admin.delivery.modal.deliveryStatus", compact("order"));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        if (!empty($search)) {
            $seller_orders = $this->order_line
                ->join('products', function (JoinClause $join) {
                    $join->on('products.id', '=', 'order_lines.product_id')
                        ->where('products.seller_id', Auth::guard("seller")->id());
                })
                ->join('categories', function (JoinClause $join) {
                    $join->on('products.category_id', '=', 'categories.id');
                })
                ->where(function ($query) use ($search) {
                    $query->where('products.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('products.description', 'LIKE', '%' . $search . '%')
                        ->orWhere('categories.name', 'LIKE', '%' . $search . '%');
                })
                ->orderBy('order_lines.created_at', 'desc')->paginate(5);

        } elseif (!empty($status)) {
            $seller_orders = $this->order_line
                ->join('products', function (JoinClause $join) {
                    $join->on('products.id', '=', 'order_lines.product_id')
                        ->where('products.seller_id', Auth::guard("seller")->id());
                })
                ->join('shop_orders', function (JoinClause $join) {
                    $join->on('shop_orders.id', '=', 'order_lines.order_id');
                })
                ->where(function ($query) use ($status) {
                    $query->where('shop_orders.status_id',  $status);
                })
                ->orderBy('order_lines.created_at', 'desc')
                ->paginate(5);
        } else {
            $seller_orders = $this->order_line
                ->join('products', function (JoinClause $join) {
                    $join->on('products.id', '=', 'order_lines.product_id')
                        ->where('products.seller_id', Auth::guard("seller")->id());
                })
                ->orderBy('order_lines.created_at', 'desc')->paginate(5);
        }

        $order_statuses = $this->order_status->orderBy('id', 'asc')->get();

        return view("admin.delivery.deliveryList", compact("order_statuses", "seller_orders"));
    }

    public function update(Request $request, $id)
    {
        $shop_order = $this->shop_order->findOrFail($id);

        $shop_order->status_id = $request->status;
        $shop_order->save();

        return redirect()->route("admin.delivery.search");
    }

}
