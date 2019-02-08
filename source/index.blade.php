@extends('_layouts.master')

@section('body')
<header id="blog-header">
	<div class="inner">
		<nav id="navigation">
			@isset($page->logo)
			<span class="blog-logo">
				<a href="{{ $page->getBaseUrl() }}"><img src="{{ $page->logo }}" alt="Blog logo" /></a>
			</span>
			@endif
			@if(! empty($page->navigation))
			<span id="menu-button" class="nav-button">
				<a class="menu-button"><i class="ic ic-menu"></i> Menu</a>
			</span>
			@endif
		</nav>
		<h1 class="blog-name"><a href="{{ $page->getBaseUrl() }}">{{ $page->siteName }}</a></h1>
		@isset($page->siteDescription)
		<span class="blog-description">{{ $page->siteDescription }}</span>
		@endif
	</div>
</header>

<div id="index" class="container">

	<main class="content" role="main">

@foreach($posts as $post)

<article class="post">
	<div class="inner">
		<header class="post-header">
			<h2 class="post-title"><a href="{{ $post->getBaseUrl().'/journal/'.$post->date }}">{{{ $post->title }}}</a></h2>
			<span class="post-meta">{{ $post->author }} | <time datetime="{{ $post->getDate()->format('Y-M-D') }}">{{ $post->getDate()->diffForHumans() }}</time></span>
			<div class="clear"></div>
		</header>

		<section class="post-excerpt">
			<p>{{ $post->getExcerpt() }}</p>
		</section>
	</div>
</article>

@endforeach
	</main>

</div>
@endsection