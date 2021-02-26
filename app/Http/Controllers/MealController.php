<?php

namespace App\Http\Controllers;

use App\Models\BreadSize;
use App\Models\BreadType;
use App\Models\Extra;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Sauce;
use App\Models\Taste;
use App\Models\User;
use App\Models\Vegetable;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MealController extends Controller
{
    public function index()
    {
        return view('admin.meals.index', [
            'meals' => Meal::all(),
        ]);
    }

    public function create()
    {
        return view('admin.meals.create');
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
            ->with('message', 'Meal registration opened successfully.');
    }

    public function show(Meal $meal)
    {
        return view('admin.meals.show', compact('meal'));
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();

        return redirect()->route('meals.index')
            ->with('message', 'Meal deleted successfully');
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

    public function dashboard(Request $request)
    {
        /** @var User $user */
        $user = $request->user();

        return view('meals.registration.dashboard', [
            'orders' => Order::all()->where('user_id', '=', $user->getAttribute('id')),
            'breadSizes' => BreadSize::all(),
            'breadTypes' => BreadType::all(),
            'extras' => Extra::all(),
            'sauces' => Sauce::all(),
            'tastes' => Taste::all(),
            'vegetables' => Vegetable::all(),
        ]);
    }
}
