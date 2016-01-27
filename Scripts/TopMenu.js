modifyOver = false;
$(function(){
	$(".MenuItem").on(
	{
		"mouseenter":function(){
			$(this).css({"color":"#fff","background-color":"#0099d1"});
		},
		"mouseleave":function(){
			$(this).css({"color":"#fff","background-color":"#323232"});
		},
		"click":function(e){
			window.location=$(this).attr("name");
			e.stopPropagation();
		}
	}).css({"cursor":"pointer"});

	$(".TopClass").on({
		"mouseenter":function(){
			modifylinkOver = true;
			//搜尋第二層
			var curTopMenuDiv = ($(this).find(".TopMenuDiv").length > 0)?$(this).find(".TopMenuDiv").eq(0):null;
			$(".TopMenuDiv").hide();
			if(curTopMenuDiv){	
				curTopMenuDiv.show();
			}
			
		},
		"mouseleave":function(){
			$(".SecMenuDiv").hide();
			$(".TopMenuDiv").hide();
		}
	});
	$(".SecMenu").on({
		"mouseenter":function(){
			modifylinkOver = true;
			//搜尋第三層
			var curSecMenuDiv = ($(this).find(".SecMenuDiv").length > 0)?$(this).find(".SecMenuDiv").eq(0):null;
			$(".SecMenuDiv").hide();
			if(curSecMenuDiv){
				curSecMenuDiv.show();				
			}
		},
		"mouseleave":function(){
			$(".SecMenuDiv").hide();
		}
	});
});