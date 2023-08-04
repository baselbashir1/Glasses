<x-base-layout>

    <x-slot:pageTitle>Dossiers</x-slot>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-6">
                <a href="/dossier/add" class="btn btn-primary w-100 btn-lg mb-4">
                    <span class="btn-text-inner">Add Dossier</span>
                </a>
            </div>
        </div>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column"></th>
                                <th>Agent Name</th>
                                <th>Phone Number</th>
                                <th class="no-content text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @unless ((array) count($dossiers) == 0)
                                @foreach ($dossiers as $dossier)
                                    <tr>
                                        <td>{{ $dossier->id }}</td>
                                        <td>{{ $dossier->agent->name }}</td>
                                        <td>{{ $dossier->agent->phone }}</td>

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
                                                        href="/dossier/{{ $dossier->id }}/details">View</a>
                                                    <a class="dropdown-item"
                                                        href="/dossier/{{ $dossier->id }}/edit">Edit</a>
                                                    <form action="/delete-dossier/{{ $dossier->id }}" method="POST">
                                                        @csrf
                                                        <button type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                No Dossiers Avaliables
                            @endunless
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-base-layout>
