<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Models\Meal;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'consumers' => Consumer::all(),
            'meals' => Meal::all()
        ]);
    }
}
