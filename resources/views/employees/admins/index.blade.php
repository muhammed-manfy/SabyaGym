@extends('layouts.app')

@section('content')
    @if ($admins->count() > 0)
        {{-- @if (session()->has('key'))
            {{ session()->get('key') }}
        @endif --}}
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                Supervisors </div>
            <br />
            {{-- color page --}}
            <div class="row  justify-content-center">
                {{-- Content --}}
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Supervisor Info<small>Data </small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        {{-- x_content --}}
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Birthday</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Salary</th>
                                                    <th scope="col">Certificate</th>
                                                    <th scope="col">User Name </th>
                                                    <th scope="col">Show </th>
                                                    <th scope="col">Edit </th>
                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $admin)
                                                    <tr>
                                                        <th scope="row">{{ $admin->id }}</th>
                                                        <td>
                                                            <img src="{{ $admin->image }}" alt="{{ $admin->full_name }}"
                                                                class="img-thumbnail" height="50px" width="50px">
                                                        </td>
                                                        <td>{{ $admin->full_name }}</td>
                                                        <td>{{ $admin->birthday }}</td>
                                                        <td>{{ $admin->phone }}</td>
                                                        <td>{{ $admin->salary }}</td>
                                                        <td>{{ $admin->certificate }}</td>
                                                        @foreach ($users as $user)
                                                            @if ($user->id == $admin->user_id)
                                                                <td>{{ $user->name }}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('admin.show', ['id' => $admin->id]) }}"><i
                                                                    class="fa fa-eye"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('admin.edit', ['id' => $admin->id]) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('admin.delete', ['id' => $admin->id]) }}"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            {{-- BUTTONS --}}
                            <div class="row justify-content-center">
                                <div>
                                    <a class="btn btn-dark" href="{{ route('admin.create') }}" role="button"><i
                                            class="fa fa-plus"></i> Supervisor
                                        Add</a>
                                </div>
                                <div>
                                    <a class="btn btn-dark" href="{{ route('admin.trashed') }}" role="button"><i
                                            class="fa fa-trash"></i> Deleted
                                        Supervisor</a>
                                </div>
                            </div>
                            {{-- End BUTTONS --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>




    @else
        {{-- NO SIPERVISOR --}}
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                No Supervisor
            </div>

            <div class="row justify-content-center">
                <div>
                    <a class="btn btn-dark" href="{{ route('admin.create') }}" role="button"><i class="fa fa-plus"></i>
                        Supervisor
                        Add</a>
                </div>
                <div>
                    <a class="btn btn-dark" href="{{ route('admin.trashed') }}" role="button"><i class="fa fa-trash"></i>
                        Deleted
                        Supervisors</a>
                </div>
            </div>
        </div>
    @endif

@endsection
@section('datatables')

    <link href="{{ asset('gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
        rel="stylesheet">

@endsection
