<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Models\AgentCategory;
use App\Http\Requests\AgentRequest;
use App\Models\Dossier;
use App\Models\Invoice;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return view('pages.agents.list', ['agents' => $agents]);
    }

    public function create()
    {
        $agentCategories = AgentCategory::all();
        return view('pages.agents.add', ['agentCategories' => $agentCategories]);
    }

    public function store(AgentRequest $request)
    {
        $formFields = $request->validated();

        Agent::create([
            'name' => $formFields['name'],
            'phone' => $formFields['phone'],
            'agent_category' => $formFields['category']
        ]);

        return redirect('/agents');
    }

    public function edit(Agent $agent)
    {
        $agentCategories = AgentCategory::all();
        return view('pages.agents.edit', ['agent' => $agent, 'agentCategories' => $agentCategories]);
    }

    public function update(AgentRequest $request, Agent $agent)
    {
        $formFields = $request->validated();

        $dossier = Dossier::where('phone', $agent->phone)->first();

        $agent->update([
            'name' => $formFields['name'],
            'phone' => $formFields['phone'],
            'agent_category' => $formFields['category']
        ]);

        $dossier->update([
            'phone' => $formFields['phone']
        ]);

        return redirect('/agents');
    }

    public function destroy(Agent $agent)
    {
        $dossier = Dossier::where('phone', $agent->phone)->first();
        $invoice = Invoice::where('agent_id', $agent->id)->first();

        $agent->delete();
        $dossier->delete();
        $invoice->delete();

        return redirect('/agents');
    }
}
