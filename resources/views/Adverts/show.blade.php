@extends('layouts.app')

@section('content')

    <div class="right_col" role="main" style="background-color:#faf4ff">
        <div class="clearfix"></div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-10 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Post Info</h2>
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
                                        class="img-responsive avatar-view" src="{{ $advert->course->image }}"
                                        alt="Avatar">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('advert.edit', ['id' => $advert->id]) }}">
                                        <h2>{{ $advert->title }}</h2>
                                    </a>
                                </div>
                            </div>
                        </div>


                        {{-- Profile Right --}}
                        <div class="col-md-9 col-sm-9  profile_right">
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Course</div>
                                <div class="col-md-6 col-sm-6">{{ $advert->course->sport_type }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Discount Rate</div>
                                <div class="col-md-6 col-sm-6">{{ $advert->discount_rate }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{ route('admins') }}">
                                        Admin Name
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6">{{ $advert->admin->full_name }}</div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col-md-6 col-sm-6">Context : </div>
                            </div>
                            <br>
                            <div class="row justify-content-left">
                                <div class="col">
                                    <input id="context" type="hidden" name="context" value="{{ $advert->context }}">
                                    <trix-editor input="context"></trix-editor>
                                </div>
                            </div>
                            <br>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
        integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
        crossorigin="anonymous" />
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
        integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
        crossorigin="anonymous"></script>
@endsection
