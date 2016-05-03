<?php ob_start(); ?>
<?php
	include_once("../../class/Manager.php");
	include_once("MemberParame.php");
	include_once("../../inc/Fun.php"); 			//公用程序
	include_once("../../inc/CheckHead.php"); 	//權限檢查
	include_once("../../inc/LevelOne.php"); 	//更新狀態與排序
	//層級
	$Level = 0;
	//標題文字
	$TableTitle = $Title01;
	//列表檔案名稱
	$MainFileName = $MainFileName01;
	//修改資料庫名稱
	$DBTable = $DatabaseName01;
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
	$StatusItem[0] = "男";
	$StatusItem[1] = "女";
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
	
	// 讀取職業
	$StatusItem2Text =array();	
	$Param=array(
		"Status"	=>"上架"
	);
	$Temp_Job=GetTable("member_job","*",$Param,"order by Sort, SerialNo");
	
	foreach($Temp_Job as $Row){
		$StatusItem2Text[] = $Row["Content"];
	}
	if(count($StatusItem2Text)==0){
		ReturnToBack("沒有任何職業");
	}
	
	$M = new Manager();
	$M2 = new Manager();
	$M2->AddText("EMail","E-Mail",true);
	$M->AddRadioBox("ActiveStatus","啟用狀態",false,array("true", "false"),array("是", "否"),2,"string","200");
	$M->AddMD5PWD("PWD","密碼",false);
	$M->AddText("MemberName","會員名稱",true);
	$M->AddSelect2("Sex","性別",true,array("請選擇", "男", "女"),array("", "男", "女"));
	$M->AddDate("Birthday","生日",true,date("Y-m-d"));
	$M->AddText("MemberHeight","身高",true);
	$M->AddText("MemberWeight","體重",true);
	$M->AddText("ShirtSize","上衣尺寸",true);
	$M->AddText("PantsSize","褲子尺寸",true);
	$M->AddText("Mobile","手機",false);
	$M->AddText("Tel","市話",false);
	$M->AddAddress("AddressCity","AddressArea","AddressZipCode","AddressOther","地址",false);
	$M->AddSelect2("MemberJob","職業名稱",true,$StatusItem2Text,$StatusItem2Text,"請選擇");
	$M->AddRadioBox("OrderEPaper","是否訂閱電子報",false,array("true", "false"),array("是", "否"),2,"string","200");
	$M->AddRadioBox("IsVIP","是否為VIP",false,array("true", "false"),array("是", "否"),2,"string","200");
	$M->AddText("VIPID","VIP卡號",false);
	
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
			$SQL = "Insert Into ".$DBTable."(".$AddFieldsSQL.") values(".$AddValuesSQL.")";
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
		if($_POST["InternetCheck"]=="on"){
			$_POST["InternetCheck"]="true";
		}else{
			$_POST["InternetCheck"]="false";
		}
		if($_POST["FriendCheck"]=="on"){
			$_POST["FriendCheck"]="true";
		}else{
			$_POST["FriendCheck"]="false";
		}
		if($_POST["SkipCheck"]=="on"){
			$_POST["SkipCheck"]="true";
		}else{
			$_POST["SkipCheck"]="false";
		}
		if($_POST["OtherCheck"]=="on"){
			$_POST["OtherCheck"]="true";
		}else{
			$_POST["OtherCheck"]="false";
		}
		
		if($YesNo=="true"){
			//查詢目前修改id
			$M->ModifyHandle();
			$SQL = "Update ".$DBTable." Set ".$ModifySQL.",`InternetCheck` = '".$_POST["InternetCheck"]."',`FriendCheck` = '".$_POST["FriendCheck"]."',`SkipCheck` = '".$_POST["SkipCheck"]."',`OtherCheck` = '".$_POST["OtherCheck"]."',`OtherText` = '".$_POST["OtherText"]."' Where SerialNo= :SerialNo";
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
		
	}elseif($Option=="ExcelIn"){
		//匯入
		global $Level,$TableTitle,$MainFileName,$DBTable,$M,$G,$SF,$SK,$TS,$P,$YesNo,$AddFieldsSQL,$AddValuesSQL,$Conn;
		global $SKContestArea,$SKFirstPaymentStatus;
		if($YesNo=="true"){
			//設定無限執行時間
			set_time_limit(0);
	
			//引用 PHPExcel Class
			include_once(VisualRoot.'manager/classes/PHPExcel.php');
			
			//引用 PHPExcel IOFactory Class
			include_once(VisualRoot.'manager/classes/PHPExcel/IOFactory.php'); 
	
			//引用 PHPExcel AdvancedValueBinder Class
			include_once(VisualRoot.'manager/classes/PHPExcel/Cell/AdvancedValueBinder.php');
			
			//
			include_once(VisualRoot.'manager/classes/PHPExcel/Reader/Excel5.php');
			
			$FileRoot = VisualRoot.'files/temp/';
	
	
			//判斷是否有上傳檔案
			if($_FILES["File"]["size"] > 0){
	
				$FileName = ($_POST["FileName"]=="")?CheckData($_FILES["File"]["name"]):CheckData($_POST["FileName"]);
				
	
				$FieldNameHiddenValue = FileHandle::Upload($_FILES["File"],$FileRoot,$FileName);
	
				$objReader = PHPExcel_IOFactory::createReader('Excel5');
				$objPHPExcel = $objReader->load($FileRoot.$FieldNameHiddenValue); 	// Excel 路径  
				$sheet = $objPHPExcel->getSheet(0);  
				$highestRow = $sheet->getHighestRow(); 								// 取得總行数  
				 
				if($highestRow > 1){
						for($row = 2;$row <= $highestRow ;$row++){
						$MemberID = $sheet->getCellByColumnAndRow(0,$row)->getValue();
						$MemberName = $sheet->getCellByColumnAndRow(1,$row)->getValue();
						$Sex = $sheet->getCellByColumnAndRow(2,$row)->getValue();
						$Birthday = $sheet->getCellByColumnAndRow(3,$row)->getValue();
						$Birthday = PHPExcel_Shared_Date::ExcelToPHP( $Birthday );
						$Birthday = (date("Y-m-d",$Birthday));
						$MemberHeight = $sheet->getCellByColumnAndRow(4,$row)->getValue();
						$MemberWeight = $sheet->getCellByColumnAndRow(5,$row)->getValue();
						$ShirtSize = $sheet->getCellByColumnAndRow(6,$row)->getValue();
						$PantsSize = $sheet->getCellByColumnAndRow(7,$row)->getValue();
						$EMail = $sheet->getCellByColumnAndRow(8,$row)->getValue();
						$PWD = "nbjaofj41bj1fanf=fqfbkb13bkp451d";
						$Mobile = $sheet->getCellByColumnAndRow(9,$row)->getValue();
						$Tel = $sheet->getCellByColumnAndRow(10,$row)->getValue();
						$AddressCity = $sheet->getCellByColumnAndRow(11,$row)->getValue();
						$AddressArea = $sheet->getCellByColumnAndRow(12,$row)->getValue();
						$AddressZipCode = $sheet->getCellByColumnAndRow(13,$row)->getValue();
						$AddressOther = $sheet->getCellByColumnAndRow(14,$row)->getValue();
						$Address = $AddressCity.$AddressArea.$AddressZipCode.$AddressOther;
						$MemberJob = $sheet->getCellByColumnAndRow(15,$row)->getValue();
						$VIPID = $sheet->getCellByColumnAndRow(16,$row)->getValue();
						$ActiveCode = 'abcdefghij';
						$ActiveTime = date("Y-m-d H:i:s");
						$ActiveStatus = 'true';
						$OrderEPaper = 'false';
						$InternetCheck = 'false';
						$FriendCheck = 'false';
						$SkipCheck = 'false';
						$OtherCheck = 'false';
						$OtherText = '';
						$IsVIP = $VIPID!=""?'true':'false';

						if($MemberName != ""){
							$SQL = "Insert Into ".$DBTable."(`MemberID`,`MemberName`,`Sex`,`Birthday`,`MemberHeight`,`MemberWeight`,`ShirtSize`,`PantsSize`,`EMail`,`PWD`,`Mobile`,`Tel`,`AddressCity`,`AddressArea`,`AddressZipCode`,`AddressOther`,`Address`,`MemberJob`,`ActiveCode`,`ActiveTime`,`ActiveStatus`,`OrderEPaper`,`InternetCheck`,`FriendCheck`,`SkipCheck`,`OtherCheck`,`OtherText`,`IsVIP`,`VIPID`) values('".$MemberID."','".$MemberName."','".$Sex."','".$Birthday."','".$MemberHeight."','".$MemberWeight."','".$ShirtSize."','".$PantsSize."','".$EMail."','".$PWD."','".$Mobile."','".$Tel."','".$AddressCity."','".$AddressArea."','".$AddressZipCode."','".$AddressOther."','".$Address."','".$MemberJob."','".$ActiveCode."','".$ActiveTime."','".$ActiveStatus."','".$OrderEPaper."','".$InternetCheck."','".$FriendCheck."','".$SkipCheck."','".$OtherCheck."','".$OtherText."','".$IsVIP."','".$VIPID."')";
							$Rs = $Conn->prepare($SQL);
							$Rs->execute();
							//mysql_query($SQL,$Conn);
						}
					}
				}			
				FileHandle::Delete($FileRoot,$FieldNameHiddenValue);
				ReturnToPage($MainFileName,"匯入完成","SKContestArea=".$SKContestArea."&SKFirstPaymentStatus=".$SKFirstPaymentStatus);
			}else{
				ReturnToBack("請先選擇欲上傳檔案");
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once('../../inc/IncludeScript.php'); ?>
<?php if($Option!="ExcelIn"){ ?>
<?php $M->{$SFun}() ?>
<?php } ?>
<script language="javascript" type="text/javascript">
function cmdAdd_onclick(){
	var re = /\W/;
	var sError="";
	if(sError!=""){alert(sError);}
	else{$("#form1").submit();} 
}
<?php if($Option!="ExcelIn"){ ?>
//新增按鈕
function cmdAdd_onclick(){
	var sError="";
	<?php $M->CheckScript(); ?>
	if(sError!=""){alert(sError);}
	else{$("#form1").submit();}
}
//修改按鈕
function cmdUpdate_onclick(){
	if($("#OtherText").val() != "" && $("#OtherCheck").prop("checked") == false){
		alert("請勾選其他選項或刪除其他資料");
	}else if($("#OtherText").val() == "" && $("#OtherCheck").prop("checked") == true){
		alert("請輸入其他資料或取消勾選其他選項");
	}else if($("#VIPID").val() == "" && $('input[name=IsVIP]:checked').val() == "true"){
		alert("請輸入VIP卡號或取消勾選VIP會員");
	}else if($("#VIPID").val() != "" && $('input[name=IsVIP]:checked').val() == "false"){
		alert("請勾選VIP會員或刪除VIP卡號");
	}else{
		var sError="";
		<?php $M->CheckScript(); ?>
		var msg="是否確定要修改？";
		if(sError!=""){alert(sError);}
		else{if(confirm(msg)){$("#form1").submit();}}
	}
	
}
<?php } ?>
//取消按鈕
function cmdCancel_onclick(){
	<?php
	$VarString = "";
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}if($i!=$Level){$VarString .="G".$i."=".$G[$i];}}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SF".$i."=".$SF[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SK".$i."=".$SK[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="TS".$i."=".$TS[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="P".$i."=".$P[$i];}
	if($VarString!=""){$VarString.="&";}$VarString .="SKContestArea=".$SKContestArea;
	if($VarString!=""){$VarString.="&";}$VarString .="SKFirstPaymentStatus=".$SKFirstPaymentStatus;
	if($VarString!=""){$VarString = "?".$VarString;}
	echo "window.location.href =\"".$MainFileName.$VarString."\"\n";
	?>
}
</script>
</head>
<body>
<?php if($Option!="ExcelIn"){ ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td align="center">
			<table width="560" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px;margin-bottom:25px" border="0" bgcolor="#FFFFE1">
				<tr>
					<td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000">
						<img src="../../images/manger.gif" BORDER="0" align="absmiddle">&nbsp;<?php echo $TopTitle; ?>&nbsp;&nbsp;&nbsp;
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
						<?php $M2->ReadShow()//  純顯示?>
						<?php $M->{$MFun}() ?>
						<tr>
							<td width="17%" bgcolor="#EEEEEE" nowrap align="right"><font color="#FF8833">如何得知本站&nbsp;</td>
							<td width="83%" bgcolor="#FFFFFF" align="left">
								<table width="100%" border="0" cellspacing="0" cellpadding="2">
									<?php
										$Param=array(
											"SerialNo"	=>$Row["SerialNo"]
										);
										$Temp_Job=GetTable("member","*",$Param,"order by SerialNo",1);
									?>
									<tr>
										<td width="14%" height="24" ><input type="checkbox" name="InternetCheck" id="InternetCheck" <?php if($Temp_Job["InternetCheck"] == "true"){ echo("checked=\"checked\""); } ?> />網路</td>
										<td width="18%" height="24" ><input type="checkbox" name="FriendCheck" id="FriendCheck" <?php if($Temp_Job["FriendCheck"] == "true"){ echo("checked=\"checked\""); } ?> />朋友介紹</td>
										<td width="14%" height="24" ><input type="checkbox" name="SkipCheck" id="SkipCheck" <?php if($Temp_Job["SkipCheck"] == "true"){ echo("checked=\"checked\""); } ?> />略過</td>
										<td width="14%" height="24" ><input type="checkbox" name="OtherCheck" id="OtherCheck" <?php if($Temp_Job["OtherCheck"] == "true"){ echo("checked=\"checked\""); } ?> />其他</td>
										<td width="40%" height="24" ><input type="text" name="OtherText" id="OtherText" value="<?php if($Temp_Job["OtherText"] != ""){ echo($Temp_Job["OtherText"]); } ?>"/></td>
									</tr>
								</table>
							</td>
						</tr>
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
<?php }else{ ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td align="center">
			<table width="560" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px" border="0" bgcolor="#FFFFE1">
				<tr>
					<td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000">
						<img src="../../images/manger.gif" BORDER="0" align="absmiddle">&nbsp;匯入-<?php echo($TableTitle); ?>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
			</table>		
		</td>
	</tr>
	<tr>
		<td align="center">
			<form action="<?php echo GetSCRIPTNAME();?>?option=ExcelIn&YesNo=true" method="POST" id="form1" name="form1" style="margin:0px;padding:0px;margin-top:40px;"  enctype="multipart/form-data" >
			<?php
			for($i=0;$i<=$Level;$i++){
				if($i!=$Level){
					echo "<input type=\"hidden\" name=\"G".$i."\" id=\"G".$i."\" value=\"".$G[$i]."\"/>\n";
				}	
				echo "<input type=\"hidden\" name=\"SF".$i."\" id=\"SF".$i."\" value=\"".$SF[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SK".$i."\" id=\"SK".$i."\" value=\"".$SK[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"TS".$i."\" id=\"TS".$i."\" value=\"".$TS[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"P".$i."\" id=\"P".$i."\" value=\"".$P[$i]."\"/>\n";
			}	
			?>
			<input type="hidden" id="SKContestArea" name="SKContestArea" value="<?php echo($SKContestArea); ?>" />
			<input type="hidden" id="SKFirstPaymentStatus" name="SKFirstPaymentStatus" value="<?php echo($SKFirstPaymentStatus); ?>" />
			<table width="600" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
				<tr> 
					<td>
						<table border="0" bgcolor="#A3BFE2" cellspacing="1" cellpadding="5" width="100%" style="font-size:10pt">
							<tr>
								<td width="17%" bgcolor="#EEEEEE" nowrap align="right"><font color="#FF8833">匯入檔案範例&nbsp;</font></td>
								<td width="83%" bgcolor="#FFFFFF" align="left">&nbsp;&nbsp;<a href="ExcelIn.xls" target="_blank">下載</a></td>
							</tr>
							<tr>
								<td width="17%" bgcolor="#EEEEEE" nowrap align="right"><font color="#FF8833">檔案&nbsp;</font></td>
								<td width="83%" bgcolor="#FFFFFF" align="left">&nbsp;&nbsp;路徑：<input type="file" name="File" id="File" size="40" /></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<input type="button" value="確定" id="cmdEnter" name="cmdEnter" onclick="cmdAdd_onclick();">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="取消" id="cmdCancel" name="cmdCancel" onClick="cmdCancel_onclick();">
			</form>		
		</td>
	</tr>	
</table>
<?php } ?>
</body>
</html>
<?php ob_flush(); ?>