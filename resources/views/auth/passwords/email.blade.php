@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">

        <div class="x_title"
            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
            {{ __('Reset Password') }} </div>
        <br />
        {{-- color page --}}
        <div class="row  justify-content-center">
            {{-- Content --}}
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Reset Password</h2>
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row justify-content-center">
                                {{-- <label class="control-label col-md-5 col-sm-3 "
                                style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                                <div class="col-md-6">
                                    <input placeholder="eamil address" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0 justify-content-center">
                                <div class="col-5">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
