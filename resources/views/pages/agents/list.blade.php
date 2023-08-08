<x-base-layout>

    <x-slot:pageTitle>Agents</x-slot>

        @can('add agent')
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-6">
                    <a href="/agent/add" class="btn btn-primary w-100 btn-lg mb-4">
                        <span class="btn-text-inner">Add Agent</span>
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
                                <th>Agent Name</th>
                                <th>Agent Category</th>
                                <th>Creation Date</th>
                                <th class="no-content text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($agents))
                                @foreach ($agents as $agent)
                                    <tr>
                                        <td>{{ $agent->id }}</td>
                                        <td>{{ $agent->name }}</td>
                                        <td>{{ $agent->agentCategory->category }}</td>
                                        <td>{{ $agent->created_at }}</td>
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
                                                    @can('edit agent')
                                                        <a class="dropdown-item"
                                                            href="/agent/{{ $agent->id }}/edit">Edit</a>
                                                    @endcan
                                                    @can('delete agent')
                                                        <form action="/delete-agent/{{ $agent->id }}" method="POST">
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
                                    <h4>No Agents Availables</h4>
                                </div>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</x-base-layout>
