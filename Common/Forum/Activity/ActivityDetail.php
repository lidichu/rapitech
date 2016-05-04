<?php
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	$SerialNo = CheckData($_REQUEST["SerialNo"]);
	if($SerialNo == ""){
		$SQL = "Select SerialNo From activity Where Status = '上架' Order By Sort,SerialNo DESC limit 0,1";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row = mysql_fetch_array($Rs);
			$SerialNo = $Row[0];
		}else{
			$SerialNo = 0;
		}
	}
	$SerialNo = intval($SerialNo);	
	$data = array();
	$SQL = "Select * From activity Where SerialNo = ".$SerialNo." And Status = '上架'";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$data = mysql_fetch_array($Rs);
		$data['PostDate'] = date('Y-m-d',strtotime($data['PostDate']));
		$data['Note'.$Lang] = ReplaceEditor($data['Note'.$Lang]);
		$SQL = "Select SerialNo,Title".$Lang." From activityfile Where G0 = ".$data["SerialNo"]." And Status = '上架' Order By Sort,SerialNo DESC";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			while($Row = mysql_fetch_array($Rs)){
				$data["File"][] = $Row;
			}
		}
		$SQL = "Select Title".$Lang.",Url,TargetWindow From activitylink Where G0 = ".$data["SerialNo"]." And Status = '上架' Order By Sort,SerialNo DESC";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			while($Row = mysql_fetch_array($Rs)){
				$data["Link"][] = $Row;
			}
		}		
	}
	$Field = array();
	$Field["Ch"] = array(
		FileTitle => "相關檔案",
		LinkTitle => "相關連結",
		PostDateTitle => "發佈日期",
		PostDateTitleWidth => "9%",
		PostDateWidth => "89%"
	);
	$Field["Cn"] = array(
		FileTitle => "相关档案",
		LinkTitle => "相关连结",
		PostDateTitle => "发布日期",
		PostDateTitleWidth => "9%",
		PostDateWidth => "89%"		
	);
	$Field["En"] = array(
		FileTitle => "Download",
		LinkTitle => "Link",
		PostDateTitle => "Date",
		PostDateTitleWidth => "5%",
		PostDateWidth => "93%"		
	);	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="32" class="title02"><?php echo($data['Title'.$Lang]); ?></td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="2%" align="left" style="border-top:1px dotted #FC6; padding-bottom:4px"><img src="images/00/img_03.jpg" width="9" height="9" /></td>
                    <td width="<?php echo($Field[$Lang]["PostDateTitleWidth"]); ?>" align="left" style="border-top:1px dotted #FC6;padding:8px 0px"><?php echo($Field[$Lang]["PostDateTitle"]); ?>：</td>
                    <td width="<?php echo($Field[$Lang]["PostDateWidth"]); ?>" class="day" style="border-top:1px dotted #FC6; padding-bottom:4px"><?php echo($data['PostDate']); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td><?php echo($data['Note'.$Lang]); ?></td>
    </tr>
    <tr>
        <td style="padding-top:20px">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php if(array_key_exists("File",$data)){ ?>
                <tr>
                    <td width="2%" valign="top" style="padding-top:3px"><img src="images/00/img_03.jpg" width="9" height="9" /></td>
                    <td width="9%" valign="top"><?php echo($Field[$Lang]["FileTitle"]); ?>：</td>
                    <td width="89%" valign="top">
                        <table border="0" cellspacing="0" cellpadding="0">
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
                    <td width="9%" valign="top"><?php echo($Field[$Lang]["LinkTitle"]); ?>：</td>
                    <td width="89%" valign="top">
                        <table border="0" cellspacing="0" cellpadding="0">
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
</table>