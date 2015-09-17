@extends('cb.layout')

{{-- @section('title', 'Page Title') --}}

@section('content')
	<section id="top">
		<div class="block block-welcome">
			<div class="text-swap">
				<h1>Welcome to a world of possibilities</h1>
				<h2>Let's inspire people together</h2>
			</div>
			<a href="" class="next-block"></a>
		</div>
	</section>
	<section id="about" data-panel-title="About Me">
		<div class="block block-about-1">
			<div class="block-wrapper">
				<div class="text-swap-top">
					<h3>Hi, I'm Chad</h3>
				</div>
				<p>I'm a Photographer, Creative Director, Artist, Father, and Husband.</p>
				<div class="text-swap-bottom">
					<h3>Socialize</h3>
				</div>
				<ul class="social">
				    <li>
	                    <a class="pintrest" href="http://www.pinterest.com/chadbishop">Pinterest</a>
	                </li>
	                <li>
	                    <a class="linkedin" href="http://www.linkedin.com/in/chadbishop">LinkedIn</a>
	                </li>
	                <li>
	                    <a class="twitter" href="https://twitter.com/chad_bishop">Twitter</a>
	                </li>
	                <li>
	                    <a class="facebook" href="https://www.facebook.com/1.chad.bishop">Facebook</a>
	                </li>
	                <li>
	                    <a class="vimeo" href="https://vimeo.com/chadbishop">Vimeo</a>
	                </li>
				</ul>
				<a href="" class="next-block"></a>
			</div>
		</div>
		<div class="block block-about-2">
			<div id="about-carousel" class="slide carousel" data-interval="4000">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#about-carousel" data-slide-to="0" class="active"></li>
				    <li data-target="#about-carousel" data-slide-to="1"></li>
				    <li data-target="#about-carousel" data-slide-to="2"></li>
				</ol>
				<!-- next -->
				<a href="" class="next-block"></a>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item item-1 active">
						<div class="block-wrapper">
							<div class="text-swap-top">
								<h3>Hopes and dreams</h3>
							</div>
							<p>Creativity has the power to inspire, to provoke thought and emotion, to educate, and to incite action. Let's use that power to transform lives, to give hope, to improve communities, </p>
							<div class="text-swap-bottom">
								<p>to change the world. Chad Bishop</p>
							</div>
						</div>
					</div>
					<div class="item item-2">
						<div class="block-wrapper">
							<div class="text-swap-top">
								<h3>Sense of adventure</h3>
							</div>
							<p>Creativity has the power to inspire, to provoke thought and emotion, to educate, and to incite action. Let's use that power to transform lives, to give hope, to improve communities, </p>
							<div class="text-swap-bottom">
								<p>to change the world.</p>
							</div>
						</div>
					</div>
					<div class="item item-3">
						<div class="block-wrapper">
							<div class="text-swap">
								<p>my greatest creation, enough said</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Carousel nav -->
				<a class="carousel-control left" href="#about-carousel" data-slide="prev"><span class="carousel-control-arrow arrow-left"></span></a>
				<a class="carousel-control right" href="#about-carousel" data-slide="next"><span class="carousel-control-arrow arrow-right"></span></a>
			</div>
		</div>
	</section>
	<section id="photography" data-panel-title="Photography">
		<div id="photo-panel" class="block block-photo">
			<div class="text-swap">
				<h2>Hand-Made</h2>
				<h3>Photographs</h3>
			</div>
			<div class="showcase">
				<ul class="filter">
					<li class="active">All</li>
					<li>World</li>
					<li>Lifestyle</li>
					<li>Philanthropy</li>
					<li>Portrait</li>
					<li>Commercial</li>
				</ul>
				<div class="showcase-expand">
					<div class="close">&times;</div>
					<div class="showcase-expand-wrapper"></div>
				</div>
				<div class="showcase-items">
					
				</div>
				<div class="view-more">
					<span>View More</span>
				</div>
			</div>
		</div>
	</section>
	<section id="creative" data-panel-title="Creative Direction">
		<div id="creative-panel" class="block block-creative">
			<div class="text-swap">
				<h2 class="">Creative</h2>
				<h3>Direction</h3>
			</div>
			<p class="large">Strategy, concepts, process, talent, budgets, deadlines.</p>
			<p>As a Creative Director, I am a professional problem solver. I get to know your brand, your goals, your audience, and your budget and provide the best solution for your unique situation.</p>
			<div class="showcase">
				<ul class="filter">
					<li class="active">All</li>
					<li>Interactive</li>
					<li>Illustration</li>
					<li>Video</li>
					<li>Print</li>
					<li>Environmental</li>
					<li>Brand</li>
				</ul>
				<div class="showcase-expand">
					<div class="close">&times;</div>
					<div class="showcase-expand-wrapper"></div>
				</div>
				<div class="showcase-items">
					
				</div>
				<div class="view-more">
					<span>View More</span>
				</div>
			</div>
		</div>
	</section>
@endsection