<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view("users.index", ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $input = $request->only(['name', 'email', 'password', 'avatar_url']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     */
    public function edit(User $user)
    {
        echo view('users.show', ['user' => $user]);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     */
    public function update(Request $request, User $user)
    {
        $input = $request->only(['name', 'email', 'avatar_url']);
        $user->update($input);
        return redirect()->route('users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
