<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return view('pages.agents.list', ['agents' => $agents]);
    }

    public function create()
    {
        return view('pages.agents.add');
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
        return view('pages.agents.edit', ['agent' => $agent]);
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
