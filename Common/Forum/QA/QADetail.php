<?php
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$SerialNo = CheckData($_REQUEST["SerialNo"]);
	if($SerialNo == ""){$SerialNo = 0;}
	$SerialNo = intval($SerialNo);	
	$data = array();
	$SQL = "Select A.*,B.Category".$Lang.",B.Color From qa as A, qanotecategory as B Where A.SerialNo = ".$SerialNo." And A.QANoteSNo = B.SerialNo And A.Status = '上架'";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$data = mysql_fetch_array($Rs);
		$data["PostDate"] = date('Y-m-d',strtotime($data["PostDate"]));
		$data['Note'.$Lang] = ReplaceEditor($data['Note'.$Lang]);
	}
	//檢查是否已經點過
	$CanAdd = true;
	if(isset($_COOKIE)){
		if(array_key_exists("QAHit",$_COOKIE)){
			$QAHit = $_COOKIE["QAHit"];
			if($QAHit == ""){
				setcookie("QAHit",",".$SerialNo.",",time() + 24*60*60,"/","",0);
			}else{
				if(strpos($QAHit,",".$SerialNo.",")	=== false){
					$QAHit .= $SerialNo.",";
				}else{
					$CanAdd = false;	
				}
			}
		}else{
			setcookie("QAHit",",".$SerialNo.",",time() + 24*60*60,"/","",0);	
		}
	}else{
		setcookie("QAHit",",".$SerialNo.",",time() + 24*60*60,"/","",0);
	}
	if($CanAdd){
		$SQL = "Update qa Set Hits = Hits + 1 Where SerialNo = ".$SerialNo;	
		mysql_query($SQL,$Conn);
	}
	
	$Fields = array();
	$Fields["Ch"] = array(
		DateTitle => "日期"
	);
	$Fields["Cn"] = array(
		DateTitle => "日期"
	);
	$Fields["En"] = array(
		DateTitle => "Date"
	);	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="5%" height="38" align="center"><img src="images/07_qa/icon_q.jpg" width="16" height="16" /></td>
                    <td width="62%" height="38" class="h1"><?php echo($data["Title".$Lang]); ?></td>
                    <td width="33%" height="38" align="right"><?php echo($Fields[$Lang]["DateTitle"]); ?>：<span class="day"><?php echo($data["PostDate"]); ?></span></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="bottom"><img src="images/07_qa/img_06.jpg" width="706" height="2" /></td>
    </tr>
    <tr>
        <td bgcolor="#f6f6f6" style="padding:14px 0px">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="5%" valign="top" style="padding-left:10px"><img src="images/07_qa/icon_a.jpg" width="16" height="16" /></td>
                    <td width="95%" style="padding-right:10px"><?php echo($data["Note".$Lang]); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td><img src="images/07_qa/img_07.jpg" width="706" height="2" /></td>
    </tr>
    <tr>
        <td height="34" >&nbsp;</td>
    </tr>
    <tr>
        <td align="right" style="background-image:url(images/03_product/img_07.jpg); width:707px; height:28px; background-repeat:no-repeat;"><a href="qa_list.php?G0=<?php echo($G0); ?>&Page=<?php echo($Page); ?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image29','','images/00/but_back_o.jpg',1)"><img src="images/00/but_back.jpg" name="Image29" width="90" height="28" border="0" id="Image29" /></a></td>
    </tr>
</table>