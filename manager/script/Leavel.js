//分層連結
$(function(){
	$(".Linka").click(function(){
		alert($(this).prop("href"));
		/*
		$("#formVars").prop("action",$(this).prop("href"));
		$("#formVars").submit();
		*/
		return false;
	});
});



var otherstring = "";



//執行刪除動作

function cmdDel_onclick(href){	

	var msg="是否確定刪除？";

	if(confirm(msg)){

		document.getElementById("form1").action=href+'?option=Del';

		document.getElementById("form1").submit();

	}	

}
function cmdOK_onclick(href){	

	var msg="是否確定解鎖？";
	
	if(confirm(msg)){

		document.getElementById("form1").action=href+'?option=OK';

		document.getElementById("form1").submit();

	}	

}
function cmdDownload_onclick(href){	
	var havaChecked = false;
	$(".CheckBoxShow").each(function(){
		if($(this).prop("checked")==true){
			havaChecked = true;
			if($(this).parent().find("input").length == 2){
				var SerialNo = $(this).val();
				$(this).parent().append('<input type="hidden" name="DownLoadSerialNo[]" value="' +  SerialNo + '" />');
			}
		}else{
			if($(this).parent().find("input").length == 3){
				$(this).parent().find("input").eq(2).remove();
			}
		}
	});			
	if(havaChecked){
		document.getElementById("form1").action="../../../big5/diary5_Download.php";
		document.getElementById("form1").submit();
	}
	else{
		alert('請勾選要下載的檔案');
	}
}


//執行新増動作

function cmdAdd_onclick(){
	window.location.href=file_add_modify+"?option=Add"+otherstring;
}

function cmdExcel_onclick(href){
	window.location.href=href+"?option=Excel"+otherstring;
}

//執行重載動作

function cmdLoad_onclick(href){	

	document.getElementById("form2").action=href;

	document.getElementById("form2").submit();

}



//跳到指定頁數

function JumpPage(href,page,PageObj){

	PageObj.value=page;

	document.getElementById("form1").action=href;

	document.getElementById("form1").submit();

}



//選取全部checkbox
var CheckAllflag = false;
function CheckAll(obj){ 
	if(CheckAllflag){
		$(".CheckBoxShow").prop("checked",false);
	}else{
		$(".CheckBoxShow").prop("checked",true);
	}
	CheckAllflag = !CheckAllflag;
}

 

//執行更新排序欄位

function cmdSortUpdate_onclick(href){

	$("#form1").prop("action",href+"?option=SortUp");

	$("#form1").submit();	

}

//執行更新排序欄位
function cmdSortUpdate2_onclick(href){
	$("#form1").prop("action",href+"?option=IndexSortUp");
	$("#form1").submit();	
}

//執行更新狀態欄位

function cmdStatusUpdate_onclick(href){

	$("#form1").prop("action",href+"?option=StatusUp");

	$("#form1").submit();

}

//執行更新訂單狀態欄位
function cmdOrderStatusUpdate_onclick(href){
	$("#form1").prop("action",href+"?option=OrderStatusUp");
	$("#form1").submit();
}
//執行更新開啟方式欄位

function cmdTargetWindowUpdate_onclick(href){

	$("#form1").prop("action",href+"?option=TargetWindowUp");

	$("#form1").submit();

}


$(function(){

	$("#form1").find("input:hidden").each(function(){

		if($(this).prop("name").indexOf("SERIALNO")==-1 && $(this).prop("name").indexOf("sortId")==-1 && $(this).prop("name").indexOf("statusId")==-1){

			otherstring = otherstring + "&" + $(this).prop("name") + "=" + $(this).prop("value");					

		}

	});

	

	$(".modifylink").click(function(){
		var temp = $(this).prop("href").split('/');
		var G = "";
		if(temp.length == 1){
			G = temp[0];
		}else{
			G = temp[temp.length-1];
		}
		window.location.href = file_add_modify + "?option=Modify&"+ G + otherstring;
		return false;

    });

   

	$(".otherlink").click(function(){

	    window.location.href = $(this).prop("href") + otherstring;

			return false;

    });

	$(".sortlink").click(function(){

  	var softotherstring = "";

		var thisSf = $(this).prop("href").split("?")[1].split("=")[0];

		$("#form1").find("input:hidden").each(function(){

			if($(this).prop("name")!=thisSf && $(this).prop("name").indexOf("SERIALNO")==-1 && $(this).prop("name").indexOf("sortId")==-1 && $(this).prop("name").indexOf("statusId")==-1){

				softotherstring = softotherstring + "&" + $(this).prop("name") + "=" + $(this).prop("value");					

			}

		});

	    window.location.href = $(this).prop("href") + softotherstring;

			return false;

    });	

})