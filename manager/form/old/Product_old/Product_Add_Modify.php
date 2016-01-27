<?php ob_start(); ?>
<?php
	include_once("../../class/Manager.php");
	include_once("ProductParame.php");
	include_once("../../inc/Fun.php"); 			//公用程序
	include_once("../../inc/CheckHead.php"); 	//權限檢查
	include_once("../../inc/LevelOne.php"); 	//更新狀態與排序
	
	//層級
	$Level = 1;
	//標題文字
	$TableTitle = $Title02;
	//列表檔案名稱
	$MainFileName = $MainFileName02;
	//修改資料庫名稱
	$DBTable = $DatabaseName02;
	//接收參數
	$Option = $_REQUEST["option"];
	$YesNo = $_REQUEST["YesNo"];

	for($i=0;$i<=$Level;$i++){
		$G[$i] = $_REQUEST["G".$i];
		$SF[$i] = $_REQUEST["SF".$i];
		$SK[$i] = $_REQUEST["SK".$i];
		$TS[$i] = $_REQUEST["TS".$i];
		$P[$i] = $_REQUEST["P".$i];
	}
	//狀態設定
	$StatusItem[0] = "上架";
	$StatusItem[1] = "下架";
	//接收列表
	$QueryList=Array();
	// 查詢參數
	$QueryParame = array();
	$UrlCode="";
	for($i=0;$i<count($QueryList);$i++){
		if($_REQUEST[$QueryList[$i]]!=""){
			$UrlCode.="&".$QueryList[$i]."=".$_REQUEST[$QueryList[$i]];
		}
	}
	$FilePathArray = array();
	$WidthArray = array();
	$HeightArray = array();
	$BoxModeArray = array();
	foreach($UploadPic2 as $Key => $Value){
		array_push($FilePathArray,$Value["Path"]);
		array_push($WidthArray,$Value["Width"]);
		array_push($HeightArray,$Value["Height"]);
		array_push($BoxModeArray,$Value["BoxMode"]);
	}
	$M = new Manager();
	$M->AddNum("Sort","排序",true,4,"","9999");
	$M->AddSelect2("Status","狀態",true,$StatusItem,$StatusItem,"上架");
	//$M->AddText("ProductID","產品編號",true);
	$M->AddText("ProductName","產品名稱",true);
	$M->AddText("ProductPrice","產品價格",true);
	$M->AddNote1("ProductShow","產品介紹",true);
	$M->AddNote1("SizeList","尺寸表",true);
	$M->AddText("SizeRange","尺寸範圍",true);
	$M->AddPIC3('PIC','商品小圖',true,$FilePathArray,$WidthArray,$HeightArray,'圖片建議寬高 '. $WidthArray[0]."x ".$HeightArray[0]."像素",'','','','PICHidden',$BoxModeArray,95,"",$UploadPic2["PIC"]["Path"]);	
		
	//新增用SQL
	$AddFieldsSQL = "";
	$AddValuesSQL = "";

	//修改用SQL
	$ModifySQL = "";
	if($Option=="Add"){
		
		//各項參數
		$TopTitle="新增-".$TableTitle;
		$MFun="AddShow";
		$SFun="AddScript";
		$Action=GetSCRIPTNAME()."?option=$Option&YesNo=true";
		$ButFun="cmdAdd_onclick()";
		
		if($YesNo=="true"){
			$M->AddHandle();
			if($Level > 0){
				if($AddFieldsSQL != ""){
					$AddFieldsSQL .= ",";
					$AddValuesSQL .= ",";
				}
				$AddFieldsSQL .= "G".($Level-1)."";
				$AddValuesSQL .= ":G".($Level-1);
				$QueryParame[":G".($Level-1)] = $G[$Level-1];
			}
			
			// 產品編號
			$Row=GetTable("product_id","*","","",1);
			if($Row["PYear"]==""){
				$PYear=date("Y")-1911;
				$PMonth=date("m");
				$PID="00001";
				
				$Var1="PYear,PMonth,PID";
				$Var2="'".$PYear."','".$PMonth."','".$PID."'";
				$Param="";
				$SQL = "Insert Into `product_id` (".$Var1.") values (".$Var2.")";
				$Rs = $Conn->prepare($SQL);
				$Rs->execute();
			}else{
				$PYear=$Row["PYear"];
				$PMonth=$Row["PMonth"];
				$PID=$Row["PID"]+1;
				
				if(strlen($PID)==4){
					$PID="0".$PID;
				}else if(strlen($PID)==3){
					$PID="00".$PID;
				}else if(strlen($PID)==2){
					$PID="000".$PID;
				}else if(strlen($PID)==1){
					$PID="0000".$PID;
				}
				
				if($PYear!=date("Y")-1911){
					$PYear=date("Y")-1911;
				}
				if($PMonth!=date("m")){
					$PMonth=date("m");
					$PID="00001";
				}
				$SQL = "Update product_id Set PYear = :PYear, PMonth = :PMonth, PID = :PID";
				$NewID = myExecSQL($SQL, array(
					":PYear" => $PYear,
					":PMonth" => $PMonth,
					":PID" => $PID
				));
			}
			$ProductID=$G[0].$PYear.$PMonth.$PID;
			
			$SQL = "Insert Into ".$DBTable."(".$AddFieldsSQL.",`ProductID`,`RecommendSort`,`NewSort`) values(".$AddValuesSQL.",'".$ProductID."','9999','9999')";
			$Rs = $Conn->prepare($SQL);
			foreach($M->Param as $Field => $Value){
				$Rs->bindParam($Field, $M->Param[$Field]);
			}
			foreach($QueryParame as $Key => $Value){
				$Rs->bindParam($Key,$QueryParame[$Key]);
			}
			
			$Rs->execute();
			ReturnToPage($MainFileName,"新增完成",$UrlCode);
		}
	}elseif($Option=="Modify"){
		//各項參數
		$TopTitle="修改-".$TableTitle;
		$MFun="ModifyShow";
		$SFun="ModifyScript";
		$Action=GetSCRIPTNAME()."?option=$Option&YesNo=true";
		$ButFun="cmdUpdate_onclick()";
		//讀取資料
		$SQL="Select * From ".$DBTable." Where SerialNo = :SerialNo";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(":SerialNo", $G[$Level]);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		if(!$Row){
			ReturnToPage($MainFileName,"查無此筆資料",$UrlCode);
		}
		if($YesNo=="true"){
			//查詢目前修改id
			$M->ModifyHandle();
			$SQL = "Update ".$DBTable." Set ".$ModifySQL." Where SerialNo= :SerialNo";
			$Rs = $Conn->prepare($SQL);
			foreach($M->Param as $Field => $Value){
				$Rs->bindParam($Field, $M->Param[$Field]);
			}
			$Rs->bindParam(":SerialNo", $G[$Level]);
			$Rs->execute();
			ReturnToPage($MainFileName,"修改完成",$UrlCode);
		}
	}elseif($Option=="Download"){
		$SerialNo = $_REQUEST["SerialNo"];
		$FieldName = $_REQUEST["FieldName"];
		$SQL="Select * From ".$DBTable." Where SerialNo = :SerialNo";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(":SerialNo", $SerialNo);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
		FileHandle::Downloadfile($M->Fields[$FieldName]->FilePath.$Row[$M->Fields[$FieldName]->FieldNameHidden],$Row[$M->Fields[$FieldName]->FieldName]);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once('../../inc/IncludeScript.php'); ?>
<?php $M->{$SFun}() ?>
<script language="javascript" type="text/javascript">
$(function(){

});
//新增按鈕
function cmdAdd_onclick(){
	//判斷尺寸範圍格式
	var Horizontal=false;
	var Comma=false;
	var str1=$("#SizeRange").val();
	var str2="-";
	var str3=",";
	var NumOrEn="";
	var CheckError=false;
	
	// 判斷數字
	re = /[0-9,-]/;
	if (re.test(str1)) {
		NumOrEn="num";
	}
	// 判斷英文
	re = /[a-zA-Z,]/;
	if (re.test(str1)) {
		NumOrEn="en";
	}
	// 判斷符號
	var re1 = RegExp(/[(\ )(\~)(\!)(\@)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\_)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\.)(\/)(\<)(\>)(\?)(\)]/);
	if (re1.test(str1)) {
		alert("請勿使用橫線、逗號以外的符號");
		CheckError=true;
	}
	if(str1.search(str2)!="-1"){
		Horizontal=true;
	}
	if(str1.search(str3)!="-1"){
		Comma=true
	}
	
	if(NumOrEn=="en" && Horizontal==true){
		alert("格式錯誤，英文請以逗號隔開");
		CheckError=true;
	}
	
	if(NumOrEn=="num" && Horizontal==true && Comma==true){
		alert("格式錯誤，請勿同時使用兩種格式");
		CheckError=true;
	}
	
	if(CheckError==false){
		var sError="";
		<?php $M->CheckScript(); ?>
		if(sError!=""){alert(sError);}
		else{$("#form1").submit();}
	}
	
}
//修改按鈕
function cmdUpdate_onclick(){
	//判斷尺寸範圍格式
	var Horizontal=false;
	var Comma=false;
	var str1=$("#SizeRange").val();
	var str2="-";
	var str3=",";
	var NumOrEn="";
	var TypeError=false;
	var CheckError=false;
	
	// 判斷數字
	re = /[0-9]/;
	if (re.test(str1)) {
		NumOrEn="num";
	}
	// 判斷英文
	re = /[a-zA-Z]/;
	if (re.test(str1)) {
		NumOrEn="en";
	}
	// 判斷符號
	re = RegExp(/[(\ )(\~)(\!)(\@)(\#)(\$)(\%)(\^)(\&)(\*)(\()(\))(\_)(\+)(\=)(\[)(\])(\{)(\})(\|)(\\)(\;)(\:)(\')(\")(\.)(\/)(\<)(\>)(\?)(\)]/);
	if (re.test(str1)) {
		alert("請勿使用橫線、逗號以外的符號");
		CheckError=true;
	}
	
	if(str1.search(str2)!="-1"){
		Horizontal=true;
	}
	if(str1.search(str3)!="-1"){
		Comma=true
	}
	
	if(NumOrEn=="en" && Horizontal==true){
		alert("格式錯誤，英文請以逗號隔開");
		CheckError=true;
	}
	
	if(NumOrEn=="num" && Horizontal==true && Comma==true){
		alert("格式錯誤，請勿同時使用兩種格式");
		CheckError=true;
	}
	if(CheckError==false){
		var sError="";
		<?php $M->CheckScript(); ?>
		var msg="是否確定要修改？";
		if(sError!=""){alert(sError);}
		else{if(confirm(msg)){$("#form1").submit();}}
	}
}
//取消按鈕
function cmdCancel_onclick(){
	<?php
	$VarString = $UrlCode;
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}if($i!=$Level){$VarString .="G".$i."=".$G[$i];}}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SF".$i."=".$SF[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SK".$i."=".$SK[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="TS".$i."=".$TS[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="P".$i."=".$P[$i];}
	if($VarString!=""){$VarString = "?".$VarString;}
	echo "window.location.href =\"".$MainFileName.$VarString."\"\n";
	?>
}
</script>
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>

		<td align="center">
			<table width="560" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px;margin-bottom:25px" border="0" bgcolor="#FFFFE1">
				<tr>
					<td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000">
						<img src="../../images/computer.gif" BORDER="0" align="absmiddle">&nbsp;<?php echo $TopTitle; ?>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<form action="<?php echo $Action?>" method="POST" id="form1" name="form1" enctype="multipart/form-data" >
			<?php
			for($i=0;$i<=$Level;$i++){
				echo "<input type=\"hidden\" name=\"G".$i."\" id=\"G".$i."\" value=\"".$G[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SF".$i."\" id=\"SF".$i."\" value=\"".$SF[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SK".$i."\" id=\"SK".$i."\" value=\"".$SK[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"TS".$i."\" id=\"TS".$i."\" value=\"".$TS[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"P".$i."\" id=\"P".$i."\" value=\"".$P[$i]."\"/>\n";
			}
			 for($i=0;$i<count($QueryList);$i++){
				echo "<input type=\"hidden\" name=\"".$QueryList[$i]."\" id=\"H_".$QueryList[$i]."\" value=\"".$_REQUEST[$QueryList[$i]]."\"/>\n";
			}
			?>
			<table width="600" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
				<tr>
					<td>
						<table border="0" bgcolor="#A3BFE2" cellspacing="1" cellpadding="5" width="100%" style="font-size:10pt">
						<?php $M->{$MFun}() ?>
						</table>
					</td>
				</tr>
			</table>
			<input type="button" value="確定" id="cmdEnter" name="cmdEnter" onclick="<?php echo $ButFun?>">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="取消" id="cmdCancel" name="cmdCancel" onClick="cmdCancel_onclick();">
			</form>
		</td>
	</tr>
</table>
</body>
</html>
<?php ob_flush(); ?>