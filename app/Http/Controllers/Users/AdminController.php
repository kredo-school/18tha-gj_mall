<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Admin;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.dashboard');
    }
}
