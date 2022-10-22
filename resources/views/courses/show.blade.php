@extends('layouts.app')

@section('content')

    <div class="right_col" role="main" style="background-color:#faf4ff">
        <div class="clearfix"></div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-10 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Course Info</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img width="100%" height="100%" style="border-radios:50px"
                                        class="img-responsive avatar-view" src="{{ $course->image }}" alt="Avatar">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('course.edit', ['id' => $course->id]) }}">
                                        <h2>{{ $course->sport_type }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>


                        {{-- Profile Right --}}
                        <div class="col-md-9 col-sm-9  profile_right">
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Subscribe Type</div>
                                <div class="col-md-6 col-sm-6">{{ $course->subscribe_type }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Subscribe Cost</div>
                                <div class="col-md-6 col-sm-6">{{ $course->subscribe_cost }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Published At</div>
                                <div class="col-md-6 col-sm-6">{{ $course->published_at }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Ended At </div>
                                <div class="col-md-6 col-sm-6">{{ $course->ended_at }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('coachs') }}">
                                        Coach Name
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">{{ $course->coach->full_name }}</div>
                            </div>
                            <hr>
                            {{-- Trainees Attend this course --}}
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('coachs') }}">Trainees Attend this course
                                        {{ $course->sport_type }}</a>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="row">
                                        @forelse ($course->trainees as $trainee)
                                            <div class="col">
                                                <a href="{{ route('trainee.edit', ['id' => $trainee->id]) }}">
                                                    {{ $trainee->full_name }}
                                                </a>
                                            </div>
                                        @empty
                                            <div class="col">
                                                No Trainers Exist
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">subscriber conut</div>
                                <div class="col-md-6 col-sm-6">{{ $course->trainees->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
