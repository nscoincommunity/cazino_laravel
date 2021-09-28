<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') - {{ settings('app_name') }}</title>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/img/icons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ url('assets/img/icons/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-16x16.png') }}" sizes="16x16" />
    <meta name="application-name" content="{{ settings('app_name') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/mstile-144x144.png') }}" />

	<link media="all" type="text/css" rel="stylesheet" href="/assets/css/chosen.css">
	<link media="all" type="text/css" rel="stylesheet" href="/assets/css/daterangepicker.css">
    <link media="all" type="text/css" rel="stylesheet" href="{{ url(mix('assets/css/vendor.css')) }}">	
    <link media="all" type="text/css" rel="stylesheet" href="{{ url(mix('assets/css/app.css')) }}">
	
	<script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>

    @yield('styles')
</head>
<body>
    @include('backend.partials.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('backend.partials.sidebar')

            <div class="content-page">
                <main role="main" class="px-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
	
    <script src="{{ url(mix('assets/js/vendor.js')) }}"></script>
	<script src="/assets/js/chosen.jquery.js"></script>
	<script src="/assets/js/daterangepicker.js"></script>
	
    <script src="{{ url('assets/js/as/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
