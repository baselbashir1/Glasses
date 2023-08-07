<x-base-layout>

    <x-slot:pageTitle>Users</x-slot>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-6">
                <a href="/user/add" class="btn btn-primary w-100 btn-lg mb-4">
                    <span class="btn-text-inner">Add User</span>
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Picture</th>
                                {{-- <th>Roles</th> --}}
                                <th class="no-content text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @unless ((array) count($users) == 0)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ substr($user->password, 0, 15) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-left align-items-center">
                                                <div class="avatar  me-3">
                                                    <img src="{{ Vite::asset('public/storage/' . $user->image) }}"
                                                        alt="Avatar" width="64" height="64"
                                                        style="border-radius: 20px">
                                                </div>
                                            </div>
                                        </td>
                                        {{-- <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $role)
                                                    <label class="badge badge-success">{{ $role }}</label>
                                                @endforeach
                                            @endif
                                        </td> --}}
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
                                                        href="/user/{{ $user->id }}/details">View</a>
                                                    <a class="dropdown-item" href="/user/{{ $user->id }}/edit">Edit</a>
                                                    <form action="/delete-user/{{ $user->id }}" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit"
                                                            style="font-size: 13px">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                No Users
                            @endunless
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


</x-base-layout>
