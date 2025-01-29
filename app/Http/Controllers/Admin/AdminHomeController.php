<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Subscriber;

class AdminHomeController extends Controller
{
    public function index()
    {
        $total_completed_order = Order::where('status','Completed')->count();
        $total_pending_order = Order::where('status','Pending')->count();
        $total_completed_customers = Customer::where('status','Completed')->count();
        $total_pending_customers = Customer::where('status','Pending')->count();
        $total_rooms = Room::count();
        $total_subscribers = Subscriber::count();
        $orders = Order::orderBy('id','desc')->skip(0)->take(5)->get();
        return view('Admin.home',compact('total_completed_order','total_pending_order','total_completed_customers','total_pending_customers','total_rooms','total_subscribers','orders'));
    }
}