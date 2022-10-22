<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>{{ $setting->site_name }}</title>
    <meta charset="UTF-8">
    {{-- <meta name="description" content="Ahana Yoga HTML Template"> --}}
    {{-- <meta name="keywords" content="yoga, html"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/slicknav.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />


    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>

<body>

    <!-- Header Section -->
    <header class="header-section">
        {{-- <div class="header-top spad">
			<div class="row m-0">
				<div class="col-lg-12 d-none d-md-block p-0">
					<div class="header-info">
						<i class="fa fa-map-marker"></i>
						 <p>{{$setting->address}}</p>
					</div>
					<div class="header-info">
						<i class="fa fa-phone"></i>
						<p>{{$setting->phone_number}}</p>
					</div>
                    <div class="header-info">
                        <i  class="fa fa-clock-o"></i>
						<p>{{$setting->open_days}}</p>
					</div>
                </div>
            </div>
		</div> --}}
        {{-- header top --}}
        <div class="header-bottom">
            <a class="site-logo">
                <h2>{{ $setting->site_name }}</h2>
            </a>
            <div class="hb-right">
                @auth
                    <div class="hb-switch">
                        <div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out pull-right"></i>
                                Log
                                Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <div class="hb-switch">
                        <a href="{{ route('login') }}">Members Join</a>
                        <img src="img/avatar.jpg">
                    </div>
                @endauth
            </div>
            <div class="container">
                <ul class="main-menu">
                    <li><a href="{{ route('front-index') }}">Home</a></li>
                    <li><a href="{{ route('user.profile') }}">Profile</a></li>
                    <li><a href="{{ route('front-classes') }}">Classes</a></li>
                    <li><a href="{{ route('front-trainer') }}">trainers</a></li>
                    <li><a href="{{ route('front-contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
        {{-- header buttom --}}
    </header>
    <!-- Header Section end -->

    <section class="classes-section spad1">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="i carousel-item active">
                    <img src="img/3.jpg" alt="First slide">
                    <div class="ii">
                        <h2>Start with us</h2>
                    </div>
                </div>
                <div class="i carousel-item">
                    <img src="img/2.jpg" alt="Second Slide" />
                    <div class="ii">
                        <h2>Start with us</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    @if ($adverts->count() <= 8)
        @if ($adverts->count() > 0) <!-- Pricing Section -->
        <section class="pricing-section" style="margin-top: 0px">
        <div class="container">
        <div class="pricing section-title text-center">
        <h2>#Recent Posts</h2>
        <h3><p style="font-size: large;font-family:serif">Subscribe Now in Our Club Sabaya.Fitness
        with Our offers</p></h3>
        </div>
        <div class="row justify-content-center">
        @foreach ($adverts as $adv)
            <div class="col-lg-3 col-sm-6">
            <div class="pricing-item begginer">
            <div class="pi-top">
            <h4>{{ $adv->title }}</h4>
            </div>
            <div class="pi-price">
            <h3>${{ $adv->price }}</h3>
            <p>{{ $adv->subscribe_type }}</p>
            </div>
            <p style="text-align: center;font-family: 'Times New
            Roman'">{{ $adv->context }}</p>
            </div>
            </div> @endforeach
            </div>
            </section>
        @endif
    @endif
    {{-- Pricing Section --}}

    <!-- Classes Section -->
    <section class="classes-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h2>Our Gym is Your Gym</h2>
                <h3>
                    <p style="font-size: large;font-family:serif">Practice gym to perfect physical beauty</p>
                </h3>
            </div>
            <div class="classes-slider owl-carousel">
                <div class="classes-item">
                    <div class="ci-img">
                        <img src="img/group.jpg" alt="">
                    </div>
                    <div class="ci-text">
                        <h4>GROUP FITNESS CLASSES</h4>
                    </div>
                    <div class="ci-bottom">
                        <div class="author-text">
                            <summary style="text-align: center;margin:3px;font-weight: 600;font-family:serif">Energy For
                                EveryOne</summary>
                        </div>
                    </div>
                </div>

                <div class="classes-item">
                    <div class="ci-img">
                        <img src="img/clean.jpg" alt="">
                    </div>
                    <div class="ci-text">
                        <h4>SPARKLING && CLEAN</h4>
                    </div>
                    <div class="ci-bottom">
                        <div class="author-text">
                            <summary style="text-align: center;margin: 3px;font-weight: 600;font-family:serif">Don't
                                Worry for Cleanning and Safty</summary>
                        </div>
                    </div>
                </div>
                <div class="classes-item">
                    <div class="ci-img">
                        <img src="img/weights-2.jpg" alt="">
                    </div>
                    <div class="ci-text">
                        <h4>OUR WEIGHTS</h4>
                    </div>
                    <div class="ci-bottom">
                        <div class="author-text">
                            <summary style="text-align: center;margin: 3px;font-weight: 600;font-family:serif">Our
                                weights help you build your body</summary>
                        </div>
                    </div>
                </div>
                <div class="classes-item">
                    <div class="ci-img">
                        <img src="img/8.jpg" alt="">
                    </div>
                    <div class="ci-text">
                        <h4>FEMALES OF CARDIO</h4>
                    </div>
                    <div class="ci-bottom">
                        <div class="author-text">
                            <summary style="text-align: center;font-weight: 600;margin: 3px;font-family:serif">Stay fit
                                with a cardio exercise</summary>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Classes Section end -->

    <!-- About Section -->
    <section class="classes-section spad1">
        <div class="container">
            <div class="section-title text-center">
                <h2>#Health - #Fitness</h2>
                <h3>
                    <p style="font-size: large;font-family:serif">Take care of your health with us and take care of a
                        healthy beauty</p>
                </h3>
            </div>
            <div class="row">
                {{-- col --}}
                <div class="col-lg-6 spad1">
                    <img src="img/fitness-girl-preparing-healthy-smoothie-picjumbo-com.jpg" />
                </div>
                {{-- col --}}
                <div class="col-lg-6 spad1" style="background-color: rgb(248, 250, 255)">
                    <div class="ai-text">
                        <h2 style="text-align: center;margin-top: 50px">Easy Recipes from SabayaClub</h2>
                        <h3>
                            <p style="text-align: center;margin:70px;font-size: large">Food is fuel, and what you reach
                                for before and after exercise can make or break your workout success. Power up and
                                maximize performance with these 10 fitness foods.</p>
                        </h3>
                    </div>
                </div>
                {{-- row --}}
            </div>

            <div class="row">
                {{-- col --}}
                <div class="col-lg-6 spad1" style="background-color: rgb(248, 250, 255)">
                    <div class="ai-text">
                        <h2 style="text-align: center;margin-top: 50px">Live Healthy and Happy</h2>
                        <h3>
                            <p style="text-align: center;margin:70px;font-size: large">There are many reasons to be a
                                morning person. waking up early can motivate you to start some healthy lifestyle
                                practices like – yoga, meditation or a short morning workout at home..</p>
                        </h3>
                    </div>
                </div>
                {{-- col --}}
                <div class="col-lg-6 spad1">
                    <img src="img/15.jpg" />
                </div>
                {{-- row --}}
            </div>
            <div class="row">
                {{-- col --}}
                <div class="col-lg-6 spad1">
                    <img src="img/cleanworker.jpg" />
                </div>
                {{-- col --}}
                <div class="col-lg-6 spad1" style="background-color: rgb(248, 250, 255)">
                    <div class="ai-text">
                        <h2 style="text-align: center;margin-top: 50px">New Safety Measures</h2>
                        <h3>
                            <p style="text-align: center;margin: 70px;font-size: large">Gym Safety to Protect Your
                                Members from COVID-19, Regular Thorough Cleaning and Social Distancing and Disinfect
                                Equipment Between Each Use.</p>
                        </h3>
                    </div>
                </div>
                {{-- row --}}
            </div>

            <div class="row">
                {{-- col --}}
                <div class="col-lg-6 spad1" style="background-color: rgb(248, 250, 255)">
                    <div class="ai-text">
                        <h2 style="text-align: center;margin-top: 50px">The Fun</h2>
                        <h3>
                            <p style="text-align: center;margin: 70px;font-size:large">We know serious fitness is hard,
                                but that doesn’t mean it can’t be an edge-of-your-seat, can’t-get-enough,
                                look-forward-to-your-workouts party.</p>
                        </h3>
                    </div>
                </div>
                {{-- col --}}
                <div class="col-lg-6 spad1">
                    <img src="img/morning-2558818_1920.jpg" />
                </div>
                {{-- row --}}
            </div>

        </div>
        </div>
    </section>
    <!-- About Section end -->



    <!-- Review Section -->
    <section class="classes-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h2>#Our Exercises</h2>
                <h3>
                    <p style="font-size: large;font-family:serif">Believe in the power of a motivating group fitness
                        community!</p>
                </h3>
            </div>
            <div class="insta-imgs">
                <div class="row">
                    <div class="insta-item">
                        <div class="insta-img">
                            <img src="img/classes-1.jpg" alt="">
                            <div class="insta-hover">
                                <i class="fa fa-instagram"></i>
                                <p style="font-size: 25px;font-family: 'Times New Roman'">Sabaya.Fitness</p>
                            </div>
                        </div>
                    </div>

                    <div class="insta-item">
                        <div class="insta-img">
                            <img src="img/gallery-2.jpg" alt="">
                            <div class="insta-hover">
                                <i class="fa fa-instagram"></i>
                                <p style="font-size: 25px;font-family: 'Times New Roman'">Sabaya.Fitness</p>
                            </div>
                        </div>
                    </div>

                    <div class="insta-item">
                        <div class="insta-img">
                            <img src="img/16.jpg" alt="">
                            <div class="insta-hover">
                                <i class="fa fa-instagram"></i>
                                <p style="font-size: 25px;font-family: 'Times New Roman'">Sabaya.Fitness</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="insta-item">
                        <div class="insta-img">
                            <img src="img/11.jpg" alt="">
                            <div class="insta-hover">
                                <i class="fa fa-instagram"></i>
                                <p style="font-size: 25px;font-family: 'Times New Roman'">Sabaya.Fitness</p>
                            </div>
                        </div>
                    </div>

                    <div class="insta-item">
                        <div class="insta-img">
                            <img src="img/1.jpg" alt="">
                            <div class="insta-hover">
                                <i class="fa fa-instagram"></i>
                                <p style="font-size: 25px;font-family: 'Times New Roman'">Sabaya.Fitness</p>
                            </div>
                        </div>
                    </div>

                    <div class="insta-item">
                        <div class="insta-img">
                            <img src="img/6.jpg" alt="">

                            <div class="insta-hover">
                                <i class="fa fa-instagram"></i>
                                <p style="font-size: 25px;font-family: 'Times New Roman'">Sabaya.Fitness</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Review Section end -->


    <!-- Footer Section -->
    <footer class="footer-section spad">
        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <div class="about-widget">
                            <h2 class="fw-title">Contact Us</h2>
                            <ul>
                                <li><i class="fa fa-phone"></i>(963) 964 827 090</li>
                                <li><i class="fa fa-envelope-o"></i>Sabaya.Fitness@gmail.com</li>
                                <li><i class="fa fa-map-marker"></i>Syria - Homs</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="footer-widget">
                        <div class="about-widget">
                            <h2 class="fw-title">About Us</h2>
                            <ul>
                                <li><a href="{{ route('front-contact') }}">Own a Sabaya.Fitness</a></li>
                                <li><a href="{{ route('front-succsesstories') }}">Success Stories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer-widget spad1">
                        <h2 style="color:white">{{ $setting->site_name }}</h2>
                        <h2 class="fw-title" style="margin-left: 50px;color:white">follow us</h2>
                        <div class="contact-social" style="margin-left:20px;margin-bottom:2px">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section end -->
    <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('front/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>

</body>

</html>
