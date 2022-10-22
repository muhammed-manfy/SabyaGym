@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">
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
                                    <a href="{{ route('cleaner.edit', ['id' => $cleaner->id]) }}">
                                        <h2>Worker {{ $cleaner->full_name }}</h2>
                                    </a>
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
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('admins') }}">
                                        Admin Name
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">{{ $cleaner->admin->full_name }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('users') }}">
                                        User Account
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">{{ $cleaner->user->name }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Worker Profile --}}
@endsection
