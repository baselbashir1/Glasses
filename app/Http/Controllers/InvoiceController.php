<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Agent;
use App\Models\AgentCategory;
use App\Models\Dossier;
use App\Models\Invoice;
use App\Models\PaymentStatus;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:invoices', ['only' => ['index']]);
        $this->middleware('permission:add invoice', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit invoice', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete invoice', ['only' => ['destroy']]);
    }

    public function index()
    {
        $invoices = Invoice::all();
        return view('pages.invoices.list', ['invoices' => $invoices]);
    }

    public function show(Invoice $invoice)
    {
        return view('pages.invoices.detail', ['invoice' => $invoice]);
    }

    public function create(Dossier $dossier)
    {
        $productTypes = ProductType::all();
        $agentCategories = AgentCategory::all();
        $paymentStatuses = PaymentStatus::all();
        $agents = Agent::all();
        $products = Product::all();
        return view('pages.invoices.add', [
            'productTypes' => $productTypes,
            'agentCategories' => $agentCategories,
            'paymentStatuses' => $paymentStatuses,
            'agents' => $agents,
            'products' => $products,
            'dossier' => $dossier
        ]);
    }

    public function store(InvoiceRequest $request, Dossier $dossier)
    {
        $formFields = $request->validated();

        Invoice::create([
            'product_id' => $formFields['product'],
            'paid_amount' => $formFields['paid_amount'],
            'remaining_amount' => $formFields['remaining_amount'],
            'product_received' => $formFields['product_received'],
            'payment_status' => $formFields['payment_status'],
            'agent_id' => $formFields['agent'],
            'dossier_id' => $dossier->id,
            'purchased_at' => isset($formFields['purchased_date']) ? $formFields['purchased_date'] : now(),
            'content' => $formFields['content']
        ]);

        return redirect('/dossier/' . $dossier->id . '/details');
    }

    public function edit(Dossier $dossier, Invoice $invoice)
    {
        $paymentStatuses = PaymentStatus::all();
        $products = Product::all();
        return view('pages.invoices.edit', ['invoice' => $invoice, 'dossier' => $dossier, 'paymentStatuses' => $paymentStatuses, 'products' => $products]);
    }

    public function update(InvoiceRequest $request, Dossier $dossier, Invoice $invoice)
    {
        $formFields = $request->validated();

        $invoice->update([
            'product_id' => $formFields['product'],
            'paid_amount' => $formFields['paid_amount'],
            'remaining_amount' => $formFields['remaining_amount'],
            'product_received' => $formFields['product_received'],
            'payment_status' => $formFields['payment_status'],
            'agent_id' => $formFields['agent'],
            'dossier_id' => $dossier->id,
            'purchased_at' => isset($formFields['purchased_date']) ? $formFields['purchased_date'] : $invoice->purchased_at,
            'content' => $formFields['content']
        ]);

        return redirect('/dossier/' . $dossier->id . '/details');
    }

    public function destroy(Dossier $dossier, Invoice $invoice)
    {
        $invoice->delete();
        return redirect('/dossiers');
    }
}
