<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function create()
    {
        return view('employee.leave_request_create');
    }
}
