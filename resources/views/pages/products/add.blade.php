<x-base-layout>

    <x-slot:pageTitle>Add Product</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/add-product" enctype="multipart/form-data">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="brand">Brand</label>
                                <input type="text" name="brand" class="form-control" placeholder="Product Brand">
                            </div>
                            @error('brand')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="type">Type</label>
                                <select name="type" class="form-control">
                                    <option selected disabled>Product Type</option>
                                    <?php $productTypes = \App\Models\ProductType::all(); ?>
                                    @foreach ($productTypes as $productType)
                                        <option value="{{ $productType->id }}">{{ $productType->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('type')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            @error('image')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="color">Color</label>
                                <input type="text" name="color" class="form-control" placeholder="Product Color">
                            </div>
                            @error('color')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Product Price">
                            </div>
                            @error('price')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="published">
                                    {{ __('trans.publish') }}</label>
                                <input type="checkbox" name="published" />
                            </div>
                            @error('published')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        {{-- <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="product_image">
                                    {{ __('trans.upload_product_image') }}
                                </label>
                                <input type="file" name="product_image" class="form-control">
                            </div>
                            @error('product_image')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-4">
                            <div class="widget-content widget-content-area ecommerce-create-section">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success w-100">Add Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
