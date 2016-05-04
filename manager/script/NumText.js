(function($) {
	$.fn.NumText = function(optionset){
			//¹w³]­È
			var defaults = {
				Dot : ""
    	};
    	var settings = $.extend({},defaults, optionset);
    	if(settings.Dot==""){var ichar = "0123456789";}else{var ichar = "0123456789.";}
    	return this.each(function(){
				$(this).keyup(function(e){
					if(!(e.keyCode >= 35 && e.keyCode <=40)){
						if(e.keyCode!=8 && e.keyCode!=46){
							var thisval = $(this).val();
							var thisvalrtn = ""
							var dot = false;
							for(i=0;i<thisval.length;i++){
								if(ichar.indexOf(thisval.charAt(i))!=-1){
									if(thisvalrtn==""){
										if(thisval.charAt(i)=="0"){
											if(thisval.charAt(i+1)=="."){
												thisvalrtn += thisval.charAt(i);
											}else if(i==(thisval.length-1)){
												thisvalrtn += thisval.charAt(i);
											}
										}else if(thisval.charAt(i)!="."){
											thisvalrtn += thisval.charAt(i);
										}
									}else{
										if(thisval.charAt(i)=="."){
											if(dot==false){
												thisvalrtn += thisval.charAt(i);
												dot=true;
											}
										}else{
											thisvalrtn += thisval.charAt(i);
										}
									}
								}
							}
							$(this).val(thisvalrtn);
						}
					}
				}).blur(function(){
					if($(this).val()!=""){
						$(this).val(eval($(this).val()));	
					}else{
						$(this).val("");
					}
					
				});	
    	});
	}
})(jQuery);







