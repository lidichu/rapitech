<?php ob_start(); ?>
<?php
	include_once("ContactParame.php");
	include_once("../../class/FileHandle.php");
	include_once("../../inc/Fun.php"); 					//公用程序
	include_once("../../inc/CheckHead.php"); 			//權限檢查
	include_once("../../inc/PageSelect.php"); 			//分頁處理
	include_once("../../inc/OnePage.php"); 				//顯示結果
	include_once("../../inc/LevelOne.php"); 			//更新狀態與排序
	//參數設定
		//層級
		$Level = 0;
		//標題文字
		$TableTitle = $Title01;
		//要查詢的欄位
		
		$SQLFields="SerialNo,date_format(PostDate,'%Y-%m-%d') As PostDate,Subject,Name,if(Sex='','',if(Sex='Male','男','女')) as Sex,Tel,EMail,Status As ContactStatus,'ContactReply.php' as replyemail";
		//預設排序方式
		$DefaultSort = "PostDate DESC,SerialNo Desc";
		//指定那個欄位為修改聯結欄
		$UpdateField = "PostDate";					//欄位名稱
		$UpdateFieldAlign = "center";				//對齊方式
		//1頁要顯示的筆數
		$RowCount = 20;
		//是否顯示CheckBox
		$CheckBoxShow = true;
		//狀態設定
		$StatusItem[0] = "未處理";
		$StatusItem[1] = "已處理";
		//要隱藏的欄位(目前此項目未來程式擴充用,所以不要去動裡面的值)
		$NoShowFields[0] = "SerialNo";	//主鍵
		//修改資料網頁名稱
		$ModifyFileName = $ModifyFileName01;		
		//按鈕式超連結,其變數值為要聯結的網頁名稱
		$DBTableName[0]= $MainFileName03;
		//修改資料庫名稱
		$DBTable = $DatabaseName01;
		//顯示資料庫名稱
		$DBTable_S = $DatabaseName01_S;
		//可查詢欄位
		$QueryField["Name"] = "姓名";
		$QueryField["Tel"] = "電話";
		$QueryField["Email"] = "Email";
		//圖片顯示欄位
		$PicField = "";
		$PicWidth = "";
		$PicRoot = "";
	
		//刪除處理
		function DelItem(){
			global $DBTable,$RowCount,$Conn;
			global $DatabaseName02;
			$ErrorMsg = "";
			for($i=1;$i<=$RowCount;$i++){
				$tmpCheckBox = "";
				$tmpCheckBox = $_REQUEST["checkbox".$i];
				if($tmpCheckBox!=""){
					//刪除客戶服務回覆資料
					$SQL="Delete From " . $DatabaseName02 . " Where G0=" . $_REQUEST["SERIALNO".$i];
					mysql_query($SQL,$Conn);
					//刪除客戶服務資料
					$SQL = "delete from ".$DBTable." where SerialNo=".$_REQUEST["SERIALNO".$i];
					mysql_query($SQL,$Conn);							
				}
			}
			if($ErrorMsg==""){
				ReturnToPage(GetSCRIPTNAME(),"刪除完成","");
			}else{
				ReturnToPage(GetSCRIPTNAME(),"以下分類尚有資料，故不得刪除\\n".$ErrorMsg,"");
			}
		}

		
		//接收參數
		$Option = $_REQUEST["option"];
		for($i=0;$i<=$Level;$i++){
			$G[$i] = $_REQUEST["G".$i];
			$SF[$i] = $_REQUEST["SF".$i];
			$SK[$i] = $_REQUEST["SK".$i];
			$TS[$i] = $_REQUEST["TS".$i];
			$P[$i] = $_REQUEST["P".$i];
		}
			
		switch ($Option) {
			case "StatusUp":
				UpdateStatus();
				break;
			case "SortUp":
				UpdateSort();
				break;
			case "Del":
				DelItem();
				break;
			case "IndexUp":
				UpdateIndexViewStatus();
				break;
		}

		//排序規則設定，預設排序為 Sort
		if($SF[$Level]!=""){$SQLOrderBy = trim($SF[$Level]);}else{$SQLOrderBy = $DefaultSort;}
	

		//目前要顯示頁數
		if(trim($P[$Level])==""){$Page = 1;}else{$Page = intval($P[$Level]);}
	
		//接收查詢字串
		$Query = "";
		if($TS[$Level] !="" && $SK[$Level] != ""){
			$Query = " where ".$SK[$Level]." like '%".$TS[$Level]."%'";
		}

		//PageCount處理
		$PageCount = 0;
		$SQL = "Select Count(SerialNo) As Num From ".$DBTable_S.$Query;
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && (mysql_num_rows($Rs)>0)){
			$Row=mysql_fetch_array($Rs);
			$PageCount = NumHandle2(intval($Row["Num"]),$RowCount) / $RowCount;
		}
		if($PageCount==0){$PageCount = 1;} 
		if($Page > $PageCount){$Page = $PageCount;} 
		$P[$Level] = $Page;
		$NumSql="select count(*) from ".$DBTable ."  Where Status='未處理'";
		$Rs = mysql_query($NumSql,$Conn);
		$Row=mysql_fetch_array($Rs);
		$Count=$Row[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../../script/jquery.js"></script>
<script type="text/javascript" src="../../script/fun.js"></script>
<script type="text/javascript" src="../../script/Leavel.js"></script>
<script type="text/javascript">var file_add_modify = "<?php echo $ModifyFileName; ?>";</script>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
Count="<?php echo $Count?>";

$(function(){

	$(window.parent.frames["menu"].document).find("#contact").html("("+Count+")");
	$(window.parent.frames["menu"].document).find("#contact2").html("("+Count+")");
	$(".OnePageTr > td").height("30");
});
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td align="center">
            <table width="500" cellpadding="0" cellspacing="0" bordercolorlight="#FFFFFF" style="border:solid #A3BFE2 1px;margin-bottom:20px;" border="0" bgcolor="#FFFFE1">
                <tr>
                    <td bgcolor="#E0EFF8" align="center" height="30" style="font-size:12pt;color:#000000"><img src="../../images/computer.gif" border="0" align="absmiddle">&nbsp;<?php echo $TableTitle; ?>&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>
        </td>
	</tr>
    <tr>
	    <td align="center">
            <form name="form2" id="form2" action="<?php echo GetSCRIPTNAME(); ?>" method="post">
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
            <table width="100%" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
                <tr>
                    <td width="87%" align="left" bgcolor="#EEEEEE">
                        &nbsp;&nbsp;
                        <select name="SK<?php echo $Level; ?>" id="SK<?php echo $Level; ?>">
                        <?php
                            foreach ($QueryField as $key => $value){
                                if($SK[$Level]==$key){
                                    echo "<option value=\"".$key."\" selected=\"selected\">".$value."</option>\n";
                                }else{
                                    echo "<option value=\"".$key."\">".$value."</option>\n";
                                }
                            }
                        ?>							
                        </select>
                        <input type="text" id="TS<?php echo $Level; ?>" name="TS<?php echo $Level; ?>" size="20" value="<?php echo $TS[$Level];?>">&nbsp;
                        <input type="button" value="查 詢" id="cmdLoad" name="cmdLoad" onclick="cmdLoad_onclick('<?php echo GetSCRIPTNAME(); ?>');" style="height:20">&nbsp;&nbsp;
                        <span style="font-size:10pt"><Font color="Blue" size="2">(空白時則會列出全部)</font></span>	
                    </td>	    
                    <td width="13%" align="center" bgcolor="#EEEEEE">			
						<input type="button" value="新 增" id="cmdAdd" name="cmdAdd" onClick="cmdAdd_onclick('<?php echo $ModifyFileName01; ?>');" style="height:20px">&nbsp;&nbsp;
                        <input type="button" value="刪 除" id="cmdDel" name="cmdDel" onClick="cmdDel_onclick('<?php echo GetSCRIPTNAME(); ?>');" style="height:20">
                    </td>
                </tr>
            </table>  
            </form>	      
        </td>
    </tr>
    <tr>
    	<td align="center">
            <form action="<?php echo GetSCRIPTNAME(); ?>" method="POST" id="form1" name="form1">
            <table width="100%" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">	
                <tr><td height=1 bgcolor="#A3BFE2" colspan=19></td></tr>
            
                <tr bgcolor='#E0EFF8'>	    
                    <td valign="middle" align="right" style="font-size:10pt">
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
                    <?php PageSelect("P".$Level);	?>
                    </td>
                </tr>	
                <tr>
                    <td bgcolor="#A3BFE2">
                        <table cellspacing="1" cellpadding="2" width="100%" border="0">
	                        <tr style="font-size:13;color:#E0EFF8" bgcolor="#005783" align="center">
		                        <td nowrap width="40" style="font-size:12px;"><font color="#FFFFFF"><input type="button" value="全選" cvalue="true" onclick="CheckAll(this);" name="B1"></font></td>
		                        <td nowrap width="100" style="font-size:12px;"><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=PostDate DESC"><font color="#FFFFFF" style="font-size:13px;">日期</font></a></td>
								<td nowrap style="font-size:12px;"><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=Subject"><font color="#FFFFFF" style="font-size:13px;">主旨</font></a></td>
								<td nowrap style="font-size:12px;"><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=Name"><font color="#FFFFFF" style="font-size:13px;">姓名</font></a></td>
								<td nowrap style="font-size:12px;"><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=Sex"><font color="#FFFFFF" style="font-size:13px;">性別</font></a></td>
								<td nowrap style="font-size:12px;"><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=Tel"><font color="#FFFFFF" style="font-size:13px;">電話</font></a></td>
								<td nowrap style="font-size:12px;"><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=EMail"><font color="#FFFFFF" style="font-size:13px;">信箱</font></a></td>
								<td nowrap width="80"><input type="button" name="StatusUpdate" value="更新狀態" onClick="cmdStatusUpdate_onclick('<?php echo GetSCRIPTNAME(); ?>');"></td>
								<td nowrap width="100" style="font-size:13px;"><font color="#FFFFFF">回覆</font></td>
	                       	</tr>	
                        <?php
                                $SQL = "select ".$SQLFields." from ".$DBTable_S.$Query." order by ".$SQLOrderBy." limit ".($Page-1) * $RowCount.",".$RowCount;
                                $Rs = mysql_query($SQL,$Conn);
                                ShowOnePageMe($Rs,$page,$NoShowFields,$File_Add_Modify,$UpdateField,$UpdateFieldAlign,$PicField,$PicWidth,$PicRoot,$DBTableName,"G".$Level);
                        ?>
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