@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">

        <div class="x_title"
            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
            Medical Record Edit </div>
        <br />
        {{-- color page --}}
        <div class="row  justify-content-center">
            {{-- Content --}}
            <div class="col-md-10">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Medical Record Info<small>Data </small></h2>
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
                            action=" {{ route('medical.update', ['id' => $medical->id]) }} " method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="hospital_name">hospital_name </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="hospital_name" value="{{ $medical->hospital_name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="previous_operation">previous_operation </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="previous_operation" value="{{ $medical->previous_operation }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="disases">disases
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="disases" value="{{ $medical->disases }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="trainee_id">Subscriber
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <select style="border-color: black;border-radius:15px" class="form-control"
                                        name="trainee_id" id="admin" required>
                                        @foreach ($trainees as $trainee)
                                            @if ($trainee->id == $medical->trainee_id)
                                                <option value="{{ $trainee->id }}" selected>{{ $trainee->full_name }}
                                                </option>
                                            @else
                                                <option value="{{ $trainee->id }}">{{ $trainee->full_name }}</option>
                                            @endif

                                        @endforeach
                                    </select>
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
