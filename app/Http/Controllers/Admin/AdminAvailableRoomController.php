<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAvailableRoomController extends Controller
{
    public function index()
    {
        return view('Admin.available_rooms');
    }

    public function show(Request $request)
    {
        $request->validate([
            'selected_date' => 'required'
        ]);

        $selected_date = $request->selected_date;
        return view('admin.available_rooms_detail', compact('selected_date'));
    }
    
}
