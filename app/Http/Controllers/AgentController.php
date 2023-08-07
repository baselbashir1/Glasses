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
    public function __construct()
    {
        $this->middleware('permission:agents', ['only' => ['index']]);
        $this->middleware('permission:add agent', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit agent', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete agent', ['only' => ['destroy']]);
    }

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

        $agent->update([
            'name' => $formFields['name'],
            'agent_category' => $formFields['category']
        ]);

        return redirect('/agents');
    }

    public function destroy(Agent $agent)
    {
        $agent->invoices()->delete();
        $agent->delete();

        return redirect('/agents');
    }
}
