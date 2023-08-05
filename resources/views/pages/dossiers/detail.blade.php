<x-base-layout>

    <x-slot:pageTitle>Dossier Details</x-slot>
        <div class="row mb-4 layout-spacing layout-top-spacing">
            <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                @foreach ($agents as $agent)
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <h1>NOT COMPLETED</h1>
                        <div class="row">
                            <label class="ml-1 mr-1" style="width: 45%">Agent Name</label>
                            <label class="ml-1 mr-1" style="width: 45%">Agent
                                Category</label>
                        </div>
                        <div class="row mb-4">
                            <div class="form-control m-1" style="width: 45%">{{ $agent->name }}</div>
                            <div class="form-control m-1" style="width: 45%">{{ $agent->agentCategory->category }}
                            </div>
                        </div>
                        <div class="row">
                            <label class="ml-1 mr-1" style="width: 45%">Invoices</label>
                        </div>
                        <div class="row mb-4">
                            @foreach ($invoices as $invoice)
                                @if ($agent->id == $invoice->agent_id)
                                    <a class="form-control mb-1 w-100"
                                        href="/invoice/{{ $invoice->id }}/details">{{ $invoice->id }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const showAgentDetails = document.getElementById('showAgentDetails');
                const showAgentInvoiceDetails = document.getElementById('showAgentInvoiceDetails');
                const testDiv = document.getElementById('test');
                const test2Div = document.getElementById('test2');

                function updateChangeNumber() {
                    if (showAgentDetails.checked) {
                        testDiv.style.display = 'none';
                    } else {
                        testDiv.style.display = 'block';
                    }
                }

                function updateChangeNumber2() {
                    if (showAgentInvoiceDetails.checked) {
                        test2Div.style.display = 'none';
                    } else {
                        test2Div.style.display = 'block';
                    }
                }

                showAgentDetails.addEventListener('change', updateChangeNumber);
                showAgentInvoiceDetails.addEventListener('change', updateChangeNumber2);
            });
        </script>

</x-base-layout>
