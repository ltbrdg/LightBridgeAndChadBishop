function ShowCase($wrapper){
	this.$wrapper = $wrapper;
	this.$showcase = $wrapper.find('.showcase');
	this.$filter = $wrapper.find('.filter');
	this.$items = $wrapper.find('.showcase-items');
	this.$viewMore = $wrapper.find('.view-more');
	this.$feature = $wrapper.find('.showcase-expand');
	this.$close = this.$feature.find('.close');
	this.$listItems = null;
	this.filters = {};
	this.height = null;
	
	this.positionClose = function(event){
		var height;
		if(event.data.$feature.hasClass('active')){
			height = event.data.$feature.position().top + event.data.$wrapper.position().top;
			if(height < windowManager.scrollTop){
				event.data.$close.css('top',windowManager.scrollTop - height + 40);
				event.data.$close.addClass('lock');
			}else{
				event.data.$close.css('top',40);
				event.data.$close.removeClass('lock');
			}
		}
	};
	this.template = function(){
	  	this.$items.isotope({
	  		itemSelector: '.item',
		  	masonry: {
		  		columnWidth: 216
		  	}
		});
		this.$items.addClass('active');
	};
	this.filterClick = function(event){
		var type,$target;
		$target = $(event.currentTarget);
		type = event.currentTarget.textContent.toLowerCase();
		if(type === 'all'){
			event.data.$items.isotope({filter:'*'});
		}else{
			event.data.$items.isotope({filter:'.'+type});
		}
		event.data.$filter.find('li').removeClass('active');
		$target.addClass('active');
		
		if(event.data.$feature.hasClass('active')){
			event.data.closeClick();
		}
		
		event.data.$viewMore.trigger('click',true);
	};
	this.buildFilter = function(){
		var $filterItems,length,x;
		$filterItems = this.$filter.find('li');
		length = $filterItems.length;
		this.filters.strings = [];
		// pull string from filter list and store in array
		for(x=0;x < length;x++){
			var current = $filterItems.eq(x).html().toLowerCase();
			this.filters.strings.push(current);
		}
		// loop thru items to create filter groups
		length = this.filters.strings.length;	
		for(x=0;x<length;x++){
			if(this.filters.strings[x] !== 'all'){
				this.filters[this.filters.strings[x]] = this.$items.find('.'+this.filters.strings[x]);
			}
		}
		// init click
		$filterItems.click(this,this.filterClick);
	};
	this.closeClick = function(event){
		var empty,thiz;
		if(event){
			thiz = event.data;
		}else{
			thiz = this;
		}
		empty = function(){
			thiz.$feature.find('.showcase-expand-wrapper').empty();
		};
		thiz.$listItems.removeClass('active');
		thiz.$feature.css('height',0).removeClass('active');
		thiz.$wrapper.removeClass('expand');
		setTimeout(empty,800);
	};
	this.expandClick = function(event){
		var $target,index,itemData, template, timeout, $featureWrapper,offsetTop;
		$target = $(event.currentTarget);
		index = $target.attr('data-index');
		itemData = $target.attr('data-file');
		$featureWrapper = event.data.$feature.find('.showcase-expand-wrapper');
		getNew = function(){
			// add loading class for preloader
			$target.addClass('loading');
			// get the external html file
			$.get(itemData,popNew);
		};
		popNew = function(data){
			// find top
			offsetTop = event.data.$wrapper.position().top + event.data.$wrapper.find('ul.filter').position().top - 55; // remove 45 pixels for the header
			// animate to panel
			$('html, body').stop().animate({
				scrollTop : offsetTop
			}, 700);
			event.data.$feature.css('height',0).removeClass('active');
			// close panel
			event.data.$wrapper.removeClass('expand');
			// remove old
			$featureWrapper.empty();
			// populate template
			$featureWrapper.append(data);
			// reset x
			event.data.$close.css('top',40);
			event.data.$close.removeClass('lock');
			// set preloader
			event.data.$filter.addClass('loading');
			// get height;
			imagesLoaded($featureWrapper,showNew);
		};
		showNew = function(){
			var height,$lightbox;
			height = $featureWrapper.outerHeight();
			
			// expand feature area
			event.data.$feature.css('height',height + 84).addClass('active');			
			// expand panel
			event.data.$wrapper.addClass('expand');
			// set click event
			event.data.$feature.find('div.close').click(event.data,event.data.closeClick);
			// remove the loading class - done here
			$target.removeClass('loading');
			event.data.$filter.removeClass('loading');
			// lightbox?
			$lightbox = $featureWrapper.find('img[data-lightbox]');
			if($lightbox.length > 0){
				$lightbox.click($lightbox.attr('src'),lightBox);
			}
			// set sharing urls
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
		};
		
		if($target.hasClass('active')){
			event.data.closeClick();
		}else{
			// set active
			event.data.$listItems.removeClass('active');
			$target.addClass('active');
			// expand list area
			event.data.$viewMore.trigger('click',true);
			// expand area
			getNew();
		}
	};
	this.expandList = function(event,open){
		var $child,$target,height;
		
		$target = $(event.currentTarget);
		$child = $target.find('span');
		
		height = Math.round( event.data.$showcase.outerHeight() + event.data.$showcase.position().top + 130 );
		
		openWrapper = function(){
			event.data.$wrapper.addClass('active');
			$target.addClass('active');
			$child.html('Hide');
		};
		
		closeWrapper = function(){
			$target.removeClass('active');
			$child.html('View More');
			
		};
		
		if(!open){
			if(event.data.$wrapper.hasClass('active')){
				if(event.data.$feature.hasClass('active')){
					event.data.closeClick();
				}
				event.data.$wrapper.height(height);
				event.data.$wrapper.removeClass('active');
				event.data.$wrapper.animate({
					height:windowManager.height+'px'
				},{
					duration:500,
					complete:closeWrapper
				});
			}else{
				event.data.$wrapper.animate({
					height:height+'px'
				},{
					duration:500,
					complete:openWrapper
				});
			}
		}else{
			if(!event.data.$wrapper.hasClass('active')){			
				event.data.$wrapper.animate({
					height:height+'px'
				},{
					duration:500,
					complete:openWrapper
				});
			}
		}
	};
	this.init = function(){
		var temp = this;
		// init template
		this.template();
		// build filter array
		this.buildFilter();
		
		this.$wrapper.css('height',windowManager.height);
		windowManager.$window.on('resize',function(){
			temp.$wrapper.css('height',windowManager.height);
		});
		// expand list button
		this.$viewMore.click(this,this.expandList);
		// item click
		this.$listItems = this.$items.find('div.item');
		this.$listItems.click(this,this.expandClick);
		//
		windowManager.$window.scroll(this,this.positionClose);
	};
	
	this.init();
}