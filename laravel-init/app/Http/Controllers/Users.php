<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
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
     * @param  \App\Http\Requests\StoreUserFormRequest  $request
     */
    public function store(StoreUserFormRequest $request)
    {
        $input = $request->safe()->only(['name', 'email', 'password', 'avatar_url']);
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
     * @param  \App\Http\Requests\UpdateUserFormRequest  $request
     * @param  \App\Models\User  $user
     */
    public function update(UpdateUserFormRequest $request, User $user)
    {
        $input = $request->safe()->only(['name', 'email', 'avatar_url']);
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
