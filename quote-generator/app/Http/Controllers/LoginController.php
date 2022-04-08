<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function auth()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('github_id', $githubUser->id)->first();

        if ($user) {
            Auth::login($user);
            return redirect(route('dashboard'))->with('success', "You have been successfully logged in");
        }
        $newUser = User::create(['github_id' => $githubUser->id, 'name' => $githubUser->name, 'email' => $githubUser->email]);
        Auth::login($newUser);
        return redirect(route('auth.register'));

    }

    public function register()
    {
        return view('auth.register');
    }

    public function registration(UpdateUserFormRequest $request)
    {
        $input = $request->safe()->only([
            'name',
            'email',
            'contact_email',
            'phone',
            'address',
            'bank_account_owner',
            'bank_domiciliation',
            'bank_rib',
            'bank_iban',
            'bank_bic',
            'company_name',
            'company_siret',
            'company_ape',
        ]);
        Auth::user()->update($input);
        return redirect()->route('dashboard')->with('success', "You have been successfully registered and logged in");
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('auth.login'))->with('success', "You have been successfully logout");
    }
}
