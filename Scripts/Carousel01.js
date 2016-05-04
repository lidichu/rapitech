// JavaScript Document
jQuery.fn.Carousel01 = function(settings){
	var _defaultSettings = {
		autoPlay : true,				//是否自動播放下一張
		EffectTime: 1000,				//切換效果時間
		delay : 2000,					//停留時間
		PicNames : new Array(),			//圖片檔案名稱
		PicRoot : "",					//檔案路徑
		ItemClassName:"AdItem",			//按鈕物件預設Style Class名稱
		CurItemClassName:"AdItemCur",	//目前按鈕物件Style Class名稱
		OnMouseOverStop:false			//滑鼠移到上面時是否停止 Timer
	};
	var _settings = $.extend(_defaultSettings, settings);
	return this.each(function(objindex) {
		var objindex = objindex;
		//自動播放
		var autoPlay = _settings.autoPlay;
		//儲存目前物件
		var $Main = $(this);		
		//設定目前物件的預設CSS屬性
		$Main.css({"position":"relative","overflow":"hidden","width":$Main.width(),"height":$Main.height()});			
		//建立圖片輪播的上層物件
		var $PicUp = $('<div style="position:absolute;width:'+$Main.width()+';height:'+$Main.height()+';overflow:hidden;top:0px;left:0px;z-index:900;"></div>');
		//建立圖片輪播的下層物件
		var $PicDown = $('<div style="position:absolute;width:'+$Main.width()+';height:'+$Main.height()+';overflow:hidden;top:0px;left:0px;z-index:800;"></div>');
		//建立圖片按鈕列
		var $ItemBar = $('<div style="position:absolute;overflow:hidden;z-index:1000;"></div>');
		//建立按鈕物件
		var ItemArray = new Array();
		for(i=0;i<_settings.PicNames.length;i++){
			var $Item = $("<div>"+(i+1)+"</div>");
			$Item.addClass(_settings.ItemClassName);
			ItemArray.push($Item)
        }
		//組合所有物件
		$Main.append($PicUp);
		$Main.append($PicDown);
		$Main.append($ItemBar);
		for(i=0;i<ItemArray.length;i++){
			$ItemBar.append(ItemArray[i]);
		}
		//設定圖片按鈕列位置
		$ItemBar.css({top:$Main.height()-$ItemBar.height()-5,left:$Main.width()-$ItemBar.width()-10});
		//建立計時器
		var Timer = 0;
		//目前播放的圖片索引
		var PicTop = 0;
		//建立停止動作
		var StopAll = function(){
			if(Timer!=0){window.clearTimeout(Timer);}
			$PicUp.stop(false,true);
			$PicDown.stop(false,true);
		}
		//建立TimerOut事件
		var TimerEvent = function(){
			CurTop = (PicTop + 1) % ItemArray.length;
			EffectAction(CurTop);
		};		
				
		//建立圖片切換動作
		var EffectAction = function(CurTop){
			ItemArray[PicTop].removeClass(_settings.CurItemClassName);
			PicTop = CurTop;
			ItemArray[PicTop].addClass(_settings.CurItemClassName);
			$PicDown.html('<img src="'+_settings.PicRoot+_settings.PicNames[CurTop]+'" />');
			StopAll();
			$PicUp.css({"opacity":1}).animate({
					"opacity":0
				},{
					duration: _settings.EffectTime,
					complete: function() {
					if(autoPlay && _settings.PicNames.length > 1){
						Timer = window.setTimeout(TimerEvent,_settings.delay);
					}
				}
			});	
			$PicDown.css({"opacity":0}).animate({
					"opacity":1
				},{
					duration:  _settings.EffectTime,
					complete: function() {
					$PicUp.html('<img src="'+_settings.PicRoot+_settings.PicNames[CurTop]+'" />');
				}
			});
		}
		//設置Item Click 事件
		for(i=0;i<ItemArray.length;i++){
			ItemArray[i].click(function(a){
				StopAll();
				CurTop = $(this).parent().find("." + _settings.ItemClassName).index($(this));
				//不同圖才跑切換動作
				if(PicTop != CurTop){
					EffectAction(CurTop);
				}else{
					if(autoPlay && _settings.PicNames.length > 1){
						Timer = window.setTimeout(TimerEvent,_settings.delay);
					}					
				}
			});
		}		

		//滑鼠滑過是否停止播放
		if(_settings.OnMouseOverStop){
			$Main.mouseenter(function(){
				autoPlay = false;
				StopAll();		
			}).mouseleave(function(){
				autoPlay = _settings.autoPlay;
				StopAll();
				if(autoPlay){
					Timer = window.setTimeout(TimerEvent,_settings.delay);
				}
			});		
		}
		//預設顯示第一張圖
		if(ItemArray.length > 0){
			$PicUp.html('<img src="'+_settings.PicRoot+_settings.PicNames[PicTop]+'" />');
			ItemArray[PicTop].addClass(_settings.CurItemClassName);
			if(autoPlay){
				//大於 1張圖才做輪播
				if(ItemArray.length > 1){
					Timer =  window.setTimeout(TimerEvent,_settings.delay);
				}
			}
		}else{
			$Main.hide(); //沒有圖直接就隱藏起來
		}
   	});	
}





