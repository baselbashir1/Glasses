<x-base-layout>

    <x-slot:pageTitle>Add Role</x-slot>

        <form action="/add-role" method="POST">
            @csrf
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5 mb-4">
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <div class="form-group">
                                        <label>Permission Name:</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mt-4">
                                    <div id="treeview1">
                                        <label class="mb-3">Choose Permissions:</label>
                                        <ul>
                                            @foreach ($permissions as $permission)
                                                <li>
                                                    <label style="font-size: 16px;">
                                                        <input type="checkbox" name="permission[]"
                                                            value="{{ $permission->id }}" class="name">
                                                        {{ $permission->name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-main-primary">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

</x-base-layout>
