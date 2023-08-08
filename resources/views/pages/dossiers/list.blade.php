<x-base-layout>

    <x-slot:pageTitle>Dossiers</x-slot>

        @can('add dossier')
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-6">
                    <a href="/dossier/add" class="btn btn-primary w-100 btn-lg mb-4">
                        <span class="btn-text-inner">Add Dossier</span>
                    </a>
                </div>
            </div>
        @endcan

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="ecommerce-list" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column"></th>
                                <th>Phone Number</th>
                                <th>Creation Date</th>
                                <th>#Invoices</th>
                                <th class="no-content text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($dossiers))
                                @foreach ($dossiers as $dossier)
                                    <tr>
                                        <td>{{ $dossier->id }}</td>
                                        <td>{{ $dossier->phone }}</td>
                                        <td>{{ $dossier->created_at }}</td>
                                        <td>{{ count($dossier->invoices) }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    @can('invoices')
                                                        <a class="dropdown-item"
                                                            href="/dossier/{{ $dossier->id }}/details">View Invoices</a>
                                                    @endcan
                                                    @can('add invoice')
                                                        <a class="dropdown-item"
                                                            href="/dossier/{{ $dossier->id }}/invoice/add">Add Invoice</a>
                                                    @endcan
                                                    @can('edit dossier')
                                                        <a class="dropdown-item"
                                                            href="/dossier/{{ $dossier->id }}/edit">Edit</a>
                                                    @endcan
                                                    @can('delete dossier')
                                                        <form action="/delete-dossier/{{ $dossier->id }}" method="POST">
                                                            @csrf
                                                            <button class="dropdown-item" type="submit"
                                                                style="font-size: 13px">Delete</button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="mb-4 text-center">
                                    <h4>No Dossiers Availables</h4>
                                </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-base-layout>
