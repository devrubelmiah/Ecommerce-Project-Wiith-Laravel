<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title> @yield('title', 'Shop') </title>
	<!-- Favicon -->
	<link rel="icon" type="/frontend/image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="/frontend/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="/frontend/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="/frontend/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="/frontend/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="/frontend/css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="/frontend/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="/frontend/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="/frontend/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="/frontend/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="/frontend/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="/frontend/css/reset.css">
	<link rel="stylesheet" href="/frontend/style.css">
    <link rel="stylesheet" href="/frontend/css/responsive.css">

	<!-- Color CSS -->
	<link rel="stylesheet" href="/frontend/css/color/color1.css">
	<!--<link rel="stylesheet" href="/frontend/css/color/color2.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color3.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color4.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color5.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color6.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color7.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color8.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color9.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color10.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color11.css">-->
	<!--<link rel="stylesheet" href="/frontend/css/color/color12.css">-->

	{{--  <link rel="stylesheet" href="#" id="colors">  --}}
	    @stack('css')
</head>
<body class="js">
	
	
		<!-- Header -->
	@include('frontend.partials.header')
	<!--/ End Header -->
	@include('frontend.partials.notification')

	{{--  main content  --}}
		@yield('main-content')


	<!-- Start Footer Area -->
	@include('frontend.partials.footer')
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="/frontend/js/jquery.min.js"></script>
    <script src="/frontend/js/jquery-migrate-3.0.0.js"></script>
	<script src="/frontend/js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="/frontend/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="/frontend/js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="/frontend/js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="/frontend/js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="/frontend/js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="/frontend/js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="/frontend/js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="/frontend/js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="/frontend/js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="/frontend/js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="/frontend/js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="/frontend/js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="/frontend/js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="/frontend/js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="/frontend/js/easing.js"></script>
	<!-- Active JS -->
	<script src="/frontend/js/active.js"></script>
	    @stack('js')

</body>

</html>