<x-app>

    <x-slot:pageTitle>Products</x-slot>

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column"></th>
                                <th>Brand</th>
                                <th>Product Type</th>
                                <th>Image</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th class="no-content text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @unless ((array) count($products) == 0)
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ $product->productType->type }}</td>
                                        <td>
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar  me-3">
                                                    <img src="{{ asset('src/assets/img/product-3.jpg') }}" alt="Avatar"
                                                        width="64" height="64" style="border-radius: 20px">
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <span class="text-truncate fw-bold">Nike Green Shoes</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-danger">{{ $product->color }}</span></td>
                                        <td>${{ $product->price }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <a class="dropdown-item"
                                                        href="/product/{{ $product->id }}/details">View</a>
                                                    <a class="dropdown-item"
                                                        href="/product/{{ $product->id }}/edit">Edit</a>
                                                    <form action="/delete-product/{{ $product->id }}" method="POST">
                                                        @csrf
                                                        <button type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                No Products Avaliables
                            @endunless
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


</x-app>
