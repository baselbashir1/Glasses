<x-app>

    <x-slot:pageTitle>Product Details</x-slot>

        <div class="row layout-top-spacing">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="widget-content widget-content-area br-8">
                    <div class="row justify-content-center">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-7 col-sm-9 col-12 pe-3">
                            <!-- Swiper -->
                            <div id="thumbnail-slider" class="splide">
                                <div class="splide__track">
                                    <img alt="ecommerce" src="{{ asset('src/assets/img/product-3.jpg') }}"
                                        style="width: 50%; height: 50%">
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-5 col-lg-12 col-md-12 col-12 mt-xl-0 mt-5 align-self-center">

                            <div class="product-details-content">

                                <span class="badge badge-light-danger mb-3">40% Sale off</span>

                                <h3 class="product-title mb-0">{{ $product->brand }}</h3>

                                <div class="review mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <span class="rating-score">4.88 <span class="rating-count">(200
                                            Reviews)</span></span>
                                </div>

                                <div class="row">

                                    <div class="col-md-9 col-sm-9 col-9">

                                        <div class="pricing">

                                            <span class="discounted-price">${{ $product->price }}</span>

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

                                <div class="row size-selector mb-4">
                                    <div class="col-xl-9 col-lg-6 col-sm-6 align-self-center">Size</div>
                                    <div class="col-xl-3 col-lg-6 col-sm-6 align-self-center">
                                        <select class="form-select form-control-sm" aria-label="Default select example">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L" selected>L</option>
                                            <option value="XL">XL</option>
                                            <option value="2XL">2XL</option>
                                        </select>
                                        <a href="javascript:void(0);" class="product-helpers text-end d-block mt-2">Size
                                            Chart</a>
                                    </div>
                                </div>

                                <div class="row quantity-selector mb-4">
                                    <div class="col-xl-6 col-lg-6 col-sm-6 mt-sm-3">Quantity</div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <input id="demo1" type="text" value="1" name="demo1">
                                        <p class="text-danger product-helpers text-end mt-2">Low Stock</p>
                                    </div>
                                </div>

                                <hr class="mb-5 mt-4">

                                <div class="action-button text-center">

                                    <div class="row">

                                        <div class="col-xxl-7 col-xl-7 col-sm-6 mb-sm-0 mb-3">
                                            <button class="btn btn-primary w-100 btn-lg"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-shopping-cart">
                                                    <circle cx="9" cy="21" r="1">
                                                    </circle>
                                                    <circle cx="20" cy="21" r="1">
                                                    </circle>
                                                    <path
                                                        d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                    </path>
                                                </svg> <span class="btn-text-inner">Add To Cart</span></button>
                                        </div>

                                        <div class="col-xxl-5 col-xl-5 col-sm-6">
                                            <button class="btn btn-success w-100 btn-lg">Buy Now</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app>
