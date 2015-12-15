<!DOCTYPE html>
<html>
<head>
	<title>
	        @yield('title','Mills Multimedia Time Tracking')
	</title>

	<meta charset='utf-8'>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
	<link rel='stylesheet' href='/css/styles.css'>

	{{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
	    @yield('head')

</head>

<body>

	<header>
		<div class="col-xs-6">
	    	<h4 class="no-margin"><img src="/img/logo.png"/> Time Tracking</h4>
	    </div>
    	<div class="col-xs-6">
	    	@yield('header')
	    </div>
	    <div class="clearfix"></div>
    </header>

	@if(\Session::has('flash_message'))
        <div class='flash_message'>
            {{ \Session::get('flash_message') }}
        </div>
    @endif

	<section class='container'>
	        {{-- Main page content will be yielded here --}}
	        @yield('content')

	</section>


	<!-- LOAD SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
	<script src="/js/scripts.js"></script>
	{{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
	    @yield('scripts')
</body>
</html> 