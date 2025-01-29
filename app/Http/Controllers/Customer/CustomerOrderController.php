<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('customer_id', auth()->user()->id)->get();
        return view('Customer.orders',compact('orders'));
        }

        public function invoice($id)
        {
            $order = Order::where('id', $id)->first();
            $order_details = OrderDetail::where('order_id', $id)->get();
            return view('Customer.invoice', compact('order','order_details'));
        }
}
