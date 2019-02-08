@extends('_layouts.master')

@section('body-class', 'post-template')

@section('body')

<div class="progress-container">
	<span class="progress-bar"></span>
</div>

<header id="post-header"@if($page->cover_image) class="has-cover" @endif>
	<div class="inner">
		<nav id="navigation">
			@isset($blog->logo)
			<span class="blog-logo">
				<a href="{{ $page->getBaseUrl() }}"><img src="{{ $page->logo }}" alt="Blog logo" /></a>
			</span>
			@else
			<span id="home-button" class="nav-button">
				<a class="home-button" href="{{ $page->getBaseUrl() }}" title="Home"><i class="fas fa-home"></i> Home</a>
			</span>
			@endif
			@if(! empty($page->navigation))
			<span id="menu-button" class="nav-button">
				<a class="menu-button"><i class="fas fa-home"></i> Menu</a>
			</span>
			@endif
		</nav>
		<h1 class="post-title">{{ $page->title }}</h1>
		<span class="post-meta">{{ $page->author }} | <time datetime="{{ $page->getDate()->format('Y-M-D') }}">{{ $page->getDate()->format('l jS \\of F Y') }}</time></span>
		@if($page->cover_image) <div class="post-cover cover" style="background-image: url('{{ $page->cover_image }}');"></div>@endif
	</div>
</header>

<main class="content" role="main">
	<article class="post">
		<div class="inner">
			<section class="post-content">
				@yield('content')
			</section>

			<section class="post-info">

				<div class="post-share">
					<a class="twitter" href="https://twitter.com/share?text={{ $page->title }}&url={{ $page->getUrl() }}" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
						<i class="fab fa-twitter"></i><span class="hidden">Twitter</span>
					</a>
					<a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ $page->getUrl() }}" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
						<i class="fab fa-facebook"></i></i><span class="hidden">Facebook</span>
					</a>
					<div class="clear"></div>
				</div>

				<div class="clear"></div>

						<aside class="post-author">
							<figure class="post-author-avatar avatar">
								<img src="https://avatars.io/twitter/m1guelpf" alt="Miguel Piedrafita" />
							</figure>
							<div class="post-author-bio">
								<h4 class="post-author-name"><a href="https://miguelpiedrafita.com">Miguel Piedrafita</a></h4>
								<span class="post-author-website"><i class="fa fa-link"></i> <a href="https://miguelpiedrafita.com">Website</a></span>
								<span class="post-author-twitter"><i class="fab fa-twitter"></i> <a target="_blank" href="https://twitter.com/m1guelpf">Twitter</a></span>
							</div>
							<div class="clear"></div>
						</aside>
			</section>


			{{-- <section class="post-comments">
				<a id="show-disqus" class="post-comments-activate">{{t "Show Comments"}}</a>
			    <div id="disqus_thread"></div>
			</section> --}}

			<aside class="post-nav">
				@if($next = $page->getNext())
					<a class="post-nav-next" href="{{ $next->getUrl() }}">
						<section class="post-nav-teaser">
							<i class="ic ic-arrow-left"></i>
							<h2 class="post-nav-title">{{ $next->title }}</h2>
							<p class="post-nav-excerpt">{{ $next->getExcerpt() }}</p>
						</section>
					</a>
				@endif
				@if($prev = $page->getPrevious())
					<a class="post-nav-prev" href="{{ $prev->getUrl() }}">
						<section class="post-nav-teaser">
							<i class="ic ic-arrow-right"></i>
							<h2 class="post-nav-title">{{ $prev->title }}</h2>
							<p class="post-nav-excerpt">{{ $prev->getExcerpt() }}</p>
						</section>
					</a>
				@endif
				<div class="clear"></div>
			</aside>


		</div>
	</article>
</main>

@endsection
