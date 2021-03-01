<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Order;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'users' => User::all()->where('is_admin', '=', 0),
            'meals' => Meal::all(),
            'orders' => Order::all()
        ]);
    }
}
