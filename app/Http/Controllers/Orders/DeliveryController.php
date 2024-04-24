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
    private $order_status, $order_line, $shop_order;

    public function __construct(OrderLine $order_line, OrderStatus $order_status, ShopOrder $shop_order)
    {
        $this->order_line = $order_line;
        $this->order_status = $order_status;
        $this->shop_order = $shop_order;
    }

    public function show()
    {
        $admin_orders = $this->order_line
            ->join('products', function (JoinClause $join) {
                $join->on('products.id', '=', 'order_lines.product_id')->where('products.seller_id', Auth::guard("admin")->id());
            })
            ->paginate(10);

        $order_statuses = $this->order_status->orderBy('id', 'asc')->get();

        return view("admin.delivery.deliveryList", compact("order_statuses", "admin_orders"));
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
            $admin_orders = $this->order_line
                ->join('products', function (JoinClause $join) {
                    $join->on('products.id', '=', 'order_lines.product_id')
                        ->where('products.seller_id', Auth::guard("admin")->id());
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
            $admin_orders = $this->order_line
                ->join('products', function (JoinClause $join) {
                    $join->on('products.id', '=', 'order_lines.product_id')
                        ->where('products.seller_id', Auth::guard("admin")->id());
                })
                ->join('shop_orders', function (JoinClause $join) {
                    $join->on('shop_orders.id', '=', 'order_lines.order_id');
                })
                ->where(function ($query) use ($status) {
                    $query->where('shop_orders.status_id',  $status);
                })
                ->orderBy('order_lines.created_at', 'desc')
                ->paginate(10);
        } else {
            $admin_orders = $this->order_line
                ->join('products', function (JoinClause $join) {
                    $join->on('products.id', '=', 'order_lines.product_id')
                        ->where('products.seller_id', Auth::guard("admin")->id());
                })
                ->orderBy('order_lines.created_at', 'desc')->paginate(10);
        }

        $order_statuses = $this->order_status->orderBy('id', 'asc')->get();

        return view("admin.delivery.deliveryList", compact("order_statuses", "admin_orders"));
    }

    public function update(Request $request, $id)
    {
        $shop_order = $this->shop_order->findOrFail($id);

        $shop_order->status_id = $request->status;
        $shop_order->save();

        return redirect()->route("admin.delivery.search");
    }

}
