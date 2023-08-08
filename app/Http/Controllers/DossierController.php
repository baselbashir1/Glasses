<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Dossier;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests\DossierRequest;
use App\Http\Requests\InvoiceRequest;

class DossierController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dossiers', ['only' => ['index']]);
        $this->middleware('permission:add dossier', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit dossier', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete dossier', ['only' => ['destroy']]);
    }

    public function index()
    {
        $dossiers = Dossier::all();
        return view('pages.dossiers.list', ['dossiers' => $dossiers]);
    }

    public function show(Dossier $dossier)
    {
        $invoices = Invoice::where('dossier_id', $dossier->id)->get();
        return view('pages.dossiers.detail', ['dossier' => $dossier, 'invoices' => $invoices]);
    }

    public function create()
    {
        return view('pages.dossiers.add');
    }

    public function store(DossierRequest $request)
    {
        $formFields = $request->validated();

        Dossier::create([
            'phone' => $formFields['phone']
        ]);

        return redirect('/dossiers');
    }

    public function edit(Dossier $dossier)
    {
        $agents = Agent::all();
        return view('pages.dossiers.edit', ['dossier' => $dossier, 'agents' => $agents]);
    }

    public function update(DossierRequest $request, Dossier $dossier)
    {
        $formFields = $request->validated();

        $dossier->update([
            'phone' => $formFields['phone']
        ]);

        return redirect('/dossiers');
    }

    public function destroy(Dossier $dossier)
    {
        $dossier->invoices()->delete();
        $dossier->delete();

        return redirect('/dossiers');
    }

    public function getPhoneNumber($id)
    {
        $agent = Agent::findOrFail($id);
        return (string) $agent->phone;
    }
}
