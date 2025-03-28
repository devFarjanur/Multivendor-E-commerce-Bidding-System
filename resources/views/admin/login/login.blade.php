<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Site Title -->
		<title>Sherah - HTML eCommerce Dashboard Template</title>

		<!-- Font -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 

		<!-- Fav Icon -->
		<link rel="icon" href="{{ asset('backend/assets/img/favicon.png') }}">
		
		<!-- sherah Stylesheet -->
		<link rel="stylesheet" href="{{ asset('backend/assets/css/core.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome-all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/charts.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/datatables.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/jvector-map.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/slickslider.min.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/jquery-ui.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/reset.css') }}">
		<link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
		
	</head>
	<body id="sherah-dark-light">
		
			<section class="sherah-wc sherah-wc__full sherah-bg-cover" style="background-image: url('{{ asset('backend/assets/img/credential-bg.svg') }}');">
				<div class="container-fluid p-0">
					<div class="row g-0">
						<div class="col-lg-6 col-md-6 col-12 sherah-wc-col-one">
							<div class="sherah-wc__inner" style="background-image: url('{{ asset('backend/assets/img/welcome-bg.png') }}');">
								<!-- Logo -->
								<div class="sherah-wc__logo">
									<a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/assets/img/logo.png') }}" alt="#"></a>
								</div>
								<!-- Middle Image -->
								<div class="sherah-wc__middle">
									<a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/assets/img/welcome-vector.png') }}" alt="#"></a>
								</div>
								<!-- Welcome Heading -->
								<h2 class="sherah-wc__title">Welcome to Sherah eCommerce <br> Admin Panel</h2>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12 sherah-wc-col-two">
							<div class="sherah-wc__form">
								<div class="sherah-wc__form-inner">
									<h3 class="sherah-wc__form-title sherah-wc__form-title__one">Login Your Account <span>Please enter your email and password to continue</span></h3>
									<!-- Sign in Form -->
									<form class="sherah-wc__form-main p-0" action="{{ route('admin.dashboard') }}" method="post">
										<div class="form-group">
											<label class="sherah-wc__form-label">Email Address</label>
											<div class="form-group__input">
												<input class="sherah-wc__form-input" type="email" name="email" placeholder="demo3243@gmail.com" required="required">
											</div>
										</div>
										<!-- Form Group -->
										<div class="form-group">
											<label class="sherah-wc__form-label">Password</label>
											<div class="form-group__input">
												<input class="sherah-wc__form-input" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="password-field" type="password" name="password" placeholder="" maxlength="8" required="required">
											</div>
										</div>
										<!-- Form Group -->
										<div class="form-group">
											<div class="sherah-wc__check-inline">
												<div class="sherah-wc__checkbox">
													<input class="sherah-wc__form-check" id="checkbox" name="checkbox" type="checkbox">
													<label for="checkbox">Remember me later</label>
												</div>
												<div class="sherah-wc__forgot">
													<a href="forgot-password.html" class="forgot-pass">Forget Password?</a>
												</div>
											</div>
										</div>
										<!-- Form Group -->
										<div class="form-group form-mg-top25">
											<div class="sherah-wc__button sherah-wc__button--bottom">
												<button class="ntfmax-wc__btn" type="submit">Login</button>
												<div class="sherah-wc__inside--group">
													<button class="ntfmax-wc__btn ntfmax-wc__btn-social " type="submit"><div class="ntfmax-wc__btn-icon"><i class="fa-brands fa-google"></i></div>Sign In with Google</button>
													<button class="ntfmax-wc__btn ntfmax-wc__btn-social " type="submit"><div class="ntfmax-wc__btn-icon"><i class="fa-brands fa-twitter"></i></div>Sign In with Google</button>
												</div>
												
											</div>
										</div>
										<!-- Form Group -->
										<div class="form-group mg-top-20">
											<div class="sherah-wc__bottom">
												<p class="sherah-wc__text">Dont’t have an account ? <a href="create-account.html">Sign up free</a></p>
											</div>
										</div>
									</form>	
									<!-- End Sign in Form -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
		</div>
		
		<!-- sherah Scripts -->
		<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/jquery-migrate.js') }}"></script>
		<script src="{{ asset('backend/assets/js/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/charts.js') }}"></script>
		<script src="{{ asset('backend/assets/js/final-countdown.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/fancy-box.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/fullcalendar.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/datatables.min.js') }}"></script> 
		<script src="{{ asset('backend/assets/js/circle-progress.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/jquery-jvectormap.js') }}"></script>
		<script src="{{ asset('backend/assets/js/jvector-map.js') }}"></script>
	
        <script src="{{ asset('backend/assets/js/main.js') }}"></script>
		
	</body>
</html>