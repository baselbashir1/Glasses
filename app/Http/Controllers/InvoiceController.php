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
    public function index()
    {
        $invoices = Invoice::all();
        return view('pages.invoices.list', ['invoices' => $invoices]);
    }

    public function show(Invoice $invoice)
    {
        return view('pages.invoices.detail', ['invoice' => $invoice]);
    }

    public function create()
    {
        $productTypes = ProductType::all();
        $agentCategories = AgentCategory::all();
        $paymentStatuses = PaymentStatus::all();
        $agents = Agent::all();
        $dossiers = Dossier::all();
        $products = Product::all();
        return view('pages.invoices.add', [
            'productTypes' => $productTypes,
            'agentCategories' => $agentCategories,
            'paymentStatuses' => $paymentStatuses,
            'agents' => $agents,
            'dossiers' => $dossiers,
            'products' => $products
        ]);
    }

    public function store(InvoiceRequest $request)
    {
        $formFields = $request->validated();

        Invoice::create([
            'product_id' => $formFields['product'],
            'paid_amount' => $formFields['paid_amount'],
            'remaining_amount' => $formFields['remaining_amount'],
            'product_received' => $formFields['product_received'],
            'payment_status' => $formFields['payment_status'],
            'agent_id' => $formFields['agent'],
            'dossier_id' => $formFields['dossier'],
            'purchased_at' => $formFields['purchased_date']
        ]);

        return redirect('/invoices');
    }

    public function edit(Invoice $invoice)
    {
        $paymentStatuses = PaymentStatus::all();
        $products = Product::all();
        return view('pages.invoices.edit', ['invoice' => $invoice, 'paymentStatuses' => $paymentStatuses, 'products' => $products]);
    }

    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $formFields = $request->validated();

        $invoice->update([
            'product_id' => $formFields['product'],
            'paid_amount' => $formFields['paid_amount'],
            'remaining_amount' => $formFields['remaining_amount'],
            'product_received' => $formFields['product_received'],
            'payment_status' => $formFields['payment_status'],
            'agent_id' => $formFields['agent'],
            'dossier_id' => $formFields['dossier'],
            'purchased_at' => $formFields['purchased_date']
        ]);

        return redirect('/invoices');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect('/invoices');
    }

    public function getAgentCategory($id)
    {
        $agent = Agent::findOrFail($id);
        return (string) $agent->agentCategory->category;
    }

    public function getDossierPhoneNumber($id)
    {
        $dossier = Dossier::findOrFail($id);
        return response()->json([
            'id' => $dossier->id,
            'phone' => $dossier->phone
        ]);
    }

    public function getProductType($id)
    {
        $product = Product::findOrFail($id);
        return (string) $product->productType->type;
    }

    public function getProductPrice($id)
    {
        $product = Product::findOrFail($id);
        return (string) $product->price;
    }
}
