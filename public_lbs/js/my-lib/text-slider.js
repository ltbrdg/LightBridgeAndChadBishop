function TextSlider(wrapperElement,className){
	this.$element = $(wrapperElement);
	this.$upArrow = this.$element.find('.arrow-up');
	this.$downArrow = this.$element.find('.arrow-down');
	this.$list = this.$element.find('ul');
	this.length = this.$list.find('li').length;
	this.current = 1;
	this.className = className;
	
	this.$list.append(this.$list.find('li:first-child')[0].outerHTML);

	this.$upArrow.click(this, function(event){
		event.data.current = event.data.current + 1;
		event.data.$list.attr('class','');
		event.data.$list.addClass(event.data.className+'-up-'+event.data.current);
		if(event.data.current > event.data.length){
			event.data.current = 1;
		}
		return false;
	});
	this.$downArrow.click(this, function(event){
		if(event.data.current != 1){
			event.data.current = event.data.current - 1;
		}else{
			event.data.current = event.data.length;
		}
		event.data.$list.attr('class','');
		event.data.$list.addClass(event.data.className+'-dn-'+event.data.current);
		return false;
	});

}