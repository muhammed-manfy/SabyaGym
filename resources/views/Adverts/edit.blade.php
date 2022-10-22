@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">

        <div class="x_title"
            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">Posts
            Edit </div>
        <br />
        {{-- color page --}}
        <div class="row  justify-content-center">
            {{-- Content --}}
            <div class="col-md-10">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Post Info<small>Data Register </small></h2>
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
                            action=" {{ route('advert.update', ['id' => $advert->id]) }} " method="POST">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label class="control-label col-md-4 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="context">Context of
                                    Post
                                </label>
                                <div class="col-md-8 col-sm-9 ">
                                    <input id="context" type="hidden" name="context" value=" {{ $advert->context }}">
                                    <trix-editor input="context"></trix-editor>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-4 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="title">Title of
                                    Post</label>
                                <div class="col-md-8 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="title" value=" {{ $advert->title }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-4 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="discount_rate">Discount Rate </label>
                                <div class="col-md-8 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="number" class="form-control"
                                        name="discount_rate"  value=" {{ $advert->discount_rate }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-4 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="course_id">Course</label>
                                <div class="col-md-8 col-sm-9 ">
                                    <select style="border-color: black;border-radius:15px" class="form-control"
                                        name="course_id" id="course" required>
                                        @foreach ($courses as $course)
                                            @if ($course->id == $advert->course_id)
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
                                <label class="control-label col-md-4 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="admin_id">Admin</label>
                                <div class="col-md-8 col-sm-9 ">
                                    <select style="border-color: black;border-radius:15px" class="form-control"
                                        name="admin_id" id="admin" required>
                                        @foreach ($admins as $admin)
                                            @if ($admin->id == $advert->admin_id)
                                                <option value="{{ $admin->id }}" selected>{{ $admin->full_name }}
                                                </option>
                                            @else
                                                <option value="{{ $admin->id }}">{{ $admin->full_name }}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-sm-9">
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
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
        integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
        crossorigin="anonymous" />
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
        integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
        crossorigin="anonymous"></script>
@endsection
