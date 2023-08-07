<x-base-layout>

    <x-slot:pageTitle>Roles</x-slot>

        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-right">
                                    @can('dossieeers')
                                        <a class="btn btn-primary btn-sm" href="/role/add">Add Role</a>
                                    @endcan
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mg-b-0 text-md-nowrap table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                {{-- @can('عرض صلاحية') --}}
                                                <a class="btn btn-success btn-sm" href="">عرض</a>
                                                {{-- @endcan --}}
                                                {{-- @can('تعديل صلاحية') --}}
                                                <a class="btn btn-primary btn-sm" href="">تعديل</a>
                                                {{-- @endcan --}}
                                                {{-- @if ($role->name !== 'owner') --}}
                                                {{-- @can('حذف صلاحية') --}}

                                                <button type="submit">DELETE</button>
                                                {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                                                    {!! Form::close() !!} --}}
                                                {{-- @endcan --}}
                                                {{-- @endif --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>


</x-base-layout>
