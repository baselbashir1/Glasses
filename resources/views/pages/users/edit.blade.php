<x-base-layout>

    <x-slot:pageTitle>Edit User</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/edit-user/{{ $user->id }}" enctype="multipart/form-data">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            @error('name')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            @error('email')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="password">Passowrd</label>
                                <input type="text" name="password" class="form-control"
                                    value="{{ $user->password }}">
                            </div>
                            @error('password')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <div class="row">
                                    <label for="image">Picture</label>
                                    <div class="text-center">
                                        <img src="{{ Vite::asset('public/storage/' . $user->image) }}"
                                            class="card-img-top" alt="..." style="width: 250px; height: 250px;">
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-2 mb-2">
                                <input type="file" name="image" class="form-control" value="{{ $user->image }}">
                            </div>
                            @error('image')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-control">
                                <option selected disabled>{{ $user->role }}</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('roles')
                            <p class="mt-2">{{ $message }}</p>
                        @enderror
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success w-100">Update User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

</x-base-layout>
