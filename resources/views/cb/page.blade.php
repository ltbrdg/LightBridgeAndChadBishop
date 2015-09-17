@extends('cb.layout')
@section('content')
<section id="share" class="container share-page">
    <div class="showcase-single">
        @yield('page-content')
        @include('partial.social')
    </div>
</section>
@endsection
