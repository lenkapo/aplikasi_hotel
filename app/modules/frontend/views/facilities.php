<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Best Luxurious Hotel Booking Template.">
	<meta name="keywords"
		content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
	<title>Luxurious - Hotel Booking HTML Template</title>

	<link rel="icon" href="<?php base_url('assets/img/favicons/favicon.png'); ?>" type="image/x-icon">

	<link rel="stylesheet" href="<?= base_url('assets/css/vendor/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/vendor/magnific-popup.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/vendor/aos.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/vendor/remixicon.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/vendor/materialdesignicons.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/vendor/swiper-bundle.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/vendor/semantic.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/vendor/slick.min.css') ?>">

	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">


</head>

<body>

	<!-- Overlay -->
	<div class="overlay"></div>
	<div class="lh-loader">
		<span class="loader"></span>
	</div>

	<!-- Header -->
	<?php $this->load->view('header'); ?>


	<!-- Banner -->
	<section class="section-banner">
		<div class="row banner-image">
			<div class="banner-overlay"></div>
			<div class="banner-section">
				<div class="lh-banner-contain">
					<h2>Hotel Facilities</h2>
					<div class="lh-breadcrumb">
						<h5>
							<span class="lh-inner-breadcrumb">
								<a href="index.html">Home</a>
							</span>
							<span> / </span>
							<span>
								<a href="javascript:void(0)">Hotel Facilities</a>
							</span>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section-amenities padding-tb-100">
		<div class="container">
			<div class="row mtb-m-12">

				<?php $i = 1; // Inisialisasi counter untuk nomor urut dan logika tata letak 
				?>
				<?php if (!empty($facilities)): ?>
					<?php foreach ($facilities as $facility): ?>

						<div class="col-md-6 col-sm-12 m-tb-12">
							<div class="lh-amenities" data-aos="fade-up" data-aos-duration="<?= ($i % 2 == 0) ? '2000' : '1500'; ?>">
								<div class="amenities-detail">

									<?php
									// Cek apakah urutan fasilitas adalah ganjil (1, 3, 5, ...)
									if ($i % 2 != 0):
									?>
										<div class="amenities-box">
											<img src="<?= base_url('assets/img/amenities/' . $facility->image_file); ?>"
												alt="<?= $facility->facility_name; ?>"
												class="amenities-left-image">
										</div>
										<div class="amenities-box">
											<div class="lh-amenities-in">
												<h4 class="side-number">0<?= $i; ?></h4>
												<div class="lh-top-dish">
													<img src="<?= base_url('assets/img/amenities/' . $facility->icon_file); ?>"
														class="svg-img" alt="dish-icon">
												</div>
												<div class="amenities-contain">
													<h4 class="amenities-heading"><?= $facility->facility_name; ?></h4>
													<p><?= $facility->description; ?></p>
												</div>
											</div>
										</div>
									<?php
									// Cek apakah urutan fasilitas adalah genap (2, 4, 6, ...)
									else:
									?>
										<div class="amenities-box">
											<div class="lh-amenities-in lh-amenities-right">
												<h4 class="side-number">0<?= $i; ?></h4>
												<div class="lh-top-dish">
													<img src="<?= base_url('assets/img/amenities/' . $facility->icon_file); ?>"
														class="svg-img" alt="dish-icon">
												</div>
												<div class="amenities-contain">
													<h4 class="amenities-heading"><?= $facility->facility_name; ?></h4>
													<p><?= $facility->description; ?></p>
												</div>
											</div>
										</div>
										<div class="amenities-box">
											<img src="<?= base_url('assets/img/amenities/' . $facility->image_file); ?>"
												alt="<?= $facility->facility_name; ?>"
												class="amenities-right-image">
										</div>
									<?php endif; ?>

								</div>
							</div>
						</div>

						<?php $i++; // Tingkatkan counter 
						?>
					<?php endforeach; ?>
				<?php else: ?>
					<div class="col-12">
						<p class="alert alert-info">Tidak ada fasilitas yang tersedia saat ini.</p>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</section>