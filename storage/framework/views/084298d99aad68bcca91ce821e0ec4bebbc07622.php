<!DOCTYPE html>
<!--[if lte IE 8]>
<html class="ie ie8" lang="<?php echo e(app()->getLocale()); ?>"><![endif]-->
<!--[if lte IE 9]>
<html class="ie ie9" lang="<?php echo e(app()->getLocale()); ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="ie9up" lang="<?php echo e(app()->getLocale()); ?>"><!--<![endif]-->
<head>
    <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e(settings('app_name')); ?></title>
    <!-- META TAGS -->
    <link rel="shortcut icon" type="image/png" href="<?php echo e(url('assets/_new-style/images/favicon/spc.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(url('assets/_new-style/images/favicon/spc.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(url('assets/_new-style/images/favicon/spc-iphone.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(url('assets/_new-style/images/favicon/spc-ipad.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(url('assets/_new-style/images/favicon/spc-ipad2.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(url('assets/_new-style/images/favicon/spc-ipad3.png')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta name="application-name" content="<?php echo e(settings('app_name')); ?>"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?php echo e(url('assets/img/icons/mstile-144x144.png')); ?>" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="HandheldFriendly" content="true"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="initial-scale=1,width=device-width,maximum-scale=2,minimum-scale=0.5,user-scalable=1"/>


    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&amp;subset=cyrillic,cyrillic-ext,latin-ext"
          rel="stylesheet">
    <script src="<?php echo e(url('assets/_new-style/js/jquery.1.8.2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/angular.min.js')); ?>"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo e(url('assets/_new-style/js/html5shiv.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/_new-style/js/respond.min.js')); ?>"></script><![endif]-->

    <!-- DEFAULT CSS -->
    <link href="<?php echo e(url('assets/_new-style/css/reset.css')); ?>" rel="stylesheet" type="text/css" class="styles"/>
    <!-- Flags -->
    <link rel="stylesheet" href="<?php echo e(url('assets/plugins/flag-icon-css/css/flag-icon.min.css')); ?>">
    <!-- Perfect scrollbar css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/_new-style/css/perfect-scrollbar.css')); ?>">
    <!-- zebra datepicker -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/_new-style/css/zebra_datepicker.css')); ?>">
    <!-- START OF ALL CUSTOM CSS + FONTS -->
    <link href="<?php echo e(url('assets/_new-style/css/style.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(url('assets/_new-style/css/regional.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(url('assets/_new-style/css/oct7vfe.css')); ?>">

    <!-- DEFAULT JS SCRIPTS -->
    <!--[if lt IE 9]>
    <script src="<?php echo e(url('assets/_new-style/js/html5-shiv.js')); ?>" type="text/javascript"></script>
    <![endif]-->
</head>
<body class="en" ng-app="app" ng-controller="gameCtrl">
<style>
    @-webkit-keyframes lights {
        0% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board.png')); ?>");
        }

        100% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_1.png')); ?>");
        }
    }

    @-webkit-keyframes lightsMobile {
        0% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_mobile.png')); ?>");
        }

        100% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_mobile_1.png')); ?>");
        }
    }

    @-moz-keyframes lights {
        0% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board.png')); ?>");
        }

        100% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_1.png')); ?>");
        }
    }

    @-moz-keyframes lightsMobile {
        0% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_mobile.png')); ?>");
        }

        100% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_mobile_1.png')); ?>");
        }
    }

    @keyframes  lights {
        0% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board.png')); ?>");
        }

        100% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_1.png')); ?>");
        }
    }

    @keyframes  lightsMobile {
        0% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_mobile.png')); ?>");
        }

        100% {
            background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_mobile_1.png')); ?>");
        }
    }

    .games__hero__wrapper {
        background-image: url("<?php echo e(url('assets/_new-style/images/spin-mobile.jpg')); ?>");
        padding-bottom: 123vw;
        position: relative;
    }

    .games__hero__offer__wrapper .bonus-breakdown {
        font-size: .75em;
        max-width: 90%;
        margin: 5px auto;
    }

    .cobranded_board_mobile {
        animation-name: lightsMobile;
        animation-duration: 0.75s;
        animation-iteration-count: infinite;
        position: absolute;
        background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board_mobile.png')); ?>");
        background-size: 100%;
        background-repeat: no-repeat;
        right: 2vw;
        display: block;
        width: 70vw;
        height: 39vw;
        top: -13vw;
        text-align: center;
        padding-top: 2.5vw;
        left: 50%;
        transform: translate(-50%);
    }

    .cobranded_board {
        animation-name: lights;
        animation-duration: 0.75s;
        animation-iteration-count: infinite;
        position: absolute;
        background-image: url("<?php echo e(url('assets/_new-style/images/cobranded_board.png')); ?>");
        background-size: 100%;
        background-repeat: no-repeat;
        right: 2vw;
        display: none;
        width: 32vw;
        height: 25vw;
        top: 1vw;
        text-align: center;
        padding-top: 4vw;
    }

    .cobranded_board {
        display: none;
    }

    .games__hero__offer__wrapper h1 {
        font-size: 6vw;
    }

    .games__hero__offer__wrapper h2 {
        font-size: 11vw;
    }

    .cobranded_board img, .cobranded_board_mobile img {
        width: 65%;
    }

    .games__offer__text {
        top: 14vw;
        position: relative;
    }

    .es .games__hero__offer__wrapper h1, .es-ar .games__hero__offer__wrapper h1, .es-mx .games__hero__offer__wrapper h1 {
        font-size: 7vw;
        line-height: 9vw;
    }

    .pt-br .games__hero__offer__wrapper h1 {
        font-size: 5vw;
        line-height: 6vw;
    }

    .pt-br .games__hero__offer__wrapper h2 {
        font-size: 11vw;
        line-height: 14vw;
    }

    .es .games__hero__offer__wrapper h2, .es-ar .games__hero__offer__wrapper h2, .es-mx .games__hero__offer__wrapper h2 {
        font-size: 12vw;
        line-height: 14vw;
    }

    .es .button-hero, .pt-br .button-hero, .de .button-hero, .es-ar .button-hero, .es-mx .button-hero, .fr-ca .button-hero {
        margin-top: 3vw;
    }

    .fr-ca .button-hero {
        font-size: 5vw;
    }

    .de .games__hero__offer__wrapper h1 {
        font-size: 5.5vw;
    }

    .de .games__hero__offer__wrapper h2, .fr-ca .games__hero__offer__wrapper h2 {
        font-size: 10vw;
    }

    @media  screen and (min-width: 760px) {
        .games__offer__text {
            top: 10vw;
            position: relative;
        }

        .games__hero__wrapper {
            padding-bottom: 75vw;
        }

        .en-ca .button-hero, .en-nz .button-hero, .fr-ca .button-hero, .button-hero {
            font-size: 3.2vw;
            padding: 25px 45px 30px 66px;
            margin-top: 1vw;
        }

        .fr-ca .button-hero {
            font-size: 2.5vw;
        }

        .es .games__hero__offer__wrapper h1, .pt-br .games__hero__offer__wrapper h1, .es-ar .games__hero__offer__wrapper h1, .es-mx .games__hero__offer__wrapper h1 {
            font-size: 5vw;
            line-height: 9vw;
        }

        .es .games__hero__offer__wrapper h2, .es-ar .games__hero__offer__wrapper h2, .es-mx .games__hero__offer__wrapper h2 {
            font-size: 10vw;
            line-height: 10vw;
        }

        .fr-ca .games__hero__offer__wrapper h1 {
            font-size: 2.5vw;
        }

        .fr-ca .games__hero__offer__wrapper h2 {
            font-size: 8vw;
        }

        .es .games__hero__offer__wrapper h1, .pt-br .games__hero__offer__wrapper h1, .es-ar .games__hero__offer__wrapper h1, .es-mx .games__hero__offer__wrapper h1 {
            font-size: 5vw;
            line-height: 7vw;
        }

        .pt-br .games__hero__offer__wrapper h2 {
            font-size: 9vw;
            line-height: 11vw;
        }

        .cobranded_board_mobile {
            width: 55vw;
            top: -9vw;
        }
    }

    @media  screen and (min-width: 1020px) {
        .games__hero__offer__wrapper .bonus-breakdown {
            font-size: 1em;
            max-width: 45%;
            margin: 10px 0 0 0;
        }

        .games__hero__offer__wrapper h1 {
            font-size: 2.5vw;
        }

        .games__hero__offer__wrapper h2 {
            font-size: 5vw;
        }

        .games__hero__wrapper {
            background-image: url("<?php echo e(url('assets/_new-style/images/spin-desktop.jpg')); ?>");
            padding-bottom: 31vw;
        }

        .games__hero__offer__wrapper {
            text-align: left;
        }

        .games__offer__text {
            top: 0;
        }

        .cobranded_board {
            display: block;
        }

        .cobranded_board_mobile {
            display: none;
        }

        .games__hero__offer__wrapper h1 {
            line-height: 0.8;
        }

        .button-hero {
            margin-top: 2vw;
        }

        .es .games__hero__offer__wrapper h1, .es-ar .games__hero__offer__wrapper h1, .es-mx .games__hero__offer__wrapper h1 {
            font-size: 2.5vw;
            line-height: 3vw;
        }

        .pt-br .games__hero__offer__wrapper h1 {
            font-size: 3vw;
            line-height: 5vw;
        }

        .es .games__hero__offer__wrapper h2 {
            font-size: 5vw;
            line-height: 6vw;
        }

        .es-ar .games__hero__offer__wrapper h2, .es-mx .games__hero__offer__wrapper h2 {
            font-size: 4.8vw;
            line-height: 6vw;
        }

        .pt-br .games__hero__offer__wrapper h2, .fr-ca .games__hero__offer__wrapper h2 {
            font-size: 3.5vw;
            line-height: 6vw;
        }

        .es .button-hero, .pt-br .button-hero, .de .button-hero, .es-ar .button-hero, .es-mx .button-hero {
            font-size: 2.3vw;
            margin-top: 0;
        }

        .de .games__hero__offer__wrapper h2 {
            font-size: 5vw;
            line-height: 6vw;
        }

        .de .games__hero__offer__wrapper h1 {
            font-size: 2.5vw;
            line-height: 3vw;
        }
    }
</style>
<div class="overlay"></div>
<div class="pop-container" style="display:none">

    <div class="pop-wrapper">
        <a class="close-pop">x</a>
        <div class="pop-content clear"><p style="font-size: 22px; font-weight: bold">Exclusive $2000 Welcome Bonus! </p>
            <br>
            <p style="font-weight: bold;">100% match up to $800 currency units first Deposit</p><br>
            <p style="font-weight: bold;">100% match up to $500 currency units on second deposit</p><br>
            <p style="font-weight: bold;">100% match up to $700 currency units on the third deposit</p><br>
            <ol style="list-style-type: decimal;margin-left: 15px;">
                <li>The Casino is a member of the group of online Casinos proprietary to us (the "Group"). At any point
                    in time the Group may offer Sign-Up Bonuses at any or all of its member Casinos
                </li>
                <li>All new players have 7 days from the date their account was opened to claim their new player sign-up
                    bonus. Thereafter the Sign-Up bonus will be unavailable. Subsequent promotions will be available to
                    the player but the Sign-Up bonus will be considered forfeited.
                </li>
                <li>Please note that for the purposes hereof, a “Currency Unit” is a unit of the currency nominated by
                    the Player at the time of his/her registration of his/her Real Account to be the currency to be
                    utilized by such Player when transacting with the Casino.
                </li>
                <li>For these promotions ‘Desktop’ refers to an application that runs stand alone in a desktop or laptop
                    computer.
                </li>
                <li>Contrast with "software," which requires the Web browser to run and ‘mobile’ applications that run
                    on HTML5 on smartphones and tablets
                </li>
                <li>The Welcome Bonus will automatically be credited to the Bonus Account upon a successful purchase of
                    10 currency units or more.
                </li>
                <li>Where the Casino does not offer the primary Currency Unit in your country, you will be eligible to
                    play and receive bonuses in any currency of your choosing.
                </li>
                <li>If you open multiple accounts you will not be eligible for the Sign-Up Bonus on each account. This
                    and any other Sign-Up Bonus/es are only available once per Player and/or per environment where
                    computers are shared and/or per email address. This offer is not transferable.
                </li>
                <li>Once you have received a Sign-Up Bonus at any of the Group's member Casinos, you are required that
                    to meet additional minimum Play Through Requirements before you are eligible for additional Sign-Up
                    Bonuses at any of the other member Casinos.
                </li>
                <li>If a Free Spins Offer is granted to you it must be played through 50 times (50x) before you will be
                    able to withdraw any winnings made using the bonus money portion of your balance. ("Play through
                    Requirement"). For example, if you deposit 100 and receive a 100 credit bonus, the Play through
                    Requirement will be 50 x 100 = 5000. Any winnings attributed to the Cash portion of your balance can
                    be withdrawn at any time, subject to meeting all of these terms and conditions. In the event that a
                    Player has a positive cash balance after the 50x wagering requirement is complete and such Player
                    attempts to make a withdrawal, the withdrawal of winnings derived from the Free Spins will be capped
                    at 100 Casino Credits (in the Player’s currency of play) and the remaining cash balance will be
                    forfeited.
                </li>
                <li>The Bonus amount is subject to a minimum play through (wager) of 50 times (50x) by you before it can
                    be transferred from your Bonus Balance to your Cash Balance ("Play Through Requirement"). For
                    example, if you deposit 100 and receive a 100 credit bonus, the Play through Requirement will be 50
                    x 100 = 5000
                </li>
                <li>You may thus not claim or receive a Free Spins offer at this Casino if you have previously claimed
                    or received a Free Spins offer from another Group member Casino and have not yet wagered such
                    previously claimed or received a Free Spins offer and its associated initial deposit at least 100
                    times at the Group member Casino that granted you such Free Spins offer. If your Account at this
                    Casino has been credited with a Free Spins offer for which you (in our sole and unfettered
                    discretion) are ineligible, the Casino shall retrospectively void such Sign-Up Bonus and any
                    winnings received by you after the Free Spins offer has been credited to your relevant accounts.
                </li>
                <li>Wagering on all games except Roulette, Sic Bo, Craps, Baccarat, Table Poker, Casino War & Red Dog
                    will count towards meeting the Play Through Requirement; however the percentage of the Sign-Up Bonus
                    which may be wagered on certain games will vary as follows*:
                </li>
            </ol>
            <ul style="list-style-type: disc; margin-left: 25px;">
                <li> - 100% All Slots, Keno & Scratch Card games (Re-spin slot games counts 10%)</li>
                <li> - 8% All video/power Pokers (excluding All Aces and Jacks or Better video pokers), all blackjacks
                    (excluding Classic Blackjack)
                </li>
                <li> - 2% Classic Blackjacks, All Aces video pokers, all Jacks or Better video pokers</li>
                <li> - 0% all baccarats, all craps, Red Dog, Sic Bo</li>
                <li> - Wagers placed using the gamble feature 0%</li>
                <li> - All game play MPV (Multiplayer Tournaments) 0%</li>
                <li> - If you play on the excluded games (0%) before meeting the playthrough requirements, then you
                    agree that the casino holds the right to void any winnings made from these games at our discretion.
                </li>
                <li> - IMPORTANT: the contribution percentages and playthrough requirements may differ per promotion
                    and/or geographical location. In this instance, the percentage amounts and playthrough requirements
                    quoted in the promotion's Terms & Conditions will apply. Please always refer to the specific Terms &
                    Conditions associated with each promotion to avoid any misunderstanding *Progressive games will
                    contribute to the Play through Requirement as per the game type. For example, Progressive Slots will
                    contribute 100% to the Play through Requirement. ** Please note that wagers placed using the gamble
                    feature will not count towards the Play through Requirement. *** Please note that all game play on
                    MPV (Multi Player Tournaments), will not count towards the Play through Requirement.
                </li>
            </ul>
            <ol style="list-style-type: decimal;margin-left: 15px;" start="14">
                <li>After fulfilling the total Play through Requirement on your first Sign-Up Bonus you can withdraw
                    from your Cash Balance at any time.
                </li>
                <li>This bonus offer expires upon cashin. Any claim made to this bonus after a cashin has been
                    requested, whether pending or paid, will render the bonus void. Where a Sign-Up Bonus has been
                    granted to you, subject to you being required to have met all wagering requirements, you will be
                    limited to a maximum withdrawal value of 6 times your first deposit amount and any remaining balance
                    will be forfeited. This clause will only be applied at the discretion of casino management. All
                    progressive wins are exempt from this clause.
                </li>
                <li>Should a withdrawal be submitted before the free Spins Bonus is credited to the Bonus Account, the
                    bonus will be forfeited.
                </li>
                <li>You will be unable to withdraw any amount from your account until you've either met the wagering
                    requirements or played through all funds in the Bonus Account. Winnings on bets from the Bonus
                    Account, after the wagering requirements have been met, go straight to the Cash Account.
                </li>
                <li>If you do not want any Sign-Up Bonus which has been deposited into your account by the Casino then
                    you are entitled to request that the Sign-Up Bonus be reversed out of your Casino account, subject
                    to no Play Through having taken place on either the initial deposit or associated Sign-Up Bonus. You
                    can do this by contacting Customer support by way of email or live chat, where after the Sign-Up
                    Bonus reversal will take place. If any Play Through has taken place, then that Sign-Up Bonus may not
                    be removed from your account (either by means of withdrawal or a request to the support staff) until
                    the Play through Requirement associated with that Sign-Up Bonus has been met.
                </li>
                <li>Before any withdrawals are processed, your play will be reviewed for any irregular playing patterns
                    e.g. playing of equal, zero margin bets or hedge betting, which all shall be considered irregular
                    gaming for Sign-Up Bonus Play Through Requirement purposes. Other examples of irregular game play
                    include but are not limited to, placing single bets equal to or in excess of 30% or more of the
                    value of the bonus credited to your account until such time as the wagering requirements for that
                    bonus have been met. The Casino reserves the right to decide in its sole discretion which activities
                    constitute "irregular play" for Sign-Up Bonus Play through Requirement purposes from time-to-time
                    and to withhold any withdrawals where irregular play has occurred to meet Sign-Up Bonus Play through
                    Requirements.
                </li>
                <li>In the event that the Casino believes you are abusing or attempting to abuse a bonus or other
                    promotion, or you are likely to benefit through abuse or lack of good faith from a gambling policy
                    adopted by Us, the Casino Group may at its sole discretion, deny, withhold or withdraw from you any
                    bonus or promotion, or rescind any policy either temporarily or permanently, or terminate your
                    access to the Services and/or block your account. In such circumstances, the Casino shall be under
                    no obligation to refund to you any funds that may be in your accounts other than your original
                    deposit amounts.
                </li>
                <li>If the Sign-Up Bonus remains unused in your Bonus Balance for two (2) months or longer from the date
                    the claim was made, the Sign-Up Bonus will be forfeited to the Casino.
                </li>
                <li>The Casino Rules, Terms and Conditions apply to this Promotion. In the event of a conflict between
                    these Promotion-specific Rules, Terms and Conditions and the Casino Rules Terms and Conditions, the
                    Promotion-specific Rules, Terms and Conditions shall prevail but only to the extent that the Rules,
                    Terms and Conditions conflict with one another.
                </li>
                <li>In the event of any dispute, the decision of the Casino management will be considered full and
                    final. No correspondence will be entered into in this regard.
                </li>
                <li>The Casino management reserves the right to end or amend this Promotion at any time without giving
                    notice
                </li>
            </ol>
            <br>
            <p style="font-weight: bold;">Last Updated: 03/01/2021</p></div>
    </div>
</div>
<!-- END OF TERMS POP -->


<!-- Live Support fixed button -->
<div class="ls__fixed__btn">
    <a class="button-ls lc"><img src="<?php echo e(url('assets/_new-style/images/livesupport.png')); ?>"/></a>
</div>

<!-- Above fold content  (Header and hero) -->
<section class="games__hero__wrapper">
    <div class="top__section" id="tothetop">
        <div>
            <div>
                <div id="navbar-mobile-overlay"></div>
                <div id="navbar-mobile">
                    <a href="<?php echo e(url('/')); ?>" class="close">
                        <img src="<?php echo e(url('assets/_new-style/images/icon_close.png')); ?>"/>
                    </a>
                    <div class="navbar-mobile-logo sign__up">
                        <img src="<?php echo e(url('assets/_new-style/images/logo.png')); ?>" alt="logo" class="logo"/>
                    </div>

                    <ul class="navbar-nav">
                        <li class="nav-item sign__up">
                            <a class="nav-link" href="index.html#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link languages" href="index.html#">Languages
                                <span class="right-chevron">
                                    <img src="<?php echo e(url('assets/_new-style/images/right_chevron.png')); ?>"/>
                                </span>
                            </a>
                        </li>






                    </ul>

                    <div>
                        <button class="games__button button-register spin-gradient sign__up sign__up">REGISTER</button>

                    </div>
                    <div id="mobile-submenu">
                        <a href="index.html#" class="close">
                            <img src="<?php echo e(url('assets/_new-style/images/icon_close.png')); ?>"/>
                        </a>
                        <div class="navbar-mobile-logo sign__up">
                            <a>
                                <img src="<?php echo e(url('assets/_new-style/images/logo.png')); ?>"
                                     alt="logo" class="logo"/>
                            </a>
                        </div>
                        <a href="index.html#"><span class="back">
                        <img src="<?php echo e(url('assets/_new-style/images/left_chevron.png')); ?>"/>BACK</span></a>
                    </div>
                </div>


                <nav class="navbar navbar-toggleable-md navbar-inverse" id="navbar-main">
                    <div class="container">

                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a href="<?php echo e(url('/')); ?>" class="navbar-brand sign__up">
                            <img src="<?php echo e(url('assets/_new-style/images/logo.png')); ?>" alt="logo"/>
                        </a>
                        <?php if(Auth::check()): ?>
                            <ul class="games__button__mobile">
                                <li>
                                    <a href="#" ng-click="openModal($event, '#my-account')" class="games__button  button-my-profile">
                                        <?php echo app('translator')->getFromJson('app.my_profile'); ?>
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="<?php echo e(route('frontend.auth.logout')); ?>" class="games__button  button-logout">
                                        <?php echo app('translator')->getFromJson('app.logout'); ?>
                                    </a>
                                </li>
                            </ul>
                        <?php else: ?>
                            <ul class="games__button__mobile">
                                <li>
                                    <a href="#" class="games__button button-login sign__in" ng-click="openModal($event, '#login-modal')">
                                        <?php echo app('translator')->getFromJson('app.login'); ?>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto"></ul>
                            <!-- START OF DESKTOP NAV -->
                            <div class="games__header__wrapper">
                                <ul class="container">
                                    <li class="brand sign__up">
                                        <a href="<?php echo e(url('/')); ?>">
                                            <img src="<?php echo e(url('assets/_new-style/images/logo.png')); ?>"/>
                                        </a>
                                    </li>
                                    <?php if(Auth::check()): ?>
                                    <li>
                                        <a href="<?php echo e(route('frontend.auth.logout')); ?>" class="games__button button-logout">
                                            <?php echo app('translator')->getFromJson('app.logout'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" ng-click="openModal($event, '#my-account')" class="games__button button-my-profile">
                                            <?php echo app('translator')->getFromJson('app.my_profile'); ?>
                                        </a>
                                    </li>
                                    <?php else: ?>
                                    <li>
                                        <a href="#" class="games__button button-login sign__in" ng-click="openModal($event, '#login-modal')">
                                            <?php echo app('translator')->getFromJson('app.login'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="games__button button-register spin-gradient sign__up" ng-click="openModal($event, '#registration-confirm')">
                                            <?php echo app('translator')->getFromJson('app.register'); ?>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <div id="language-select" class="btn-info button-lang btn-collapsible lc">
                                            <i class="flag-icon flag-icon-<?php echo e(app()->getLocale()); ?>"></i>
                                            <span>
                                                <?php $__currentLoopData = ['ru', 'en', 'de']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($langCode !== app()->getLocale()): ?>
                                                    <i data-lang-code="<?php echo e($langCode); ?>" class="flag-icon flag-icon-<?php echo e($langCode); ?>"></i>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>

        </div>
    </div>
    <div class="games__hero__offer__wrapper ">
        <div class="cobranded_board">
            <img src="<?php echo e(url('assets/_new-style/images/casinoreviewslogo.png')); ?>"/>
        </div>
        <div class="cobranded_board_mobile">
            <img src="<?php echo e(url('assets/_new-style/images/casinoreviewslogo.png')); ?>"/>
        </div>
        <div class="container">
            <div class="grid">
                <div class="">
                    <div class="games__offer__text ">
                        <h1>TOP UP YOUR DEPOSIT AND GET EXCLUSIVE BONUSES</h1>
                        <h2>$2000  Bonus!</h2>
                        <?php if(!Auth::check()): ?>
                        <a class="games__button button-hero sign__up" ng-click="openModal($event, '#registration-confirm')">
                            SIGN UP
                            <img src="<?php echo e(url('assets/_new-style/images/cta-arrow.png')); ?>" alt="cta arrow" class="cta-arrow"/>
                        </a>
                        <?php endif; ?>

                        <!--style-->
                        <style>
                            .more-info-overlay {
                                background: rgba(0, 0, 0, .9);
                                height: 100vw;
                                width: 100vw;
                                position: absolute;
                                top: 0;
                                z-index: 9999
                            }

                            .more_info_box {
                                display: block;
                                font-size: 20px;
                                background: rgba(4, 2, 2, .75);
                                border-radius: 3px;
                                margin-top: 5px;
                                cursor: pointer;
                                width: 66%;
                                margin: 0 auto;
                                color: #fff;
                                text-align: center;
                                font-family: montserrat, sans-serif;

                            }

                            .more_info_dialog {
                                background: #171717;
                                border-radius: 15px;
                                font-size: 3.2vw;
                                top: 10%;
                                max-width: 650px;
                                width: 90%;
                                text-align: center;
                                margin: 10% auto;
                                position: relative;
                                border: 3px solid #393b44;
                            }

                            .bonus-button {
                                text-transform: uppercase;
                                padding: 10px 0;
                                color: #fff;
                                font-weight: 700;
                                border-radius: 40px;
                                width: 65%;
                                display: block;
                                margin: 3.25vw auto;
                                font-size: 18px;
                                cursor: pointer;
                                transition: .2s;
                                will-change: transform
                            }

                            .bonus-button:hover {
                                transform: scale(1.05)
                            }

                            .bonus-button span img {
                                max-width: 14px;
                                height: auto;
                                display: inline-block;
                                margin: 0 0 0 8px
                            }

                            .bonus-text {
                                margin: 0 auto 2vw;
                                max-width: 85%;
                                color: #fff;
                                font-size: 1em;
                                line-height: 1.4em;
                                margin-bottom: 10px;
                            }

                            .more_info_dialog img {
                                max-width: 35%;
                                height: auto;
                                margin: 5vw 0
                            }

                            .pop-close-icon {
                                background-position: 0 98.5%;
                                height: 25px;
                                width: 25px;
                                position: absolute;
                                right: 5px;
                                cursor: pointer;
                                color: red !important
                            }

                            .close-icon {
                                background-image: url("<?php echo e(url('assets/_new-style/images/close-button.png')); ?>");
                                background-position: center;
                                background-repeat: no-repeat;
                                padding: 10px;
                                border-radius: 60px;
                                margin-top: 10px;
                                margin-right: 8px;
                                transition: .2s;
                                will-change: transform
                            }

                            .close-icon:hover {
                                transform: scale(1.12)
                            }

                            .bonus-breakdown {
                                color: white;
                                font-family: inherit;
                                font-weight: normal;
                                box-sizing: border-box;
                                padding: 1%;
                                font-size: 1em;
                                max-width: 45%;
                                margin-top: 10px;
                            }

                            .terms-breakdown {
                                cursor: pointer;
                                text-decoration: underline;
                            }

                            .bonus-breakdown.box {
                                background: rgba(0, 0, 0, 0.7);
                                border-radius: 1vw;
                            }

                            .more-info-button {
                                padding: 1vw 12vw;
                                margin: 1.2vw auto 0;
                                width: auto;
                                background: rgba(0, 0, 0, 0.7);
                                color: white;
                                display: table;
                                text-align: center;
                            }

                        </style>


                        <!--desktop html-->
                        <div class="bonus-breakdown box">
                            <p class="bonus-text-1">1st Deposit - Match Bonus up to $800 • 2nd Deposit - Match Bonus up
                                to $500 • 3rd Deposit - Match Bonus up to $700 • New customers only • Min deposit $10 •
                                50x wagering &nbsp<a class="terms-breakdown terms-link tc">Terms apply</a></p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</section>


<!-- Game categories and game lists  -->


<!-- Games -->
<section class="games__wrapper">
    <?php echo $__env->make('frontend._new-style.part.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="game__list__wrapper">
        <div class="container games-wrap">
            <div class="grid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <div class="footer">
        <div class="col-1">
            <div class="games__footer__icons">
                <img src="<?php echo e(url('assets/_new-style/images/footer_icons_0.png')); ?>"/>
                <br/>
                <a target="_blank" href="#" style="display:inline-block;">
                    <img src="<?php echo e(url('assets/_new-style/images/footer_icons_1.png')); ?>"/>
                </a>
                <a target="_blank"
                   href="#"
                   style="display:inline-block;">
                    <img src="<?php echo e(url('assets/_new-style/images/footer_icons_2.png')); ?>"/>
                </a>


                <a target="_blank" href="#"
                   style="display:inline-block;">
                    <img src="<?php echo e(url('assets/_new-style/images/footer_icons_4.png')); ?>"/>
                </a>


                <a target="_blank" href="#" style="display:inline-block;">
                    <img src="<?php echo e(url('assets/_new-style/images/en18logo.png')); ?>"/>
                </a>


                <a target="_blank" href="#" style="display:inline-block;">
                    <img src="<?php echo e(url('assets/_new-style/images/gambleaware.png')); ?>"/>
                </a>
                <a target="_blank" href="#" style="display:inline-block;">
                    <img src="<?php echo e(url('assets/_new-style/images/microgaming.png')); ?>"/>
                </a>
                <img src="<?php echo e(url('assets/_new-style/images/footer_icons_5.png')); ?>"/>
                <img src="<?php echo e(url('assets/_new-style/images/footer_icons_6.png')); ?>"/>
                <img src="<?php echo e(url('assets/_new-style/images/footer_icons_7.png')); ?>"/>
                <img src="<?php echo e(url('assets/_new-style/images/footer_icons_8.png')); ?>"/>


            </div>

            <div class="games__footer__btns">
                <a class="games__button tc ">TERMS AND CONDITIONS</a>
                <a class="games__button lc">24/7 SUPPORT</a>
            </div>
            <p class="games__footer__terms">
                <a href="//freekassa.ru/"><img src="//www.free-kassa.ru/img/fk_btn/18.png" title="Приём оплаты на сайте картами"></a>
                The Casino cannot open accounts or process bets or financial transactions for individuals residing in
                Lower Saxony (Niedersachsen) state in Germany.<br> Bayton Ltd (C41970), is a Maltese registered company
                registered at Villa Seminia, 8, Sir Temi Zammit Avenue, Ta’ Xbiex XBX1011. Bayton Ltd is licensed under
                the Malta Gaming Authority, license number: MGA/B2C/145/2007 (issued 1st August 2018). <br/>
            </p>
        </div>
    </div>
    <!-- END Footer -- -->
</section>
<?php echo $__env->make('frontend._new-style.part.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend._new-style.part.lock-screen', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Preconnect CSS -->
<style>
    body.no-scroll {
        overflow: hidden;
    }

    .enable-form {
        opacity: 1 !important;
        z-index: 999 !important;
        transition: opacity .4s ease;
    }


    .frame__cont_log, .frame__cont_reg {
        transition: opacity .4s ease;
        z-index: -999;
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        padding-top: 50px;
        text-align: center;
        background: rgba(0, 0, 0, .75);
        background-repeat: repeat;
        opacity: 0;
    }

    .frame__inner_log, .frame__inner_reg {
        position: absolute;
        text-align: center;
        width: 100%;
        max-width: 680px;
        height: 100%;
        margin: 0 auto;
        left: 0;
        right: 0;
    }

    .reg-close {
        color: #773d4f;
        font-size: 47px;
        font-weight: 300;
        font-family: Arial, Helvetica, sans-serif;
        position: absolute;
        top: 2px;
        z-index: 9999;
        cursor: pointer;
        right: 50px;
    }

    .log-close {
        color: #773d4f;
        font-size: 47px;
        font-weight: 300;
        font-family: Arial, Helvetica, sans-serif;
        position: absolute;
        top: 3px;
        z-index: 9999;
        cursor: pointer;
        right: 176px;
    }

    .reg {
        width: 641px !important;
        height: 100% !important;
        margin: 0 auto;
    }

    .log {
        width: 408px !important;
        height: 100% !important;
        margin: 0 auto;
    }

    .close {
        color: #ffffff;
    }

    .sps-close {
        color: #156644;
    }

    .spc-close {
        color: #3f4a74;
    }

    .rfc-close {
        color: #773d4f;
    }

    .ccc-close {
        color: #7a334f;
    }
</style>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/jquery-1.7.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/jquery.corsproxy.1.0.0.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/perfect-scrollbar.jquery.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/zebra_datepicker.min.js')); ?>"></script>
<!-- Set CSRF token to each interaction -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
        }
    });
</script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/app.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/angular-lazy-img.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/_new-style/js/game-controller.js')); ?>"></script>
<script>
    //Initialise lp config object
    var config = new LPConfig();
    //First parameter is the hero offer position, you can type "left", "right" or "center". the two colours are the H1 and H2 offer elements.
    config.heroOptions('left', ["#fff", "#fff"]);
    //Category to show in the Featured tab by default
    config.gameOptions('top', true);
</script>
</body>
</html>
