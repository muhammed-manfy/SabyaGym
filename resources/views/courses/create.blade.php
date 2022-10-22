@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">

        <div class="x_title"
            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">Group
            Create </div>
        <br />
        {{-- color page --}}
        <div class="row  justify-content-center">
            {{-- Content --}}
            <div class="col-md-10">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Group Info<small>Data Register </small></h2>
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

                        @if (count($errors) > 0)
                            <ul class="navbar-nav mr-auto">
                                @foreach ($errors->all() as $error)
                                    <li class="nav-item active">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <form action=" {{ route('course.store') }} " method="POST" enctype="multipart/form-data"
                            class="form-horizontal form-label-left">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="sport_type">Sport
                                    Type </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="sport_type" placeholder="Enter sport_type">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="subscribe_type">Subscribe Type </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="subscribe_type" placeholder="Enter subscribe_type">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="subscribe_cost">Subscribe Cost </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="number" class="form-control"
                                        name="subscribe_cost" placeholder="Enter subscribe_cost">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="published_at">Published At
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="date" class="form-control"
                                        name="published_at" placeholder="Enter Ended At">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="ended_at">Ended At
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="date" class="form-control"
                                        name="ended_at" placeholder="Enter Ended At">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="coach_id">Coach</label>
                                <div class="col-md-7 col-sm-9 ">
                                    <select style="border-color: black;border-radius:15px" class="form-control"
                                        name="coach_id" id="coach_id">
                                        @foreach ($coachs as $coach)
                                            <option value="{{ $coach->id }}">
                                                {{ $coach->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI ">Time Start</label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input type="time" class="form-control" placeholder="Enter time"
                                        style="border-color: black;border-radius:15px" name="time_start">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3"
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI ">Time End</label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input type="time" class="form-control" placeholder="Enter time"
                                        style="border-color: black;border-radius:15px" name="time_end">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="trainees">Subscriber</label>
                                <div class="col-md-7 col-sm-9 ">
                                    <select style="border-color: black;border-radius:15px" class="form-control"
                                        name="trainees[]" id="trainees" multiple>
                                        @foreach ($trainees as $trainee)
                                            <option value="{{ $trainee->id }}">
                                                {{ $trainee->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
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
