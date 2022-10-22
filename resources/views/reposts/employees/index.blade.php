@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">
        <div class="page-title">
            <div class="row  justify-content-end">
                <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right top_search">
                    <form action="{{ route('reports.employees') }}" method="GET" class="input-group">
                        <input placeholder="Search For Employee" name="search" type="text" class="form-control"
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

        {{-- Admin Profile --}}
        @if (isset($admin))
            <div class="clearfix"></div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-sm-10 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Supervisor Profile</h2>
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
                                            class="img-responsive avatar-view" src="{{ $admin->image }}" alt="Avatar">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.edit', ['id' => $admin->id]) }}">
                                            <h2>{{ $admin->full_name }}</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- Profile Right --}}
                            <div class="col-md-9 col-sm-9  profile_right">
                                <div class="row justify-content-left">
                                    <div class="col-md-6 col-sm-6">Supervisor Salary</div>
                                    <div class="col-md-6 col-sm-6">{{ $admin->salary }}</div>
                                </div>
                                <br>
                                <div class="row justify-content-left">
                                    <div class="col-md-6 col-sm-6">Supervisor Birthday</div>
                                    <div class="col-md-6 col-sm-6">{{ $admin->birthday }}</div>
                                </div>
                                <br>
                                {{-- <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Supervisor Age</div>
                                <div class="col-md-6 col-sm-6">{{ $admin->getAge() }}</div>
                            </div>
                            <br> --}}
                                <div class="row justify-content-left">
                                    <div class="col-md-6 col-sm-6">Supervisor Number phone</div>
                                    <div class="col-md-6 col-sm-6">{{ $admin->phone }}</div>
                                </div>
                                <br>
                                <div class="row justify-content-left">
                                    <div class="col-md-6 col-sm-6">User Account </div>
                                    <div class="col-md-6 col-sm-6">{{ $admin->user->email }}</div>
                                </div>
                                <hr>
                                {{-- Employees managed by this supervisor --}}
                                <div class="row justify-content-left">
                                    <div class="col-md-6 col-sm-6">
                                        <a href="{{ route('coachs') }}">Trainers Managed by {{ $admin->full_name }}</a>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            @forelse ($admin->coachs as $coach)
                                                <div class="col">
                                                    <a href="{{ route('coach.edit', ['id' => $coach->id]) }}">
                                                        {{ $coach->full_name }}
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
        <div class="col-md-6 col-sm-6">
            <a href="{{ route('cleaners') }}">Workers Managed by
                {{ $admin->full_name }}</a>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                @forelse ($admin->cleaners as $cleaner)
                    <div class="col">
                        <a href="{{ route('cleaner.edit', ['id' => $cleaner->id]) }}">
                            {{ $cleaner->full_name }}
                        </a>
                    </div>
                @empty
                    <div class="col">
                        No Workers Exist
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <hr>
    {{-- Posts post by this supervisor --}}
    <div class="row justify-content-left">
        <div class="col-md-6 col-sm-6">
            <a href="{{ route('adverts') }}">Posts Managed by {{ $admin->full_name }}</a>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                @forelse ($admin->adverts as $advert)
                    <div class="col">
                        <a href="{{ route('advert.edit', ['id' => $advert->id]) }}">
                            {{ $advert->full_name }}
                        </a>
                    </div>
                @empty
                    <div class="col">
                        No Posts Exist
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    </div>
    {{-- End Profile Right --}}
    </div>
    </div>
    </div>
    </div>
    {{-- End Admin Profile --}}
    {{-- Trainer Profile --}}

@elseif(isset($coach))
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
                                <h2>{{ $coach->full_name }}</h2>
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
                            <div class="col-md-6 col-sm-6">User Account </div>
                            <div class="col-md-6 col-sm-6">{{ $coach->user->email }}</div>
                        </div>
                        <br>
                        <div class="row justify-content-left">
                            <div class="col-md-6 col-sm-6">Trainer Managed By </div>
                            <div class="col-md-6 col-sm-6">{{ $coach->admin->full_name }}</div>
                        </div>
                        <hr>
                        {{-- Courses managed by this Trainer --}}
                        <div class="row justify-content-left">
                            <div class="col-md-6 col-sm-6">
                                <a href="{{ route('courses') }}">Courses Managed by {{ $coach->full_name }}</a>
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

    {{-- Worker Profile --}}

@elseif(isset($cleaner))
    <div class="clearfix"></div>
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-10 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Worker Profile</h2>
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
                                <img width="100%" height="100%" class="img-responsive avatar-view"
                                    src="{{ $cleaner->image }}" alt="Avatar">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Worker {{ $cleaner->full_name }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-sm-9  profile_right">
                        <div class="row justify-content-left">
                            <div class="col-md-6 col-sm-6">Worker Salary</div>
                            <div class="col-md-6 col-sm-6">{{ $cleaner->salary }}</div>
                        </div>
                        <br>
                        <div class="row justify-content-left">
                            <div class="col-md-6 col-sm-6">Worker Birthday</div>
                            <div class="col-md-6 col-sm-6">{{ $cleaner->birthday }}</div>
                        </div>
                        <br>
                        <div class="row justify-content-left">
                            <div class="col-md-6 col-sm-6">Worker Numberphone</div>
                            <div class="col-md-6 col-sm-6">{{ $cleaner->phone }}</div>
                        </div>
                        <br>
                        <div class="row justify-content-left">
                            <div class="col-md-6 col-sm-6"> Admin Name</div>
                            <div class="col-md-6 col-sm-6">{{ $cleaner->admin->full_name }}</div>
                        </div>
                        <br>
                        <div class="row justify-content-left">
                            <div class="col-md-6 col-sm-6">User Account </div>
                            <div class="col-md-6 col-sm-6">{{ $cleaner->user->name }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@elseif(request()->query('search')!=null)
    <div class="clearfix"></div>
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-10 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Employee Profile</h2>
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
    {{-- End Worker Profile --}}

@endsection
