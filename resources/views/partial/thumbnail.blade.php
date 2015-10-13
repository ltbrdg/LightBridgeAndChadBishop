<div data-index="{{ $key or 0 }}" data-file="/quick-pages/{{ $slug }}" class="item @yield('thumbnail.size') @yield('categories')">
	<img src="/image/@yield('thumbnail.size')/@yield('thumbnail.name')" alt=""/>
	<div class="cover"></div>
</div>