<nav id="menu">
	<a class="close-button">Close</a>
	<div class="nav-wrapper">
		<p class="nav-label">Menu</p>
		<ul>
			@foreach ($page->navigation as $link)
			    <li class="active" role="presentation"><a href="{{ $link['url'] }}">{{ $link['title'] }}</a></li>
			@endforeach
		</ul>
	</div>
</nav>
