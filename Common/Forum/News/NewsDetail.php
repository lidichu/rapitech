<?php
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$SerialNo = CheckData($_REQUEST["SerialNo"]);
	if($SerialNo == ""){$SerialNo = 0;}
	$SerialNo = intval($SerialNo);	
	$data = array();
	$SQL = "Select * From news Where SerialNo = ".$SerialNo." And Status = '上架'";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$data = mysql_fetch_array($Rs);	
		$data['PostDate'] = date('Y-m-d',strtotime($data['PostDate']));
		$data['Note'.$Lang] = ReplaceEditor($data['Note'.$Lang]);
		$SQL = "Select SerialNo,Title".$Lang." From newsfile Where G0 = ".$data["SerialNo"]." And Status = '上架' Order By Sort,SerialNo DESC";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			while($Row = mysql_fetch_array($Rs)){
				$data["File"][] = $Row;
			}
		}
		$SQL = "Select Title".$Lang.",Url,TargetWindow From newslink Where G0 = ".$data["SerialNo"]." And Status = '上架' Order By Sort,SerialNo DESC";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			while($Row = mysql_fetch_array($Rs)){
				$data["Link"][] = $Row;
			}
		}		
	}
	$News = array();
	$News["Ch"] = array(
		Title => "最新消息",
		IndexLink => "../index.php",
		FileTitle => "相關檔案",
		LinkTitle => "相關連結",
		PostDateTitle => "發佈日期",
		PostDateTitleWidth => "9%",
		PostDateWidth => "89%"
	);
	$News["Cn"] = array(
		Title => "最新消息",
		IndexLink => "index_cn.php",
		FileTitle => "相关档案",
		LinkTitle => "相关连结",
		PostDateTitle => "发布日期",
		PostDateTitleWidth => "9%",
		PostDateWidth => "89%"
	);
	$News["En"] = array(
		Title => "News",
		IndexLink => "index_en.php",
		FileTitle => "Download",
		LinkTitle => "Link",
		PostDateTitle => "Date",
		PostDateTitleWidth => "5%",
		PostDateWidth => "93%"		
	);	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="6%"><img src="images/00/icon_02.jpg" width="37" height="37" /></td>
                    <td width="44%" class="title01"><?php echo($News[$Lang]["Title"]); ?></td>
                    <td width="50%" align="right"><img src="images/00/img_01.jpg" width="8" height="8" /> <a href="<?php echo($News[$Lang]["IndexLink"]); ?>">Deary</a> / <?php echo($News[$Lang]["Title"]); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td height="32" class="title02"><?php echo($data['Title'.$Lang]); ?></td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="2%" align="left" style="border-top:1px dotted #FC6; padding-bottom:4px"><img src="images/00/img_03.jpg" width="9" height="9" /></td>
                    <td width="<?php echo($News[$Lang]["PostDateTitleWidth"]); ?>" align="left" style="border-top:1px dotted #FC6;padding:8px 0px"><?php echo($News[$Lang]["PostDateTitle"]); ?>：</td>
                    <td width="<?php echo($News[$Lang]["PostDateWidth"]); ?>" class="day" style="border-top:1px dotted #FC6; padding-bottom:4px"><?php echo($data['PostDate']); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td><?php echo($data['Note'.$Lang]); ?></td>
    </tr>
    <?php  
		if(array_key_exists("File",$data) && array_key_exists("Link",$data)){
	?>
    <tr>
        <td style="padding-top:20px">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php if(array_key_exists("File",$data)){ ?>
                <tr>
                    <td width="2%" valign="top" style="padding-top:3px"><img src="images/00/img_03.jpg" width="9" height="9" /></td>
                    <td width="9%" valign="top"><?php echo($News[$Lang]["FileTitle"]); ?>：</td>
                    <td width="89%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <?php
								$IsFirst = true;
								foreach($data["File"] as $Key => $Value){
							?>
                            <tr>
                                <td height="21"><a href="<?php echo(GetSCRIPTNAME());?>?S=<?php echo($Value["SerialNo"]);?>&opp=download" target="_blank"><?php echo($Value["Title".$Lang]); ?></a></td>
                            </tr>
                            <?php
								}
							?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="top">&nbsp;</td>
                    <td valign="top">&nbsp;</td>
                    <td valign="top">&nbsp;</td>
                </tr>
                <?php } ?>
                <tr>
                    <td width="2%" valign="top" style="padding-top:3px"><img src="images/00/img_03.jpg" width="9" height="9" /></td>
                    <td width="9%" valign="top"><?php echo($News[$Lang]["LinkTitle"]); ?>：</td>
                    <td width="89%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <?php
								foreach($data["Link"] as $Key => $Value){
							?>
                            <tr>
                                <td height="21"><a href="<?php echo($Value["Url"]); ?>" target="<?php echo($Value["TargetWindow"]); ?>"><?php echo($Value["Title".$Lang]); ?></a></td>
                            </tr>
                            <?php	
								}
							?>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <?php
		}
	?>
    <tr>
        <td height="24">&nbsp;</td>
    </tr>
    <tr>
        <td align="right" style="background-image:url(images/03_product/img_07.jpg); width:707px; height:28px; background-repeat:no-repeat;"><a href="news_list.php?Page=<?php echo($Page); ?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image29','','images/00/but_back_o.jpg',1)"><img src="images/00/but_back.jpg" name="Image29" width="90" height="28" border="0" id="Image29" /></a></td>
    </tr>
</table>