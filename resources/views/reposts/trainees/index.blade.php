@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">

        <div class="page-title">
            <div class="row  justify-content-end">
                <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right top_search">
                    <form action="{{ route('reports.trainees') }}" method="GET" class="input-group">
                        <input placeholder="Search For Subscriber" name="search" type="text" class="form-control"
                            value="{{ request()->query('search') }}">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Search</button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        {{-- THE RESULT OF SEARCH --}}
        @if (isset($trainee))
            <div class="row justify-content-center">
                <div class="col-md-10 col-sm-10 ">
                    <div class="x_panel">
                        <div class="x_title">
                            {{-- Subscriber/Trainee profile --}}
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
                                    <div class="col-md-6 col-sm-6">User Account </div>
                                    <div class="col-md-6 col-sm-6">{{ $trainee->user->email }}</div>
                                </div>
                                <br>
                                <hr>
                                {{-- Courses practice by this Subscriber --}}
                                <div class="row justify-content-left">
                                    <div class="col-md-6 col-sm-6">
                                        Courses Managed by {{ $trainee->full_name }}
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
                                                    <a href="{{ route('course.edit', ['id' => $course->id]) }}">
                                                        {{ $course->sport_type }}
                                                    </a>
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
@elseif(request()->query('search')!=null)
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-10 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Trainee Profile</h2>
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
                    No Result For {{ request()->query('search') }}
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif

@endsection
