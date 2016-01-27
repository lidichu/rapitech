<?php extract($_GET); ?>
<?php ob_start(); ?>
<?php
include_once("../../class/Manager.php");
include_once("../../inc/Fun.php"); 			//公用程序
include_once("../../inc/CheckHead.php"); 	//權限檢查
$DataPath="Mod_Data.php";
$opp=$_POST["opp"];
if (!file_exists($DataPath)){
	$fp = fopen($DataPath,'w+');
	fputs($fp,'<?php'."\r\n\r\n".'?>');
	fclose($fp);
}
include_once("Mod_Data.php"); 	//載入參數檔
chmod($DataPath, 0777);
	//$ModName="檔案下載";
	//送出方式
	//$PostMethod="MyIframe";
	$PostMethod="";
	//基本參數設定

	$DBName01="download";
	if($opp=="Modify"){
		foreach($_POST as $Key=>$val){
			$Data[$Key]=$val;
		}
		unset($Data["opp"]);
		$New='<?php'."\r\n";
		foreach($Data as $Key=>$val){
			$New.='$'.$Key.'="'.$val.'";'."\r\n";
		}
		$New.='?>';
		$fp = fopen($DataPath,'w+');

		fputs($fp,$New);
		fclose($fp);
		notify("參數修改完畢","Install.php");
	}elseif($opp=="Install"){
		//資料庫安裝
		$ModName01=$ModName;
		$ModName02=$ModName2;
		$ModName03=$ModName3;
		$DBName01=$DatabaseName01;
		$DBName02=$DatabaseName02;
		$DBName03=$DatabaseName03;
		$SqlView=$_POST["SqlView"];
		if($SqlView){
			$InstallFile="Install.sql";
			if (file_exists($InstallFile)){
				$sql_value="";
				$sqls=file($InstallFile);
				foreach($sqls as $sql){
					$sql_value.=$sql;
				}
				$sql_value = str_replace("{ModName01}", $ModName01, $sql_value);
				$sql_value = str_replace("{ModName02}", $ModName02, $sql_value);
				$sql_value = str_replace("{ModName03}", $ModName03, $sql_value);
				$sql_value = str_replace("{DBName01}", $DBName01, $sql_value);
				$sql_value = str_replace("{DBName02}", $DBName02, $sql_value);
				$sql_value = str_replace("{DBName03}", $DBName03, $sql_value);
				$a=explode(";\r\n", $sql_value);
				$total=count($a)-1;
				$Conn->exec("SET CHARACTER SET utf8");
				for ($i=0;$i<$total;$i++){
					$Conn->exec("SET CHARACTER SET utf8");
					$Conn->exec($a[$i]);
				}
				echo "資料庫建立成功";
			}else{
			   echo "文件不存在";
			}
		}
		//主選單處理
		$Tree_id=$_POST["Tree_id"];
		$Tree_Name=$_POST["Tree_Name"];
		$Tree_View=$_POST["Tree_View"];

		if($Tree_View!=""){
			$Tree_View="Y";
		}else{
			$Tree_View="N";
		}

		if($Tree_id!=""){
			$Sql="DELETE FROM `treelist` WHERE `Tree_ID` = '".$Tree_id."'";
			$Conn->exec($Sql);
			$Sql="INSERT INTO `treelist`(`Tree_ID`, `Tree_Name`, `Href_File`, `FileName`, `Sort`, `AdminUse`) VALUES ".
				 "('".$Tree_id."','".$Tree_Name."', '', '', '".$Tree_id."00', '".$Tree_View."')";
			$Conn->exec($Sql);
		}
		//項目選單處理
		$Menu_id=$_POST["Menu_id"];
		$Menu_Name=$_POST["Menu_Name"];
		$Menu_Path=$_POST["Menu_Path"];
		$Menu_File=$_POST["Menu_File"];
		$Menu_View=$_POST["Menu_View"];

		if($Menu_View!=""){
			$Menu_View="Y";
		}else{
			$Menu_View="N";
		}

		if($Menu_id!=""){
			$Sql="DELETE FROM `treelist` WHERE `Tree_ID` = '".$Menu_id."'";
			$Conn->exec($Sql);
			$Sql="INSERT INTO `treelist`(`Tree_ID`, `Tree_Name`, `Href_File`, `FileName`, `Sort`, `AdminUse`) VALUES ".
				 "('".$Menu_id."','".$Menu_Name."', '".$Menu_Path."', '".$Menu_File."', '".$Menu_id."', '".$Menu_View."')";
			$Conn->exec($Sql);
		}
		notify("模組安裝完成","Install.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>台南網路-資料庫系統</title>
<script type="text/javascript" src="../../script/jquery.js"></script>
<script type="text/javascript" src="../../script/NumText.js"></script>
<script type="text/javascript">
$(function(){
	$(".NumText").NumText();
	$("#btnModify").click(function(){
		$("#opp").val("Modify")
		$("#form1").submit();
	});
	$("#btnInstall").click(function(){
		$("#opp").val("Install")
		$("#form1").submit();
	});
});
</script>
</head>
<body>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="50%" valign="top">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td bgcolor="#FFFFFF" align="center" colspan="3">
						<span style="color:blue;font-size:30pt">模組安裝</span>
					</td>
				</tr>
				<tr>
					<td valign="top" bgcolor="#FFFFFF" align="center" style="padding-top:20px">
						<form id="form1" action="Install.php" method="POST" enctype="multipart/form-data" target="<?php echo $PostMethod?>">
						<input type="hidden" value="Modify" id="opp" name="opp">
							<table border="0" align="center" cellpadding="1" cellspacing="1">
								<tr>
									<td colspan="2" style="height:5px;background-color:#351284;color:red;text-align:center">檔案參數(產品類別)</td>
								</tr>
								<tr>
									<td align="right">模組名稱： </td>
									<td><input style="width:200px" type="text" name="ModName" id="ModName" value="<?php echo $ModName?>"></td>
								</tr>
								<tr>
									<td align="right">主頁檔案名稱： </td>
									<td><input style="width:200px" type="text" name="MainFileName01" id="MainFileName01" value="<?php echo $MainFileName01?>"></td>
								</tr>
								<tr>
									<td align="right">修改頁檔案名稱： </td>
									<td><input style="width:200px" type="text" name="ModifyFileName01" id="ModifyFileName01" value="<?php echo $ModifyFileName01?>"></td>
								</tr>
								<tr>
									<td align="right">資料表名稱： </td>
									<td><input style="width:200px" type="text" name="DatabaseName01" id="DatabaseName01" value="<?php echo $DatabaseName01?>"></td>
								</tr>
								<tr>
									<td align="right">資料表名稱(顯示用)： </td>
									<td><input style="width:200px" type="text" name="DatabaseName01_S" id="DatabaseName01_S" value="<?php echo $DatabaseName01_S?>"></td>
								</tr>
								<tr>
									<td align="right">上傳檔案路徑(首頁圖)： </td>
									<td><input style="width:200px" type="text" name="CategoryPicPath" id="CategoryPicPath" value="<?php echo $CategoryPicPath?>"></td>
								</tr>
								<tr>
									<td align="right">圖片寬度(首頁圖)： </td>
									<td><input style="width:200px" class="NumText" type="text" name="CategoryPicWidth" id="CategoryPicWidth" value="<?php echo $CategoryPicWidth?>"></td>
								</tr>
								<tr>
									<td align="right">圖片高度(首頁圖)： </td>
									<td><input style="width:200px" class="NumText" type="text" name="CategoryPicHeight" id="CategoryPicHeight" value="<?php echo $CategoryPicHeight?>"></td>
								</tr>
								<tr>
									<td align="right">圖片是否強制截圖(首頁圖)： </td>
									<td><input style="width:200px" type="text" name="CategoryPicMode" id="CategoryPicMode" value="<?php echo $CategoryPicMode?>"></td>
								</tr>
								<tr>
									<td align="right">上傳檔案路徑(列表圖)： </td>
									<td><input style="width:200px" type="text" name="CategoryPicPath2" id="CategoryPicPath2" value="<?php echo $CategoryPicPath2?>"></td>
								</tr>
								<tr>
									<td align="right">圖片寬度(列表圖)： </td>
									<td><input style="width:200px" class="NumText" type="text" name="CategoryPicWidth2" id="CategoryPicWidth2" value="<?php echo $CategoryPicWidth2?>"></td>
								</tr>
								<tr>
									<td align="right">圖片高度(列表圖)： </td>
									<td><input style="width:200px" class="NumText" type="text" name="CategoryPicHeight2" id="CategoryPicHeight2" value="<?php echo $CategoryPicHeight2?>"></td>
								</tr>
								<tr>
									<td align="right">圖片是否強制截圖(列表圖)： </td>
									<td><input style="width:200px" type="text" name="CategoryPicMode2" id="CategoryPicMode2" value="<?php echo $CategoryPicMode2?>"></td>
								</tr>
								<tr>
									<td colspan="2" style="height:5px;background-color:#351284;color:red;text-align:center">檔案參數(產品)</td>
								</tr>
								<tr>
									<td align="right">模組名稱： </td>
									<td><input style="width:200px" type="text" name="ModName2" id="ModName2" value="<?php echo $ModName2?>"></td>
								</tr>
								<tr>
									<td align="right">主頁檔案名稱： </td>
									<td><input style="width:200px" type="text" name="MainFileName02" id="MainFileName02" value="<?php echo $MainFileName02?>"></td>
								</tr>
								<tr>
									<td align="right">修改頁檔案名稱： </td>
									<td><input style="width:200px" type="text" name="ModifyFileName02" id="ModifyFileName02" value="<?php echo $ModifyFileName02?>"></td>
								</tr>
								<tr>
									<td align="right">資料表名稱： </td>
									<td><input style="width:200px" type="text" name="DatabaseName02" id="DatabaseName02" value="<?php echo $DatabaseName02?>"></td>
								</tr>
								<tr>
									<td align="right">資料表名稱(顯示用)： </td>
									<td><input style="width:200px" type="text" name="DatabaseName02_S" id="DatabaseName02_S" value="<?php echo $DatabaseName02_S?>"></td>
								</tr>
								<tr>
									<td colspan="2" style="height:5px;background-color:#351284;color:red;text-align:center">檔案參數(產品圖片)</td>
								</tr>
								<tr>
									<td align="right">模組名稱： </td>
									<td><input style="width:200px" type="text" name="ModName3" id="ModName3" value="<?php echo $ModName3?>"></td>
								</tr>
								<tr>
									<td align="right">主頁檔案名稱： </td>
									<td><input style="width:200px" type="text" name="MainFileName03" id="MainFileName03" value="<?php echo $MainFileName03?>"></td>
								</tr>
								<tr>
									<td align="right">修改頁檔案名稱： </td>
									<td><input style="width:200px" type="text" name="ModifyFileName03" id="ModifyFileName03" value="<?php echo $ModifyFileName03?>"></td>
								</tr>
								<tr>
									<td align="right">資料表名稱： </td>
									<td><input style="width:200px" type="text" name="DatabaseName03" id="DatabaseName03" value="<?php echo $DatabaseName03?>"></td>
								</tr>
								<tr>
									<td align="right">資料表名稱(顯示用)： </td>
									<td><input style="width:200px" type="text" name="DatabaseName03_S" id="DatabaseName03_S" value="<?php echo $DatabaseName03_S?>"></td>
								</tr>
								
								<tr>
									<td align="right">上傳檔案路徑(放大圖)： </td>
									<td><input style="width:200px" type="text" name="UploadPicPath2" id="UploadPicPath2" value="<?php echo $UploadPicPath2?>"></td>
								</tr>
								<tr>
									<td align="right">圖片寬度(放大圖)： </td>
									<td><input style="width:200px" class="NumText" type="text" name="UploadPicWidth2" id="UploadPicWidth2" value="<?php echo $UploadPicWidth2?>"></td>
								</tr>
								<tr>
									<td align="right">圖片高度(放大圖)： </td>
									<td><input style="width:200px" class="NumText" type="text" name="UploadPicHeight2" id="UploadPicHeight2" value="<?php echo $UploadPicHeight2?>"></td>
								</tr>
								<tr>
									<td align="right">圖片是否強制截圖(放大圖)： </td>
									<td><input style="width:200px" type="text" name="UploadPicMode2" id="UploadPicMode2" value="<?php echo $UploadPicMode2?>"></td>
								</tr>								
								<tr>
									<td align="right">上傳檔案路徑： </td>
									<td><input style="width:200px" type="text" name="UploadPicPath" id="UploadPicPath" value="<?php echo $UploadPicPath?>"></td>
								</tr>
								<tr>
									<td align="right">圖片寬度： </td>
									<td><input style="width:200px" class="NumText" type="text" name="UploadPicWidth" id="UploadPicWidth" value="<?php echo $UploadPicWidth?>"></td>
								</tr>
								<tr>
									<td align="right">圖片高度： </td>
									<td><input style="width:200px" class="NumText" type="text" name="UploadPicHeight" id="UploadPicHeight" value="<?php echo $UploadPicHeight?>"></td>
								</tr>
								<tr>
									<td align="right">圖片是否強制截圖： </td>
									<td><input style="width:200px" type="text" name="UploadPicMode" id="UploadPicMode" value="<?php echo $UploadPicMode?>"></td>
								</tr>
								<tr>
									<td colspan="2" style="height:5px;background-color:#351284;color:red;text-align:center">選單參數</td>
								</tr>
								<tr>
									<td align="right">主選單編號： </td>
									<td><input type="text" class="NumText" name="Tree_id" id="Tree_id" value="<?php echo $Tree_id?>" maxlength="2"></td>
								</tr>
								<tr>
									<td align="right">主選單名稱： </td>
									<td><input type="text" name="Tree_Name" id="Tree_Name" value="<?php echo $Tree_Name?>" ></td>
								</tr>
								<tr>
									<td align="right">管理者模式： </td>
									<td><input type="checkbox" value="true" name="Tree_View" id="Tree_View" <?php if($Tree_View){echo "checked='true'";}?>></td>
								</tr>
								<tr>
									<td align="right">選單編號： </td>
									<td><input type="text" class="NumText" name="Menu_id" id="Menu_id" value="<?php echo $Menu_id?>" maxlength="4"></td>
								</tr>
								<tr>
									<td align="right">選單名稱： </td>
									<td><input type="text" name="Menu_Name" id="Menu_Name" value="<?php echo $Menu_Name?>"></td>
								</tr>
								<tr>
									<td align="right">選單入徑： </td>
									<td><input style="width:200px" type="text" name="Menu_Path" id="Menu_Path" value="<?php echo $Menu_Path?>"></td>
								</tr>
								<tr>
									<td align="right">驗證名稱： </td>
									<td><input style="width:200px" type="text" name="Menu_File" id="Menu_File" value="<?php echo $Menu_File?>"></td>
								</tr>
								<tr>
									<td align="right">管理者模式： </td>
									<td><input type="checkbox" value="true" name="Menu_View" id="Menu_View" <?php if($Menu_View){echo "checked='true'";}?>></td>
								</tr>
								<tr>
									<td colspan="2" style="height:5px;background-color:#351284;color:red;text-align:center">資料庫</td>
								</tr>
								<tr>
									<td align="right">是否建立資料庫： </td>
									<td><input type="checkbox" value="true" name="SqlView" id="SqlView" <?php if($SqlView){echo "checked='true'";}?>></td>
								</tr>
								<tr>
									<td  style="padding-top:20px" align="right">
										<input id="btnModify" type="button" value="參數修改">
									</td>
									<td  align="left" style="padding-top:20px">
										<input id="btnInstall" type="button" value="模組安裝">
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<iframe id="MyIframe" name="MyIframe" style="width:0px; height:0px; border-width:0px;"frameborder="0"></iframe>
</body>
</html>
<?php ob_flush(); ?>