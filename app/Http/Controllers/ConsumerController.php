<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function index()
    {
        return view('admin.consumers.index', [
            'consumers' => User::all()->where('is_admin', '=', 0),
        ]);
    }

    public function create()
    {
        return view('admin.consumers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $consumerWithEmailExists = User::userWithEmailExists($request->get('email'));

        if ($consumerWithEmailExists) {
            return redirect()->route('consumers.index')
                ->with('message','Consumer with the specified email already exists.');
        }

        $consumer = new User($request->all());
        $consumer->setAttribute('access_token', md5($request->get('email')));
        $consumer->setAttribute('is_admin', 0);
        $consumer->save();

        return redirect()->route('consumers.index')
            ->with('message','Consumer created successfully.');
    }

    public function show(User $consumer)
    {
        return view('admin.consumers.show',compact('consumer'));
    }

    public function destroy(User $consumer)
    {
        $consumer->delete();

        return redirect()->route('consumers.index')
            ->with('message','Consumer deleted successfully');
    }
}
