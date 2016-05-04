<?php ob_start(); ?>
<?php
include_once("../../class/Manager.php");
include_once("KeywordParame.php");
include_once("../../inc/Fun.php"); 			//公用程序
include_once("../../inc/CheckHead.php"); 	//權限檢查
//初始設定
$TableTitle = $Title01;						//操作標題
$File_Add_Modify = $ModifyFileName01;		//使下面的程式超聯結新增與修改網頁
$DBTable = $DatabaseName01;					//要更新的資料表名稱
$DBTable_S= $DatabaseName01_S;				//要顯示的資料表名稱
$SQLFields="*";								//要查詢的欄位
$CheckBoxShow=true;							//是否顯示CheckBox

	//接收參數
	$SF1 = $_REQUEST["SF1"];
	$SK1 = $_REQUEST["SK1"];
	$TS1 = $_REQUEST["TS1"];
	$P1 = $_REQUEST["P1"];
	$Option = $_REQUEST["option"];


$M = new Manager();
$M->AddNote2("Keywords","關鍵字",false);
$M->AddNote2("Description","網頁描述",false);

$AddFieldsSQL = "";
$AddValuesSQL = "";
$ModifySQL = "";
//接收操作參數
$Option = $_POST["option"];
//檢查是否已存在網站基本資料檔
$Query = "select * from ".$DBTable." limit 0,1";
$Rs = mysql_query($Query,$Conn);
if(!$Rs || mysql_num_rows($Rs) ==0){
	//若資料不存在，則新增一筆資料
	$Query = "Insert Into " . $DBTable . "(SerialNo) values(1)";
	mysql_query($Query,$Conn);
	$Query = "select * form " . $DBTable . " limit 0,1";
	
	$Rs = mysql_query($Query,$Conn);
}
//儲存資料
if($Option=="Modify"){

	//確保資料庫中已存在網站基本資料檔後，一律執行更新操作
	
	if($Rs && (mysql_num_rows($Rs)>0)){
		$M->ModifyHandle();
		$Query = "Update ".$DBTable." set ".$ModifySQL." where SerialNo = 1";

		mysql_query($Query,$Conn);
	}
	
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
	echo "<head>\n";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "<script type='text/javascript' language='javascript'>\n";
	echo "alert('更新完成');\n";
	echo "document.location.href=\"" .GetSCRIPTNAME() . "?SK1=".$SK1. "&TS1=".$TS1."&SF1=".$SF1."\";\n";
	echo "</script>\n";	
	echo "</body>\n";
	echo "</html>\n";
	exit();
}

//載入資料
$Query = "select " . $SQLFields . " from " . $DBTable;
$Rs = mysql_query($Query,$Conn); //查詢資料庫 
if($Rs && (mysql_num_rows($Rs)>0)){
	$Row=mysql_fetch_array($Rs);
}else{
	echo "資料不存在";
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="../../script/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../../script/fun.js"></script>
<script language="javascript" src="../../ckeditor/ckeditor.js"></script>
<script language="javascript" src="../../script/datepicker.js"></script>
<script language="javascript" src="../../script/twzipcode2.js"></script>
<script language="javascript" type="text/javascript">
$(function(){
	$("#btnComfirm").click(function(){
		var sError = "";
		<?php $M->CheckScript(); ?>
		if(sError!=""){
			alert(sError);
		}else if(confirm("是否確定要修改？")){
			$("#form1").submit();
		}
	});
	$("#btnReset").click(function(){
		$("#form1").get(0).reset();
	});	
	
});
</script>
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
    	<td align="center">
            <table align="center" width="500" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px" border="0" bgcolor="#FFFFE1">
                <tr>
                    <td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000"><img src="../../images/computer.gif" border="0">&nbsp;<?php echo $TableTitle ; ?>&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>        
        </td>
    </tr>
    <tr>
    	<td align="center">
            <form action="<?php echo GetSCRIPTNAME(); ?>" method="post" name="form1" id="form1" style="margin:0px;padding:0px;margin-top:20px;">
                <input type="hidden" id="option" name="option" value="Modify"/>
                <table width="520" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
                    <tr>
                        <td>	
                            <table border="0" bgcolor="#A3BFE2" cellspacing="1" cellpadding="5" width="100%" style="font-size:10pt">						
                                <?php $M->ModifyShow();?>
                                <tr bgcolor="#EEEEEE" align="center">
                                    <td colspan=2>
                                        <input type="button" value="確定修改" id="btnComfirm" name="btnComfirm">&nbsp;&nbsp;
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>		
                </table>
            </form>
        </td>
    </tr>
</table>
</body>
</html>
<?php ob_flush(); ?> 