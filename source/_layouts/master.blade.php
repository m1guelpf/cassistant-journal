<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="{{ $page->meta_description ?? $page->siteDescription }}">

	<meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{{ $page->getUrl() }}"/>
	<meta property="og:description" content="{{ $page->siteDescription }}" />

	<title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

	<link rel="home" href="{{ $page->baseUrl }}">
	<link rel="icon" href="/favicon.ico">
	<link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	@stack('meta')

	@if ($page->production)
		<!-- Insert analytics code here -->
	@endif

	<link rel="stylesheet" href="{{ mix('css/style.css', 'assets/build') }}">
</head>

<body class="@yield('body-class')">

	@include('_nav.ghost')

	<section id="wrapper">
		<a class="hidden-close"></a>
			@yield('body')
		<div id="body-class" style="display: none;" class="@yield('body-class')"></div>

		<footer id="footer">
			<div class="inner">
				<section class="credits">
					<span class="credits-theme">Created by <a href="https://miguelpiedrafita.com">Miguel Piedrafita</a></span>
					<span class="credits-software">&copy; {{ date('Y') }} <a href="https://cassistant.co">Cassistant</a></span>
				</section>
			</div>
		</footer>
	</section>

	<script src="{{ mix('js/index.js', 'assets/build') }}"></script>

	@stack('scripts')
</body>
</html>
