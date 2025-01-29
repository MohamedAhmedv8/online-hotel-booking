<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('Admin.orders',compact('orders'));
    }
    public function invoice($id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = OrderDetail::where('order_id', $id)->get();
        $customer = Customer::where('id',$order->customer_id)->first();
        return view('Admin.invoice', compact('order','order_details','customer'));
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id)->delete();
        $order_details = OrderDetail::where('order_id', $id)->delete();
        return redirect()->back()->with('success', 'Order deleted successfully');
    }
}
