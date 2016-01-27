<?php ob_start(); ?>
<?php
	include_once("../../class/Manager.php");
	include_once("ShoppingProcessParame.php");
	include_once("../../inc/Fun.php"); 			//公用程序
	include_once("../../inc/CheckHead.php"); 	//權限檢查
	//初始設定
	$TableTitle = $Title01;						//操作標題
	$File_Add_Modify = $ModifyFileName01;		//使下面的程式超聯結新增與修改網頁
	$DBTable = $DatabaseName01;					//要更新的資料表名稱
	// 欄位名稱
	$DBFieldName = array();
	$SQL = "SHOW FULL FIELDS FROM ". $DBTable;
	$Rs = $Conn->prepare($SQL);
	$Rs->execute();
	while($Row = $Rs->fetch(PDO::FETCH_ASSOC)){
		$DBFieldName[$Row["Field"]] = $Row["Comment"];
	}
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
	$M->AddNote1("Content","購物流程",true);
	$AddFieldsSQL = "";
	$AddValuesSQL = "";
	$ModifySQL = "";
	//接收操作參數
	$Option = $_POST["option"];
	//檢查是否已存在網站基本資料檔
	$SQL = "select * from ".$DBTable ." limit 0,1";
	$Rs = $Conn->prepare($SQL);
	$Rs->execute();
	$Row = $Rs->fetch(PDO::FETCH_ASSOC);
	if(!$Row){
		//若資料不存在，則新增一筆資料
		$SQL = "Insert Into " . $DBTable . "(SerialNo) values(1)";
		$Rs = $Conn->prepare($SQL);
		$Rs->execute();
		// 查詢網站基本資料檔
		$SQL = "select * from ".$DBTable ." limit 0,1";
		$Rs = $Conn->prepare($SQL);
		$Rs->execute();
		$Row = $Rs->fetch(PDO::FETCH_ASSOC);
	}
	//儲存資料
	if($Option=="Modify"){
		//確保資料庫中已存在網站基本資料檔後，一律執行更新操作
		$M->ModifyHandle();	
		$SQL = "Update ".$DBTable." set ".$ModifySQL." where SerialNo = 1";
		$Rs = $Conn->prepare($SQL);
		foreach($M->Param as $Field => $Value){
			$Rs->bindParam($Field, $M->Param[$Field]);
		}
		$Rs->execute();
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="../../script/jquery.js"></script>
<script language="javascript" type="text/javascript" src="../../script/fun.js"></script>
<script language="javascript" type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<script language="javascript" src="../../script/datepicker.js"></script>
<script language="javascript" src="../../script/twzipcode2.js"></script>
<script language="javascript" type="text/javascript">
var LangCount="<?php echo count($LangArray)?>";
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
            <table align="center" width="500" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px;margin-bottom:25px;" border="0" bgcolor="#FFFFE1">
                <tr>
                    <td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000"><img src="../../images/computer.gif" border="0">&nbsp;<?php echo $TableTitle ; ?>&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>        
        </td>
    </tr>
    <tr>
    	<td align="center">
            <form action="<?php echo GetSCRIPTNAME(); ?>" method="post" name="form1" id="form1" style="margin:0px;padding:0px;" enctype="multipart/form-data">
                <input type="hidden" id="option" name="option" value="Modify"/>
                <table width="520" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
                    <tr>
                        <td>	
                            <table id="WebTable"  border="0" bgcolor="#A3BFE2" cellspacing="1" cellpadding="5" width="100%" style="font-size:10pt">						
                                <?php $M->ModifyShow();?>
                            </table>
                        </td>
                    </tr>		
                </table>
				<input type="button" value="確定修改" id="btnComfirm" name="btnComfirm">
            </form>
        </td>
    </tr>
</table>
</body>
</html>
<?php ob_flush(); ?> 