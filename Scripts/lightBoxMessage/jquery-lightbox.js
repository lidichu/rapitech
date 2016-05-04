(function($){
	$.fn.lightbox_message = function(_settings){
		var settings = {
			LoadingIcon:"images/lightbox-message-ico-loading.gif",	//Loading圖示路徑
			Width:0,										//寬度
			Height:0,										//高度
			backgroundopacity:0.8,							//背景透明度
			backgroundColor:"#000",							//背景顏色
			Title:''										//顯示內容
		}			
		settings = $.extend({},settings, _settings);
		//置入DOM物件
		$("body").append('<div id="lightbox-message-background"></div>');
		$("body").append('<div id="lightbox-message-canvas"></div>');
		$("body").append('<div id="lightbox-message-DataTemp"></div>');
		$("body").append('<div id="lightbox-message-DataTemp2"></div>');

		//設定DOM物件
		$("#lightbox-message-canvas").css({"backgroundImage":"url(" + settings.LoadingIcon + ")",width:settings.Width,height:settings.Height});	


		//點擊背景
		$("#lightbox-message-background").bind("_close", function(){
			$("#lightbox-message-background").fadeOut();	
			$("#lightbox-message-canvas").fadeOut(function(){
				$("#lightbox-message-canvas").css({
					backgroundImage : "url(" + settings.LoadingIcon + ")"
				}).html("");
			});			
		});

		/*
		$("#lightbox-message-background").click(function(){
			$(this).trigger("_close");
		});		
		*/
		return this.each(function(){
			$(this).bind("_show",function(){
				var arrPageSizes = $.fn.lightbox_message_getPageSize();
				var arrPageScroll = $.fn.lightbox_message_getPageScroll();						
				
				//顯示背景
				$('#lightbox-message-background').css({
					backgroundColor:	settings.backgroundColor,
					opacity:			settings.backgroundopacity,
					width:				arrPageSizes[0],
					height:				arrPageSizes[1]
				}).fadeIn();
				

				var top = parseInt(arrPageScroll[1] + ((arrPageSizes[3] - settings.Height)/2));
				var left = parseInt(arrPageScroll[0] + (arrPageSizes[0] - settings.Width)/2)				
				$("#lightbox-message-canvas").html("");
				$("#lightbox-message-canvas").append('<div style="width:'+settings.Width+'px;height:'+settings.Height+'px;text-align:center;line-height:'+settings.Height+'px;">' + settings.Title + '</div>');
				$("#lightbox-message-canvas").show().css({
					backgroundImage : 'none',
					top : top,
					left : left
				});				

			});
			
			
			$(this).bind("_setTitle",function(event,title){
				$("#lightbox-message-canvas").html("");
				$("#lightbox-message-canvas").append('<div style="width:'+settings.Width+'px;height:'+settings.Height+'px;text-align:center;line-height:'+settings.Height+'px;">' + title + '</div>');				
			});
		});
	}
	
	$.fn.lightbox_message_getPageScroll = function(){
		var xScroll, yScroll;
		if (self.pageYOffset) {
			yScroll = self.pageYOffset;
			xScroll = self.pageXOffset;
		} else if (document.documentElement && document.documentElement.scrollTop) {	 // Explorer 6 Strict
			yScroll = document.documentElement.scrollTop;
			xScroll = document.documentElement.scrollLeft;
		} else if (document.body) {// all other Explorers
			yScroll = document.body.scrollTop;
			xScroll = document.body.scrollLeft;	
		}
		arrayPageScroll = new Array(xScroll,yScroll);
		return arrayPageScroll;		
	};
	$.fn.lightbox_message_getPageSize = function(){
		var xScroll, yScroll;
		if (window.innerHeight && window.scrollMaxY) {	
			xScroll = window.innerWidth + window.scrollMaxX;
			yScroll = window.innerHeight + window.scrollMaxY;
		} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
			xScroll = document.body.scrollWidth;
			yScroll = document.body.scrollHeight;
		} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
			xScroll = document.body.offsetWidth;
			yScroll = document.body.offsetHeight;
		}
		var windowWidth, windowHeight;
		if (self.innerHeight) {	// all except Explorer
			if(document.documentElement.clientWidth){
				windowWidth = document.documentElement.clientWidth; 
			} else {
				windowWidth = self.innerWidth;
			}
			windowHeight = self.innerHeight;
		} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
			windowWidth = document.documentElement.clientWidth;
			windowHeight = document.documentElement.clientHeight;
		} else if (document.body) { // other Explorers
			windowWidth = document.body.clientWidth;
			windowHeight = document.body.clientHeight;
		}	
		// for small pages with total height less then height of the viewport
		if(yScroll < windowHeight){
			pageHeight = windowHeight;
		} else { 
			pageHeight = yScroll;
		}
		// for small pages with total width less then width of the viewport
		if(xScroll < windowWidth){	
			pageWidth = xScroll;		
		} else {
			pageWidth = windowWidth;
		}
		arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight);
		return arrayPageSize;	
	}	
})(jQuery);