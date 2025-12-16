<!--TOP SECTION-->
<section class="main">
	<div class="menu-section">
		<div class="container">
			<div class="row">
				<div class="top-bar">
					<ul>
						<li><a href="<?= base_url('our_hotel') ?>">Our Hotels</a>
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
							<a href="<?= base_url('services') ?>">Services</a>
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