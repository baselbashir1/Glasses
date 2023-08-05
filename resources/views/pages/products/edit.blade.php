<x-base-layout>

    <x-slot:pageTitle>Edit Product</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/edit-product/{{ $product->id }}/{{ $lensesGrade?->id }}"
                enctype="multipart/form-data">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="brand">Brand</label>
                                <input type="text" name="brand" class="form-control" value="{{ $product->brand }}">
                            </div>
                            @error('brand')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="type">Type</label>
                                <select name="type" class="form-control" id="productType">
                                    <option value="{{ $product->productType->id }}" selected hidden>
                                        {{ $product->productType->type }}</option>
                                    @foreach ($productTypes as $productType)
                                        <option value="{{ $productType->id }}">{{ $productType->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('type')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        @foreach ($lensesGrades as $lensesGrade)
                            @if ($product->id == $lensesGrade->product_id)
                                <div class="row mb-4" id="lenses_grade">
                                    <div class="col-sm-12">
                                        <label for="lenses_grade">Lenses Grade</label>
                                        <input type="text" name="lenses_grade" class="form-control"
                                            value="{{ $lensesGrade->grade }}">
                                    </div>
                                    @error('lenses_grade')
                                        <p class="mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row mb-4" id="lenses_description">
                                    <div class="col-sm-12">
                                        <label for="lenses_description">Lenses Description</label>
                                        <textarea name="lenses_description" class="form-control" cols="30" rows="10">{{ $lensesGrade->description }}</textarea>
                                    </div>
                                    @error('lenses_description')
                                        <p class="mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif
                        @endforeach

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <div class="row">
                                    <label for="image">Image</label>
                                    <div class="text-center">
                                        <img src="{{ Vite::asset('public/storage/' . $product->image) }}"
                                            class="card-img-top" alt="..." style="width: 250px; height: 250px;">
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-2 mb-2">
                                <input type="file" name="image" class="form-control"
                                    value="{{ $product->image }}">
                            </div>
                            @error('image')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="color">Color</label>
                                <input type="text" name="color" class="form-control"
                                    value="{{ $product->color }}">
                            </div>
                            @error('color')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control"
                                    value="{{ $product->price }}">
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
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success w-100">Update Product</button>
                            </div>
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
