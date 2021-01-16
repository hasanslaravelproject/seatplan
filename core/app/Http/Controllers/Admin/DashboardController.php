<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\SeatClass;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function AdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }


}
