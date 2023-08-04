<?php

namespace App\Http\Controllers;

use App\Http\Requests\DossierRequest;
use App\Models\Agent;
use App\Models\Dossier;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    public function index()
    {
        $dossiers = Dossier::all();
        return view('pages.dossiers.list', ['dossiers' => $dossiers]);
    }

    public function show(Dossier $dossier)
    {
        return view('pages.dossiers.detail', ['dossier' => $dossier]);
    }

    public function create()
    {
        $agents = Agent::all();
        return view('pages.dossiers.add', ['agents' => $agents]);
    }

    public function store(DossierRequest $request)
    {
        $formFields = $request->validated();

        Dossier::create([
            'agent_id' => $formFields['agent']
        ]);

        return redirect('/dossiers');
    }

    public function edit(Dossier $dossier)
    {
        $agents = Agent::all();
        return view('pages.dossiers.edit', ['dossier' => $dossier, 'agents' => $agents]);
    }

    // public function update(DossierRequest $request, Dossier $dossier)
    // {
    //     $formFields = $request->validated();

    //     $dossier->update([
    //         'user_id' => $formFields['user'],
    //         'phone' => $formFields['phone']
    //     ]);

    //     return redirect('/dossiers');
    // }

    public function destroy(Dossier $dossier)
    {
        $dossier->delete();

        return redirect('/dossiers');
    }

    public function getPhoneNumber($id)
    {
        $agent = Agent::findOrFail($id);
        return (string) $agent->phone;
    }
}
