<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('Admin.customer_list', compact('customers'));
    }

    public function change_status($id)
    {
        $customer =Customer::FindOrFail($id);
        if ($customer->status==1) {
           $customer->status=0;
        }elseif($customer->status==0){
            $customer->status=1;
        }
        $customer->update();
        return redirect()->back()->with('success', 'Status Change Successfully');
    }

}
