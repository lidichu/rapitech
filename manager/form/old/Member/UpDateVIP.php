<?php ob_start(); ?>
<?php
	include_once("UpDateVIPParame.php");
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
		$SQLFields="SerialNo,MemberID,MemberName,EMail,IsVIP,VIPID, TotalPrice";
		//預設排序方式
		$DefaultSort = "SerialNo Desc";
		//指定那個欄位為修改聯結欄
		$UpdateField = "MemberID";					//欄位名稱
		$UpdateFieldAlign = "center";				//對齊方式
		//1頁要顯示的筆數
		$RowCount = 20;
		//是否顯示CheckBox
		$CheckBoxShow = false;
		//狀態設定
		$StatusItem[0] = "上架";
		$StatusItem[1] = "下架";
		//要隱藏的欄位(目前此項目未來程式擴充用,所以不要去動裡面的值)
		$NoShowFields[0] = "SerialNo";	//主鍵
		//修改資料網頁名稱
		$ModifyFileName = $ModifyFileName01;		
		//按鈕式超連結,其變數值為要聯結的網頁名稱
		$DBTableName[0]= "";
		//修改資料庫名稱
		$DBTable = $DatabaseName01;
		//顯示資料庫名稱
		$DBTable_S = $DatabaseName01_S;
		//可查詢欄位
		$QueryField["MemberID"]="會員編號";
		$QueryField["MemberName"]="會員姓名";
		//來源超連結，需傳送到超連結
		$QueryList=Array();
		// 查詢參數
		$QueryParame = array();
		
		//來源超連結，需傳送到資料庫
		$QueryFiled=Array();
		//圖片顯示欄位
		$PicField = "";
		$PicWidth = "";
		$PicRoot = "";
		//核取方塊欄位
		$CheckBoxFields[] = "";

		//接收參數
		$UrlCode="";
		$Option = $_REQUEST["option"];
		for($i=0;$i<=$Level;$i++){
			$G[$i] = $_REQUEST["G".$i];
			$SF[$i] = $_REQUEST["SF".$i];
			$SK[$i] = $_REQUEST["SK".$i];
			$TS[$i] = $_REQUEST["TS".$i];
			$P[$i] = $_REQUEST["P".$i];
		}
		//排序規則設定，預設排序為 Sort
		if($SF[$Level]!=""){$SQLOrderBy = trim($SF[$Level]);}else{$SQLOrderBy = $DefaultSort;}
		//目前要顯示頁數
		if(trim($P[$Level])==""){$Page = 1;}else{$Page = intval($P[$Level]);}
		$SpecialString = "";
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
		$SpecialString = "";
		if($SpecialString != "" ){
			$Query .= " And ".$SpecialString;
		}
		for($i=0;$i<count($QueryList);$i++){
			if($_REQUEST[$QueryList[$i]]!=""){
				$UrlCode.="&".$QueryList[$i]."=".$_REQUEST[$QueryList[$i]];
				if($QueryFiled[$i]!=""){
					$QueryParame[":".$QueryFiled[$i]] = $_REQUEST[$QueryList[$i]];
					$Query.=" And ".$QueryFiled[$i]."= :".$QueryFiled[$i];
				}
			}
		}
		switch ($Option) {
			case "StatusUp":
				UpdateStatus();
				break;
			case "SortUp":
				UpdateSort();
				break;
			case "Del":
				$ErrorMsg = "";
				for($i=1;$i<=$RowCount;$i++){
					$tmpCheckBox = "";
					$tmpCheckBox = $_REQUEST["checkbox".$i];
					if($tmpCheckBox!=""){
						/*
						$Temp=GetTable($DatabaseName02,"*","where G0=".$_REQUEST["SERIALNO".$i]);
						foreach($Temp as $Row){
							$G0=$Row["SerialNo"];
							$Temp2=GetTable($DatabaseName03,"*","where G1=".$G0);
							foreach($Temp2 as $Row2){
								if($Row2["PICHidden"]!=""){
									foreach($UploadPic as $Key => $Value){
										$DelFileName = FileHandle::Delete($Value["Path"],$Row2["PICHidden"]);	
									}
								}
							}
							//刪除資料
							$SQL = "delete from ".$DatabaseName03." where G1=".$G0;
							mysql_query($SQL,$Conn);	
						}
						//刪除資料
						$SQL = "delete from ".$DatabaseName02." where G0=".$_REQUEST["SERIALNO".$i];
						mysql_query($SQL,$Conn);
						*/
						//刪除資料
						$SQL = "delete from ".$DBTable." where SerialNo = :SerialNo";
						$Rs = $Conn->prepare($SQL);
						$Rs->bindParam(":SerialNo",$_REQUEST["SERIALNO".$i]);
						$Rs->execute();
					}
				}

				if($ErrorMsg==""){
					ReturnToPage(GetSCRIPTNAME(),"刪除完成",$UrlCode);
				}else{
					ReturnToPage(GetSCRIPTNAME(),"尚有資料，故不得刪除\\n".$ErrorMsg,$UrlCode);
				}
				exit();
				break;
		}
		//PageCount處理
		$PageCount = 0;
		$Query.=" and TotalPrice > 10000";
		$DBTable_S="(SELECT M.SerialNo,M.MemberID,M.MemberName,M.EMail,CASE (M.IsVIP) WHEN 'false' THEN '否' WHEN 'true' THEN '是' END as IsVIP,M.VIPID,SUM(OL.TotalPrice) as TotalPrice FROM `order_list` as OL, `orderrecord` as OD, `member` as M Where OL.SerialNo = OD.G0 And OD.IsNew = '是' And PayHandle <> '取消' And ManagerHandle = '交易完成' And M.MemberID = OL.MemberID And M.IsVIP = 'false' Group By M.MemberID) as V ";
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
		
		$Tree_SQL = "Select Count(*) As Num From (SELECT M.SerialNo,M.MemberID,M.MemberName,M.EMail,CASE (M.IsVIP) WHEN 'false' THEN '否' WHEN 'true' THEN '是' END as IsVIP,M.VIPID,SUM(OL.TotalPrice) as TotalPrice FROM `order_list` as OL, `orderrecord` as OD, `member` as M Where OL.SerialNo = OD.G0 And OD.IsNew = '是' And PayHandle <> '取消' And ManagerHandle = '交易完成' And M.MemberID = OL.MemberID And M.IsVIP = 'false' Group By M.MemberID) as V Where true and TotalPrice > 10000";
		$Tree_Rs2 = $Conn->prepare($Tree_SQL);
		$Tree_Rs2->execute();
		$Tree_Row2 = $Tree_Rs2->fetch(PDO::FETCH_ASSOC);
		$Tree_ToTalAmount = intval($Tree_Row2["Num"]);
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
var ToTalAmount="<?php echo $Tree_ToTalAmount?>";
$(function(){
	if (window.parent.frames["menu"] != undefined){
		$(window.parent.frames["menu"].document).find("#Menu_MemberManager").html("("+(parseInt(ToTalAmount))+")");
		$(window.parent.frames["menu"].document).find("#Tree_OUpDateVIP").html("("+(parseInt(ToTalAmount))+")");
	}
});
</script>
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
	<?php
		$ShowView=true;//是否打開顯示上一層標題
		$TitleFiled=array("");//查詢
		if($Level>0 && $ShowView){
			for($i=1;$i<=$Level;$i++){
				$DatabaseName=${"DatabaseName0".$i};//資料庫名稱
				$Title=${"Title0".$i};//上一層Title名稱
				$Url=${"MainFileName0".$i};//上一層連結
				$Rs = $Conn->prepare("Select * From ".$DatabaseName." Where SerialNo = :SerialNo");
				$Rs->bindParam(":SerialNo", $G[$i-1]);
				$Rs->execute();
				$Row = $Rs->fetch(PDO::FETCH_ASSOC);
	?>	
	<tr>
		<td align="center">
        	<?php
				$Rows=GetTable($DatabaseName,"*",$Querys,1);
				if(count($Rows)>0){
				$LevelTitle= cutstr($Rows[$TitleFiled[($i-1)]],100);
								
			?>
            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:20px;" border="0">
                <tr>
                	<td align="left" style="font-size:12pt;"><?php echo $Title ?>：<?php echo $LevelTitle; ?></td>
                    <td align="right"><a class="Link" href="<?php echo $Url."?G0=".$G[0]."&G1=".$G[1]."&SF0=".$SF[0]."&SF1=".$SF[1]."&SK0=".$SK[0]."&SK1=".$SK[1]."&TS0=".$TS[0]."&TS1=".$TS[1]."&P0=".$P[0]."&P1=".$P[1].$UrlCode;?>"><img src="../../images/back.gif" border="0">回<?php echo $Title; ?></a></td>
                </tr>                
            </table>
        </td>    
    </tr>
	<?php
				}
			}
		}
	?>
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
                    <td width="100%" align="left" bgcolor="#EEEEEE">
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
                        <input type="button" value="查 詢" id="cmdLoad" name="cmdLoad" onclick="cmdLoad_onclick('<?php echo GetSCRIPTNAME(); ?>');" >&nbsp;&nbsp;
                        <span style="font-size:10pt"><Font color="Blue" size="2">(空白時則會列出全部)</font></span>
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
		                        <!--<td nowrap width="40" style="font-size:12px;"><font color="#FFFFFF"><input type="button" value="全選" cvalue="true" onclick="CheckAll(this);" name="B1"></font></td>-->
								<td nowrap width="80" style="font-size:13px;"><font color="#FFFFFF">會員編號</font></td>
								<td nowrap width="80" style="font-size:13px;"><font color="#FFFFFF">會員姓名</font></td>
								<td nowrap width="80" style="font-size:13px;"><font color="#FFFFFF">E-Mail</font></td>
								<td nowrap width="80" style="font-size:13px;"><font color="#FFFFFF">VIP</font></td>
								<td nowrap width="80" style="font-size:13px;"><font color="#FFFFFF">VIP卡號</font></td>
								<td nowrap width="80" style="font-size:13px;"><font color="#FFFFFF">累計消費</font></td>
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