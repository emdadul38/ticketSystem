<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>
<body>
	<header>@include('layouts.header')</header>
	<div class="container">
		<div class="contains">@yield('content')</div>
	</div>
	<footer>@include('layouts.footer')</footer>
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>