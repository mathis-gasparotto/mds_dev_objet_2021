<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFormRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $clients = Auth::user()->clients;
        //dd($clients);
        return ! $clients
            ? view("clients.index", ['clients' => $clients])
            : view("clients.index", ['clients' => $clients])->with('error', "You don't have a registered client");
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientFormRequest  $request
     */
    public function store(ClientFormRequest $request)
    {
        $input = $request->safe()->only(['name', 'email', 'phone', 'address', 'siret']);
        $client = Auth::user()->clients()->create($input);
        return redirect(route('clients.index'))->with('success', "A new client has been created.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     */
    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClientFormRequest  $request
     * @param  \App\Models\User  $user
     */
    public function update(ClientFormRequest $request, Client $client)
    {
        $input = $request->safe()->only(['name', 'email', 'phone', 'address', 'siret']);
        $client->update($input);
        return redirect(route('clients.index'))->with('success', "The client as been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     */
    public function destroy(Client $client)
    {
        if (Auth::user() == $client->user)
        {
            $client->delete();
            return redirect(route('clients.index'))->with('success', 'The client as been deleted');
        }
        return redirect(route('clients.index'))->with('error', "You cannot delete this client");
    }
}
