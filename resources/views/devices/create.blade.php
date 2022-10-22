@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">

        <div class="x_title"
            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
            Machines Create </div>
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
                        @if (count($errors) > 0)
                            <ul class="navbar-nav mr-auto">
                                @foreach ($errors->all() as $error)
                                    <li class="nav-item active">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif



                        <form class="form-horizontal form-label-left" action=" {{ route('device.store') }} " method="POST"
                            enctype="multipart/form-data">
                            <!--enctype="multipart/form-data for image -->
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="type" class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'">Type </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="type" placeholder="Enter type">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="course_id" class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'">Course</label>
                                <div class="col-md-7 col-sm-9 ">
                                    <select style="border-color: black;border-radius:15px" class="form-control"
                                        name="course_id" id="course_id">
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->sport_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="num_of_devices" class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'">Number Of Devices
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="number" class="form-control"
                                        name="num_of_devices" placeholder="Enter Number Of Devices">
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
                                    <button type="submit" class="btn btn-dark">Data Save</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
