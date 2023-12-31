<x-base-layout>

    <x-slot:pageTitle>shop</x-slot>

        <div class="row layout-top-spacing">

            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
                <select class="form-select" aria-label="Default select example">
                    <option selected="">All Category</option>
                    <option value="3">Apperal</option>
                    <option value="1">Electronics</option>
                    <option value="2">Clothing</option>
                    <option value="3">Accessories</option>
                    <option value="3">Organic</option>
                </select>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 mb-4">
                <select class="form-select" aria-label="Default select example">
                    <option selected="">Sort By</option>
                    <option value="1">Low to High Price</option>
                    <option value="2">Most Viewed</option>
                    <option value="3">Hight to Low Price</option>
                    <option value="3">On Sale</option>
                    <option value="3">Newest</option>
                </select>
            </div>
        </div>

        <div class="row">
            @if (count($dossiers))
                @foreach ($dossiers as $dossier)
                    <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a class="card style-6" href="/dossier/{{ $dossier->id }}/details">
                            {{-- <span class="badge badge-primary">{{ $dossier->agent->name }}</span> --}}
                            <img src="{{ Vite::asset('public/src/assets/images/dossier.png') }}" class="card-img-top"
                                alt="...">
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <b>{{ $dossier->phone }}</b>
                                    </div>
                                    <div class="col-3">
                                        <div class="badge--group">
                                            <div class="badge badge-primary badge-dot"></div>
                                            <div class="badge badge-danger badge-dot"></div>
                                            <div class="badge badge-info badge-dot"></div>
                                        </div>
                                    </div>
                                    <div class="col-9 text-end">
                                        <div class="pricing d-flex justify-content-end">
                                            <p class="text-success mb-0">{{ $dossier->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="mb-4 text-center">
                    <h4>No Dossiers Availables</h4>
                </div>
            @endif
        </div>
</x-base-layout>
