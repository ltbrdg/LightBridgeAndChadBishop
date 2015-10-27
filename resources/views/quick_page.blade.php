<h2>@yield('title')</h2>
<hr>
<div class="inner-block">
@yield('page-content')
</div>
<div class="share">
	<hr />
	<h4>Share Me!</h4>
	<a target="_blank" class="pintrest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2F{{ $_SERVER['HTTP_HOST'] }}/pages/{{ $uri }}&amp;media=http%3A%2F%2F{{ $_SERVER['HTTP_HOST'] }}%2Fimage%2Fsmall%2F@yield('thumbnail.name')&amp;description=@yield('title')">Pinterest</a>
	<a target="_blank" class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2F{{ $_SERVER['HTTP_HOST'] }}/pages/{{ $uri }}&amp;title=@yield('title')">LinkedIn</a>
	<a target="_blank" class="twitter" href="https://twitter.com/share?url=http%3A%2F%2F{{ $_SERVER['HTTP_HOST'] }}/pages/{{ $uri }}">Twitter</a>
	<a target="_blank" class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F{{ $_SERVER['HTTP_HOST'] }}/pages/{{ $uri }}">Facebook</a>
</div>

