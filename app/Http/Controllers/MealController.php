<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use DateTimeImmutable;
use Illuminate\Support\Str;

class MealController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('meals.index', [
            'meals' => Meal::all(),
        ]);
    }

    public function create()
    {
        return view('meals.create');
    }

    public function store()
    {
        if (Meal::openMealExists()) {
            return redirect()->route('meals.index')
                ->with('message','Meal registration not possible. A meal is already open.');
        }

        $meal = new Meal();
        $meal->setAttribute('registration_code', md5(Str::random()));
        $meal->save();

        return redirect()->route('meals.index')
            ->with('message','Meal registration opened successfully.');
    }

    public function show(Meal $meal)
    {
        return view('meals.show',compact('meal'));
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();

        return redirect()->route('meals.index')
            ->with('message','Meal deleted successfully');
    }

    public function closeRegistration()
    {
        $meal = Meal::getOpenMeal();

        $meal->setAttribute('eaten_at', new DateTimeImmutable());
        $meal->setAttribute('status', 0);
        $meal->save();

        return redirect()->route('meals.index')
            ->with('message','Meal registration closed successfully.');
    }
}
