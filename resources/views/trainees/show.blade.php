@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">
        <div class="clearfix"></div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-10 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Subscriber Profile</h2>
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
                                        class="img-responsive avatar-view" src="{{ $trainee->image }}" alt="Avatar">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('trainee.edit', ['id' => $trainee->id]) }}">
                                        <h2>{{ $trainee->full_name }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Profile Right --}}
                        <div class="col-md-9 col-sm-9  profile_right">
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Subscriber Number phone</div>
                                <div class="col-md-6 col-sm-6">{{ $trainee->phone }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Subscriber Work Place</div>
                                <div class="col-md-6 col-sm-6">{{ $trainee->work_place }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Subscriber Birthday</div>
                                <div class="col-md-6 col-sm-6">{{ $trainee->birthday }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('users') }}">User Account </a>
                                </div>
                                <div class="col-md-6 col-sm-6">{{ $trainee->user->email }}</div>
                            </div>
                            <br>
                            <hr>
                            {{-- Courses practice by this Subscriber --}}
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('courses') }}">
                                        Courses Managed by {{ $trainee->full_name }}
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="row">
                                        @php
                                            $sum = 0;
                                        @endphp
                                        @forelse ($trainee->courses as $course)
                                            @php
                                                $sum = $sum + $course->subscribe_cost;
                                            @endphp
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
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Sum Subscriber Cost</div>
                                <div class="col-md-6 col-sm-6">
                                    @php
                                        echo $sum;
                                    @endphp
                                </div>
                            </div>

                        </div>
                        {{-- End Profile Right --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
