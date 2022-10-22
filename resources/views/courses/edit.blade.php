@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">

        <div class="x_title"
            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">Group
            Edit </div>
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

                        <form class="form-horizontal form-label-left"
                            action=" {{ route('course.update', ['id' => $course->id]) }} " method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="sport_type">sport_type </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="sport_type" value="{{ $course->sport_type }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="subscribe_type">subscribe_type </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="subscribe_type" value="{{ $course->subscribe_type }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="subscribe_cost">subscribe_cost </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="number" class="form-control"
                                        name="subscribe_cost" value="{{ $course->subscribe_cost }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="published_at">Published At
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="date" class="form-control"
                                        name="published_at" value="{{ $course->published_at }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="ended_at">Ended At
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="date" class="form-control"
                                        name="ended_at" value="{{ $course->ended_at }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="time_start">Time
                                    Start </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="time" class="form-control"
                                        name="time_start" value="{{ $course->time_start }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="time_end">Time
                                    End </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="time" class="form-control"
                                        name="time_end" value="{{ $course->time_end }}">
                                </div>
                            </div>

                            {{-- <label for="trainee_id">Edit Trainees To Course</label><br>
                            <div class="form-check">
                                @foreach ($trainees as $trainee)
                                    <label class="form-check-label" for="trainee_id">
                                        <input class="form-check-input" name="trainees[]" type="checkbox"
                                            value="{{ $trainee->id }}" id="trainee_id" @foreach ($courses->trainees as $train) 
                                            @if ($trainee->id == $train->id)
                                        checked @endif
                                @endforeach
                                > {{ $trainee->full_name }}</label><br>
                                @endforeach
                            </div> --}}

                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-3 "
                            style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="coach_id">Coach</label>
                        <div class="col-md-7 col-sm-9 ">
                            <select style="border-color: black;border-radius:15px" class="form-control" name="coach_id"
                                id="coach_id" required>
                                @foreach ($coachs as $coach)
                                    @if ($coach->id == $course->coach_id)
                                        <option value="{{ $coach->id }}" selected>
                                            {{ $coach->full_name }}
                                        </option>
                                    @else
                                        <option value="{{ $coach->id }}">{{ $coach->full_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-5 col-sm-3 "
                            style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="trainees">Subscriber</label>
                        <div class="col-md-7 col-sm-9 ">
                            <select style="border-color: black;border-radius:15px" class="form-control" name="trainees[]"
                                id="trainees" multiple>
                                @foreach ($trainees as $trainee)
                                    <option value="{{ $trainee->id }}" @if (isset($course))  @if ($course->hasTrainee($trainee->id))
                                        selected @endif
                                @endif
                                >
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
