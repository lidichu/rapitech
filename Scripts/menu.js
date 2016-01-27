// JavaScript Document
$(function(){

	$(".menu1").each(function(i){
		$(this).attr("rel",$(this).find("a").attr("href"));
		$(this).html($(this).find("a").html());

		$(this).mouseenter(
			function(){
				$(this).css({"backgroundImage":"url(images/03_products/left_menu_o.png)","cursor":"default","color":"#eb1f3c"});
			}
		).mouseleave(
			function(){
				$(this).css({"backgroundImage":"url(images/03_products/left_menu.png)","cursor":"pointer","color":"#797c88"});	
			}
		).css(
			{"backgroundImage":"url(images/03_products/left_menu.png)","cursor":"pointer","color":"#797c88"}
		).on("click",function(){
			window.location.href=$(this).attr("rel");
			return false;	
		});
		
	});
});