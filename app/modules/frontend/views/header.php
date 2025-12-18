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
	<link href="<?= base_url('assets/css/materialize.css?v=' . filemtime(FCPATH . 'assets/css/materialize.css')); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css?v=' . filemtime(FCPATH . 'assets/css/style.css')); ?>">
	<link href="<?= base_url('assets/css/bootstrap.css?v=' . filemtime(FCPATH . 'assets/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="<?= base_url('assets/css/responsive.css?v=' . filemtime(FCPATH . 'assets/css/responsive.css')); ?>" rel="stylesheet">
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