<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $title	 ?></title>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FAV ICON(BROWSER TAB ICON) -->
	<link rel="shortcut icon" href="<?= base_url('assets/images/fav.ico') ?>" type="image/x-icon">
	<!-- GOOGLE FONT -->
	<link href="../../../css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

	<!-- ALL CSS FILES -->
	<link href="<?= base_url('assets/css/materialize.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css?v=' . filemtime(FCPATH . 'assets/css/style.css')); ?>">
	<link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" type="text/css">
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="<?= base_url('assets/css/responsive.css?v=' . filemtime(FCPATH . 'assets/css/style.css')); ?>" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body data-ng-app="">
	<!--MOBILE MENU-->
	<section>
		<div class="mm">
			<div class="mm-inn">
				<div class="mm-logo">
					<a href="main.html"><img src="<?= base_url('assets/images/fav.ico') ?>" alt="">
					</a>
				</div>
				<div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
				</div>
				<div class="mm-menu">
					<div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
					</div>
					<ul>
						<li><a href="main.html">Home - Default</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--TOP SECTION-->
	<section class="main">

		<div class="menu-section-blank">
			<div class="container">
				<div class="row">
					<div class="top-bar">
						<ul>
							<li class="<?= ($this->uri->segment(1) == 'our_hotel') ? 'active' : '' ?>">
								<a href="<?= base_url('our_hotel') ?>">Our Hotels</a>
							</li>
							<li><a href="<?= base_url('about') ?>">About Us</a>
							</li>
							<li><a href="<?= base_url('contact') ?>">Contact Us</a>
							</li>
							<li><a class='dropdown-button' href='#' data-activates='dropdown2'>Language <i class="fa fa-angle-down"></i></a>
							</li>
							<li><a href="#">Toll Free No: 1800 102 7275</a>
							</li>
						</ul>
					</div>
					<div class="all-drop-down">
						<!-- Dropdown Structure -->
						<ul id='dropdown2' class='dropdown-content drop-con-man'>
							<li><a href="#!">English</a>
							</li>
							<li><a href="#!">Spanish</a>
							</li>
							<li><a href="#!">Hindi</a>
							</li>
							<li><a href="#!">Russian</a>
							</li>
							<li><a href="#!">Portuguese</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="logo">
						<a href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo">
						</a>
					</div>
					<div class="menu-bar">
						<ul>
							<li class="<?= ($this->uri->segment(1) == '') ? 'active' : '' ?>">
								<a href="<?= base_url() ?>">Home</a>
							</li>
							<li class="<?= ($this->uri->segment(1) == 'room') ? 'active' : '' ?>">
								<a href="<?= base_url('room') ?>">Room</a>
							</li>
							<li class="<?= ($this->uri->segment(1) == 'services') ? 'active' : '' ?>">
								<a href="<?= base_url('services') ?>">Service</a>
							</li>
							<li class="<?= ($this->uri->segment(1) == 'menu') ? 'active' : '' ?>">
								<a href="<?= base_url('menu') ?>">Menu</a>
							</li>
							<li class="<?= ($this->uri->segment(1) == 'event') ? 'active' : '' ?>">
								<a href="<?= base_url('event') ?>">Event</a>
							</li>
							<li class="<?= ($this->uri->segment(1) == 'amenities') ? 'active' : '' ?>">
								<a href="<?= base_url('amenities') ?>">Amenities</a>
							</li>
							<li><a href="#" class='dropdown-button' data-activates='drop-page'>Pages <i class="fa fa-angle-down"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
		<!--TOP SECTION-->
		<div class="hom-body-section">
			<div class="container">
				<div class="row">
					<div class="home-bod">
						<div class="home-bod-1">
							<h4>Today up to <span>70%</span> offer</h4>
							<h2>Hotel Booking</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, hic! Mollitia eligendi tempore odio, placeat iusto maiores illo aut veritatis, nulla doloremque neque incidunt quasi magni cupiditate ipsam. Ex, fugiat.</p>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste perferendis nostrum sit, molestiae harum id culpa consequuntur doloribus odio. Nostrum optio delectus consequatur eveniet error odio labore aspernatur quos nulla.</p>
						</div>
						<div class="home-bod-2">
							<ul>
								<li>
									<a href="<?= site_url('our_hotel') ?>" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="<?= base_url('assets/images/icon/h1.png') ?>" alt=""> Hotels</a>
								</li>
								<li>
									<a href="<?= base_url('room') ?>" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="<?= base_url('assets/images/icon/h7.png') ?>" alt=""> Booking</a>
								</li>
								<li>
									<a href="<?= site_url('menu') ?>" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="<?= base_url('assets/images/icon/h2.png') ?>" alt=""> Menu</a>
								</li>
								<li>
									<a href="<?= site_url('about') ?>" class="waves-effect waves-light btn-large wed-pop-ser-btn"><img src="<?= base_url('assets/images/icon/h5.png') ?>" alt=""> About Us</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
	</section>
	<!--END HEADER SECTION-->
	<section>
		<!-- LOGIN SECTION -->
		<div id="modal1" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span>{{ name }}</span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="">
					</a>
					<h4>Login</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name" class="validate">
								<label>User name</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Password</label>
							</div>
						</div>
						<div>
							<div class="s12 log-ch-bx">
								<p>
									<input type="checkbox" id="test5">
									<label for="test5">Remember me</label>
								</p>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Login" class="waves-effect waves-light log-in-btn">
							</div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">Forgot password</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- REGISTER SECTION -->
		<div id="modal2" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span>{{ name1 }}</span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="">
					</a>
					<h4>Create an Account</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name1" class="validate">
								<label>User name</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="email" class="validate">
								<label>Email id</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Password</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Confirm password</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Register" class="waves-effect waves-light log-in-btn">
							</div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FORGOT SECTION -->
		<div id="modal3" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span>{{ name3 }}</span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="">
					</a>
					<h4>Forgot password</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name3" class="validate">
								<label>User name or email id</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Submit" class="waves-effect waves-light log-in-btn">
							</div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--TOP SECTION-->
	<div class="hom-footer-section">
		<div class="container">
			<div class="row">
				<div class="foot-com foot-1">
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</li>
					</ul>
				</div>
				<div class="foot-com foot-2">
					<h5>Phone: (+404) 142 21 23 78</h5>
				</div>
				<div class="foot-com foot-3">
					<!--<a class="waves-effect waves-light" href="#">online room booking</a>--><a class="waves-effect waves-light" href="booking.html">room reservation</a>
				</div>
				<div class="foot-com foot-4">
					<a href="#"><img src="images/card.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
	</section>
	<!--FOOTER FIXED SECTION-->
	<div class="hom-footer-section">
		<div class="container">
			<div class="row">
				<div class="foot-com foot-1">
					<ul>
						<li><a href="https://www.facebook.com/?locale=id_ID"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a>
						</li>
						<li><a href="https://workspace.google.com/products/chat/"><i class="fa-brands fa-google-plus" aria-hidden="true"></i></a>
						</li>
						<li><a href="https://x.com/?lang=id"><i class="fa-brands fa-x-twitter"></i></a>
						</li>
					</ul>
				</div>
				<div class="foot-com foot-2">
					<h5><i class="fa-solid fa-phone-volume"></i> : (+62) 856 9736 2948</h5>
				</div>
				<div class="foot-com foot-3">
					<a class="waves-effect waves-light" href="<?= base_url('booking') ?>">room reservation</a>
				</div>
				<div class="foot-com foot-4">
					<div class="payment-logos">
						<img src="<?= base_url('assets/images/payment/payment2.png') ?>" alt="Payment" width="230" height="36">
					</div>
				</div>
			</div>
		</div>
		<!--ALL SCRIPT FILES-->
		<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
		<script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>
		<script src="<?= base_url() ?>assets/js/angular.min.js"></script>
		<script src="<?= base_url() ?>assets/js/bootstrap.js" type="text/javascript"></script>
		<script src="<?= base_url() ?>assets/js/materialize.min.js" type="text/javascript"></script>
		<script src="<?= base_url() ?>assets/js/jquery.mixitup.min.js" type="text/javascript"></script>
		<script src="<?= base_url() ?>assets/js/custom.js"></script>
		<script>
			setTimeout(function() {
				var alertBox = document.getElementById('subscribe-alert');
				if (alertBox) {
					alertBox.style.display = 'none';
				}
			}, 3000); // 3 detik

			window.addEventListener('scroll', function() {
				const navbar = document.querySelector('.menu-section-blank');

				// Memberikan class 'active-scroll' saat halaman digeser lebih dari 50px
				if (window.scrollY > 50) {
					navbar.classList.add('active-scroll');
				} else {
					navbar.classList.remove('active-scroll');
				}
			});

			const menu = document.querySelector('.menu-bar');
			const items = document.querySelectorAll('.menu-bar li');
			const indicator = document.querySelector('.indicator');

			function moveIndicator(el) {
				const rect = el.getBoundingClientRect();
				const menuRect = menu.getBoundingClientRect();

				// Set lebar dan posisi indicator sesuai elemen yang dipilih
				indicator.style.width = `${rect.width}px`;
				indicator.style.left = `${rect.left - menuRect.left}px`;
			}

			// Set posisi awal pada menu yang memiliki class .active
			const activeItem = document.querySelector('.menu-bar li.active');
			if (activeItem) moveIndicator(activeItem);

			items.forEach(item => {
				item.addEventListener('mouseenter', (e) => {
					moveIndicator(e.target);
					// Ubah warna teks link lain jadi abu-abu saat hover
				});

				item.addEventListener('click', () => {
					items.forEach(i => i.classList.remove('active'));
					item.classList.add('active');
				});
			});

			// Kembalikan ke menu aktif saat kursor meninggalkan area menu bar
			menu.addEventListener('mouseleave', () => {
				const currentActive = document.querySelector('.menu-bar li.active');
				moveIndicator(currentActive);
			});
		</script>

</body>

</html>