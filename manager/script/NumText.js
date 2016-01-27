(function($) {
	$.fn.NumText = function(optionset){
			//預設值
			var defaults = {
				Dot : ""
    	};
    	var settings = $.extend({},defaults, optionset);
    	if(settings.Dot==""){var ichar = "-0123456789";}else{var ichar = "-0123456789.";}
    	return this.each(function(){
				$(this).keyup(function(e){
					if(!(e.keyCode >= 35 && e.keyCode <=40)){
						if(e.keyCode!=8 && e.keyCode!=46){
							var thisval = $(this).val();
							var thisvalrtn = ""
							var thischar = "";
							for(i=0;i<thisval.length;i++){
								//取得目前字元
								thischar = thisval.charAt(i);
								//是否為合法字元
								if(ichar.indexOf(thischar) == -1){ continue; }
								//強迫『 -』 號須在第1個字元
								if(thischar == "-" && thisvalrtn != ""){ continue; }
								//強迫『.』 只能有一個
								if(thischar == "." && thisvalrtn.indexOf(thischar) != -1){ continue; }
								//若第1個字元為『.』，則顯示為 『0.』
								if(thischar == "." && thisvalrtn == ""){ thischar = "0."; }
								//加入字元
								thisvalrtn += thischar;
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
function NumDot(Num,NumLength){
	var rtn = "";
	var Num_split = null;
	Num = Num.toString();
	if(Num.indexOf(".") == -1){ 
		rtn = Num;
		rtn += (NumLength>0)?".":"";
		for(i=0;i<NumLength;i++){
			rtn += "0";
		}
	}else{
		Num_split = Num.split(".");
		rtn += (NumLength>0)?".":"";
		for(i=0;i<NumLength;i++){
			if(i<Num_split[1].length){
				rtn += Num_split[1].substr(i,1);
			}else{
				rtn += "0";
			}
		}
	}
	return rtn;
}