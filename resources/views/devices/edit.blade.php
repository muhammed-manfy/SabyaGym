@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">

        <div class="x_title"
            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
            Machines Edit </div>
        <br />
        {{-- color page --}}
        <div class="row  justify-content-center">
            {{-- Content --}}
            <div class="col-md-10">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Machines Info<small>Data Register </small></h2>
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
                        <!--the errors-->
                        <form class="form-horizontal form-label-left"
                            action=" {{ route('device.update', ['id' => $device->id]) }} " method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="type">Type </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="type" value="{{ $device->type }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="course_id">Course Type</label>
                                <div class="col-md-7 col-sm-9 ">
                                    <select style="border-color: black;border-radius:15px" class="form-control"
                                        name="course_id" id="device" required>
                                        @foreach ($courses as $course)
                                            @if ($course->id == $course->course_id)
                                                <option value="{{ $course->id }}" selected>{{ $course->sport_type }}
                                                </option>
                                            @else
                                                <option value="{{ $course->id }}">{{ $course->sport_type }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="num_of_devices">Number Of Devices</label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="num_of_devices" value="{{ $device->num_of_devices }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'">Image </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input type="file" class="form-control-file" name="image">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-5 col-sm-9">
                                    <button type="submit" class="btn btn-dark">Data Edit</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
