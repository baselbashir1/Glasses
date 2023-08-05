<x-base-layout>

    <x-slot:pageTitle>Edit Invoice</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/add-invoice">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row">
                            <label for="agent" class="ml-1 mr-1" style="width: 45%">Agent Name</label>
                            <label for="agent_category" class="ml-1 mr-1" style="width: 45%">Agent Category</label>
                        </div>
                        <div class="row mb-4">
                            <div class="form-control m-1" style="width: 45%">{{ $invoice->agent->name }}</div>
                            <div class="form-control m-1" style="width: 45%">
                                {{ $invoice->agent->agentCategory->category }}</div>
                        </div>
                        <div class="row">
                            <label for="dossier" class="ml-1 mr-1" style="width: 45%">Dossier Number</label>
                            <label for="product" class="ml-1 mr-1" style="width: 45%">Product</label>
                        </div>
                        <div class="row mb-4">
                            <div class="form-control m-1" style="width: 45%">{{ $invoice->product->brand }}</div>
                            <select name="product" class="form-control m-1" id="product"
                                style="width: 45%; border-width: 3px; border-color:lightseagreen">
                                <option selected disabled>Choose Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->brand }}</option>
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
                            <div class="form-control m-1" style="width: 45%" id="product_type">
                                {{ $invoice->product->productType->type }}
                            </div>
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
                                <option selected disabled>Choose Status</option>
                                @foreach ($paymentStatuses as $paymentStatus)
                                    <option value="{{ $paymentStatus->id }}">{{ $paymentStatus->status }}
                                    </option>
                                @endforeach
                            </select>
                            @error('payment_status')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                            <input type="date" name="purchased_date" class="form-control m-1"
                                style="width: 45%; border-width: 3px; border-color:lightseagreen">
                            @error('purchased_date')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="product_received">Product</label>
                                Received <input type="radio" name="product_received" value="1">
                                Not Received <input type="radio" name="product_received" value="0">
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
                const productType = document.getElementById('product_type');
                const productPrice = document.getElementById('product_price');

                product.addEventListener('change', function() {
                    const selectedProductId = product.value;

                    fetch(`/get-product-type/${selectedProductId}`)
                        .then(response => response.text())
                        .then(type => {
                            productType.innerHTML = '<div>' + type + '</div>';
                        })
                        .catch(error => console.error(error));

                    fetch(`/get-product-price/${selectedProductId}`)
                        .then(response => response.text())
                        .then(price => {
                            productPrice.value = price;
                        })
                        .catch(error => console.error(error));
                });
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
