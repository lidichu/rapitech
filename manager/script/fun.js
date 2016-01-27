function CheckField(FieldName,FieldText,LenLimit){
	if($("#"+FieldName).val()==""){
		return "．『" + FieldText + "』不可為空值";
	}else if($("#"+FieldName).val().length>LenLimit){
		return "．『" + FieldText + "』長度不可超過" + LenLimit;
	}else{
		return "";
	}
}

function CheckFieldValue(FieldValue,FieldText,LenLimit){
	if(FieldValue == ""){
		return "．『" + FieldText + "』不可為空值";
	}else if(FieldValue.length>LenLimit){
		return "．『" + FieldText + "』長度不可超過" + LenLimit;
	}else{
		return "";
	}
}

function CheckFieldMutilValue(FieldValueArray,FieldText){
	for(var i = 0; i < FieldValueArray.length; i++){
		if(FieldValueArray[i] == ""){
			return "．『" + FieldText + "』不可為空值";
		}
	}
	return "";
}
function CheckSuburbStatePostcode(SuburbFieldName,StateFieldName,PostcodeFieldName,FieldText){
	if($("#"+SuburbFieldName).val()=="" || $("#"+StateFieldName).val()=="" || $("#"+PostcodeFieldName).val()==""){
		return "．『" + FieldText + "』不可為空值";
	}else{
		return "";
	}
}

//判斷EMail
function CheckEMailField(sField,sName,sCheckType){
	//空值判斷
	if(sCheckType==true && sField.value==""){
		return "．『" + sName + "』不可為空值";
	}else if(sCheckType==false && sField.value==""){
		return "";
	}
	var emailtoCheck = sField.value;
	var regExp = /^[^@^\s]+@[^\.@^\s]+(\.[^\.@^\s]+)+$/;
	if (emailtoCheck.match(regExp)){
		return "";
	}else{
		return "．『" + sName + "』格式不符";
	}
}
//滑鼠移入時改變 TR 顏色
function tr_mouseOn(tr){	
	var trCell=document.getElementById(tr);
	trCell.style.backgroundColor="#CCCCFF";
}

//滑鼠移出時改變 TR 顏色
function tr_mouseOut(tr,color){	
	var trCell=document.getElementById(tr);
	trCell.style.backgroundColor=color;
}
//
function NumHandle3(num){
	num = num.toString();
	var re=/(\d{1,3})(?=(\d{3})+(?:$|\.))/g;
	return num.replace(re,"$1,");
}
function DeNumHandle3(num){
	num = num.toString();
	var re=/,/g;
	return num.replace(re,"");
}
//判斷是否為數字
function clearNoNum2(val){

  //先把非數字的都替換掉

  val.value = val.value.replace(/[^\d]/g,"");
}
function checkNum(val){
  //先把非數字的都替換掉
  val.value = val.value.replace(/[^\d]/g,"");
}

//檢查身份證字號
function checkPID(FieldName,FieldValue,NotNull){
	var tab = "ABCDEFGHJKLMNPQRSTUVXYWZIO";
	A1 = new Array (1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3 );
	A2 = new Array (0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5 );
	Mx = new Array (9,8,7,6,5,4,3,2,1,1);	
	var sum = 0;		
	if(FieldValue==""){
		if(NotNull){
			return "．『" + FieldName + "』 不能為空白";
		}
	}else{
		if(FieldValue.length!= 10){
			return "．『" + FieldName + "』 請輸入第一碼為英文字母+9碼數字";
		}else{
			if((checkPID_I=tab.indexOf(FieldValue.charAt(0).toUpperCase()))==-1){
				return "．『" + FieldName + "』 請輸入第一碼為英文字母+9碼數字";
			}else{
				sum = A1[checkPID_I] + A2[checkPID_I]*9;
				checkflag = true;
				for(checkPID_I = 1 ;checkPID_I<FieldValue.length;checkPID_I++){
					if(isNaN(checkPID_V = parseInt(FieldValue.charAt(checkPID_I)))){
						return "．『" + FieldName + "』 請輸入後9碼為數字";
					}else{
						sum = sum + checkPID_V * Mx[checkPID_I];
					}
				}
				if(sum%10!=0 && checkflag){
					return "．『" + FieldName + "』 您的身份證字號錯誤";
				}
			}
		}
	}
	return "";
}
