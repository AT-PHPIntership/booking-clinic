<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/findoctor/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Aug 2018 16:33:28 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="{{ __('user/layout.navbar.slogan') }}">
	<meta name="author" content="Ansonika">
	<title>{{ __('user/layout.app.title') }} - {{ __('user/layout.app.slogan') }}</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="{{ asset('images/user/favicon.ico') }}" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('images/user/apple-touch-icon-57x57-precomposed.png') }}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('images/user/apple-touch-icon-72x72-precomposed.png') }}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('images/user/apple-touch-icon-114x114-precomposed.png') }}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('images/user/apple-touch-icon-144x144-precomposed.png') }}">

	<!-- BASE CSS -->
	<link href="{{ asset('css/user/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/user/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/user/menu.css') }}" rel="stylesheet">
	<link href="{{ asset('css/user/vendors.css') }}" rel="stylesheet">
	<link href="{{ asset('css/user/icon_fonts/css/all_icons_min.css') }}" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<link href="{{ asset('css/user/custom.css') }}" rel="stylesheet">
	
</head>

<body>
	
	<div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div>
	<!-- /Preload-->
	
	<div id="page">		
    @include('user.layouts.partials.navbar')
    
    	<main>
            @yield('content')
	</main>

	<!-- /main content -->
	
    @include('user.layouts.partials.footer')
	</div>
	<!-- page -->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="{{ asset('js/user/jquery-2.2.4.min.js') }}"></script>
	<script src="{{ asset('js/user/common_scripts.min.js') }}"></script>
	<script src="{{ asset('js/user/functions.js') }}"></script>
    @yield('additional_js')
</body>

</html>
