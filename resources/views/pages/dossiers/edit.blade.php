<x-base-layout>

    <x-slot:pageTitle>Edit Dossier</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <h1>NOT COMPLETED</h1>
            <form method="POST" action="/edit-dossier/{{ $dossier->id }}">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="phone">Agent Name</label>
                                <div class="form-control w-50">{{ $dossier->agent->name }}</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="phone">Phone Number</label>
                                <div class="form-control w-50">{{ $dossier->agent->phone }}</div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="phone">Phone Number</label>
                                <input type="checkbox">
                                <div class="form-control w-50">{{ $dossier->agent->phone }}</div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success w-100">Update Dossier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
