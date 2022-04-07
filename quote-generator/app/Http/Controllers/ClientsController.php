<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFormRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Auth::user()->clients;
        //dd($clients);
        return $clients
            ? view("clients.index", ['clients' => $clients])
            : view("clients.index", ['clients' => $clients])->with('error', "You don't have a registered client");
    }

    public function create()
    {
        return view("clients.create");
    }

    public function store(ClientFormRequest $request)
    {
        $input = $request->safe()->only(['name', 'email', 'phone', 'address', 'siret']);
        $client = Auth::user()->clients()->create($input);
        return redirect(route('clients.index'))->with('success', "A new client has been successfully created.");
    }

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(ClientFormRequest $request, Client $client)
    {
        $input = $request->safe()->only(['name', 'email', 'phone', 'address', 'siret']);
        $client->update($input);
        return redirect(route('clients.index'))->with('success', "The client as been successfully updated");
    }

    public function destroy(Client $client)
    {
        if (Auth::user() == $client->user)
        {
            $client->delete();
            return redirect(route('clients.index'))->with('success', 'The client as been successfully deleted');
        }
        return redirect(route('clients.index'))->with('error', "You cannot delete this client");
    }
}
