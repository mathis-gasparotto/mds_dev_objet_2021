<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionFormRequest;
use App\Http\Requests\MissionLineFormRequest;
use App\Models\Client;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionsController extends Controller
{

    public function index(Client $client)
    {
        return view("missions.index", ['client' => $client]);
    }

    public function create(Client $client)
    {
        return view("missions.create", ['client' => $client]);
    }

    public function store(MissionFormRequest $request, Client $client)
    {
        $input = $request->safe()->only([
            'ref',
            'title',
            'down_payment',
        ]);
        $mission = $client->missions()->create($input);
        return redirect(route('missions.index', $client))->with('success', "A new mission has been successfully created.");
    }

    public function edit(Mission $mission)
    {
        return view('missions.edit', ['mission' => $mission]);
    }

    public function update(MissionFormRequest $request, Mission $mission)
    {
        $input = $request->safe()->only([
            'ref',
            'title',
            'down_payment',
        ]);
        $mission->update($input);
        return redirect(route('missions.index', $mission->client))->with('success', "The mission as been successfully updated");
    }

    public function destroy(Mission $mission)
    {
        if (Auth::user() == $mission->client->user)
        {
            $mission->delete();
            return redirect(route('missions.index', $mission->client))->with('success', 'The mission as been successfully deleted');
        }
        return redirect(route('missions.index', $mission->client))->with('error', "You cannot delete this mission");
    }
}
