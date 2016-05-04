// JavaScript Document
//錯誤訊息
function MyErrorEn(){
	this.Msg = "";
	this.add = function(msg){
		this.Msg += (this.Msg=="")?msg:"\n"+msg;
	};
	this.pass = function(){
		if(this.Msg!=""){
			alert("The following error(s) occurred:\n"+this.Msg);
			return false;
		}else{
			return true;	
		}
	};
	//檢查EMail
	this.checkEMail = function(FieldName,FieldValue,checkFlag){
		if(FieldValue==""){
			if(checkFlag){
				this.add("．" + FieldName + " is required.");
			}
		}else{
			var EMailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;	
			if(!EMailFilter.test(FieldValue)){
				this.add("．" + FieldName + " must contain an e-mail address");
			}
		}
	};
	
	//檢查空白
	this.checkNull = function(FieldName,FieldValue){
		if(FieldValue==""){
			this.add("．" + FieldName + " is required.");
		}
	};
	
	
}
function MyErrorCh(){
	this.Msg = "";
	this.add = function(msg){
		this.Msg += (this.Msg=="")?msg:"\n"+msg;
	};
	this.pass = function(){
		if(this.Msg!=""){
			alert(this.Msg);
			return false;
		}else{
			return true;	
		}
	};
	//檢查EMail
	this.checkEMail = function(FieldName,FieldValue,checkFlag){
		if(FieldValue==""){
			if(checkFlag){
				this.add("．『" + FieldName + "』 不能為空白");
			}
		}else{
			var EMailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;	
			if(!EMailFilter.test(FieldValue)){
				this.add("．『" + FieldName + "』 格式不正確");
			}
		}
	};
	//檢查空白
	this.checkNull = function(FieldName,FieldValue){
		if(FieldValue==""){
			this.add("．『" + FieldName + "』 不能為空白");
		}
	};
	
	//檢查空白
	this.checkNullMulti = function(FieldName,FieldValueArray){
		var result = true;
		for(var key in FieldValueArray){
			if(FieldValueArray[key]==""){
				result = false;
			}
		}
		if(!result){
			this.add("．『" + FieldName + "』 不能為空白");
		}
	};	
	
	
	//檢查CheckBox必填
	this.checkCheckbox = function (FieldName,CheckBoxName){
		var result = false;
		$("input[name="+CheckBoxName+"]").each(function(){
			if($(this).prop("checked")){
				result = true;
			}
		});
		if(!result){this.add("．『" + FieldName + "』 請至少選擇一個");}
	}
	//檢查CheckBox必填 for class
	this.checkCheckboxClass = function (FieldName,CheckBoxName){
		var result = false;
		$("." + CheckBoxName).each(function(){
			if($(this).prop("checked")){
				result = true;
			}
		});
		if(!result){this.add("．『" + FieldName + "』 請至少選擇一個");}
	}	
	
	//檢查帳號格式
	this.checkID = function(FieldName,FieldValue){
		re1 = /^[A-Za-z]/g;
		re2 = /[A-Za-z0-9]+$/g;		
		if(FieldValue==""){
			this.add("．『" + FieldName + "』 不能為空白");
		}else if(!re1.test(FieldValue)){
			this.add("．『" + FieldName + "』 請以英文開頭");
		}else if(!re2.test(FieldValue)){
			this.add("．『" + FieldName + "』 不得包含英數字以外的字元");
		}else if(FieldValue.length>50 || FieldValue.length<5){
			this.add("．『" + FieldName + "』 請輸入5-50個英數字");
		}		
	};
	//檢查密碼格式
	this.checkPWD = function(FieldName,FieldValue){
		re1 = /[A-Za-z0-9]+$/g;
		if(FieldValue==""){
			this.add("．『" + FieldName + "』 不能為空白");
			return false;
		}else if(!re1.test(FieldValue)){
			this.add("．『" + FieldName + "』 不得包含英數字以外的字元");
			return false;
		}else if(FieldValue.length>20 || FieldValue.length<5){
			this.add("．『" + FieldName + "』 請輸入入5-20個英數字");
			return false;
		}
		return true;
	};	
	//檢查公司編號
	this.checkCompanyID = function(FieldName,FieldValue){	
		var SUM = 0;
		var cx = new Array;
		cx[0] = 1;
		cx[1] = 2;
		cx[2] = 1;
		cx[3] = 2;
		cx[4] = 1;
		cx[5] = 2;
		cx[6] = 4;
		cx[7] = 1;
		if(FieldValue.length != 8 ){
			this.add("．『" + FieldName + "』 統編錯誤，要有 8 個數字，您輸入的統一編號為：" + FieldValue);
			return ;
		}
		for(i=0;i<=7;i++){
			if(FieldValue.charCodeAt(i) < 48 || FieldValue.charCodeAt(i) > 57){
				this.add("．『" + FieldName + "』 統編錯誤，要有 8 個 0-9 數字組合，您輸入的統一編號為：" + FieldValue);	
				return ;
			}
			cc = parseInt(FieldValue.charAt(i)) * parseInt(cx[i]);
			if(cc >= 10){cc = cc.toString(); cd = parseInt(cc.charAt(0)) + parseInt(cc.charAt(1));cc = cd;}
			SUM += cc;
		}
	  	if( !((SUM % 10 == 0) || (parseInt(FieldValue.charAt(6)) == 7 && (SUM + 1) % 10 == 0))){
			this.add("．『" + FieldName + "』 統編錯誤，您輸入的統一編號為：" + FieldValue);	
		}
	}
}

function MyErrorCn(){
	this.Msg = "";
	this.add = function(msg){
		this.Msg += (this.Msg=="")?msg:"\n"+msg;
	};
	this.pass = function(){
		if(this.Msg!=""){
			alert(this.Msg);
			return false;
		}else{
			return true;	
		}
	};
	//檢查EMail
	this.checkEMail = function(FieldName,FieldValue,checkFlag){
		if(FieldValue==""){
			if(checkFlag){
				this.add("．『" + FieldName + "』 不能为空白");
			}
		}else{
			var EMailFilter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;	
			if(!EMailFilter.test(FieldValue)){
				this.add("．『" + FieldName + "』 格式不正确");
			}
		}
	};
	//檢查空白
	this.checkNull = function(FieldName,FieldValue){
		if(FieldValue==""){
			this.add("．『" + FieldName + "』 不能为空白");
		}
	};
}

String.prototype.Trim = function() 
{ 
return this.replace(/(^\s*)|(\s*$)/g, ""); 
} 
 
String.prototype.LTrim = function() 
{ 
return this.replace(/(^\s*)/g, ""); 
} 
 
String.prototype.RTrim = function() 
{ 
return this.replace(/(\s*$)/g, ""); 
} 

