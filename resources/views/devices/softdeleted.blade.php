@extends('layouts.app')

@section('content')


    @if ($devices->count() > 0)
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                Machines </div>
            <br />
            {{-- color page --}}
            <div class="row  justify-content-center">
                {{-- Content --}}
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Deleted Machines Info<small>Data </small></h2>
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
                            <br />
                            {{-- form --}}
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Number Of Devices</th>
                                        <th scope="col">Course Type</th>
                                        <th scope="col">Restore </th>
                                        <th scope="col">Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($devices as $device)
                                        <tr>
                                            <th scope="row">{{ $device->id }}</th>
                                            <td>
                                                <!--url(‘storage/’.$device->image)-->
                                                <img src="{{ $device->image }}" alt="{{ $device->num_of_devices }}"
                                                    class="img-thumbnail" height="50px" width="50px">
                                            </td>
                                            <td>{{ $device->type }}</td>
                                            <td>{{ $device->num_of_devices }}</td>
                                            @foreach ($courses as $course)
                                                @if ($course->id == $device->course_id)
                                                    <td>{{ $course->sport_type }}</td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <a class="" href="{{ route('device.restore', ['id' => $device->id]) }}"><i
                                                        class="fa fa-recycle"></i></a>
                                            </td>
                                            <td>
                                                <a class="" href="{{ route('device.hdelete', ['id' => $device->id]) }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="right_col" role="main" style="background-color:#faf4ff">
                                        <div class="x_title"
                                            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                                            No Deleted Machines </div>
                                    </div>
    @endif

    </tbody>
    </table>

@endsection
