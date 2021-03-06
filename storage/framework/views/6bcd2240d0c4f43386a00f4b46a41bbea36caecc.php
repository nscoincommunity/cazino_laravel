<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
		<meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>" />
		<link rel="icon" href="/frontend/img/favicon.ico" type="image/x-icon" />
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

		<title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e(settings('app_name')); ?></title>
		<link rel="stylesheet" href="/frontend/css/vendor.min.css">
		<link rel="stylesheet" href="/frontend/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/frontend/css/main.min.css">
		<script src="/frontend/js/jquery.min.js" type="text/javascript"></script>
		<script src="/frontend/vendor/svg4everybody/svg4everybody.min.js" type="text/javascript"></script>
	</head>
	<body>
		<script type="text/javascript">
			$(document).ready(function(){
			$("a.nav__link[href='/']").addClass('nav__link_active');						
			});			
		</script> 
      
		<?php echo $__env->make('frontend.partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	  
		<section class="section section_main">
			<?php echo $__env->yieldContent('content'); ?>
			
		</section>
		<footer class="footer">
			<div class="footer__nav">
				<ul class="nav nav_footer">
					<li class="nav__item"><a class="nav__link" href="#">Responsible gaming</a></li>
					<li class="nav__item"><a class="nav__link" href="#">Protection of information</a></li>
					<li class="nav__item"><a class="nav__link" href="#">Terms and conditions</a></li>
					<li class="nav__item"><a class="nav__link" href="#">Antifraud</a></li>
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
			<div class="footer__rules">2008 - 2019 ?? GOLDSVET - Casino Management System</div>
		</footer>
      
		<?php echo $__env->make('frontend.partials.popups', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	  
		<script src="/frontend/js/vendor.min.js"></script>
		<script src="/frontend/js/scripts.js"></script>
	</body>
</html>