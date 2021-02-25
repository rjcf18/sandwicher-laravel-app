<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('consumers.index', [
            'consumers' => Consumer::all(),
        ]);
    }

    public function create()
    {
        return view('consumers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $consumer = new Consumer($request->all());
        $consumer->setAttribute('access_code', md5($request->get('email')));
        $consumer->save();

        return redirect()->route('consumers.index')
            ->with('message','Consumer created successfully.');
    }

    public function show(Consumer $consumer)
    {
        return view('consumers.show',compact('consumer'));
    }

    public function destroy(Consumer $consumer)
    {
        $consumer->delete();

        return redirect()->route('consumers.index')
            ->with('message','Consumer deleted successfully');
    }
}
