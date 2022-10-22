@extends('layouts.app')

@section('content')


    @if ($cleaners->count() > 0)
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                Workers </div>
            <br />
            {{-- color page --}}
            <div class="row  justify-content-center">
                {{-- Content --}}
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Worker Deleted Info<small>Data </small></h2>
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
                                                    <th scope="col">Admin Name</th>
                                                    <th scope="col">User Name</th>
                                                    <th scope="col">Show </th>
                                                    <th scope="col">Restore </th>
                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cleaners as $cleaner)
                                                    <tr>
                                                        <th scope="row">{{ $cleaner->id }}</th>
                                                        <td>
                                                            <img src="{{ $cleaner->image }}"
                                                                alt="{{ $cleaner->full_name }}" class="img-thumbnail"
                                                                height="50px" width="50px">
                                                        </td>
                                                        <td>{{ $cleaner->full_name }}</td>
                                                        <td>{{ $cleaner->birthday }}</td>
                                                        <td>{{ $cleaner->phone }}</td>
                                                        <td>{{ $cleaner->salary }}</td>
                                                        @foreach ($admins as $admin)
                                                            @if ($admin->id == $cleaner->admin_id)
                                                                <td>{{ $admin->full_name }}</td>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($users as $user)
                                                            @if ($user->id == $cleaner->user_id)
                                                                <td>{{ $user->name }}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('course.show', ['id' => $course->id]) }}"><i
                                                                    class="fa fa-eye"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('cleaner.restore', ['id' => $cleaner->id]) }}"><i
                                                                    class="fa fa-recycle"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('cleaner.hdelete', ['id' => $cleaner->id]) }}"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="right_col" role="main" style="background-color:#faf4ff">

                        <div class="x_title"
                            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                            No Deleted Workers </div>

                    </div>
    @endif



@endsection
