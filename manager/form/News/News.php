<?php ob_start(); ?>
<?php
	include_once("NewsParame.php");
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
		$SQLFields="SerialNo,IndexShow,PostDate,Title,PICHidden,Sort,Status";

		//預設排序方式
		$DefaultSort = "Sort,PostDate DESC,SerialNo Desc";
		//指定那個欄位為修改聯結欄
		$UpdateField = "PostDate";					//欄位名稱
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
		$ModifyFileName = $ModifyFileName01;		
		//按鈕式超連結,其變數值為要聯結的網頁名稱
		$DBTableName[0]= $MainFileName02_1;
		$DBTableName[1]= $MainFileName02_2;
		//修改資料庫名稱
		$DBTable = $DatabaseName01;
		//顯示資料庫名稱
		$DBTable_S = $DatabaseName01_S;
		//可查詢欄位
		$QueryField["Title"] = "標題";
		//圖片顯示欄位
		$PicField = "PICHidden";
		$PicWidth = $UploadPic["Small"]["Width"];
		$PicRoot = $UploadPic["Small"]["Root"];
			//核取方塊欄位
		$CheckBoxFields[] = "IndexShow";
		
	
		//刪除處理
		function DelItem(){
			global $DBTable,$RowCount,$Conn;
			global $UploadFilePath,$UploadPic;
			global $DatabaseName02_1,$DatabaseName02_2;
	
			$ErrorMsg = "";
			for($i=1;$i<=$RowCount;$i++){
				$tmpCheckBox = "";
				$tmpCheckBox = $_REQUEST["checkbox".$i];
				if($tmpCheckBox!=""){
					//刪除相關連結
					$SQL = "delete from ".$DatabaseName02_1." where G0=".$_REQUEST["SERIALNO".$i];
					mysql_query($SQL,$Conn);
					//刪除檔案及相關檔案
					$SQL="Select FileHidden From ".$DatabaseName02_2." Where G0=".$_REQUEST["SERIALNO".$i];
					$Rs = mysql_query($SQL,$Conn);
					if($Rs && (mysql_num_rows($Rs)>0)){
						$Row = mysql_fetch_array($Rs);
						if($Row["FileHidden"]!=""){
							$DelFileName = FileHandle::Delete($UploadFilePath,$Row["FileHidden"]);	
						}
					}
					//刪除消息小圖
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
					//刪除資料
					$SQL = "delete from ".$DBTable." where SerialNo=".$_REQUEST["SERIALNO".$i];
					mysql_query($SQL,$Conn);
				}
			}

			if($ErrorMsg==""){
				ReturnToPage(GetSCRIPTNAME(),"刪除完成","");
			}else{
				ReturnToPage(GetSCRIPTNAME(),"以下最新消息尚有資料，故不得刪除\\n".$ErrorMsg,"");
			}
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
			case "Del":
				DelItem();
				break;
			case "IndexShowUp":
				UpdateIndexShowUpStatus();
				break;
		}

		//排序規則設定，預設排序為 Sort
		if($SF[$Level]!=""){$SQLOrderBy = trim($SF[$Level]);}else{$SQLOrderBy = $DefaultSort;}
	

		//目前要顯示頁數
		if(trim($P[$Level])==""){$Page = 1;}else{$Page = intval($P[$Level]);}
		$SpecialString = "";
		//接收查詢字串
		$Query = "";
		if($TS[$Level] !="" && $SK[$Level] != ""){
			$Query = " where ".$SK[$Level]." like '%".$TS[$Level]."%'";
		}

		if($SpecialString != "" ){
			if ($Query != "")
				$Query .= " And ";
			else
				$Query =  " where ";
			$Query .= $SpecialString	;
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../../script/jquery.js"></script>
<script type="text/javascript" src="../../script/fun.js"></script>
<script type="text/javascript" src="../../script/Leavel.js"></script>
<script type="text/javascript">var file_add_modify = "<?php echo $ModifyFileName; ?>";</script>
<script type="text/javascript">
var img = new Image();
var TOP;
var LEFT;
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
	$(".OnePageTr").each(function(){	
		$(this).find("td").eq(4).hide();
	});
	
	$(".Titleclass").mouseenter(function(){
		var IndexNum=$(".Titleclass").index(this);
		var href = $(".PICHiddenclass").eq(IndexNum).attr("src");
		var TOP = $(this).position().top;
		var LEFT = $(this).position().left;
		img.onload = function(){
			$("#TeamLeaderPIC").attr("src",img.src);	
			$("#TeamLeaderPICDiv").css({"top":TOP+0,"left":LEFT-img.width +120}).show();
		}		
		img.src = href;
	}).mouseleave(function(){
		$("#TeamLeaderPICDiv").hide();
	});
	$("#TeamLeaderPICDiv").mouseleave(function(){
		$("#TeamLeaderPICDiv").hide();
	});
});
</script>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<div style="position:relative;"><div id="TeamLeaderPICDiv" style="display:none;position:absolute;z-index:9999;"><img id="TeamLeaderPIC" src="" border="1"/></div>
</head>
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
                    <td width="15%" align="right" bgcolor="#EEEEEE">
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
	                        <tr style="font-size:13;color:#E0EFF8" bgcolor="#005783" align="center" >
		                        <td nowrap width="40" style="font-size:12px;"><font color="#FFFFFF"><input type="button" value="全選" cvalue="true" onclick="CheckAll(this);" name="B1"></font></td>
								<td nowrap width="60" style="font-size:12px;"><font color="#FFFFFF">首頁顯示</font></td>
								<td nowrap width="100" style="font-size:12px;"><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=PostDate DESC"><font color="#FFFFFF" style="font-size:13px;">日期</font></a></td>
		                        <td nowrap style="font-size:12px;"><a class="Title sortlink" href="<?php echo GetSCRIPTNAME(); ?>?SF<?php echo $Level; ?>=Title"><font color="#FFFFFF" style="font-size:13px;">標題</font></a></td>
								<td nowrap width="80"><input type="button" name="SortUpdate" value="更新排序" onClick="cmdSortUpdate_onclick('<?php echo GetSCRIPTNAME(); ?>');"></td>
								<td nowrap width="80"><input type="button" name="StatusUpdate" value="更新狀態" onClick="cmdStatusUpdate_onclick('<?php echo GetSCRIPTNAME(); ?>');"></td>
		                        <td nowrap width="80" style="font-size:13px;"><font color="#FFFFFF">相關連結</font></td>
								<td nowrap width="80" style="font-size:13px;"><font color="#FFFFFF">檔案下載</font></td>
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