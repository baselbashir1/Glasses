<x-base-layout>

    <x-slot:pageTitle>Add User</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/add-user" enctype="multipart/form-data">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="brand">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="User Name">
                            </div>
                            @error('name')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                            </div>
                            @error('phone')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address">
                            </div>
                            @error('email')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password">
                            </div>
                            @error('password')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            @error('image')
                                <p class="mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success w-100">Add User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
