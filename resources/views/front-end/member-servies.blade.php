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
							<div class="row justify-content-lg-end">
								<div class="col-lg-3 spad">
										<h3 style="margin: 20px;">Member Servies</h3>
									<p style=" margin-top: 30px;font-family: 'times New Roman';font-size: medium;font-weight: 600">if you have complaints or a message, you can contact with us by enter your information</p>
									<img src="img/pexels-řaj-vaishnaw-791024.jpg" style="width: 222px;border-radius:50%;height: 200px">
								</div>
								<div class="col-lg-9">
									<form class="singup-form contact-form" action="{{route('setting.service.store')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="row">
											<div class="col-md-6">
												<input type="text" placeholder="First Name" name="first_name">
											</div>
											<div class="col-md-6">
												<input type="text" placeholder="Last Name" name="last_name">
											</div>
											<div class="col-md-12">
												<textarea placeholder="Message" name="message"></textarea>
                                                <button class="site-btn sb-gradient" type="submit">Send message</button>
											</div>
										</div>
									</form>
								</div>
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
