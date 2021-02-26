<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function index()
    {
        return view('admin.consumers.index', [
            'consumers' => Consumer::all(),
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

        if (Consumer::consumerWithEmailExists($request->get('email'))) {
            return redirect()->route('consumers.index')
                ->with('message','Consumer with the specified email already exists.');
        }

        $consumer = new Consumer($request->all());
        $consumer->setAttribute('access_code', md5($request->get('email')));
        $consumer->save();

        return redirect()->route('consumers.index')
            ->with('message','Consumer created successfully.');
    }

    public function show(Consumer $consumer)
    {
        return view('admin.consumers.show',compact('consumer'));
    }

    public function destroy(Consumer $consumer)
    {
        $consumer->delete();

        return redirect()->route('consumers.index')
            ->with('message','Consumer deleted successfully');
    }
}
