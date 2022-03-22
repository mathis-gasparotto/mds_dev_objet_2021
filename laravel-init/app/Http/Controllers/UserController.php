<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserFromDashboardFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard', ['user' => Auth::user()]);
    }

    public function edit()
    {
        $user = Auth::user();
        echo view('user.dashboard', ['user' => $user]);
        return view('user.edit', ['user' => $user]);
    }

    public function update(UpdateUserFromDashboardFormRequest $request)
    {
        $input = $request->safe()->only(['name', 'email', 'avatar_url']);
        Auth::user()->update($input);
        return redirect()->route('user.dashboard');
    }

    public function destroy()
    {
        Auth::user()->delete();
        Auth::logout();
        return redirect(route('auth.login'));
    }
}
