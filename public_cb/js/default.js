$(function() {
	// google map
	initializeMap();
	// footer toggle
	$('#toggleMap').click('.contact-panel',toggleFooter);
	$('#toggleLegal').click('.legal-panel',toggleFooter);
    $('.share > a').click(function(){
        var $this, width, height;
        $this = $(this);
        width = 700;
        height = 300;
        
        switch($this.attr('class')){
            case 'pintrest':
            
            break;
            case 'linkedin':
                width = 500;
                height = 500;
            break;
            case 'twitter':
                width = 500;
                height = 500;
            break;
            case 'facebook':
            
            break;
        }
        window.open(this.href,'_blank', 'width='+width+', height='+height );
        return false;
    });
});


function initializeMap(){
	var mapOptions, map, marker;
	mapOptions = {
		center : new google.maps.LatLng(32.839954, -117.272338),
		zoom : 15,
		mapTypeId : google.maps.MapTypeId.ROADMAP,
		zoomControl : false,
		mapTypeControl : false,
		scaleControl : false,
		streetViewControl : false,
		panControl: false
	};
	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	marker = new google.maps.Marker({
		position : mapOptions.center,
		map : map,
	});
}
function toggleFooter(event){
	var $target,$toggleTarget,$footerToggle;
	$target = $(event.currentTarget);
	$footerToggle = $('#footerToggleWrapper');
	$toggleTarget = $footerToggle.find(event.data);
	var removeClass = function(){
		$toggleTarget.removeClass('active');
	};
	var showPanel = function(){
		$toggleTarget.siblings().removeClass('active');
		$target.addClass('active');
		$toggleTarget.addClass('active');
		$('html, body').stop().animate({
	        scrollTop: $(document).height() - $(window).height()
	    },{
	        duration:400, 
	    });
	};
	
	if($target.hasClass('active')){
		$target.removeClass('active');
		$('html, body').stop().animate({
        	scrollTop: $(document).height() - $(window).height() - $toggleTarget.height()
	    	},{
	        duration:400, 
	        complete: removeClass
	    });
	}else{
		if($footerToggle.find('.panel').hasClass('active')){
			$target.siblings().removeClass('active');
			$('html, body').stop().animate({
	        	scrollTop: $(document).height() - $(window).height() - $footerToggle.find('.panel.active').height()
		    	},{
		        duration:400, 
		        complete: showPanel
		    });
		}else{
			showPanel();
		}
	}
	return false;
}
lightBox = function(event){
	var template,imgPath,$lightbox;
	imgPath = event.data;
	template = '<div class="lightbox lightbox-wrapper">';
	template += '<div class="lightbox-cover" style="background-image:url('+imgPath+')">';
	template += '</div></div>';
	$('body').append(template);
	$lightbox = $('body > .lightbox');
	setTimeout(function(){
		$lightbox.addClass('active');
	},10);
	$lightbox.click(function(){
		var $this;
		$this = $(this);
		$this.removeClass('active');
		setTimeout(function(){
			$this.remove();
		},900);
	});
};