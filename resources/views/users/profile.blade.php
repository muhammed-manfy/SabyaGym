@extends('layouts.app')

@section('content')

    <div class="right_col" role="main" style="background-color:#faf4ff">
        <div class="clearfix"></div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-10 ">
                <div class="x_panel">
                    <div class="x_title">
                        {{-- Subscriber/Trainee profile --}}
                        @if (isset($trainee))
                            <div class="x_title"
                                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                                Profile</div>
                            <br />
                            {{-- color page --}}
                            <div class="row  justify-content-center">
                                {{-- Content --}}
                                <div class="col-md-9">
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
                                                            class="img-responsive avatar-view" src="{{ $trainee->image }}"
                                                            alt="Avatar">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2>{{ $trainee->full_name }}</h2>
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
    {{-- End Subscriber Profile --}}

    {{-- Trainer Profile --}}
@elseif(isset($coach))
    <div class="x_title"
        style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
        Profile</div>
    <br />
    {{-- color page --}}
    <div class="row  justify-content-center">
        {{-- Content --}}
        <div class="col-md-9">
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
                                Courses Managed by {{ $coach->full_name }}
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
    </body>

    </html>
    {{-- End Trainer Profile --}}

    {{-- Worker Profile --}}
@elseif(isset($cleaner))
    <div class="x_title"
        style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
        Profile</div>
    <br />
    {{-- color page --}}
    <div class="row  justify-content-center">
        {{-- Content --}}
        <div class="col-md-9">
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
    </body>

    </html>
@else


    <div class="x_title"
        style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
        Profile</div>
    <br />
    {{-- color page --}}
    <div class="row  justify-content-center">
        {{-- Content --}}
        <div class="col-md-9">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profile Not Found</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    please visit our {{ $setttings->site_name }} to attend course in
                    {{ $setttings->address }},<br>or call
                    us on
                    {{ $setttings->phone_number }}
                </div>
            </div>
        </div>
    </div>


    </div>

    </body>

    </html>
    @endif
    {{-- End Worker Profile --}}
@endsection
