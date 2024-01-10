<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" lang="{{ app()->getLocale() }}">
	<head>
		<title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="Dynamic Forms APP " />
		<meta name="keywords" content="Dynamic Forms APP" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Dynamic Forms APP" />
		<meta property="og:url" content="#" />
		<meta property="og:site_name" content="DynamicForms" />
		<link rel="canonical" href="google.com" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico')}}" />
		@yield('style')
		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>		
 
		<link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&family=Roboto:wght@500&display=swap" rel="stylesheet">
			<link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
			<link href="{{ asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
			<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
 
	</head>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				@include('layouts.aside._base') 
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					@include('layouts.header._base')
					@include('layouts.topbar._base') 
					@include('partials.alerts.message') 					 
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						@yield('content')
					</div>
					@include('layouts._footer') 
				</div>
			</div>
		</div>
		@include('layouts._scrolltop') 
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script> 
		@yield('scripts')
	</body>
</html>