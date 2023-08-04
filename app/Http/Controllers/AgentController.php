<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Models\AgentCategory;
use App\Http\Requests\AgentRequest;

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

        $agent->update([
            'name' => $formFields['name'],
            'phone' => $formFields['phone'],
            'agent_category' => $formFields['category']
        ]);

        return redirect('/agents');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect('/agents');
    }
}
