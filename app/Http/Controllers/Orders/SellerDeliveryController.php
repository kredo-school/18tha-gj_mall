<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Orders\OrderStatus;
use App\Models\Orders\OrderLine;
use App\Models\Orders\ShopOrder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SellerDeliveryController extends Controller
{
    private $order_status, $order_line, $shop_order;

    public function __construct(OrderLine $order_line, OrderStatus $order_status, ShopOrder $shop_order)
    {
        $this->order_line = $order_line;
        $this->order_status = $order_status;
        $this->shop_order = $shop_order;
    }

    public function showDetail($id)
    {
        $order = $this->order_line->findOrFail($id);

        return view("seller.delivery.modal.deliveryStatus", compact("order"));
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
                ->orderBy('order_lines.created_at', 'desc')
                ->paginate(5);
            $seller_orders->withPath('/seller/delivery');
            $seller_orders->appends($request->all());
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
            $seller_orders->withPath('/seller/delivery');
            $seller_orders->appends($request->all());
        } else {
            $seller_orders = $this->order_line
                ->join('products', function (JoinClause $join) {
                    $join->on('products.id', '=', 'order_lines.product_id')
                        ->where('products.seller_id', Auth::guard("seller")->id());
                })
                ->orderBy('order_lines.created_at', 'desc')
                ->paginate(5);
        }

        $order_statuses = $this->order_status->orderBy('id', 'asc')->get();

        return view("seller.delivery.show", compact("order_statuses", "seller_orders"));
    }

    public function update(Request $request, $id)
    {
        $shop_order = $this->shop_order->findOrFail($id);

        $shop_order->status_id = $request->status;
        $shop_order->save();

        return redirect()->route("seller.delivery.search");
    }
}
