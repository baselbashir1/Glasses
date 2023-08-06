<x-base-layout>

    <x-slot:pageTitle>Add Invoice</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/dossier/{{ $dossier->id }}/add-invoice">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="agent">Agent</label>
                                <select name="agent" class="form-control" id="agent">
                                    <option selected disabled>Choose Agent</option>
                                    @foreach ($agents as $agnet)
                                        <option value="{{ $agnet->id }}">{{ $agnet->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('agent')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="agent_category">Agent Category</label>
                                <select name="agent_category" class="form-control">
                                    <option selected disabled>Choose Category</option>
                                    @foreach ($agentCategories as $agentCategory)
                                        <option value="{{ $agentCategory->id }}">{{ $agentCategory->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('agent_category')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="dossier">Dossier</label>
                                <select name="dossier" class="form-control">
                                    <option selected disabled>Choose Dossier</option>
                                    @foreach ($dossiers as $dossier)
                                        <option value="{{ $dossier->id }}">{{ $dossier->phone }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('dossier')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="product">Product</label>
                                <select name="product" class="form-control" id="product">
                                    <option selected disabled>Choose Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->brand }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('product')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="product_type">Product Type</label>
                                <select name="product_type" class="form-control" id="productType">
                                    <option selected disabled>Choose Type</option>
                                    @foreach ($productTypes as $productType)
                                        <option value="{{ $productType->id }}">{{ $productType->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('product_type')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div class="row mb-4" id="lenses_grade" style="display: none">
                            <div class="col-sm-12">
                                <label for="lenses_grade">Lenses Grade</label>
                                <input type="text" name="lenses_grade" class="form-control"
                                    placeholder="Lenses Grade">
                            </div>
                            @error('lenses_grade')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4" id="lenses_description" style="display: none">
                            <div class="col-sm-12">
                                <label for="lenses_description">Lenses Description</label>
                                <textarea name="lenses_description" class="form-control" cols="30" rows="10">Lenses Description</textarea>
                            </div>
                            @error('lenses_description')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="product_price">Product Price</label>
                                <input type="number" name="product_price" class="form-control" id="product_price"
                                    placeholder="Product Price">
                            </div>
                            @error('product_price')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="paid_amount">Paid Amount</label>
                                <input type="number" name="paid_amount" class="form-control" id="paid_amount"
                                    placeholder="Paid Amount">
                            </div>
                            @error('paid_amount')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="remaining_amount">Remaining Amount</label>
                                <input type="number" name="remaining_amount" class="form-control" id="remaining_amount"
                                    placeholder="NaN">
                            </div>
                            @error('remaining_amount')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="payment_status">Payment Status</label>
                                <select name="payment_status" class="form-control">
                                    <option selected disabled>Choose Status</option>
                                    @foreach ($paymentStatuses as $paymentStatus)
                                        <option value="{{ $paymentStatus->id }}">{{ $paymentStatus->status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('payment_status')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="purchased_date">Purchase Date</label>
                                <input type="date" name="purchased_date" class="form-control">
                            </div>
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
                                <button type="submit" class="btn btn-success w-100">Add Invoice</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const agent = document.getElementById('agent');
                const product = document.getElementById('product');
                const productPrice = document.getElementById('product_price');

                function updateAgentSelected() {
                    const selectedAgentId = agent.value;

                    fetch(`/get-agent-category/${selectedAgentId}`)
                        .then(response => response.text())
                        .then(category => {
                            $('select[name="agent_category"]').empty();
                            $('select[name="agent_category"]').append('<option value="' +
                                category + '">' + category + '</option>');
                        })
                        .catch(error => console.error(error));

                    fetch(`/get-dossier-phone-number/${selectedAgentId}`)
                        .then(response => response.json())
                        .then(data => {
                            const id = data.id;
                            const phone = data.phone;
                            $('select[name="dossier"]').empty();
                            $('select[name="dossier"]').append('<option value="' +
                                id + '">' + phone + '</option>');
                        })
                        .catch(error => console.error(error));
                }

                function updateProductSelected() {
                    const selectedProductId = product.value;
                    const productType = document.getElementById('productType');
                    const lensesGrade = document.getElementById('lenses_grade');
                    const lensesDescription = document.getElementById('lenses_description');

                    fetch(`/get-product-type/${selectedProductId}`)
                        .then(response => response.text())
                        .then(type => {
                            $('select[name="product_type"]').empty();
                            $('select[name="product_type"]').append('<option value="' +
                                type + '">' + type + '</option>');

                            // lensesGrade.style.display = 'none';
                            // lensesDescription.style.display = 'none';

                            // if (type === '3') {
                            //     lensesGrade.style.display = 'block';
                            //     lensesDescription.style.display = 'block';
                            // }
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

                agent.addEventListener('change', updateAgentSelected);
                product.addEventListener('change', updateProductSelected);
                // product.addEventListener('click', updateProductSelected);
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

        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const productType = document.getElementById('productType');
                const lensesGrade = document.getElementById('lenses_grade');
                const lensesDescription = document.getElementById('lenses_description');

                function updateSelected() {
                    const selectedOption = productType.value;

                    lensesGrade.style.display = 'none';
                    lensesDescription.style.display = 'none';

                    if (selectedOption === '3') {
                        lensesGrade.style.display = 'block';
                        lensesDescription.style.display = 'block';
                    }
                }

                productType.addEventListener('change', updateSelected);
            });
        </script> --}}

</x-base-layout>
