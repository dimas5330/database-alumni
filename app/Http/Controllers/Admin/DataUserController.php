<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    // index
    public function index(Request $request)
    {
        //get all users with pagination
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name', 'like', '%' . $name . '%')
                    ->orWhere('email', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('pages.admin.index', compact('users'));
    }

    // create
    public function create()
    {
        return view('pages.admin.create');
    }

    // store
    public function store(Request $request)
    {
        // validate the request...
        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'phone' =>'required|numeric|min:10',
            'password' => 'required|min:8',
        ]);

        // store the request...
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    // edit
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.edit', compact('user'));
    }

    // update
    public function update(Request $request, $id)
    {
        // validate the request...
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' =>'required|numeric|min:10',
            'role' => 'required|in:admin,member',
        ]);

        // update the request...
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();

        //if password is not empty
        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    // destroy
    public function destroy($id)
    {
        // delete the request...
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
