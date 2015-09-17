<div data-index="{{ $key or 0 }}" data-file="/quick_pages/{{ $slug }}" class="item @yield('thumbnail.size') @yield('categories')" style="height:@yield('thumbnail.height')px">
	<img src="/image/@yield('thumbnail.size')/@yield('thumbnail.name')" width="@yield('thumbnail.height')" height="@yield('thumbnail.height')" alt=""/>
	<div class="cover"></div>
</div>