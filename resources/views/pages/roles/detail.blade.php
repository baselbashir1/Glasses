<x-base-layout>

    <x-slot:pageTitle>Role Details</x-slot>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="mb-3">Role Name:
                                    <b style="font-size: 18px">{{ $role->name }}</b></label>
                                <ul>
                                    @foreach ($rolePermissions as $rolePermission)
                                        <li>{{ $rolePermission->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-base-layout>
