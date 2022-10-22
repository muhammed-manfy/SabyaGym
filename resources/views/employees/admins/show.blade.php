@extends('layouts.app')

@section('content')

    <div class="right_col" role="main" style="background-color:#faf4ff">
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
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Supervisor Numberphone</div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
