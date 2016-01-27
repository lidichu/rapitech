
	function SCookie(r_WebTitle,r_website,r_user,r_sid,r_nos,r_opp){
		
		var WebName_cookie = r_WebTitle ;
		var personList = new Array();
		var ShopList = new Array();
		var ShopList_Temp = new Array();//暫時
		var _shop = new Array();//儲存購買陣列
		var _website = r_website;
		var _user = r_user;
		var _sid = parseInt( r_sid  , 10);//購買編號
		var _nos = parseInt( r_nos  , 10);//購買數量
		var _opp = (r_opp=="")? null : r_opp;
		var personInfo = new Array();
		_shop.push(  { sid : _sid , nos : _nos }  ); //當前點選購買的至儲存陣列
		
		if (r_sid == null && r_nos == null)
		{
			if($.cookie( WebName_cookie ) != null)
				{				
				//讀取			
				ShopList_Temp = JSON.parse($.cookie( WebName_cookie ));			
				//console.log("讀取", ShopList_Temp);		
				ShopList =  ShopList_Temp ;	
				}
		}
		else if (r_sid != null && r_nos != null && r_opp==null)
		{
			
			if($.cookie( WebName_cookie ) == null)
			{				
				//初次建立儲存			
				var personInfo = { website : _website , user : _user , shop :  _shop   };			
				ShopList =  personInfo ;			
				//console.log("初次", ShopList);
				
			}
			else if($.cookie( WebName_cookie ) != null)
			{				
				//讀取			
				ShopList_Temp = JSON.parse($.cookie( WebName_cookie ));			
				//console.log("讀取", ShopList_Temp);
				 
					for ( var i2 = 0; i2 < ShopList_Temp.shop.length; i2++) 
					{
						
						if( ShopList_Temp.shop[i2].sid == _sid )
						{
							//console.log("結構前.nos",ShopList_Temp.shop[i2].nos);
							//console.log("結構前_nos",_nos);
							ShopList_Temp.shop[i2].nos = parseInt( ShopList_Temp.shop[i2].nos , 10) + parseInt( _nos , 10) ;
							//console.log("結構後",ShopList_Temp.shop[i2].nos);
							_shop = null ;//清除
						}
						
					}
					
					if ( _shop != null ) 
					{
						if( _nos == 0)
						{
							
						}else{
							ShopList_Temp.shop.push( { sid : _sid , nos : _nos }  );//儲存	
						}					
					}
					
					//console.log('結果',ShopList_Temp);				
					ShopList =  ShopList_Temp ;					
			}
			
			//將陣列轉為JSON字串
			var JSON_cookieValue = JSON.stringify(ShopList);		
			//console.log("將陣列轉為JSON字串", ShopList , JSON_cookieValue);
			
			var date = new Date();		
			//date.setTime(date.getTime() + (5 * 24 * 60 * 60 * 1000));
			date.setTime(date.getTime() + (1 * 1 * 60 * 60 * 1000));

			//存入myCookie 指定存活時間     
			$.cookie( WebName_cookie , JSON_cookieValue, { expires: date });

			//存入myCookie 不指定存活時間
			//document.cookie = "myCookie=" + JSON_cookieValue;
			//alert(JSON_cookieValue);

			var JSON_cookie = $.cookie( WebName_cookie );
			//alert(JSON_cookie);
			
					
		}
		else if (r_sid != null && r_opp=="Del")//刪除用
		{
			
			if($.cookie( WebName_cookie ) != null)
			{				
				//讀取			
				ShopList_Temp = JSON.parse($.cookie( WebName_cookie ));			
				//console.log("讀取", ShopList_Temp);
				 
					for ( var i2 = 0; i2 < ShopList_Temp.shop.length; i2++) 
					{
						
						if( ShopList_Temp.shop[i2].sid == _sid )
						{
							ShopList_Temp.shop.splice(i2,1)							
							_shop = null ;//清除
						}
						
					}
					
					if ( _shop != null ) 
					{
						if( _nos == 0)
						{
							
						}else{
							ShopList_Temp.shop.push( { sid : _sid , nos : _nos }  );//儲存	
						}					
					}
					
					//console.log('結果',ShopList_Temp,ShopList_Temp.shop.length);				
					ShopList =  ShopList_Temp ;					
			}
			
			
			//將陣列轉為JSON字串
			var JSON_cookieValue = JSON.stringify(ShopList);		
			//console.log("將陣列轉為JSON字串", ShopList , JSON_cookieValue);
			
			var date = new Date();		
			//date.setTime(date.getTime() + (5 * 24 * 60 * 60 * 1000));
			date.setTime(date.getTime() + (1 * 1 * 60 * 60 * 1000));

			//存入myCookie 指定存活時間     
			$.cookie( WebName_cookie , JSON_cookieValue, { expires: date });

			//存入myCookie 不指定存活時間
			//document.cookie = "myCookie=" + JSON_cookieValue;
			//alert(JSON_cookieValue);

			var JSON_cookie = $.cookie( WebName_cookie );
			//alert(JSON_cookie);
			
		}
		else if (r_sid != null && r_nos != null && r_opp=="Modify")//變更數值
		{
			
			if($.cookie( WebName_cookie ) == null)
			{				
				//初次建立儲存			
				var personInfo = { website : _website , user : _user , shop :  _shop   };			
				ShopList =  personInfo ;			
				//console.log("初次", ShopList);
				
			}
			else if($.cookie( WebName_cookie ) != null)
			{				
				//讀取			
				ShopList_Temp = JSON.parse($.cookie( WebName_cookie ));			
				//console.log("讀取", ShopList_Temp);
				 
					for ( var i2 = 0; i2 < ShopList_Temp.shop.length; i2++) 
					{
						
						if( ShopList_Temp.shop[i2].sid == _sid )
						{
							//console.log("結構前.nos",ShopList_Temp.shop[i2].nos);
							//console.log("結構前_nos",_nos);
							if( parseInt( _nos , 10) == 0 )
							{
								
								ShopList_Temp.shop.splice(i2,1);
								
							}else{
								
								ShopList_Temp.shop[i2].nos = parseInt( _nos , 10);
								
							}
							
							//console.log("結構後",ShopList_Temp.shop[i2].nos);
							_shop = null ;//清除
						}
						
					}
					
					if ( _shop != null ) 
					{
						if( _nos == 0)
						{
							
						}else{
							ShopList_Temp.shop.push( { sid : _sid , nos : _nos }  );//儲存	
						}					
					}
					
					//console.log('結果',ShopList_Temp);				
					ShopList =  ShopList_Temp ;					
			}
			
			//將陣列轉為JSON字串
			var JSON_cookieValue = JSON.stringify(ShopList);		
			//console.log("將陣列轉為JSON字串", ShopList , JSON_cookieValue);
			
			var date = new Date();		
			//date.setTime(date.getTime() + (5 * 24 * 60 * 60 * 1000));
			date.setTime(date.getTime() + (1 * 1 * 60 * 60 * 1000));

			//存入myCookie 指定存活時間     
			$.cookie( WebName_cookie , JSON_cookieValue, { expires: date });

			//存入myCookie 不指定存活時間
			//document.cookie = "myCookie=" + JSON_cookieValue;
			//alert(JSON_cookieValue);

			var JSON_cookie = $.cookie( WebName_cookie );
			//alert(JSON_cookie);			
					
		}
		
		if (ShopList.shop === undefined)
		{
			return "0" ;
		}
		else
		{
			if (ShopList.shop.length != null)
			{
				return ShopList.shop.length;//回傳購買產品項目幾個	
			}
		}
	}
