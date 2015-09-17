/*
 ---------------------------------------------------------------
  SINGLE PAGE SCROLLER - ERM - Light Bridge
 ---------------------------------------------------------------
 Use on single page scrolling micro sites:
    * Resizes panels to fit screen (screen height), and sets listeners to update and call functions if resized
    * Define nav or have it build one for you, pass navID as argument, if non exists it will create and add to DOM.
      Use attribute data-panel-title to set panel title in nav.
      ex: <section data-panel-title="My Title Here">Section panel content</section> 
    * Originally built for /tech page, modified to be generic enough to use in other locations. Removed nav centering and hiding functions
    * Disabled scrollIE method from WindowManager, was a bug in /tech and seems to be fixed in newer documents

 Adds objects to global document:
    * windowManager - controls doc window functions, sets listeners for resize and scroll events
    * panelMangaer - controls panel functions
    * 
 */ 

var windowManager,panelManager;

function singlePageScroller(selector,groups,navID,resize){
	//init function
    resize = (typeof(resize)==='undefined')? false : resize;
	windowManager = new WindowManager();
	panelManager = new PanelManager(selector,groups,navID,resize);
	
	if(resize){
	    panelManager.resize();
	}
	
	panelManager.setActive();
}
/*
 ---------------------------------------------------------------
  WindowManager Class
 ---------------------------------------------------------------
*/
function WindowManager(){
    this.$window = $(window);
    this.$html = $('html');
    this.$body = $('body');
    this.width = this.$window.width();
    this.height = this.$window.height();
    this.scrollTop = this.$window.scrollTop();
    // listener actions on window changes
    this.$window.resize(this, this.resize);
	this.$window.scroll(this, this.scroll);
}
WindowManager.prototype.resize = function(event){// attached to window resize event
    var $window = event.data.$window;
    event.data.width = $window.width();
    event.data.height = $window.height();
};
WindowManager.prototype.scroll = function(event){// attached to window scroll event
    var $window = event.data.$window;
    event.data.scrollTop = $window.scrollTop();
};

/*
 ---------------------------------------------------------------
  PanelManager Class
 ---------------------------------------------------------------
*/
function PanelManager(selector,groups,navID,resize){
	var panelLength;
	this.$panels = $(selector);
	this.$panelGroups = $(groups);
	this.navObj = this.buildNav(navID);
	this.panelIndex = undefined;
	    
	// listener actions on window changes
	if(resize){
	   windowManager.$window.resize(this,this.resize);
    }
    
    windowManager.$window.scroll(this,this.setActive);
    
    // if(windowManager.$html.hasClass('lt-ie9')){
        // // add class after init so IE8 sets the background image size
        // this.$panels.addClass('lt-ie9');
    // }
}
PanelManager.prototype.resize = function(event){// attached to window resize event, called in init
	var data;
	data = (event === undefined)? this : event.data;
	data.$panels.each(function(index){
		var $this, panelResize;
		$this = $(this);
		panelResize = $this.attr('data-panel-resize'); // use data attribute to change height
		if(!isNaN(panelResize)){
			$this.css('min-height', windowManager.height + parseInt(panelResize));
		}else{
			$this.css('min-height', windowManager.height);
		}
	});
};
PanelManager.prototype.navClick = function(event, index){ // click event for panel nav
	var $this, clickIndex , offsetTop;
	if(event){
		$this = $(event.currentTarget);
		clickIndex = event.data.navObj.$nav.index($this) + 1;
	}else if(typeof index === 'number'){
		clickIndex = index;
	}
	//offsetTop = panelManager.$panels.eq(clickIndex).position().top;
	offsetTop = panelManager.$panelGroups.eq(clickIndex).position().top;
	// animate to panel
	$('html, body').stop().animate({
		scrollTop : offsetTop
	}, 700);
	return false;
};
PanelManager.prototype.nextClick = function(){ // click event for panel nav
	var panelIndex, offset, panelLength, count, panelPos;
	offset = 150; // change the nav item a few pixels before seam
	panelLength = this.$panels.length;
	count=0;
	panelPos = [];
	
	//find positions of sections - a little over kill but only way it would work.
    for(var x=0;x<panelLength;x++){
        panelPos[x] = this.$panels.eq(x).position().top;
    }

	while(isNaN(panelIndex)){
        if(count === panelLength || windowManager.scrollTop + offset < panelPos[count]){
            panelIndex = count;
        }
        count++;
    }
	
	//console.log(panelIndex);
	// offsetTop = panelManager.$panels.eq(clickIndex).position().top;
	// // animate to panel
	$('html, body').stop().animate({
		scrollTop : panelPos[panelIndex]
	}, 700);
	return false;
};
PanelManager.prototype.setActive = function(event){ // sets the active item in panel nav while scrolling
	var panelIndex, data, offset, panelLength, count, panelPos;
	offset = 150; // change the nav item a few pixels before seam
	data = (event === undefined)? this : event.data;
	//panelLength = data.$panels.length;
	panelLength = data.$panelGroups.length;
	count=0;
	panelPos = [];
	
	//find positions of sections - a little over kill but only way it would work.
    for(var x=0;x<panelLength;x++){
        //panelPos[x] = data.$panels.eq(x).position().top;
        panelPos[x] = data.$panelGroups.eq(x).position().top;
    }

	while(isNaN(panelIndex)){
        if(count === panelLength || windowManager.scrollTop + offset < panelPos[count]){
            panelIndex = count-2;
        }
        count++;
    }
	
	// check if panel has changed
    if(panelIndex !== (data.panelIndex || -1)){
        data.panelIndex = panelIndex;
        data.navObj.$nav.parent('li').removeClass('active');
        data.navObj.$nav.eq(panelIndex).parent('li').addClass('active');
        // Show Header
        $('#site-header').addClass('active');
        // move slider
        data.navObj.$navWrapper
        	.removeClass('active1')
        	.removeClass('active2')
        	.removeClass('active3')
        	.removeClass('active4')
        	.removeClass('active5')
        	.removeClass('active6')
        	.addClass('active'+data.panelIndex);
        
    }else if(panelIndex === -1){
    	data.navObj.$nav.parent('li').removeClass('active');
    	$('#site-header').removeClass('active');
    }

};

PanelManager.prototype.buildNav = function(navID){// builds navigation from panels, returns nav elements in object
	var $navItems, templateString, $navWrapper, $navLinks, navWidth;
	
	if($('#'+navID).length === 0){
	    // Get title for nav from attribute
    	$navItems = $('[data-panel-title]');
    	templateString = '<div id="'+navID+'" class="panel-nav"><ul>';
    	// build template array
    	for(var i=0; i<$navItems.length; i++){
    		var $this;
    		$this = $navItems.eq(i);
    		templateString += '<li><a href="#'+$this.attr('id')+'">'+$this.attr('data-panel-title')+'</a></li>';
    	}
    	templateString += '</ul></div>';
    	// add to dom
    	windowManager.$body.append(templateString);
    }

	// select new nav item
	$navWrapper = $('#'+navID);
	// bind click event
	$navLinks = $navWrapper.find('a');
	$navLinks.click(this, this.navClick);
	// return value
	return {$panels:$navItems,$nav:$navLinks,$navWrapper:$navWrapper};
};
