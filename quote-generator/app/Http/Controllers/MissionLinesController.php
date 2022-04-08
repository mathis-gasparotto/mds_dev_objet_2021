<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionLineFormRequest;
use App\Models\Mission;
use App\Models\MissionLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionLinesController extends Controller
{

    public function index(Mission $mission)
    {
        return view("missionLines.index", ['mission' => $mission]);
    }

    public function create(Mission $mission)
    {
        return view("missionLines.create", ['mission' => $mission]);
    }

    public function store(MissionLineFormRequest $request, Mission $mission)
    {
        $input = $request->safe()->only([
            'title',
            'quantity',
            'unit_price',
            'unit',
        ]);
        $mission_line = $mission->missionLines()->create($input);
        //return redirect(route('missionLines.index', $mission))->with('success', "A new mission line has been successfully created.");
        return redirect(route('missions.index', $mission->client))->with('success', "A new mission line has been successfully created.");
    }

    public function edit(MissionLine $missionLine)
    {
        return view('missionLines.edit', ['missionLine' => $missionLine]);
    }

    public function update(MissionLineFormRequest $request, MissionLine $missionLine)
    {
        $input = $request->safe()->only([
            'title',
            'quantity',
            'unit_price',
            'unit',
            ]);
        $missionLine->update($input);
        //return redirect(route('missionLines.index', $missionLine->mission))->with('success', "The mission line as been successfully updated");
        return redirect(route('missions.index', $missionLine->mission->client))->with('success', "The mission line as been successfully updated");
    }

    public function destroy(MissionLine $missionLine)
    {
        if (Auth::user() == $missionLine->mission->client->user)
        {
            $missionLine->delete();
            //return redirect(route('missionLines.index', $missionLine->mission))->with('success', 'The mission line as been successfully deleted');
            return redirect(route('missions.index', $missionLine->mission->client))->with('success', 'The mission line as been successfully deleted');
        }
        //return redirect(route('missionLines.index', $missionLine->mission))->with('error', "You cannot delete this mission line");
        return redirect(route('missions.index', $missionLine->mission->client))->with('error', "You cannot delete this mission line");
    }
}
