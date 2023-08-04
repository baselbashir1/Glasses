<x-base-layout>

    <x-slot:pageTitle>Add Dossier</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/add-dossier">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="agent">Agent</label>
                                <select name="agent" class="form-control" id="agentCategory">
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
                                <label for="phone">Phone Number</label>
                                {{-- <input type="text" class="form-control" placeholder="Show Phone Number Here"
                                    id="phoneNumber"> --}}
                                <div id="phoneNumber" class="form-control">Phone Number</div>
                            </div>
                            @error('phone')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success w-100">Add Dossier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const agentCategory = document.getElementById('agentCategory');
                const phoneNumber = document.getElementById('phoneNumber');

                agentCategory.addEventListener('change', function() {
                    const selectedId = agentCategory.value;

                    fetch(`/get-phone-number/${selectedId}`)
                        .then(response => response.text())
                        .then(phone => {
                            phoneNumber.innerHTML = '<div>' + phone + '</div>';
                            // phoneNumber.value = phone;
                        })
                        .catch(error => console.error(error));
                });
            });
        </script>

        <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
