<x-base-layout>

    <x-slot:pageTitle>Edit Role</x-slot>

        <form method="POST" action="/edit-role/{{ $role->id }}">
            @csrf
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5 mb-4">
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <div class="form-group">
                                        <label>Role Name:</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $role->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mt-4">
                                    <label class="mb-3">Choose Permissions:</label>
                                    <ul>
                                        @foreach ($permissions as $permission)
                                            <li>
                                                <label style="font-size: 16px;">
                                                    <input type="checkbox" name="permission[]"
                                                        value="{{ $permission->id }}" class="name"
                                                        @if (in_array($permission->id, $rolePermissions)) checked @endif>
                                                    {{ $permission->name }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-main-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

</x-base-layout>
