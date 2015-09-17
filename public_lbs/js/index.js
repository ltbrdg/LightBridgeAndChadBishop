/* Defalut Scripts */
$(function() {
	var panelOneSlider,panelTwoSlider,$footerToggle,interval,interval2;

	
	// sets most of the screen actions in motion
	singlePageScroller('section > div.block','body > .wrapper > section','site-links',false);
	// resize work & inspiration panels to start
	workShowCase = new ShowCase($('#work-panel'));
	inspShowCase = new ShowCase($('#inspiration-panel'));
	// slide to panel
	$('#top-logo,#top-panel').click(function(){
		panelManager.navClick(null,0);
	});
	$('#next-panel').click(function(){
		panelManager.nextClick();
	});
	// resize first panel to fit the window
	panelManager.$panels.eq(0).css('min-height',windowManager.height);
	windowManager.$window.on('resize',function(){
		panelManager.$panels.eq(0).css('min-height',windowManager.height);
	});
	// home panel - text slider
	panelOneSlider = new TextSlider('#name','set1');
	panelTwoSlider = new TextSlider('#hand','set2');
	
	// process area
	$('.labels > li > .hit','#processSteps').click(processAction);
	
    $('#contact-carousel').carousel({
    	interval: 4000
    });
    
	interval = setInterval(function(){autoSlide('#name');},2000);
	interval2 = setInterval(function(){autoSlide('#hand');},2000);
    
    $('#name').hover(
    	function(){
    		clearInterval(interval);
    	},
    	function(){
    		interval = setInterval(function(){autoSlide('#name');},2000);
    	}
    );
    $('.word-swap, .arrow-up, .arrow-down','#hand').hover(
    	function(){
    		clearInterval(interval2);
    	},
    	function(){
    		interval2 = setInterval(function(){autoSlide('#hand');},2000);
    	}
    );
		
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
function autoSlide(ID){
	$('.arrow-up',ID).trigger('click');
}
