<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Agent;
use App\Models\AgentCategory;
use App\Models\Dossier;
use App\Models\Invoice;
use App\Models\PaymentStatus;
use App\Models\ProductType;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('pages.invoices.list', ['invoices' => $invoices]);
    }

    public function show()
    {
    }

    public function create()
    {
        $productTypes = ProductType::all();
        $agentCategories = AgentCategory::all();
        $paymentStatuses = PaymentStatus::all();
        $agents = Agent::all();
        $dossiers = Dossier::all();
        return view('pages.invoices.add', [
            'productTypes' => $productTypes,
            'agentCategories' => $agentCategories,
            'paymentStatuses' => $paymentStatuses,
            'agents' => $agents,
            'dossiers' => $dossiers
        ]);
    }

    public function store(InvoiceRequest $request)
    {
        $formFields = $request->validated();

        Invoice::create([
            'product_type' => $formFields['product_type'],
            'agent_category' => $formFields['agent_category'],
            'product_price' => $formFields['product_price'],
            'paid_amount' => $formFields['paid_amount'],
            'remaining_amount' => $formFields['remaining_amount'],
            'product_received' => 1,
            'payment_status' => $formFields['payment_status'],
            'agent_id' => $formFields['agent'],
            'dossier_id' => $formFields['dossier'],
            'purchased_at' => $formFields['purchased_date']
        ]);

        return redirect('/invoices');
    }

    public function getAgentCategory($id)
    {
        $agent = Agent::findOrFail($id);
        return (string) $agent->agentCategory->category;
    }

    public function getDossierPhoneNumber($id)
    {
        $agent = Agent::findOrFail($id);
        return (string) $agent->phone;
    }
}
