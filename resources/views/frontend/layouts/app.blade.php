<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<meta name="description" content="@yield('description')">
		<meta name="keywords" content="@yield('keywords')" />
		<link rel="icon" href="/frontend/img/favicon.ico" type="image/x-icon" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>@yield('page-title') - {{ settings('app_name') }}</title>
		<link rel="stylesheet" href="/frontend/css/vendor.min.css">
		<link rel="stylesheet" href="/frontend/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/frontend/css/main.min.css">
		<!-- Flags -->
		<link rel="stylesheet" href="/assets/plugins/flag-icon-css/css/flag-icon.min.css">
		<script src="/frontend/js/jquery.min.js" type="text/javascript"></script>
		<script src="/frontend/vendor/svg4everybody/svg4everybody.min.js" type="text/javascript"></script>
	</head>
	<body>
		<script type="text/javascript">
			$(document).ready(function(){
			$("a.nav__link[href='/']").addClass('nav__link_active');						
			});			
		</script> 
      
		@include('frontend.partials.navbar')
	  
		<section class="section section_main">
			@yield('content')
			
		</section>
		<footer class="footer">
			<div class="footer__nav">
				<ul class="nav nav_footer">
					<li class="nav__item"><a class="nav__link" href="#">Ответственная игра</a></li>
					<li class="nav__item"><a class="nav__link" href="#">Защита информации</a></li>
					<li class="nav__item"><a class="nav__link" href="#">Условия и положение</a></li>
					<li class="nav__item"><a class="nav__link" href="#">Антифрод</a></li>
				</ul>
			</div>
			<?php echo htmlspecialchars_decode($__env->yieldContent('body')); ?>
			<div class="footer__icons">
				<span class="footer__cell"><i class="icon icon_visa"></i></span>
				<span class="footer__cell"><i class="icon icon_mastercard"></i></span>
				<span class="footer__cell"><i class="icon icon_qiwi"></i></span>
				<span class="footer__cell"><i class="icon icon_yandex"></i></span>
				<span class="footer__cell"><i class="icon icon_webmoney"></i></span>
				<span class="footer__cell"><i class="icon icon_moneta"></i></span>
				<span class="footer__cell"><i class="icon icon_wallet"></i></span>
				<span class="footer__cell"><i class="icon icon_sberbank"></i></span>
				<span class="footer__cell"><i class="icon icon_alfabank"></i></span>
				<span class="footer__cell"><i class="icon icon_promsvyazbank"></i></span>
			</div>
			<div class="footer__icons">
				<span class="footer__cell"><i class="icon icon_18"></i></span>
				<span class="footer__cell"><i class="icon icon_curagao"></i></span>
				<span class="footer__cell"><i class="icon icon_ecorga"></i></span>
				<span class="footer__cell"><i class="icon icon_microgaming"></i></span>
				<span class="footer__cell"><i class="icon icon_netent"></i></span>
			</div>
			<div class="footer__rules">2008 - 2019 © GOLDSVET - Casino Management System</div>
			<a href="//showstreams.tv/"><img src="//www.free-kassa.ru/img/fk_btn/18.png" title="Бесплатный видеохостинг"></a>
		</footer>
      
		@include('frontend.partials.popups')
	  
		<script src="/frontend/js/vendor.min.js"></script>
		<script src="/frontend/js/scripts.js"></script>
	</body>
</html>