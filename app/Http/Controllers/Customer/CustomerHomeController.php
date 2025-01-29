<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerHomeController extends Controller
{
    public function index()
    {
        $total_completed_order = Order::where('status','Completed')->where('customer_id',Auth::guard('customer')->user()->id)->count();
        $total_pending_order = Order::where('status','Pending')->where('customer_id',Auth::guard('customer')->user()->id)->count();
        return view('Customer.home',compact('total_completed_order','total_pending_order'));
    }
}
