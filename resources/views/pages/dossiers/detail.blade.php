<x-base-layout>

    <x-slot:pageTitle>Dossier Details</x-slot>

        @if (count($invoices))
            @foreach ($invoices as $invoice)
                <div class="middle-content container-xxl p-0">
                    <div class="row invoice layout-top-spacing layout-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="doc-container">
                                <div class="row">
                                    <div class="col-xl-9">
                                        <div class="invoice-container">
                                            <div class="invoice-inbox">
                                                <div id="ct" class="">
                                                    <div class="invoice-00001">
                                                        <div class="content-section">
                                                            <div class="inv--head-section inv--detail-section">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-12 mr-auto">
                                                                        <div class="d-flex">
                                                                            <img class="company-logo"
                                                                                src="{{ Vite::asset('public/src/assets/images/dossier.png') }}"
                                                                                alt="company">
                                                                            <h3 class="in-heading align-self-center">
                                                                                {{ $invoice->dossier->phone }}
                                                                            </h3>
                                                                        </div>
                                                                        <p class="inv-street-addr mt-3 mb-3">
                                                                            {{ $invoice->agent->name }}</p>
                                                                        <p class="inv-email-address">
                                                                            {{ $invoice->agent->agentCategory->category }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-6 text-sm-end">
                                                                        <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4">
                                                                            <span class="inv-title">#Invoice : </span>
                                                                            <span
                                                                                class="inv-number">{{ $invoice->id }}</span>
                                                                        </p>
                                                                        <p class="inv-created-date mt-sm-5 mt-3"><span
                                                                                class="inv-title">Created Date : </span>
                                                                            <span
                                                                                class="inv-date">{{ $invoice->created_at }}</span>
                                                                        </p>
                                                                        <p class="inv-due-date"><span
                                                                                class="inv-title">Purchased Date :
                                                                            </span>
                                                                            <span
                                                                                class="inv-date">{{ $invoice->purchased_at }}</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="inv--product-table-section">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead class="">
                                                                            <tr>
                                                                                <th scope="col">S.No</th>
                                                                                <th scope="col">Product Name</th>
                                                                                <th scope="col">Product Type</th>
                                                                                <th class="text-end" scope="col">
                                                                                    Product
                                                                                    Price</th>
                                                                                <th class="text-end" scope="col">
                                                                                    Payment
                                                                                    Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>{{ $invoice->product->brand }}</td>
                                                                                <td>{{ $invoice->product->productType->type }}
                                                                                </td>
                                                                                <td class="text-end">
                                                                                    ${{ $invoice->product->price }}</td>
                                                                                <td class="text-end">
                                                                                    @if ($invoice->paymentStatus->id == 1)
                                                                                        <div class="btn btn-success"
                                                                                            style="pointer-events: none; border-radius: 100px">
                                                                                            {{ $invoice->paymentStatus->status }}
                                                                                        </div>
                                                                                    @endif
                                                                                    @if ($invoice->paymentStatus->id == 2)
                                                                                        <div class="btn btn-warning"
                                                                                            style="pointer-events: none; border-radius: 100px">
                                                                                            {{ $invoice->paymentStatus->status }}
                                                                                        </div>
                                                                                    @endif
                                                                                    @if ($invoice->paymentStatus->id == 3)
                                                                                        <div class="btn btn-danger"
                                                                                            style="pointer-events: none; border-radius: 100px">
                                                                                            {{ $invoice->paymentStatus->status }}
                                                                                        </div>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="inv--total-amounts">
                                                                <div class="row mt-4">
                                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                                    </div>
                                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                                        <div class="text-sm-end">
                                                                            <div class="row">
                                                                                <div class="col-sm-8 col-7">
                                                                                    <p class="">Total Price :</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-5">
                                                                                    <p class="">
                                                                                        ${{ $invoice->product->price }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-7">
                                                                                    <p class="">Paid Amount :</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-5">
                                                                                    <p class="">
                                                                                        ${{ $invoice->paid_amount }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-7">
                                                                                    <p class=" discount-rate">Remaining
                                                                                        Amount :
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-5">
                                                                                    <p class="">
                                                                                        ${{ $invoice->remaining_amount }}
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-7 mt-4">
                                                                                    <p class=" discount-rate">Product
                                                                                        Receieved
                                                                                        :
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-5">
                                                                                    <p class="">
                                                                                        @if ($invoice->product_received == 1)
                                                                                            <div class="btn btn-success"
                                                                                                style="pointer-events: none; border-radius: 100px">
                                                                                                Yes</div>
                                                                                        @else
                                                                                            <div class="btn btn-danger"
                                                                                                style="pointer-events: none; border-radius: 100px">
                                                                                                No</div>
                                                                                        @endif
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="inv--note">
                                                                <div class="row mt-4">
                                                                    <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                        <p>Note: Thank you for doing Business with us.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="invoice-actions-btn">
                                            <div class="invoice-action-btn">
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-secondary btn-print  action-print">Print</a>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6 mb-3">
                                                    <a href="/dossier/{{ $dossier->id }}/invoice/{{ $invoice->id }}/edit"
                                                        class="btn btn-dark btn-edit">Edit</a>
                                                </div>

                                                <form method="POST"
                                                    action="/dossier/{{ $dossier->id }}/delete-invoice/{{ $invoice->id }}">
                                                    @csrf
                                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                                        <button class="btn btn-danger btn-delete"
                                                            style="width: 100%">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="container mt-4">
                <div class="mb-4 text-center">
                    <h4>No Invoices Availables</h4>
                </div>
            </div>
        @endif

</x-base-layout>
