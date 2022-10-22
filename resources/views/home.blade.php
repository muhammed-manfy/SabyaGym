@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">
        <div class="x_title"
            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
            Welcome in Dashboard
        </div>
        <div class="row  justify-content-center">
            {{-- Content --}}
            <div class="col-md-9">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Control All Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <strong>{{ Auth::user()->name }}</strong>, you can control your GYM website from here
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
