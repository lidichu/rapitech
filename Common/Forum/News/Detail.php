<?php
	if ($Page =="")
		$Page="1";
	//接收操作名稱
	$opp = $_REQUEST["opp"];
	if(strtolower($opp)=="download"){
		//接收檔案下載流水號
		$SerialNoFile = CheckData(Request_Get("SN"));
		if($SerialNoFile==""){$SerialNoFile = 0;}
		$SQL="Select * From newsfile  Where `SerialNo` = ".$SerialNoFile." And Status='上架'";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row = mysql_fetch_array($Rs);
			if($Row["FileHidden"]!=""){
				FileHandle::Downloadfile(VisualRoot."/files/News/$lang/Files/".$Row["FileHidden"],$Row["File"]);
			}else{
				die('File Not Found');
			}
		}else{
			die('File Not Found');
		}
		exit();
	}	
	

	$SQL="Select * From news Where Status='上架' and SerialNo=$Sn limit 1";
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row = mysql_fetch_array($Rs);
		$SerialNo = $Row["SerialNo"];
		$Title = $Row["Title"];
		$PostDate = DateHandle($Row["PostDate"],"-");
		$Sort=$Row["Sort"];
		$Note = ReplaceEditor($Row["Note"]);
		if($Row["PICHidden"]!=""){
			$Pic="../files/News/$lang/PIC/".$Row["PICHidden"];
		}
	}
	//網址列資料	
	$BackValue="Page=$Page";	
	//檢查是否有上一項
	$BackUrl = "";
	$Sql="SELECT SerialNo,Sort FROM news where Status='上架' and Lang='$lang' and SerialNo > $Sn and Sort = $Sort order by SerialNo ASC limit 0,1  ";
	$Rs = mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row=mysql_fetch_array($Rs);
		if($Row["SerialNo"] > $Sn){
			$BackUrl="news_main.php?".$BackValue."&Sn=".$Row[0];
		}
	}
	if($BackUrl == ""){
		$Sql="SELECT SerialNo,Sort FROM news where Status='上架' and Lang='$lang' and SerialNo!=$Sn and Sort < $Sort order by Sort DESC, SerialNo ASC limit 1  ";
		$Rs = mysql_query($Sql,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row=mysql_fetch_array($Rs);
			$BackUrl="news_main.php?".$BackValue."&Sn=".$Row[0];
		}
	}
	

	//檢查是否有下一項
	$UpUrl = "";
	$Sql="SELECT SerialNo,Sort FROM news where Status='上架' and Lang='$lang' and SerialNo < $Sn and Sort = $Sort order by SerialNo DESC limit 1  ";
	$Rs = mysql_query($Sql,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$Row=mysql_fetch_array($Rs);
		$UpUrl="news_main.php?".$BackValue."&Sn=".$Row[0];
	}
	if($UpUrl == ""){
		$Sql="SELECT SerialNo,Sort FROM news where Status='上架' and Lang='$lang' and SerialNo!=$Sn and Sort > $Sort order by Sort ASC, SerialNo DESC limit 1  ";
		$Rs = mysql_query($Sql,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row=mysql_fetch_array($Rs);
			$UpUrl="news_main.php?".$BackValue."&Sn=".$Row[0];
		}
	}	
	$TitleArray["Ch"]=Array("Text1"=>"相關連結","Text2"=>"檔案下載");
	$TitleArray["En"]=Array("Text1"=>"Link","Text2"=>"Download");
	$TitleArray["Es"]=Array("Text1"=>"Enlace","Text2"=>"Descargar");
	$TitleArray["Ru"]=Array("Text1"=>"ссылка","Text2"=>"Загрузить");
	$TitleArray["It"]=Array("Text1"=>"Link","Text2"=>"Download");
	$TitleArray["Fr"]=Array("Text1"=>"Lien","Text2"=>"Spécifications");		

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #D9D9D9">
				<tr>
					<td bgcolor="#FFFFFF" style="padding:12px 0px" height="500" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="center">
									<table width="94%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="28" align="left" class="text_05" style="border-bottom:1px solid #D9D9D9">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="86%" class="text_05"><?php echo $Title?></td>
														<td width="14%" align="right" class="day_2" valign="top"><?php echo $PostDate?></td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td align="left" valign="top" style="padding:12px 0px 12px 0px;"><?php echo $Note?></td>
										</tr>
										<?php	if($Pic!=""){?>
										<tr>
											<td align="left" valign="top"><img src="<?php echo $Pic?>"/></td>
										</tr>
										<?php	}?>
										<?php 
											//查詢相關連結
											$SQL="Select * From newslink Where G1 = " . $SerialNo . " And Status='上架' Order By Sort,SerialNo DESC";
											$Rs = mysql_query($SQL,$Conn);
											if($Rs && mysql_num_rows($Rs) > 0){
										?>
										<tr>
											<td align="left" valign="top" style="padding-top:12px">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="3%" height="24" valign="top" style="padding-top:4px"><img src="images/02_news/img_06.jpg" width="16" height="16" /></td>
														<td width="11%" height="24" align="left" valign="top" class="text_03" style="padding-top:4px"><?php echo $TitleArray[$lang]["Text1"]?>：</td>
														<td width="86%" height="24" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<?php 								
																	while($Row = mysql_fetch_array($Rs)){
																		$Title=$Row["Title"];
																		$Url=$Row["Url"];
																		$TargetWindow=$Row["TargetWindow"];
																?>   
																<tr>
																	<td height="24" ><a href="<?php echo $Url?>" target="<?php echo $TargetWindow?>"><?php echo $Title?></a></td>
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
										<?php 
											//查詢檔案下載
											$SQL="Select * From newsfile Where G1 = " . $SerialNo . " And Status='上架' Order By Sort,SerialNo DESC";
											$Rs = mysql_query($SQL,$Conn);
											if($Rs && mysql_num_rows($Rs) > 0){
										?>
										<tr>
											<td align="left" valign="top" style="padding-top:12px">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="3%" height="24" valign="top" style="padding-top:4px"><img src="images/02_news/img_06.jpg" width="16" height="16" /></td>
														<td width="11%" height="24" align="left" valign="top" class="text_03" style="padding-top:4px"><?php echo $TitleArray[$lang]["Text2"]?>：</td>
														<td width="86%" height="24" valign="top">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<?php 								
																	while($Row = mysql_fetch_array($Rs)){
																?>  
																<tr>
																	<td height="24" ><a href="<?php echo(GetSCRIPTNAME());?>?SN=<?php echo($Row["SerialNo"]);?>&opp=download" target="_blank"><?php echo($Row["Title"]);?></a></td>
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
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<?php include_once("../Common/Forum/News/PageMenu.php");?>
	<tr>
		<td height="35">&nbsp;</td>
	</tr>
</table>

