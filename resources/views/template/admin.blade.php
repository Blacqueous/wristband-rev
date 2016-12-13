<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="icon" href="{{ URL::asset('../../favicon.ico') }}">

		<title>Administrator @yield('title') Page</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

		<!-- Font Awesome core CSS -->
		<link href="{{ URL::asset('global/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">


		<!-- Page custom added css styles. -->
        @section('css')
        @show

	</head>

    <body>

		<h1 class="text-center">@yield('page_title')</h1>

        <div id="main">
            @section('content')
            @show
        </div>

		<script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ URL::asset('global/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- Page custom added javascripts. -->
        @section('js')
        @show

    </body>

</html>
