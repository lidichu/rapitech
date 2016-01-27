<?php ob_start(); ?>
<?php
include_once("../../class/Manager.php");
include_once("../../inc/Fun.php"); 			//公用程序
include_once("../../inc/CheckHead.php"); 	//權限檢查
include_once("../../inc/LevelOne.php"); 			//更新狀態與排序
include_once('backup_restore.class.php');
$DirPath=VisualRoot."files/BackSQL/";
CreatDir($DirPath);
$Option = $_REQUEST["option"];
$Method = $_REQUEST["method"];
$SelTable=$_REQUEST["SelTable"];
if($Option=="GetColumns"){
	$table = $_REQUEST["table"];
	$Rtn = array("table" => $table,"data"=>"", "Err" => "","SQL" => "");
	$SQL = "SHOW FULL FIELDS FROM ". $table[0];
	$Rs = $Conn->prepare($SQL);
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		$obj = array();
		$obj["ColumnName"] = $Row["Field"];
		$Rtn["data"][] = $obj;
	}
	echo json_encode($Rtn);
	exit();
}
if($Method=="AddColumn"){
	$Columns=$_REQUEST["columns"];
	$ColumnName=$_REQUEST["ColumnName"];
	
	$ColumnType=$_REQUEST["ColumnType"];
	$ColumnLenght=$_REQUEST["ColumnLenght"];
	if($ColumnLenght==""){
		$ColumnLenght=255;
	}
	$ColumnNote=$_REQUEST["ColumnNote"];
	$Ontable=$_REQUEST["ontable"];
	$Sql="ALTER TABLE $Ontable ADD $ColumnName $ColumnType( $ColumnLenght ) NOT NULL COMMENT '$ColumnNote' AFTER $Columns ";
	$Rs = $Conn->prepare($Sql);
	$Rs->execute();
	ReturnToPage(GetSCRIPTNAME(),"新增完成","SelTable=$Ontable");
	exit();
}
if($Option=="DelColumn"){
	$ColumnsArray=$_REQUEST["columns"];
	$Ontable=$_REQUEST["ontable"];
	for($i=0;$i<count($ColumnsArray);$i++){
		$DelCols=$ColumnsArray[$i];
		if($DelCols!="SerialNo"){
			$Sql="ALTER TABLE $Ontable DROP `$DelCols`";
			$Rs = $Conn->prepare($Sql);
			$Rs->execute();
		}
	}
	exit();
}
if($Option=="DelTable"){
	$TableArray=$_REQUEST["ontable"];
	for($i=0;$i<count($TableArray);$i++){
		$DelTable=$TableArray[$i];
		if($DelTable!="m_member" && $DelTable!="popedom" && $DelTable!="treelist" && $DelTable!=""){
			$Sql="DROP TABLE $DelTable";
			$Rs = $Conn->prepare($Sql);
			$Rs->execute();
		}
	}
	exit();
}
if($Option=="Upload"){
	$FieldNameHiddenValue = FileHandle::Upload($_FILES["UploadFile"],$DirPath,"");
	ReturnToPage(GetSCRIPTNAME(),"上傳完畢","");
}
if($Method=="ClearTable"){
	$Ontable=$_REQUEST["ontable"];
	$TableArray=explode(",", $Ontable);
	for($i=0;$i<count($TableArray);$i++){
		$DelTable=$TableArray[$i];	
		$Sql="TRUNCATE  $DelTable";
		$Rs = $Conn->prepare($Sql);
		$Rs->execute();		
	}
	ReturnToPage(GetSCRIPTNAME(),"清空完成","SelTable=$DelTable");
	exit();
}
if($Method=="Sql"){
	$Sql=$_REQUEST["SqlNote"];	
	$Sql=Str_replace("\'","'",$Sql);
	$Rs = $Conn->prepare($Sql);
	$Rs->execute();
	ReturnToPage(GetSCRIPTNAME(),"執行完成","SelTable=$Ontable");
	exit();
}
if($Method=="SelectTable"){
	$Ontable=$_REQUEST["ontable"];
	$SelTable=$Ontable;
	$SelectDiv=true;
}
if($Method=="SaveSql"){
	$newImport = new backup_restore ($DbHost,$DbName,$DbUser,$DbPwd,'*');
	$message=$newImport -> backup ();
	ReturnToPage(GetSCRIPTNAME(),$message,"");
}
if($Method=="BackSql"){
	$onSql=$_REQUEST["onSql"];
	$newImport = new backup_restore ($DbHost,$DbName,$DbUser,$DbPwd,'*');
	$message=$newImport -> restore ($DirPath.$onSql);
	echo $message;
}
if($Method=="DownloadSql"){
	$onSql=$_REQUEST["onSql"];
	FileHandle::Downloadfile($DirPath.$onSql,$onSql);
	exit();
}
if($Method=="ReturnSql"){
	$onSql=$_REQUEST["onSql"];
	$DelFileName = FileHandle::Delete($DirPath,$onSql);
	ReturnToPage(GetSCRIPTNAME(),"刪除完成","");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript" src="../../script/jquery.js"></script>
<script language="javascript" src="../../script/fun.js"></script>
<script language="javascript" src="../../script/Leavel.js"></script>
<script type="text/javascript" src="../../script/NumText.js"></script>
<script language="javascript">var file_add_modify = "<?php echo $ModifyFileName; ?>";</script>
<link type="text/css" href="../../script/Dialog/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" />
<script type="text/javascript" src="../../script/Dialog/jquery-ui-1.10.3.custom.js"></script>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var SelTable="<?php echo $SelTable?>";
$(function(){
	$("#tables").change(function(){
		if($(this).val()!="" && $(this).val()!=null){
			GetColumn($(this).val());
		}
	});
	if(SelTable!=""){
		$("#tables").val(SelTable);
	}
	if($("#tables").val()!="" && $("#tables").val()!=null){
		GetColumn($("#tables").val());
	}
	$("#btnCopy").click(function(){
		$("#ColumnName").val($("#columns").val());
	});
	$("#btnShowDialog").click(function(){

		if($("#ontable").val()=="" && $("#ontable").val()==null ){
			alert("沒有選擇資料表");
			return false;
		}
		$(".ColumnClass").show();
		$(".AddClass").show();
		$("#dialog-modal").attr("Title","請輸入要新增的欄位名稱");
		$("#method").val("AddColumn");
		$("#dialog-modal").dialog({
			height: 320,
			width: 400,
			modal: true
		});
		return false;
	});
	$("#btnShowDialog2").click(function(){
		var msg="是否確定刪除？";
		if(confirm(msg)){
			if($("#TopColumns").val()!="" && $("#TopColumns").val()!=null){
				var url = "<?php echo(GetScriptName()); ?>";
				var options = {
					option : "DelColumn",
					ontable : $("#ontable").val(),
					columns : $("#TopColumns").val(),
				}
				var test = false;
				if(test){
					var vars = "";
					for(var key in options){
						if(vars!="") vars += "&";
						vars += key + "=" + options[key];
					}
					window.open(url +"?" + vars);

				}else{
					$.post(url,options,function(data){
						
						GetColumn($("#tables").val());
						alert("刪除完畢");
					});
				}
			}else if($("#tables").val()!="" && $("#tables").val()!=null){
				var url = "<?php echo(GetScriptName()); ?>";
				var options = {
					option : "DelTable",
					ontable : $("#tables").val(),
				}
				var test = false;
				if(test){
					var vars = "";
					for(var key in options){
						if(vars!="") vars += "&";
						vars += key + "=" + options[key];
					}
					window.open(url +"?" + vars);

				}else{
					$.post(url,options,function(data){
						window.location="<?php GetScriptName()?>";
					});
				}
			}
		}
	});
	$("#btnShowDialog3").click(function(){
		if($("#ontable").val()=="" && $("#ontable").val()==null ){
			alert("沒有選擇資料表");
			return false;
		}
		var msg="是否確定清空？";
		if(confirm(msg)){
			$("#method").val("ClearTable");
			
			$("#DialogForm").submit();
		}
		return false;
	});
	$("#btnShowDialog4").click(function(){
		$(".SQLClass").show();
		$("#method").val("Sql");
		$("#dialog-modal").attr("Title","請輸入要執行的語法");
		$("#dialog-modal").dialog({
			height: 600,
			width: 800,
			modal: true
		});
		return false;
	});
	$("#btnShowDialog5").click(function(){
		if($("#ontable").val()=="" && $("#ontable").val()==null ){
			alert("沒有選擇資料表");
			return false;
		}
		$("#method").val("SelectTable");
		$("#DialogForm").submit();
		return false;
	});
	$("#btnShowDialog6").click(function(){
		$("#method").val("SaveSql");
		$("#DialogForm").submit();
		return false;
	});
	$("#btnShowDialog7").click(function(){
		if($("#Sqls").val()==""){
			alert("沒有選擇資料庫檔案");
			return false;
		}
		$("#onSql").val($("#Sqls").val());
		$("#method").val("DownloadSql");
		$("#DialogForm").submit();
		return false;
	});
	$("#btnShowDialog8").click(function(){
		if($("#Sqls").val()==""){
			alert("沒有選擇資料庫檔案");
			return false;
		}
		$("#onSql").val($("#Sqls").val());
		var msg="是否確定刪除？";
		if(confirm(msg)){
			$("#method").val("ReturnSql");
			$("#DialogForm").submit();
		}
		return false;
	});
	$("#btnShowDialog9").click(function(){
		if($("#Sqls").val()==""){
			alert("沒有選擇資料庫檔案");
			return false;
		}
		$("#onSql").val($("#Sqls").val());
		var msg="是否確定還原？";
		if(confirm(msg)){
			$("#method").val("BackSql");
			$("#DialogForm").submit();
		}
		return false;
	});
	$("#btnShowDialog10").click(function(){
		if($("#UploadFile").val()==""){
			alert("未選擇資料庫檔案");
			return false;
		}
		$("#form1").submit();
		return false;
	});
	$("#btnform").click(function(){
		$("#DialogForm").submit();
		$('#dialog-modal').dialog('close');

	});
	$("#btncancel").click(function(){
		$('#dialog-modal').dialog('close');
		$(".ColumnClass").hide();
		$(".AddClass").hide();
	});
	$("#dialog:ui-dialog" ).dialog( "destroy" );
});
function GetColumn(val){
	$("#ontable").val(val);
	var url = "<?php echo(GetScriptName()); ?>";
	var options = {
		option : "GetColumns",
		table : val,
	}
	var test = false;
	if(test){
		var vars = "";
		for(var key in options){
			if(vars!="") vars += "&";
			vars += key + "=" + options[key];
		}
		window.open(url +"?" + vars);

	}else{
		$.post(url,options,function(data){
			data = $.parseJSON(data);
			if(data.Err !=""){
				alert(data.Err);
			}else{
				option="";
				for(var key1 in data["data"]){
					option += "<option value=\""+data["data"][key1].ColumnName+"\">"+data["data"][key1].ColumnName+"</option>\n";
				}
				$(".ColumnsClass").html(option);
			}
		});
	}
}
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td align="center">
            <table width="500" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px;margin-bottom:20px;" border="0" bgcolor="#FFFFE1">
                <tr>
                    <td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000"><img src="../../images/computer.gif" border="0" align="absmiddle">&nbsp;<?php echo "資料庫管理"; ?>&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>
        </td>
	</tr>
	 <tr>
    	<td align="center">
            <form action="<?php echo GetSCRIPTNAME(); ?>"  method="post" name="form1" id="form1" style="margin:0px;padding:0px;margin-top:20px;"  enctype="multipart/form-data">
                <input type="hidden" id="option" name="option" value="Upload"/>
                <table width="520" border="1" cellspacing="0">
                    <tr>
                        <td>
                            <table id="WebTable"  border="0"  cellspacing="1" cellpadding="5" width="100%" style="font-size:10pt">
								<tr>
									<td style="border-right:1px #000 solid" bgcolor="#EEEEEE" align="right">備份</td>
									<td >
										<?php

											$handle=opendir($DirPath);
											while ($file = readdir($handle)){
												if(is_file($DirPath.$file)){
													$SqlDir[]=$file;
												}
											};
											echo "<select id=\"Sqls\" name=\"Sqls\">";
											echo "<option value=''>請選擇</option>";
											CreateOptionArray($SqlDir,$SqlDir,"");
											echo "</select>";
										?>
									</td>
								</tr>
								<tr>
									<td style="border-right:1px #000 solid" bgcolor="#EEEEEE" align="right">資料表</td>
									<td >
										<?php
											$Sql="Show Tables ";
											$Rs = $Conn->prepare($Sql);
											$Rs->execute();
											while($Row = $Rs->fetchColumn()){
												$TabelArray[]=$Row;
											}
											echo "<select id=\"tables\" name=\"table\" multiple style=\"height:300px;width:300px;\">";
											echo "<option value=''>請選擇</option>";
											CreateOptionArray($TabelArray,$TabelArray,"");
											echo "</select>";
										?>
									</td>
								</tr>
								<tr>
									<td style="border-right:1px #000 solid" bgcolor="#EEEEEE" align="right">欄位</td>
									<td align="left" valign="middle">
										<?php
											echo "<select Class=\"ColumnsClass\" id=\"TopColumns\" name=\"TopColumns\" multiple></select>";
										?>
									</td>
								</tr>
                            </table>
                        </td>
                    </tr>
                </table>
				<input type="button" value="新增欄位" id="btnShowDialog">
				<input type="button" value="刪除欄位" id="btnShowDialog2">
				<input type="button" value="清空" id="btnShowDialog3">
				<input type="button" value="SQL" id="btnShowDialog4">
				<input type="button" value="查詢欄位" id="btnShowDialog5"><br>
				<input type="button" value="備份資料庫備份" id="btnShowDialog6">
				<input type="button" value="下載資料庫備份" id="btnShowDialog7">
				<input type="button" value="還原資料庫" id="btnShowDialog9">
				<input type="button" value="刪除資料庫備份" id="btnShowDialog8"><br>
				<input type="file" id="UploadFile" name="UploadFile" value="上傳資料庫">
				<input type="button" value="上傳資料庫" id="btnShowDialog10"><br>
            </form>
        </td>
    </tr>
</table>
<div id="dialog-modal" title="" style="display:none">
	<form action="<?php echo GetSCRIPTNAME(); ?>" method="POST" id="DialogForm" name="DialogForm">
		<?php
			for($i=0;$i<=$Level;$i++){
				if($i!=$Level){
					echo "<input type=\"hidden\" name=\"G".$i."\" id=\"G".$i."\" value=\"".$G[$i]."\"/>\n";
					echo "<input type=\"hidden\" name=\"SF".$i."\" id=\"SF".$i."\" value=\"".$SF[$i]."\"/>\n";
					echo "<input type=\"hidden\" name=\"SK".$i."\" id=\"SK".$i."\" value=\"".$SK[$i]."\"/>\n";
					echo "<input type=\"hidden\" name=\"TS".$i."\" id=\"TS".$i."\" value=\"".$TS[$i]."\"/>\n";
					echo "<input type=\"hidden\" name=\"P".$i."\" id=\"P".$i."\" value=\"".$P[$i]."\"/>\n";
				}
			}
		?>
		<input type="hidden" name="method" id="method" value="" />
		<input type="hidden" name="ontable" id="ontable" value="" />
		<input type="hidden" name="onSql" id="onSql" value="" />
		<table cellspacing="0" cellpadding="0" width="100%" border="0" style="margin-top:20px;">
			<tr>
				<td align="center">
					<table cellspacing="2" cellpadding="2" border="0">
						<tr Class="ColumnClass" style="display:none">
							<td align="right" valign="middle" style="font-size:16px;">欄位：</td>
							<td align="left" valign="middle">
								<?php
									echo "<select Class=\"ColumnsClass\" id=\"columns\" name=\"columns\"></select>";
								?>
							</td>
						</tr>
						<tr Class="AddClass" style="display:none">
							<td align="right" valign="middle" style="font-size:16px;">欄位名稱：</td>
							<td align="left" valign="middle"><input type="text" id="ColumnName" name="ColumnName" value="" style="width:120px;" /><input id="btnCopy" type="button" value="複製"></td>
						</tr>
						<tr Class="AddClass" style="display:none">
							<td align="right" valign="middle" style="font-size:16px;">屬性：</td>
							<td align="left" valign="middle">
								<select name="ColumnType">
									<option value="VARCHAR">字串</option>
									<option value="INT">數字</option>
									<option value="TEXT">Text</option>
								</select>
							</td>
						</tr>
						<tr Class="AddClass" style="display:none">
							<td align="right" valign="middle" style="font-size:16px;">長度：</td>
							<td align="left" valign="middle">
								<input type="text" id="ColumnLenght" name="ColumnLenght" value="" style="width:120px;" />
							</td>
						</tr>
						<tr Class="AddClass" style="display:none">
							<td colspan="2" style="font-size:1px;height:10px;">&nbsp;</td>
						</tr>
						<tr Class="AddClass" style="display:none">
							<td align="right" valign="middle" style="font-size:16px;">備註：</td>
							<td align="left" valign="middle"><input type="text" id="ColumnNote" name="ColumnNote" value="" style="width:120px;" /></td>
						</tr>
						<tr Class="SQLClass" style="display:none">
							<td align="right" valign="middle" style="font-size:16px;">語法：</td>
							<td align="left" valign="middle"><textarea style="width:650px;height:400px" id="SqlNote" name="SqlNote"></textarea></td>
						</tr>

						<tr>
							<td colspan="2" align="center">
								<input type="button" id="btnform" style="font-size:16px;" value="確定" />
								<input type="button" id="btncancel" style="font-size:16px;" value="取消" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php	if($SelectDiv){?>
<div  align="center" style="margin: 0px auto;width:800px;height:400px;overflow:auto;padding-top:30px" >
<table border="1"  align="center">
	<tr>
		<?php
			$fields = array();
			$Sql="SHOW FULL FIELDS FROM ".$Ontable;
			$Rs = $Conn->prepare($Sql);
			$Rs->execute();
			while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
				$fields[] = $Row["Field"];
		?>
		<td align="center" height="25" style="border-right:1px solid #666;">
			<?php echo $Row["Field"]."<br>".$Row["Type"]."<br />".$Row["Comment"]; ?>
		</td>
		<?php				
			}
		?>
	</tr>
	<?php
			$Sql="Select * from ".$Ontable;
			$Rs = $Conn->prepare($Sql);
			$Rs->execute();
			while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
	?>
	<tr>
		<?php
				foreach($fields as $Field){
		?>
		<td	align="center" height="30">
			<div style="margin: 0px auto;height:200px;overflow:auto">
				<?php echo $Row[$Field]; ?>
			</div>
		</td>
		<?php
				}
		?>
	</tr>
	<?php
			}
	?>
</table>
</div>
<?php	}?>
</body>
</html>

<?php ob_flush(); ?>