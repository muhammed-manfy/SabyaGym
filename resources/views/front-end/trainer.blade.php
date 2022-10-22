@extends('layouts.front.app')
@section('extends')
    <!-- Page top Section -->
    <section class="page-top-section set-bg spad" data-setbg="img/12.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto text-white">
                    <h2>Our Trainers</h2>
                    <h3>
                        <p>You have best body with our Trainers </p>
                    </h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Page top Section end -->

    <!-- Events Section -->
    <section class="events-page-section spad">
        <div class="container">
            <div class="row">
                @foreach ($coachs as $coach)
                    <div class="col-lg-6">
                        <div class="event-item">
                            <div class="ei-img">
                                <img width="100%" height="100%" src="{{ $coach->image }}" alt="{{ $coach->full_name }}">
                            </div>
                            <div class="ei-text">
                                <h4>{{ $coach->full_name }}</h4>
                                <ul>
                                    <li>Trainer type</li>
                                </ul>
                                <p>
                                    @foreach ($coach->courses as $course)
                                        <li>{{ $course->sport_type }}</li>
                                    @endforeach
                                </p>
                                <div class="contact-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Events Section end -->
@endsection
