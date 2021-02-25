<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Models\Meal;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home', [
            'consumers' => Consumer::all(),
            'meals' => Meal::all()
        ]);
    }
}
