<x-base-layout>

    <x-slot:pageTitle>Edit Agent</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/edit-agent/{{ $agent->id }}">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="name">Agent Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $agent->name }}">
                            </div>
                            @error('name')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- start checkbox --}}
                        <div class="row mb-4" id="keep">
                            <div class="col-sm-12">
                                <label for="phone">Agent Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $agent->phone }}"
                                    disabled>
                            </div>
                            @error('phone')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4" id="change" style="display: none">
                            <div class="col-sm-12">
                                <label for="phone">Agent Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $agent->phone }}">
                            </div>
                            @error('phone')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="check">Change Number</label>
                                <input type="checkbox" name="check" onchange="showHide(this.checked)">
                            </div>
                        </div>
                        {{-- end checkbox --}}
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="category">Agent Category</label>
                                <select name="category" class="form-control">
                                    @foreach ($agentCategories as $agentCategory)
                                        @if ($agent->agentCategory->id == $agentCategory->id)
                                            <option value="{{ $agent->agentCategory->id }}" selected hidden>
                                                {{ $agent->agentCategory->category }}</option>
                                        @endif
                                        <option value="{{ $agentCategory->id }}">{{ $agentCategory->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-4">
                            <div class="widget-content widget-content-area ecommerce-create-section">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success w-100">Update Agent</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--  END CUSTOM SCRIPTS FILE  -->

        <script>
            function showHide(checked) {
                if (checked == true) {
                    $("#keep").hide();
                    $("#change").show();
                } else {
                    $("#keep").show();
                    $("#change").hide();
                }
            }
        </script>

</x-base-layout>
