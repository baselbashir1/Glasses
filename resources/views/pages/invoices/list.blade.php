<x-base-layout>

    <x-slot:pageTitle>Invoices</x-slot>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-6">
                <a href="/invoice/add" class="btn btn-primary w-100 btn-lg mb-4">
                    <span class="btn-text-inner">Add Invoice</span>
                </a>
            </div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column"></th>
                                <th>Agent Name</th>
                                <th>Product Price</th>
                                <th>Remaining Amount</th>
                                <th>Payment Status</th>
                                <th>Product Received</th>
                                <th>Purchase Date</th>
                                <th class="no-content text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($invoices))
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->id }}</td>
                                        <td>{{ $invoice->agent->name }}</td>
                                        <td>{{ $invoice->product->price }}</td>
                                        <td>{{ $invoice->remaining_amount }}</td>
                                        <td>
                                            @if ($invoice->paymentStatus->id == 1)
                                                <div class="btn btn-success"
                                                    style="pointer-events: none; border-radius: 100px">
                                                    {{ $invoice->paymentStatus->status }}</div>
                                            @elseif ($invoice->paymentStatus->id == 2)
                                                <div class="btn btn-warning"
                                                    style="pointer-events: none; border-radius: 100px">
                                                    {{ $invoice->paymentStatus->status }}</div>
                                            @else
                                                <div class="btn btn-danger"
                                                    style="pointer-events: none; border-radius: 100px">
                                                    {{ $invoice->paymentStatus->status }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($invoice->product_received == 1)
                                                <div class="btn btn-success"
                                                    style="pointer-events: none; border-radius: 100px">Yes</div>
                                            @else
                                                <div class="btn btn-danger"
                                                    style="pointer-events: none; border-radius: 100px">No</div>
                                            @endif
                                        </td>
                                        <td>{{ $invoice->purchased_at }}</td>
                                        <td class="text-center">
                                            <div class="dropdown    ">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item"
                                                        href="/invoice/{{ $invoice->id }}/details">View</a>
                                                    <a class="dropdown-item"
                                                        href="/invoice/{{ $invoice->id }}/edit">Edit</a>
                                                    <form action="/delete-invoice/{{ $invoice->id }}" method="POST">
                                                        @csrf
                                                        <button type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="mb-4 text-center">
                                    <h4>No Products Availables</h4>
                                </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</x-base-layout>
