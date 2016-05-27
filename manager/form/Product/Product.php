<?php ob_start(); ?>
<?php
	include_once("ProductParame.php");
	include_once("../../class/FileHandle.php");
	include_once("../../inc/Fun.php"); 			//公用程序
	include_once("../../inc/CheckHead.php"); 	//權限檢查
	include_once("../../inc/PageSelect.php"); 	//分頁處理
	include_once("../../inc/OnePage.php"); 		//顯示結果
	include_once("../../inc/LevelOne.php"); 	//更新狀態與排序

	//參數設定
	
	//層級
	$Level = 1;
	
		//接收參數
		$Option = $_REQUEST["option"];
		for($i=0;$i<=$Level;$i++){
			$G[$i] = $_REQUEST["G".$i];
			$SF[$i] = $_REQUEST["SF".$i];
			$SK[$i] = $_REQUEST["SK".$i];
			$TS[$i] = $_REQUEST["TS".$i];
			$P[$i] = $_REQUEST["P".$i];
		}
		
		$TableTitle = $Title02;
		$Title=$Title01;
		//要查詢的欄位
		$SQLFields="SerialNo,IndexShow,PrdName,PrdPrice,PICHidden,Sort,Status";
		//預設排序方式
		$DefaultSort = "Sort,SerialNo Desc";
		//指定那個欄位為修改聯結欄
		$UpdateField = "PrdName";					//欄位名稱
		$UpdateFieldAlign = "center";				//對齊方式
		//1頁要顯示的筆數
		$RowCount = 20;
		//是否顯示CheckBox
		$CheckBoxShow = true;
		//狀態設定
		$StatusItem[0] = "上架";
		$StatusItem[1] = "下架";
		//要隱藏的欄位(目前此項目未來程式擴充用,所以不要去動裡面的值)
		$NoShowFields[0] = "SerialNo";	//主鍵
		//修改資料網頁名稱
		$ModifyFileName = $ModifyFileName02;
		//按鈕式超連結,其變數值為要聯結的網頁名稱
		$DBTableName[0]= $MainFileName03;
		//修改資料庫名稱
		$DBTable = $DatabaseName02;
		//顯示資料庫名稱
		$DBTable_S = $DatabaseName02_S;
		//可查詢欄位
		$QueryField["PrdName"] = "產品名稱";
		//核取方塊欄位
		$CheckBoxFields[] = "IndexShow";
		//圖片顯示欄位
		$PicField = "PICHidden";
		$PicWidth = $UploadPic["List"]["Width"];
		$PicRoot = $UploadPic["List"]["Root"];		
		//刪除處理
		function DelItem(){
			global $DBTable,$RowCount,$Conn;
			global $UploadPic;
			for($i=1;$i<=$RowCount;$i++){
				$tmpCheckBox = "";
				$tmpCheckBox = $_REQUEST["checkbox".$i];
				if($tmpCheckBox!=""){
					//刪除產品圖片
					$SQL = "Select PICHidden From ".$DBTable." Where SerialNo = ".$_REQUEST["SERIALNO".$i];
					$Rs = mysql_query($SQL,$Conn);
					if($Rs && (mysql_num_rows($Rs)>0)){
						$Row = mysql_fetch_array($Rs);
						if($Row["PICHidden"]!=""){
							foreach($UploadPic as $Key => $Value){
								$DelFileName = FileHandle::Delete($Value["Root"],$Row["PICHidden"]);	
							}
							
						}
					}				
					$SQL = "delete from ".$DBTable." where SerialNo=".$_REQUEST["SERIALNO".$i];
					mysql_query($SQL,$Conn);
				}
			}
			ReturnToPage(GetSCRIPTNAME(),"刪除完成","");
		}
		
		function UpdateIndexShowUpStatus(){
			global $Conn,$DBTable;
			//接收參數
			$SerialNo = $_REQUEST["SerialNo"];
			$Val = strtolower($_REQUEST["Val"]);
			$CurIndex = $_REQUEST["CurIndex"];	
			$Rtn = array("SerialNo" => $SerialNo, "CurIndex" => $CurIndex, "Err" => "");
			$LimitAmount = 0;
			if($Val=="true"){
				$CanChange = true;
				//若有限制個數，則檢查個數
				if($LimitAmount > 0){
					//查詢目前顯示在首頁的項目個數
					$SQL="Select Count(*) From " . $DBTable . " Where IndexShow = 'true' ";
					$Rs = mysql_query($SQL,$Conn);
					if($Rs && mysql_num_rows($Rs) > 0){
						$Row = mysql_fetch_array($Rs);
						if(intval($Row[0]) >= intval($LimitAmount)){
							$CanChange = false;
						}
					}
				}
				if($CanChange){
					$SQL =	"Update " . $DBTable . " Set IndexShow = 'true',IndexSort = 9999 Where SerialNo = " . $SerialNo;
					mysql_query($SQL,$Conn);
				}else{
					$Rtn["ErrSerialNo"] = $SerialNo;
					$Rtn["Err"] = "目前顯示在首頁的項目個數已達" . $LimitAmount . "個項目";
				}
			}else{
				$SQL =	"Update " . $DBTable . " Set IndexShow = 'false' Where SerialNo = " . $SerialNo;
				mysql_query($SQL,$Conn);
			}
			echo json_encode($Rtn);  
			exit();
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
			case "IndexShowUp":
				UpdateIndexShowUpStatus();
				break;		
			case "Del":
				DelItem();
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

		//加入G條件
		$Query .=($Query=="")?" where G".($Level-1)."=".$G[$Level-1]:" And G".($Level-1)."=".$G[$Level-1];
	
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript" src="../../script/jquery.js"></script>
<script language="javascript" src="../../script/fun.js"></script>
<script language="javascript" src="../../script/Leavel.js"></script>
<script language="javascript">var file_add_modify = "<?php echo $ModifyFileName; ?>";</script>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(function(){
	$(".IndexShowClass").click(function(){
		var url = "<?php echo(GetScriptName()); ?>";
		var options = {
			option : "IndexShowUp",
			SerialNo : $(this).val(),
			Val : $(this).prop("checked")
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
					$(".IndexShowClass[value="+data.ErrSerialNo+"]").prop("checked",false);
					
				}else{
					if(data.OtherSerialNo != ""){
						$(".IndexShowClass[value="+data.OtherSerialNo+"]").prop("checked",false);
					}
				}
			});		
		}
	});
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
        	<?php
				$SQL="Select Category From ".$DatabaseName01." Where SerialNo=".$G[0];
				$Rs = mysql_query($SQL,$Conn);
				if($Rs && (mysql_num_rows($Rs)>0)){
					$Row=mysql_fetch_array($Rs);
					$Leve2Title = cutstr($Row[0],70);
				}				
			?>
            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:20px;" border="0">
                <tr>
                	<td align="left" style="font-size:12pt;"><?php echo $Title01?>：<?php echo $Leve2Title; ?></td>
                    <td align="right"><a class="Link" href="<?php echo $MainFileName01."?G0=".$G[0]."&G1=".$G[1]."&SF0=".$SF[0]."&SF1=".$SF[1]."&SK0=".$SK[0]."&SK1=".$SK[1]."&TS0=".$TS[0]."&TS1=".$TS[1]."&P0=".$P[0]."&P1=".$P[1];?>"><img src="../../images/back.gif" border="0">回<?php echo $Title01; ?></a></td>
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
                    <td width="85%" align="left" bgcolor="#EEEEEE">
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
                    <td width="15%" align="right" bgcolor="#EEEEEE" valign="top">
                        
                        <input type="button" value="新 增" id="cmdAdd" name="cmdAdd" onClick="cmdAdd_onclick('<?php echo $ModifyFileName01; ?>');" style="height:20">&nbsp;&nbsp;
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
							<td nowrap width="40"><font color="#FFFFFF"><input type="button" value="全選" cvalue="true" onclick="CheckAll(this);" name="B1"></font></td>
							<td nowrap width="60" style="font-size:12px;"><font color="#FFFFFF">推薦產品</font></td>
							<td nowrap><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=PrdName"><font color="#FFFFFF">名稱</font></a></td>
							<td nowrap width="100"><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=PrdPrice"><font color="#FFFFFF">價格</font></a></td>
							<td nowrap style="font-size:12px;" width="<?php echo($UploadPic["List"]["Width"] + 5); ?>"><font color="#FFFFFF" style="font-size:13px;">圖片</font></td>
							<td nowrap width="80"><input type="button" name="SortUpdate" value="更新排序" onClick="cmdSortUpdate_onclick('<?php echo GetSCRIPTNAME(); ?>');"></td>
							<td nowrap width="80"><input type="button" name="StatusUpdate" value="更新狀態" onClick="cmdStatusUpdate_onclick('<?php echo GetSCRIPTNAME(); ?>');"></td>
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