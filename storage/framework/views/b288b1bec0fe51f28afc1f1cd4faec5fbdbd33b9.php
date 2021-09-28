<!DOCTYPE html>
<!--[if lte IE 8]>
<html class="ie ie8" lang="<?php echo e(app()->getLocale()); ?>"><![endif]-->
<!--[if lte IE 9]>
<html class="ie ie9" lang="<?php echo e(app()->getLocale()); ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="ie9up" lang="<?php echo e(app()->getLocale()); ?>"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <style>
        .btn {
            display: inline-block;
            *display: inline;
            *zoom: 1;
            padding: 4px 10px 4px;
            margin-bottom: 0;
            font-size: 13px;
            line-height: 18px;
            color: #333333;
            text-align: center;
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
            vertical-align: middle;
            background-color: #f5f5f5;
            background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -webkit-gradient(linear, 0 0, 0 100%,
            from(#ffffff), to(#e6e6e6));
            background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: linear-gradient(top, #ffffff, #e6e6e6);
            background-repeat: repeat-x;
            filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0);
            border-color: #e6e6e6 #e6e6e6 #e6e6e6;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            border: 1px solid #e6e6e6;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            *margin-left: .3em;
        }

        .btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] {
            background-color: #e6e6e6;
        }

        .btn-large {
            padding: 9px 14px;
            font-size: 15px;
            line-height: normal;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .btn:hover {
            color: #333333;
            text-decoration: none;
            background-color: #e6e6e6;
            background-position: 0 -15px;
            -webkit-transition: background-position 0.1s linear;
            -moz-transition: background-position 0.1s linear;
            -ms-transition: background-position 0.1s linear;
            -o-transition: background-position 0.1s linear;
            transition: background-position 0.1s linear;
        }

        .btn-primary, .btn-primary:hover {
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
            color: #ffffff;
        }

        .btn-primary.active {
            color: rgba(255, 255, 255, 0.75);
        }

        .btn-primary {
            background: #de006f;
            /* Old browsers */
            background: -moz-linear-gradient(135deg, #de006f 0%, #f73736 100%);
            /* FF3.6+ */
            background: -webkit-gradient(linear, 135deg, color-stop(0%, #de006f), color-stop(100%, #f73736));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(135deg, #de006f 0%, #f73736 100%);
            /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(135deg, #de006f 0%, #f73736 100%);
            /* Opera 11.10+ */
            background: -ms-linear-gradient(135deg, #de006f 0%, #f73736 100%);
            /* IE10+ */
            background: linear-gradient(135deg, #de006f 0%, #f73736 100%);
            /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001c10', endColorstr='#00673c',GradientType=0 );
            border: 0;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5);
            text-transform: uppercase;
        }

        .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] {
            filter: none;
            background-color: #4a77d4;
        }

        .btn-block {
            width: 100%;
            display: block;
        }

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
        }

        html {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            width: 100%;
            height: 100%;
            font-family: "omnes-pro", sans-serif, Helvetica, sans-serif;
            background: #092756;
            background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
            background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
            background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
            background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
            background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1);
        }

        a {
            color: #ffffff;
            text-decoration: none;
        }

        p {
            color: #ffffff;
            text-align: center;
            font-size: 15px;
        }

        #login,
        #register,
        #forgot-password
        {
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -150px 0 0 -150px;
            width: 300px;
            height: 300px;
        }

        #login h1,
        #register h1,
        #forgot-password h1 {
            color: #fff;
            letter-spacing: 1px;
            text-align: center;
            font-weight: 200;
            text-transform: uppercase;
            font-family: "omnes-pro", sans-serif, Helvetica, sans-serif;
            font-size: 1.3em;
        }

        label {
            color:  #ffffff;
            font-size: 15px;
        }

        input[type="checkbox"] {
            vertical-align:middle;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            border: none;
            outline: none;
            padding: 10px;
            font-size: 13px;
            color: #fff;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(0, 0, 0, 0.3);
            border-radius: 4px;
            box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.2), 0 1px 1px rgba(255, 255, 255, 0.2);
            -webkit-transition: box-shadow .5s ease;
            -moz-transition: box-shadow .5s ease;
            -o-transition: box-shadow .5s ease;
            -ms-transition: box-shadow .5s ease;
            transition: box-shadow .5s ease;
        }

        input:focus {
            box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.4), 0 1px 1px rgba(255, 255, 255, 0.2);
        }

        .hide {
            display: none;
        }

        .show {
            display: block;
        }

        .is-invalid {
            border: solid 1px #f73736;
        }

        .other-invalid-feedback,
        .invalid-feedback {
            font-size: 15px;
            display: block;
            color: #f73736;
        }

        .other-invalid-feedback {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        #lock-screen {
            background-image: url(assets/_new-style/images/modal-preloder.gif);
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-size: 70px;
            display: none;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 101;
            background-color: rgba(0, 0, 0, .3);
        }
    </style>
    <script>
        window.console = window.console || function (t) {
        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>
</head>
<body ng-app="app" ng-controller="loginCtrl">
    <div id="login" class="hide" ng-class="{show: activeForm==='login'}">
        <h1><?php echo app('translator')->getFromJson('app.login'); ?></h1>
        <form ng-submit="sendForm($event)" action="<?php echo e(route('frontend.auth.login.post')); ?>" method="post">
            <div class="form-group">
                <input required type="text" name="username" placeholder="<?php echo app('translator')->getFromJson('app.username'); ?>"/>
            </div>
            <div class="form-group">
                <input required type="password" name="password" placeholder="<?php echo app('translator')->getFromJson('app.password'); ?>"/>
            </div>
            <div class="other-invalid-feedback"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-large"><?php echo app('translator')->getFromJson('app.login'); ?></button>
            </div>
            <p>
                <a href="#" ng-click="switchActiveForm($event, 'register')"><?php echo app('translator')->getFromJson('app.register'); ?></a> |
                <a href="#" ng-click="switchActiveForm($event, 'forgot-password')"><?php echo app('translator')->getFromJson('app.restore_password'); ?></a>
            </p>
        </form>
    </div>

    <div id="register" class="hide" ng-class="{show: activeForm==='register'}">
        <h1><?php echo app('translator')->getFromJson('app.register'); ?></h1>
        <form ng-submit="sendForm($event)" method="post" action="<?php echo e(route('frontend.register.post')); ?>">
            <div class="form-group">
                <input required placeholder="<?php echo app('translator')->getFromJson('app.email'); ?>" type="text" name="email">
            </div>
            <div class="form-group">
                <input required placeholder="<?php echo app('translator')->getFromJson('app.password'); ?>" type="password" name="password">
            </div>
            <?php if(settings('tos')): ?>
                <div class="form-group">
                    <label for="terms">
                        <input type="checkbox" id="terms" name="tos" value="1" checked="checked">
                        <?php echo app('translator')->getFromJson('app.i_accept'); ?>
                    </label>
                </div>
            <?php endif; ?>
            <div class="other-invalid-feedback"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-large"><?php echo app('translator')->getFromJson('app.register'); ?></button>
            </div>
            <p>
                <a href="#" ng-click="switchActiveForm($event, 'login')"><?php echo app('translator')->getFromJson('app.login'); ?></a>
            </p>
        </form>
    </div>

    <div id="forgot-password" class="hide" ng-class="{show: activeForm==='forgot-password'}">
        <h1><?php echo app('translator')->getFromJson('app.restore_password'); ?></h1>
        <form ng-submit="sendForm($event)" action="<?php echo e(route('frontend.password.remind.post')); ?>" method="post">
            <div class="form-group">
                <input type="text" name="email" required placeholder="<?php echo app('translator')->getFromJson('app.email'); ?>">
            </div>
            <div class="other-invalid-feedback"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-large"><?php echo app('translator')->getFromJson('app.request_new_password'); ?></button>
            </div>
            <p>
                <a href="#" ng-click="switchActiveForm($event, 'login')"><?php echo app('translator')->getFromJson('app.login'); ?></a>
            </p>
        </form>
    </div>
    <?php echo $__env->make('frontend._new-style.part.lock-screen', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(url('assets/_new-style/js/jquery.1.8.2.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/angular.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/app.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/angular-lazy-img.min.js')); ?>"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
        }
    });
</script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/login-controller.js')); ?>"></script>
</body>
</html>
