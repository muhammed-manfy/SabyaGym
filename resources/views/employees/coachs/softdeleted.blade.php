@extends('layouts.app')

@section('content')


    @if ($coachs->count() > 0)
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                Trainers </div>
            <br />
            {{-- color page --}}
            <div class="row  justify-content-center">
                {{-- Content --}}
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Deleted Trainer Info<small>Data </small></h2>
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
                                                    <th scope="col">Hours Work</th>
                                                    <th scope="col">Hours Cost</th>
                                                    <th scope="col">Salary</th>
                                                    <th scope="col">Certificate</th>
                                                    <th scope="col">Admin Name </th>
                                                    <th scope="col">User Name </th>
                                                    <th scope="col">Show </th>
                                                    <th scope="col">Restore </th>
                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($coachs as $coach)
                                                    <tr>
                                                        <th scope="row">{{ $coach->id }}</th>
                                                        <td>
                                                            <img src="{{ $coach->image }}" alt="{{ $coach->full_name }}"
                                                                class="img-thumbnail" height="50px" width="50px">
                                                        </td>
                                                        <td>{{ $coach->full_name }}</td>
                                                        <td>{{ $coach->birthday }}</td>
                                                        <td>{{ $coach->phone }}</td>
                                                        <td>{{ $coach->hours_work }}</td>
                                                        <td>{{ $coach->hours_cost }}</td>
                                                        <td>{{ $coach->salary }}</td>
                                                        <td>{{ $coach->certificate }}</td>
                                                        @foreach ($admins as $admin)
                                                            @if ($admin->id == $coach->admin_id)
                                                                <td>{{ $admin->full_name }}</td>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($users as $user)
                                                            @if ($user->id == $coach->user_id)
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
                                                                href="{{ route('coach.restore', ['id' => $coach->id]) }}"><i
                                                                    class="fa fa-recycle"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('coach.hdelete', ['id' => $coach->id]) }}"><i
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
                            No Deleted Trainer </div>

                    </div>

    @endif


@endsection
