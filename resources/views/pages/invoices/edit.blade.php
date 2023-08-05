<x-base-layout>

    <x-slot:pageTitle>Edit Invoice</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/edit-invoice/{{ $invoice->id }}">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row">
                            <label for="agent" class="ml-1 mr-1" style="width: 45%">Agent Name</label>
                            <label for="agent_category" class="ml-1 mr-1" style="width: 45%">Agent
                                Category</label>
                        </div>
                        <div class="row mb-4">
                            <select name="agent" class="form-control m-1" id="agent" style="width: 45%">
                                <option value="{{ $invoice->agent->id }}" selected>{{ $invoice->agent->name }}</option>
                                {{-- @foreach ($agents as $agnet)
                                    <option value="{{ $agnet->id }}">{{ $agnet->name }}</option>
                                @endforeach --}}
                            </select>
                            {{-- <div class="form-control m-1" style="width: 45%">{{ $invoice->agent->name }}</div> --}}
                            {{-- <div class="form-control m-1" style="width: 45%">
                                {{ $invoice->agent->agentCategory->category }}</div> --}}
                            <select name="agent_category" class="form-control m-1" style="width: 45%">
                                <option value="{{ $invoice->agent->agentCategory->id }}" selected>
                                    {{ $invoice->agent->agentCategory->category }}</option>
                            </select>
                        </div>
                        <div class="row">
                            <label for="dossier" class="ml-1 mr-1" style="width: 45%">Dossier Number</label>
                            <label for="product" class="ml-1 mr-1" style="width: 45%">Product</label>
                        </div>
                        <div class="row mb-4">
                            <select name="dossier" class="form-control m-1" style="width: 45%">
                                <option value="{{ $invoice->dossier->id }}" selected>
                                    {{ $invoice->dossier->agent->phone }}</option>
                            </select>
                            {{-- <div class="form-control m-1" style="width: 45%">{{ $invoice->dossier_id }}</div> --}}
                            <select name="product" class="form-control m-1" id="product"
                                style="width: 45%; border-width: 3px; border-color:lightseagreen">
                                @foreach ($products as $product)
                                    @if ($invoice->product->id == $product->id)
                                        <option value="{{ $invoice->product->id }}" selected hidden>
                                            {{ $invoice->product->brand }}</option>
                                    @endif
                                    <option value="{{ $product->id }}">{{ $product->brand }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <label for="product_type" class="ml-1 mr-1" style="width: 45%">Product Type</label>
                            <label for="product_price" class="ml-1 mr-1" style="width: 45%">Product Price</label>
                        </div>
                        <div class="row mb-4">
                            <select name="product_type" class="form-control m-1" style="width: 45%" id="product_type">
                                <option value="{{ $invoice->product->productType->id }}" selected>
                                    {{ $invoice->product->productType->type }}</option>
                                {{-- @foreach ($productTypes as $productType)
                                    <option value="{{ $productType->id }}">{{ $productType->type }}</option>
                                @endforeach --}}
                            </select>
                            {{-- <div class="form-control m-1" style="width: 45%" id="product_type">
                                {{ $invoice->product->productType->type }}
                            </div> --}}
                            <input type="text" name="product_price" class="form-control m-1" id="product_price"
                                value="{{ $invoice->product->price }}" style="width: 45%; pointer-events: none;">
                        </div>
                        <div class="row">
                            <label for="paid_amount" class="ml-1 mr-1" style="width: 45%">Paid Amount</label>
                            <label for="remaining_amount" class="ml-1 mr-1" style="width: 45%">Remaining Amount</label>
                        </div>
                        <div class="row mb-4">
                            <input type="number" name="paid_amount" class="form-control m-1" id="paid_amount"
                                value="{{ $invoice->paid_amount }}"
                                style="width: 45%; border-width: 3px; border-color:lightseagreen">
                            @error('paid_amount')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                            <input type="text" name="remaining_amount" class="form-control m-1" id="remaining_amount"
                                value="{{ $invoice->remaining_amount }}" style="width: 45%; pointer-events-none">
                            @error('remaining_amount')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <label for="payment_status" class="ml-1 mr-1" style="width: 45%">Payment Status</label>
                            <label for="purchased_date" class="ml-1 mr-1" style="width: 45%">Purchase Date</label>
                        </div>
                        <div class="row mb-4">
                            <select name="payment_status" class="form-control m-1"
                                style="width: 45%; border-width: 3px; border-color:lightseagreen">
                                {{-- <option selected disabled>Choose Status</option>
                                @foreach ($paymentStatuses as $paymentStatus)
                                    <option value="{{ $paymentStatus->id }}">{{ $paymentStatus->status }}
                                    </option>
                                @endforeach --}}
                                @foreach ($paymentStatuses as $paymentStatus)
                                    @if ($invoice->paymentStatus->id == $paymentStatus->id)
                                        <option value="{{ $invoice->paymentStatus->id }}" selected hidden>
                                            {{ $invoice->paymentStatus->status }}</option>
                                    @endif
                                    <option value="{{ $paymentStatus->id }}">{{ $paymentStatus->status }}
                                    </option>
                                @endforeach
                            </select>
                            @error('payment_status')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                            <input type="date" name="purchased_date" class="form-control m-1"
                                value="{{ $invoice->purchased_at }}"
                                style="width: 45%; border-width: 3px; border-color:lightseagreen">
                            @error('purchased_date')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="product_received">Product</label>
                                @if ($invoice->product_received == 1)
                                    Received <input type="radio" name="product_received" value="1" checked>
                                    Not Received <input type="radio" name="product_received" value="0">
                                @else
                                    Received <input type="radio" name="product_received" value="1">
                                    Not Received <input type="radio" name="product_received" value="0"
                                        checked>
                                @endif
                            </div>
                            @error('product_received')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success w-100">Update Invoice</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const product = document.getElementById('product');
                const productPrice = document.getElementById('product_price');

                function updateProductSelected() {
                    const selectedProductId = product.value;

                    fetch(`/get-product-type/${selectedProductId}`)
                        .then(response => response.text())
                        .then(type => {
                            $('select[name="product_type"]').empty();
                            $('select[name="product_type"]')
                                .append('<option value="' + type + '">' + type + '</option>');
                        })
                        .catch(error => console.error(error));

                    fetch(`/get-product-price/${selectedProductId}`)
                        .then(response => response.text())
                        .then(price => {
                            productPrice.value = price;
                            const paidAmountInput = document.getElementById('paid_amount');
                            const remainingAmount = document.getElementById('remaining_amount');
                            let product_price = parseFloat(productPrice.value);
                            let paid_amount = parseFloat(paidAmountInput.value);
                            let result = product_price - paid_amount;
                            remainingAmount.value = result;
                        })
                        .catch(error => console.error(error));
                }

                product.addEventListener('change', updateProductSelected);
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const productPriceInput = document.getElementById('product_price');
                const paidAmountInput = document.getElementById('paid_amount');
                const remainingAmount = document.getElementById('remaining_amount');

                function updateRemainingAmount() {
                    let product_price = parseFloat(productPriceInput.value);
                    let paid_amount = parseFloat(paidAmountInput.value);
                    let result = product_price - paid_amount;
                    remainingAmount.value = result;
                }

                productPriceInput.addEventListener('input', updateRemainingAmount);
                paidAmountInput.addEventListener('input', updateRemainingAmount);
            });
        </script>

        <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
