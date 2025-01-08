<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get users form Model
        $users = User::with('phone')->latest()->get(); 

        //passing user to view
        return view('users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate(([
            'name' => 'required|string|max:255',
            'phone' =>  'required|string|max:255',
        ]));

        $user = User::create(['name' => $request->name]);
        $user->phone()->create(['phone' => $request->phone]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
}
