<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Sabaya.Club</title>
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
    <header class="header-section ">
        {{-- <div class="header-top spad">
			<div class="row m-0">
				<div class="col-lg-12 d-none d-md-block p-0">
					<div class="header-info">
						<i class="fa fa-map-marker"></i>
						 <p>The Main Dablan Street</p>
					</div>
					<div class="header-info">
						<i class="fa fa-phone"></i>
						<p>(963) 964 827 090</p>
					</div>
                    <div class="header-info">
                        <i  class="fa fa-clock-o"></i>
						<p>Mon - Fri:  6:30am - 07:45pm</p>
					</div>
                </div>
            </div>
		</div> --}}
        {{-- header top --}}
        <div class="header-bottom">
            <a class="site-logo">
                <h2 style="color:white;padding-left:25px;">Sabaya.Fitness</h2>
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

    @yield('extends')

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
                                <li><i class="fa fa-map-marker"></i>The Main Dablan Street</li>
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
                        <h2 style="color:white">Sabaya.Fitness</h2>
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
