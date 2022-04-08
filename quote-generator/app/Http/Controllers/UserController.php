<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        return view('user.show', ['user' => Auth::user()]);
    }

    public function edit(Client $client)
    {
        return view('user.edit', ['user' => Auth::user()]);
    }

    public function update(UpdateUserFormRequest $request)
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
        return redirect(route('user.show'))->with('success', "Your account information as been successfully updated");
    }

    public function delete()
    {
        return view('user.delete');
    }

    public function destroy(Client $client)
    {
        foreach (Auth::user()->clients as $client)
        {
            $client->delete();
            foreach (Auth::user()->clients as $client)
            {
                $client->delete();
                foreach ($client->missions as $mission)
                {
                    $mission->delete();
                    foreach ($mission->missionLines as $missionLine)
                    {
                        $missionLine->delete();
                    }
                }
            }
        }
        Auth::user()->delete();
        return redirect(route('auth.login'))->with('success', "Your account and your clients list as been successfully deleted");
    }
}
