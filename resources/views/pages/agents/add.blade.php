<x-base-layout>

    <x-slot:pageTitle>Add Agent</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/add-agent">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="name">Agent Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Agent Name">
                            </div>
                            @error('name')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="phone">Agent Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Agent Phone">
                            </div>
                            @error('phone')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="category">Agent Category</label>
                                <select name="category" class="form-control">
                                    <option selected disabled>Choose Category</option>
                                    @foreach ($agentCategories as $agentCategory)
                                        <option value="{{ $agentCategory->id }}">{{ $agentCategory->category }}</option>
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
                                    <button type="submit" class="btn btn-success w-100">Add Agent</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
