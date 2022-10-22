@extends('layouts.front.app')
@section('extends')
    <!-- Page top Section -->
    <section class="page-top-section set-bg" data-setbg="img/bg_3.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto text-white">
                    <h2>Our Classes</h2>
                    <h3>
                        <p>Practice gym to perfect physical beauty and partice the fun with classes in Our club</p>
                    </h3>
                    <h3>Excited for every one</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Page top Section end -->

    <!-- Classes Section -->
    <section class="classes-section spad ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        @foreach ($courses as $course)
                            <div class="col-lg-4">
                                <div class="classes-item-warp">
                                    <div class="classes-item">
                                        <div class="ci-img">
                                            <img src="img/depositphotos_39368897-stock-photo-belly-dancing.jpg" alt="">
                                        </div>
                                        <div class="ci-text">
                                            <h4>{{ $course->sport_type }}</h4>
                                            <div class="ci-metas">
                                                <div class="ci-meta"><i
                                                        class="fa fa-toggle-on"></i>{{ $course->time_start }} -
                                                    {{ $course->time_end }}</div>
                                                <div class="ci-meta"><i
                                                        class="fa fa-clock-o"></i>{{ $course->time_start }} -
                                                    {{ $course->time_end }}</div>
                                            </div>
                                        </div>
                                        <div class="ci-bottom">
                                            <div class="ci-author">
                                                <img src="{{ $course->coach->image }}" alt="">
                                                <div class="author-text">
                                                    <h6>{{ $course->coach->full_name }}</h6>
                                                    <p>{{ $course->sport_type }}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Classes Section end -->
@endsection
