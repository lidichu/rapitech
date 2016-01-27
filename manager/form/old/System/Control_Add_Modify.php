<?php ob_start(); ?>
<?php
	include_once("../../class/Manager.php");
	include_once("ControlParame.php");
	include_once("../../inc/Fun.php"); 				//公用程序
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

	//新增用SQL
	$AddFieldsSQL = "";
	$AddValuesSQL = "";

	//修改用SQL
	$ModifySQL = "";

	//查詢用
	$Row=null;

	$SQL="Select * From ".$DBTable." Where SerialNo = :SerialNo";
	$Rs = $Conn->prepare($SQL);
	$Rs->bindParam(":SerialNo", $G[$Level]);
	$Rs->execute();
	$Row = $Rs->fetch(PDO::FETCH_ASSOC);
	if($Row){
		$ModifyAcc = $Row["Acc"];
		$ModifyName = $Row["Name"];
		$ModifySerialNo = $Row["SerialNo"];
	}else{
		ReturnToPage($MainFileName,"查無此筆資料","");
	}
	//清空先前的紀錄
	if($YesNo=="true"){
		$SQL = "delete from popedom where Member_ID = :Member_ID";
		$Rs = $Conn->prepare($SQL);
		$Rs->bindParam(":Member_ID", $G[$Level]);
		$Rs->execute();
		$Tree_ID = $_POST["Tree_ID"];
		while (list ($key,$val) = @each ($Tree_ID)) {
			$SQL = "Insert Into popedom(Member_ID,Tree_ID) values(:Member_ID,:Tree_ID)";
			$Rs = $Conn->prepare($SQL);
			$Rs->bindParam(":Member_ID", $G[$Level]);
			$Rs->bindParam(":Tree_ID", $val);
			$Rs->execute();
		}
		ReturnToPage($MainFileName,"修改完成","");
	}

	//查詢此帳號權限資料
	$Popedom = array();
	$SQL = "Select Tree_ID From popedom Where Member_ID = :Member_ID";
	$Rs = $Conn->prepare($SQL);
	$Rs->bindParam(":Member_ID", $G[$Level]);
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		array_push($Popedom,$Row["Tree_ID"]);
	}
	//查詢節點
	if(strtolower($id)!="admin"){
		//非管理者帳號
		$SQL = "Select * From treelist Where AdminUse ='N' Order by Sort";
	}else{
		//管理者帳號
		$SQL = "Select * From treelist Order by Sort";
	}
	$TreeList = array();
	$Rs = $Conn->prepare($SQL);
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		if(strlen($Row["Tree_ID"]) == 2){
			$tmp = array("Tree_Name" => $Row["Tree_Name"],"Nodes" => array());
			$TreeList[$Row["Tree_ID"]] = $tmp;
		}else if(strlen($Row["Tree_ID"]) == 3){
			$tmp = array("Tree_Name" => $Row["Tree_Name"],"Nodes" => array());
			$TreeList[$Row["Tree_ID"]] = $tmp;
		}else if(strlen($Row["Tree_ID"]) == 4){
			$Main_Tree_ID = substr ($Row["Tree_ID"], 0,2);
			if(array_key_exists ( $Main_Tree_ID , $TreeList )){
				$TreeList[$Main_Tree_ID]["Nodes"][$Row["Tree_ID"]] = $Row["Tree_Name"];
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="../../script/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../../script/fun.js"></script>
<script language="javascript" type="text/javascript" src="../../script/NumText.js"></script>
<script language="javascript" src="../../script/My97DatePicker/WdatePicker.js"></script>
<script language="javascript" src="../../script/datepicker.js"></script>
<script language="javascript" src="../../script/twzipcode2.js"></script>
<script language="javascript" type="text/javascript">
function cmdUpdate_onclick(){
	var sError="";
	var msg="是否確定要修改？";
	if(sError!=""){alert(sError);}
	else{if(confirm(msg)){$("#form1").submit();}}
}
function cmdCancel_onclick(){
	<?php
	$VarString = "";
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="G".$i."=".$G[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SF".$i."=".$SF[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="SK".$i."=".$SK[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="TS".$i."=".$TS[$i];}
	for($i=0;$i<=$Level;$i++){if($VarString!=""){$VarString.="&";}$VarString .="P".$i."=".$P[$i];}
	if($VarString!=""){$VarString = "?".$VarString;}
	echo "window.location.href =\"".$MainFileName.$VarString."\"\n";
	?>
}
$(function(){
	var CheckAllflag = true;
	$(".SubItem").click(function(){
		$TB = $(this).parent().parent().parent();
		if($TB.find(".SubItem:checked").length > 0){
			$TB.find(".FolderItem").prop("checked",true);
		}else{
			$TB.find(".FolderItem").prop("checked",false);
		}
	});
	$(".FolderItem").click(function(){
		$TB = $(this).parent().parent().parent();
		$TB.find(".SubItem").prop("checked",$(this).prop("checked"));
	});
	function CheckAll(obj){

	}
	$("#AllCheck").click(function(){
		if(CheckAllflag){
			$("input:checkbox").prop("checked",true);
		}else{
			$("input:checkbox").prop("checked",false);
		}
		CheckAllflag = !CheckAllflag;
	});
});
</script>
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td align="center">
			<table width="560" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px;margin-bottom:25px;" border="0" bgcolor="#FFFFE1">
				<tr>
					<td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000">
						<img src="../../images/computer.gif" BORDER="0" align="absmiddle">&nbsp;修改-<?php echo $TableTitle; ?>&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="center">
			<form action="<?php echo GetSCRIPTNAME();?>?option=Modify&YesNo=true" method="POST" id="form1" name="form1" style="margin:0px;padding:0px;margin-top:40px;" enctype="multipart/form-data">
			<?php
			for($i=0;$i<=$Level;$i++){
				echo "<input type=\"hidden\" name=\"G".$i."\" id=\"G".$i."\" value=\"".$G[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SF".$i."\" id=\"SF".$i."\" value=\"".$SF[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"SK".$i."\" id=\"SK".$i."\" value=\"".$SK[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"TS".$i."\" id=\"TS".$i."\" value=\"".$TS[$i]."\"/>\n";
				echo "<input type=\"hidden\" name=\"P".$i."\" id=\"P".$i."\" value=\"".$P[$i]."\"/>\n";
			}
			?>
			<table width="300" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
				<tr>
					<td>
						<table border="0" bgcolor="#A3BFE2" cellspacing="1" cellpadding="5" width="100%" style="font-size:10pt">
                        	<tr>
                            	<td style="background-color:#FFFFE1;">
									<span style="color:#F00;">§ 帳號：</span><?php echo $ModifyAcc;?> &nbsp;&nbsp;<span style="color:#F00;">§姓名：</span><?php echo $ModifyName;?>
									<?php if($id=="admin"){ ?>
										<input type="button" value="全選" id="AllCheck"/>
									<?php } ?>
								</td>
                            </tr>
                            <tr>
                            	<td style="background-color:#005783;color:#FFF;" align="center">請 勾 選 要 賦 予 使 用 者 權 限 的 功 能</td>
                            </tr>
                        	<tr>
                            	<td style="background-color:#E0EFF8;" align="left">
									<table cellpadding="0" cellspacing="0" width="100%">
									<?php
										foreach($TreeList as $MainID => $Main){
									?>
										<tr>
											<td align="center" style="font-size:10pt;border-bottom:#005783 solid 1px;color:#FF9900;">
												<table cellpadding="0" cellspacing="0" width="80%">
													<tr>
														<td align="left" valign="middle" colspan="2" height="25"><input type="checkbox" class="FolderItem" value="<?php echo($MainID); ?>" name="Tree_ID[]" <?php if(in_array($MainID,$Popedom)){ ?> checked="checked" <?php } ?>><?php echo($Main["Tree_Name"]); ?></td>
													</tr>
													<?php
														foreach($Main["Nodes"] as $SubID => $SubName){
													?>
													<tr>
														<td width="30" height="25">&nbsp;</td>
														<td align="left" valign="middle" colspan="2" height="25" style="color:#000;"><input type="checkbox" class="SubItem" value="<?php echo($SubID); ?>" name="Tree_ID[]" <?php if(in_array($SubID,$Popedom)){ ?> checked="checked" <?php } ?>><?php echo($SubName); ?></td>
													</tr>
													<?php
														}
													?>
												</table>
											</td>
										</tr>
									<?php
										}
									?>
									</table>
                                </td>
                            </tr>
						</table>
					</td>
				</tr>
			</table>
			<input type="button" value="確定" id="cmdEnter" name="cmdEnter" onclick="cmdUpdate_onclick();">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="取消" id="cmdCancel" name="cmdCancel" onClick="cmdCancel_onclick();">
			</form>
		</td>
	</tr>
</table>
</body>
</html>
<?php ob_flush(); ?>