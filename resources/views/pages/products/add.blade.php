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
                                <select name="type" class="form-control" id="productType">
                                    <option selected disabled>Choose Type</option>
                                    @foreach ($productTypes as $productType)
                                        <option value="{{ $productType->id }}">{{ $productType->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('type')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4" id="lenses_grade" style="display: none">
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
                                <label for="lenses_description">Lenses Grade</label>
                                <textarea name="lenses_description" class="form-control" cols="30" rows="10">Lenses Description</textarea>
                            </div>
                            @error('lenses_description')
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
                            {{-- <div class="widget-content widget-content-area ecommerce-create-section"> --}}
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success w-100">Add Product</button>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script>
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
        </script>


        <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
