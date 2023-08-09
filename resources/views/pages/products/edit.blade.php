<x-base-layout>

    <x-slot:pageTitle>Edit Product</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST"
                @if (isset($lensesGrade->id)) action="/edit-product/{{ $product->id }}/{{ $lensesGrade->id }}"
                @else action="/edit-product/{{ $product->id }}" @endif
                enctype="multipart/form-data">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="brand_en">Brand En</label>
                                <input type="text" name="brand_en" class="form-control"
                                    value="{{ $product->translate('en')->brand }}">
                            </div>
                            @error('brand_en')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="brand_ar">Brand Ar</label>
                                <input type="text" name="brand_ar" class="form-control"
                                    value="{{ $product->translate('ar')->brand }}">
                            </div>
                            @error('brand_ar')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="type">Type</label>
                                <select name="type" class="form-control" id="productType">
                                    <option value="{{ $product->productType->id }}" selected>
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
                        <div class="row mb-4" id="lenses_grade"
                            @if ($product->productType->id !== 3) style="display: none" @else style="display: block" @endif>
                            <div class="col-sm-12">
                                <label for="lenses_grade">Lenses Grade</label>
                                <input type="text" name="lenses_grade" class="form-control"
                                    value="{{ $lensesGrade?->grade }}">
                            </div>
                            @error('lenses_grade')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4" id="lenses_description"
                            @if ($product->productType->id !== 3) style="display: none" @else style="display: block" @endif>
                            <div class="col-sm-12">
                                <label for="lenses_description">Lenses Description</label>
                                <textarea name="lenses_description" class="form-control" cols="30" rows="10">{{ $lensesGrade?->description }}</textarea>
                            </div>
                            @error('lenses_description')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
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
                                <label for="color_en">Color En</label>
                                <input type="text" name="color_en" class="form-control"
                                    value="{{ $product->translate('en')->color }}">
                            </div>
                            @error('color_en')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="color_ar">Color Ar</label>
                                <input type="text" name="color_ar" class="form-control"
                                    value="{{ $product->translate('ar')->color }}">
                            </div>
                            @error('color_ar')
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

</x-base-layout>
