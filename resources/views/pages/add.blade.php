<x-app>

    <x-slot:pageTitle>add</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/add-product" enctype="multipart/form-data">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="type"><i class="fas fa-pen"></i>
                                    Product Type</label>
                                <select name="type" class="form-control">
                                    <option selected disabled>Select glass type</option>
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
                                <label for="image"><i class="fas fa-image"></i>
                                    product image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            @error('image')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="price"><i class="far fa-money-bill-alt"></i>
                                    product price</label>
                                <input type="number" name="price" class="form-control" placeholder="product price">
                            </div>
                            @error('price')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="description"><i class="fas fa-book-open"></i>
                                    {{ __('trans.product_description') }}</label>
                                <textarea name="description" cols="30" rows="10" class="form-control"
                                    placeholder="{{ __('trans.product_description') }}"></textarea>
                            </div>
                            @error('description')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="published"><i class="fas fa-rocket"></i>
                                    {{ __('trans.publish') }}</label>
                                <input type="checkbox" name="published" />
                            </div>
                            @error('published')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="product_image"><i class="fas fa-images"></i>
                                    {{ __('trans.upload_product_image') }}
                                </label>
                                <input type="file" name="product_image" class="form-control">
                            </div>
                            @error('product_image')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-4">
                            <div class="widget-content widget-content-area ecommerce-create-section">
                                <div class="col-sm-12">
                                    <button type="submit"
                                        class="btn btn-success w-100">{{ __('trans.add_product') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!--  END CUSTOM SCRIPTS FILE  -->
</x-app>
