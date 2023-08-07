<x-base-layout>

    <x-slot:pageTitle>Product Details</x-slot>

        <div class="row layout-top-spacing">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="widget-content widget-content-area br-8">
                    <div class="row justify-content-center">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-7 col-sm-9 col-12 pe-3">
                            <!-- Swiper -->
                            <div id="thumbnail-slider" class="splide">
                                <div class="splide__track">
                                    <img alt="ecommerce" src="{{ Vite::asset('public/storage/' . $product->image) }}"
                                        style="width: 70%; height: 70%; border:2px solid black;">
                                </div>
                            </div>


                        </div>

                        <div class="col-xxl-4 col-xl-5 col-lg-12 col-md-12 col-12 mt-xl-0 mt-5 align-self-center">
                            <div class="product-details-content">
                                <span class="badge badge-light-danger mb-3">{{ $product->productType->type }}</span>
                                <h3 class="product-title mb-0">{{ $product->brand }}</h3>
                                <div class="row mt-4">
                                    <div class="col-md-9 col-sm-9 col-9">
                                        <div class="pricing">
                                            <h5>${{ $product->price }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-3 text-end">
                                        <div class="product-share">
                                            <button class="btn btn-light-success btn-icon btn-rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-share-2">
                                                    <circle cx="18" cy="5" r="3"></circle>
                                                    <circle cx="6" cy="12" r="3"></circle>
                                                    <circle cx="18" cy="19" r="3">
                                                    </circle>
                                                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49">
                                                    </line>
                                                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49">
                                                    </line>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="row color-swatch mb-4">
                                    <div class="col-xl-3 col-lg-6 col-sm-6 align-self-center">Color</div>
                                    <div class="col-xl-9 col-lg-6 col-sm-6">
                                        {{ $product->color }}
                                    </div>
                                </div>

                                @if ($product->productType->id == 3)
                                    @foreach ($lensesGrades as $lensesGrade)
                                        @if ($product->id == $lensesGrade->product_id)
                                            <div class="row color-swatch mb-4">
                                                <div class="col-xl-3 col-lg-6 col-sm-6 align-self-center">Grade</div>
                                                <div class="col-xl-9 col-lg-6 col-sm-6">
                                                    {{ $lensesGrade->grade }}
                                                </div>
                                            </div>
                                            <div class="row color-swatch mb-4">
                                                <div class="col-xl-3 col-lg-6 col-sm-6 align-self-center">Grade
                                                    Description
                                                </div>
                                                <div class="col-xl-9 col-lg-6 col-sm-6">
                                                    {{ $lensesGrade->description }}
                                                </div>
                                            </div>
                                            <hr class="mb-5 mt-4">
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-base-layout>
