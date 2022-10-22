@extends('layouts.front.app')
@section('extends')
	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Contact us</h2>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->

    <!-- Contact Section -->
	<section class="classes-section spad">
		<div class="container">
			<div class="row">
                <div class="col-lg-4">
					<div class="con-info">
						<h3>Visit the Sabaya.Fitness</h3>
						<ul>
							<li><i class="fa fa-map-marker"></i>The Main Dablan Street</li>
						</ul>
					</div>
                </div>

                <div class="col-lg-4">
					<div class="con-info">
						<h3>Message Us</h3>
						<ul>
							<li><i class="fa fa-phone"></i>(963) 964 827 090</li>
							<li><i class="fa fa-envelope-o"></i>Sabaya.Fitness@gmail.com</li>
						</ul>
                        <br>
                        <div class="contact-social" >
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
					</div>
                </div>

                <div class="col-lg-4">
					<div class="con-info">
						<h3>Opening Hours</h3>
						<ul>
							<li><i class="fa fa-toggle-on"></i>8:00 to 21:00</li>
						</ul>
					</div>
                </div>
				</div>
				{{-- <div class="col-lg-8">
					<form class="singup-form contact-form">
						<div class="row">
							<div class="col-md-6">
								<input type="text" placeholder="First Name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Last Name">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Your Email">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone Number">
							</div>
							<div class="col-md-12">
								<textarea placeholder="Message"></textarea>
								<a href="#" class="site-btn sb-gradient">Send message</a>
							</div>
						</div>
					</form>
				</div> --}}

		</div>
	</section>
	<!-- Trainers Section end -->

	<!-- Gallery Section -->
	<div class="gallery-section">
		<div class="gallery-slider owl-carousel">
			<div class="gs-item">
				<img src="img/gallery/1.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-instagram"></i>
					<p>Sabaya.Fitness</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="img/gallery/2.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-instagram"></i>
					<p>Sabaya.Fitness</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="img/gallery/3.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-instagram"></i>
					<p>Sabaya.Fitness</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="img/gallery/4.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-instagram"></i>
					<p>Sabaya.Fitness</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="img/gallery/5.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-instagram"></i>
					<p>Sabaya.Fitness</p>
				</div>
			</div>
			<div class="gs-item">
				<img src="img/gallery/6.jpg" alt="">
				<div class="gs-hover">
					<i class="fa fa-instagram"></i>
					<p>Sabaya.Fitness</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Gallery Section end -->

@endsection
