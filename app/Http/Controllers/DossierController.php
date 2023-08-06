<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Dossier;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests\DossierRequest;

class DossierController extends Controller
{
    public function index()
    {
        $dossiers = Dossier::all();
        return view('pages.dossiers.list', ['dossiers' => $dossiers]);
    }

    public function show(Dossier $dossier)
    {
        $agents = Agent::where('dossier_id', $dossier->id)->get();
        $invoices = Invoice::where('dossier_id', $dossier->id)->get();
        return view('pages.dossiers.detail', ['dossier' => $dossier, 'agents' => $agents, 'invoices' => $invoices]);
    }

    public function create()
    {
        $agents = Agent::all();
        return view('pages.dossiers.add', ['agents' => $agents]);
    }

    public function store(DossierRequest $request)
    {
        $formFields = $request->validated();

        $dossier =  Dossier::create([
            'phone' => $formFields['phone']
        ]);

        $agent = Agent::where('phone', $dossier->phone)->first();
        $agent->update([
            'dossier_id' => $dossier->id
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
        $invoice = Invoice::where('dossier_id', $dossier->id)->first();
        $agent = Agent::where('dossier_id', $dossier->id)->first();

        $invoice->delete();
        $agent->delete();
        $dossier->delete();

        return redirect('/dossiers');
    }

    public function getPhoneNumber($id)
    {
        $agent = Agent::findOrFail($id);
        return (string) $agent->phone;
    }
}
