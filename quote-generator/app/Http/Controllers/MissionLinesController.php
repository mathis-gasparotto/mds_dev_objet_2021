<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionLineFormRequest;
use App\Models\Mission;
use App\Models\MissionLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionLinesController extends Controller
{

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
        return redirect(route('missionLines.create', $mission))->with('success', "A new mission line has been successfully created.");
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
        return redirect(route('missions.index', $missionLine->mission->client) . "#" . $missionLine->mission->id)->with('success', "The mission line as been successfully updated");
    }

    public function destroy(MissionLine $missionLine)
    {
        if (Auth::user() == $missionLine->mission->client->user)
        {
            $missionLine->delete();
            if ($missionLine->mission->missionLines->isEmpty())
            {
                return redirect(route('missionLines.create', $missionLine->mission))->with('success', 'The mission line as been successfully deleted. But there is no more mission line, please add some.');
            }
            return redirect(route('missions.index', $missionLine->mission->client) . "#" . $missionLine->mission->id)->with('success', 'The mission line as been successfully deleted');
        }
        return redirect(route('missions.index', $missionLine->mission->client) . "#" . $missionLine->mission->id)->with('error', "You cannot delete this mission line");
    }
}
