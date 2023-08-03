<x-app>

    <x-slot:pageTitle>Add Dossier</x-slot>

        <div class="row mb-4 layout-spacing layout-top-spacing">
            <form method="POST" action="/add-dossier">
                @csrf
                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="widget-content widget-content-area ecommerce-create-section">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="user">User</label>
                                <select name="user" class="form-control">
                                    <option selected disabled>Choose user</option>
                                    <?php $users = \App\Models\User::all(); ?>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user')
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
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-4">
                            <div class="widget-content widget-content-area ecommerce-create-section">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success w-100">Add Dossier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <!--  END CUSTOM SCRIPTS FILE  -->
</x-app>