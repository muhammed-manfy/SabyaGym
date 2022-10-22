@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">
        <div class="clearfix"></div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-10 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Trainer Profile</h2>
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
                        {{-- Profile Left --}}
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img width="100%" height="100%" class="img-responsive avatar-view"
                                        src="{{ $coach->image }}" alt="Avatar">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('coach.edit', ['id' => $coach->id]) }}">
                                        <h2>{{ $coach->full_name }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Profile Right --}}
                        <div class="col-md-9 col-sm-9  profile_right">
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Trainer Hours Work</div>
                                <div class="col-md-6 col-sm-6">{{ $coach->hours_work }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Trainer Hour Cost</div>
                                <div class="col-md-6 col-sm-6">{{ $coach->hours_cost }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Trainer Salary</div>
                                <div class="col-md-6 col-sm-6">{{ $coach->salary }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Trainer Birthday</div>
                                <div class="col-md-6 col-sm-6">{{ $coach->birthday }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Trainer Number phone</div>
                                <div class="col-md-6 col-sm-6">{{ $coach->phone }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('users') }}">
                                        User Account
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">{{ $coach->user->email }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('admins') }}">
                                        Trainer Managed By
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">{{ $coach->admin->full_name }}</div>
                            </div>
                            <hr>
                            {{-- Courses managed by this Trainer --}}
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('courses') }}">
                                        Courses Managed by {{ $coach->full_name }}
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="row">
                                        @forelse ($coach->courses as $course)
                                            <div class="col">
                                                {{ $course->sport_type }}
                                            </div>
                                            <div class="col">
                                                {{ $course->time_start }}
                                            </div>
                                            <div class="col">
                                                {{ $course->time_end }}
                                            </div>
                                        @empty
                                            <div class="col">
                                                No Courses Exist
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Trainer Profile --}}

@endsection
