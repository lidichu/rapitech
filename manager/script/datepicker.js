// JavaScript Document
(function( $ ){
	$.fn.DatePicker = function(_settings){
		return this.each(function(i){
			var settings = {
				YearFieldName : 'Year',
				MonthFieldName:'Area',
				DayFieldName:'ZipCode',
				StartYear:1911,
				EndYear:(new Date()).getFullYear(),
				defaultYear:(new Date()).getFullYear(),
				defaultMonth:((new Date()).getMonth() + 1),
				defaultDay:(new Date()).getDate()
			}
			//接收傳入參數
			settings = $.extend({}, settings, _settings);
						
	
			var curYear = parseInt(settings.defaultYear);
			var curMonth = parseInt(settings.defaultMonth);
			var curDay = parseInt(settings.defaultDay);
	
			//產生年物件
			var YearSelect = $("#" + settings.YearFieldName);
			//產生月物件
			var MonthSelect = $("#" + settings.MonthFieldName);
			
			//產生日物件
			var DaySelect = $("#" + settings.DayFieldName);
			
			//初始化
			$.fn.DatePickerChange(YearSelect,MonthSelect,DaySelect,curYear,curMonth,curDay,settings.StartYear,settings.EndYear);
			
			//Change事件
			YearSelect.bind("change",function(){
				curYear = $(this).val();
				$.fn.DatePickerChange(YearSelect,MonthSelect,DaySelect,curYear,curMonth,curDay,settings.StartYear,settings.EndYear);
			});
			MonthSelect.bind("change",function(){
				curMonth = $(this).val();
				$.fn.DatePickerChange(YearSelect,MonthSelect,DaySelect,curYear,curMonth,curDay,settings.StartYear,settings.EndYear);
			});
			DaySelect.bind("change",function(){
				curDay = $(this).val();
				$.fn.DatePickerChange(YearSelect,MonthSelect,DaySelect,curYear,curMonth,curDay,settings.StartYear,settings.EndYear);
			});				
		});
	}
	$.fn.DatePickerChange = function($Year,$Month,$Day,curYear,curMonth,curDay,StartYear,EndYear){
			var YearOptionHtml = "";
			var MonthOptionHtml = "";
			var DayOptionHtml = "";		
			//產生年物件資料
			for(i = StartYear ;i<=EndYear;i++){
				if(i==curYear){
					YearOptionHtml += "<option value='" + i + "' selected='selected'>" + (i-1911) + "</option>";	
				}else{
					YearOptionHtml += "<option value='" + i + "'>" + (i-1911) + "</option>";
				}
			}
			$Year.html(YearOptionHtml);
			
			//產生月物件資料
			for(i = 1;i<=12;i++){
				if(i==curMonth){
					MonthOptionHtml += "<option value='" + i + "' selected='selected'>" + i + "</option>";	
				}else{
					MonthOptionHtml += "<option value='" + i + "'>" + i + "</option>";
				}
			}			
			$Month.html(MonthOptionHtml);
			
			//產生日物件資料
			for(i = 1;i<=(new Date($Year.val() , $Month.val() , 0)).getDate();i++){
				if(i==curDay){
					DayOptionHtml += "<option value='" + i + "' selected='selected'>" + i + "</option>";	
				}else{
					DayOptionHtml += "<option value='" + i + "'>" + i + "</option>";
				}
			}			
			$Day.html(DayOptionHtml);		
	}
})( jQuery );