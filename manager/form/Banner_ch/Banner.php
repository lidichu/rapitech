<?php ob_start(); ?>
<?php
	include_once("BannerParame.php");
	include_once("../../class/FileHandle.php");
	include_once("../../inc/Fun.php"); 			//公用程序
	include_once("../../inc/CheckHead.php"); 	//權限檢查
	include_once("../../inc/PageSelect.php"); 	//分頁處理
	include_once("../../inc/OnePage.php"); 		//顯示結果
	include_once("../../inc/LevelOne.php"); 	//更新狀態與排序

	//參數設定
		//接收參數
		$Option = $_REQUEST["option"];
		for($i=0;$i<=$Level;$i++){
			$G[$i] = $_REQUEST["G".$i];
			$SF[$i] = $_REQUEST["SF".$i];
			$SK[$i] = $_REQUEST["SK".$i];
			$TS[$i] = $_REQUEST["TS".$i];
			$P[$i] = $_REQUEST["P".$i];
		}

		//參數設定
		//層級
		$Level = 0;
		//標題文字
		$TableTitle = $Title01;
		
		$Title=$Title01;
		//要查詢的欄位
		$SQLFields="SerialNo,PICHidden,Sort,Status";
		//預設排序方式
		$DefaultSort = "Sort,SerialNo Desc";
		//指定那個欄位為修改聯結欄
		$UpdateField = "PICHidden";					//欄位名稱
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
		$DBTableName[0]= $MainFileName02;
		//修改資料庫名稱
		$DBTable = $DatabaseName01;
		//顯示資料庫名稱
		$DBTable_S = $DatabaseName01_S;
		//核取方塊欄位
		$CheckBoxFields[] = "";
		//可查詢欄位
		//$QueryField[] = "";
		//可查詢列表
		$QueryList=Array();
		//資料庫額外欄外
		$QueryFiled=Array();
		// 查詢參數
		$QueryParame = array();
		
		//圖片顯示欄位
		$PicField = "PICHidden";
		$PicWidth = 334;
		$PicRoot = $UploadPic["L"]["Path"];
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
				//刪除處理
				for($i=1;$i<=$RowCount;$i++){
					$tmpCheckBox = "";
					$tmpCheckBox = $_REQUEST["checkbox".$i];
					if($tmpCheckBox!=""){
						//刪除檔案及相關檔案					
						$SQL = "Select * From ".$DBTable." Where SerialNo = :SerialNo";
						$Rs = $Conn->prepare($SQL);
						$Rs->bindParam(":SerialNo",$_REQUEST["SERIALNO".$i]);
						$Rs->execute();
						$Row = $Rs->fetch(PDO::FETCH_ASSOC);
						foreach($UploadPic as $Key => $Value){
							$DelFileName = FileHandle::Delete($Value["Path"],$Row["PICHidden"]);	
						}						
						$SQL = "delete from ".$DBTable." where SerialNo = :SerialNo";
						$Rs = $Conn->prepare($SQL);
						$Rs->bindParam(":SerialNo",$_REQUEST["SERIALNO".$i]);
						$Rs->execute();						
					}
				}
				ReturnToPage(GetSCRIPTNAME(),"刪除完成",$UrlCode);
				break;
		}

		//排序規則設定，預設排序為 Sort
		if($SF[$Level]!=""){$SQLOrderBy = trim($SF[$Level]);}else{$SQLOrderBy = $DefaultSort;}
	

		//目前要顯示頁數
		if(trim($P[$Level])==""){$Page = 1;}else{$Page = intval($P[$Level]);}
		
		//接收查詢字串
		$Query = ($Query == "")?" where true ":" where true ".$Query;
		if($TS[$Level] !="" && $SK[$Level] != ""){
			$Query .= " and ".$SK[$Level]." like Concat('%',:".$SK[$Level].",'%')";
			$QueryParame[":".$SK[$Level]] = $TS[$Level];
		}
		//加入G條件
		if($Level > 0){
			$Query .=" and G".($Level-1)."= :G".($Level-1);
			$QueryParame[":G".($Level-1)] = $G[$Level-1];
		}
		
		$UrlCode="";
		for($i=0;$i<count($QueryList);$i++){
			if($_REQUEST[$QueryList[$i]]!=""){
				$UrlCode.="&".$QueryList[$i]."=".$_REQUEST[$QueryList[$i]];
				if($QueryFiled[$i]!=""){
					$QueryParame[":".$QueryFiled[$i]] = $_REQUEST[$QueryList[$i]];
					$Query.=" And ".$QueryFiled[$i]."= :".$QueryFiled[$i];
				}
			}			
		}
		//PageCount處理
		$PageCount = 0;
		$SQL = "Select Count(*) As Num From ".$DBTable_S.$Query;
		$Rs = $Conn->prepare($SQL);
		foreach($QueryParame as $Key => $Value){
			$Rs->bindParam($Key, $QueryParame[$Key]);
		}
		$Rs->execute();
		$DataAmount = $Rs->fetchColumn();
		$PageCount = NumHandle2(intval($DataAmount),$RowCount) / $RowCount;
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
			<?php 
			   for($i=0;$i<count($QueryList);$i++){                           
					echo "<input type=\"hidden\" name=\"".$QueryList[$i]."\" id=\"H_".$QueryList[$i]."\" value=\"".$_REQUEST[$QueryList[$i]]."\"/>\n";
				}		
			?>
            <table width="100%" border="1" cellspacing="0" bordercolorlight="#666666" bordercolordark="#FFFFFF">
                <tr>
                    <td width="100%" align="right" bgcolor="#EEEEEE" valign="top">
                        <input type="button" value="新 增" id="cmdAdd" name="cmdAdd" onClick="cmdAdd_onclick('<?php echo $ModifyFileName01; ?>');" >&nbsp;&nbsp;
                        <input type="button" value="刪 除" id="cmdDel" name="cmdDel" onClick="cmdDel_onclick('<?php echo GetSCRIPTNAME(); ?>');" >
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
					<?php 
                       for($i=0;$i<count($QueryList);$i++){                           
                            echo "<input type=\"hidden\" name=\"".$QueryList[$i]."\" id=\"H_".$QueryList[$i]."\" value=\"".$_REQUEST[$QueryList[$i]]."\"/>\n";
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
							<td nowrap style="font-size:12px;"><font color="#FFFFFF" style="font-size:13px;">Banner圖片</font></td>
							<td nowrap width="80"><input type="button" name="SortUpdate" value="更新排序" onClick="cmdSortUpdate_onclick('<?php echo GetSCRIPTNAME(); ?>');"></td>
							<td nowrap width="80"><input type="button" name="StatusUpdate" value="更新狀態" onClick="cmdStatusUpdate_onclick('<?php echo GetSCRIPTNAME(); ?>');"></td>
                        </tr>	
                        <?php
							$SQL = "select ".$SQLFields." from ".$DBTable_S.$Query." order by ".$SQLOrderBy." limit ".($Page-1) * $RowCount.",".$RowCount;
							$Rs = $Conn->prepare($SQL);
							foreach($QueryParame as $Key => $Value){
								$Rs->bindParam($Key,$QueryParame[$Key]);
							}
							$Rs->execute();
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