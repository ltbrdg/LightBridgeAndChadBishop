<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<title>
		@if (@$title)
			{{ $title }} - Chad Bishop
		@else
			Chad Bishop
		@endif
		</title>
		<meta charset="utf-8" /> 
		<meta name="description" content="{{ $desc or 'Chad Bishop - Photographer / Creative Director - Welcome to a World of Possibilities.' }}" />
		<meta name="viewport" content="{{ $viewport or 'width=1000, initial-scale=1.0' }}" />
		<link href="/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
		<script type="text/javascript" src="/js/lib/modernizr-2.6.2.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		@if (isset($share_thumb))
		<meta property="og:image" content="http:{{$share_thumb}}" />
		@endif
		<meta property="og:title" content="@yield('title', 'Chad Bishop')" />
		<meta property="og:description" content="{{ $desc or 'Chad Bishop - Photographer / Creative Director - Welcome to a World of Possibilities.' }}"/>
	</head>
	<body>   
		<!-- GA TRACKING -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');  
		  ga('create', 'UA-48092746-1', '{{ $_SERVER['HTTP_HOST'] }}');
		  ga('send', 'pageview');
		</script>
		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>crusty old outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<div class="wrapper {{ @$current_page }}">
			@include('cb.partial.header')
			@yield('content')
		</div>
		@include('cb.partial.footer')
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/{{ $js_data['jquery'] or '2.0.3' }}/jquery.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write('<script src="/js/lib/jquery/jquery-{{ $js_data['jquery'] or '2.0.3' }}.min.js" type="text/javascript"><\/script>');
		</script> 
		<!-- Google Maps  -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwOjswuSwS8wm0mXarlZI5z3l8Pk9085Y&amp;sensor=false" type="text/javascript" charset="utf-8"></script>
		<!-- Bootstrap Scripts -->
		<script src="/js/lib/bootstrap/carousel.js" type="text/javascript" charset="utf-8"></script>
		<script src="/js/lib/bootstrap/transition.js" type="text/javascript" charset="utf-8"></script>
		<script src="/js/lib/bootstrap/alert.js" type="text/javascript" charset="utf-8"></script>
		<!-- Images Loaded -->
		<script src="/js/lib/imagesloaded/imagesloaded.js" type="text/javascript" charset="utf-8"></script>
		<script src="/js/default.js" type="text/javascript" charset="utf-8"></script>
		@yield('scripts')

		<!-- <script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script> -->
	</body>
</html>