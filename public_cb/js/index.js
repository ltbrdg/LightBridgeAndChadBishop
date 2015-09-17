/* Defalut Scripts */
$(function() {
	var $footerToggle,interval,interval2,$carouselItem;
		
	// sets most of the screen actions in motion
	singlePageScroller('section > div.block','body > .wrapper > section','site-links',false);
	// resize work & inspiration panels to start
	photoShowCase = new ShowCase($('#photo-panel'));
	createShowCase = new ShowCase($('#creative-panel'));
	// slide to panel
	$('#top-logo').click(function(){
		panelManager.navClick(null,0);
	});
	$('.next-block').click(function(){
		panelManager.nextClick();
		return false;
	});
	
	// resize to window
	$carouselItem = $('.item','#about-carousel');
	panelManager.$panels.eq(0).css('min-height',windowManager.height);
	panelManager.$panels.eq(1).css('min-height',windowManager.height);
	panelManager.$panels.eq(2).css('min-height',windowManager.height);
	$carouselItem.css('min-height',windowManager.height);
	
	windowManager.$window.on('resize',function(){
		panelManager.$panels.eq(0).css('min-height',windowManager.height);
		panelManager.$panels.eq(1).css('min-height',windowManager.height);
		panelManager.$panels.eq(2).css('min-height',windowManager.height);
		$carouselItem.css('min-height',windowManager.height);
	});
			
    // $('#about-carousel').carousel({
    	// interval: 4000
    // });
		
});
function processAction(event){
	var $target,itemClass,$details;
	$details = $('.details > li','#processSteps');
	$target = $(event.currentTarget).parent();
	itemClass = $target.attr('class');
	if(!$target.hasClass('active')){
		$target.siblings().removeClass('active');
		$target.addClass('active');
		$details.removeClass('active');
		$details.filter('.'+itemClass).addClass('active');
	}
}

