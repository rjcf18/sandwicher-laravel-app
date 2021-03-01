<?php declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()->where('is_admin', '=', 0),
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $userWithEmailExists = User::userWithEmailExists($request->get('email'));

        if ($userWithEmailExists) {
            return redirect()->route('users.index')
                ->with('message','User with the specified email already exists.');
        }

        $user = new User($request->all());
        $user->setAttribute('access_token', md5($request->get('email')));
        $user->setAttribute('is_admin', 0);
        $user->save();

        return redirect()->route('users.index')
            ->with('message','User created successfully.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('message','User deleted successfully');
    }
}