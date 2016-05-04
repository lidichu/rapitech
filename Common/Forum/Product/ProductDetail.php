<?php
	$PICRoot = "../files/Product/PICDetail/";
	$PICBigRoot = "../files/Product/PICBig/";
	$data = array();

	$SQL = "Select SerialNo, ProductName".$Lang.",Use".$Lang.",Note".$Lang.",UrlYahoo,UrlPchome,UrlRakuten,PICHidden From product Where SerialNo = ".$SerialNo." And Status = '上架'" ;
	$Rs = mysql_query($SQL,$Conn);
	if($Rs && mysql_num_rows($Rs) > 0){
		$data = mysql_fetch_array($Rs);
		if($data["PICHidden"] != "" && is_file($PICRoot.$data["PICHidden"])){
			$data["PICDetailHidden"] = $PICRoot.$data["PICHidden"];
		}else{
			$data["PICDetailHidden"] = '../NoPIC/250x270.jpg';
		}
		if($data["PICHidden"] != "" && is_file($PICBigRoot.$data["PICHidden"])){
			$data["PICBigHidden"] = $PICBigRoot.$data["PICHidden"];
		}else{
			$data["PICBigHidden"] = "";
		}
		if($data["PICBigHidden"] != ""){
			$data["img"] = "<a class=\"ShowPic\" href=\"".$data["PICBigHidden"]."\"><img src=\"".$data["PICDetailHidden"]."\" border=\"0\" /></a>";
		}else{
			$data["img"] = "<img src=\"".$data["PICDetailHidden"]."\" border=\"0\" />";
		}
		$data['Use'.$Lang] = ReplaceEditor($data['Use'.$Lang]);
		$data['Note'.$Lang] = ReplaceEditor($data['Note'.$Lang]);
		if($data["UrlYahoo"] == ""){$data["UrlYahoo"] = "#";}
		if($data["UrlPchome"] == ""){$data["UrlYahoo"] = "#";}
		if($data["UrlRakuten"] == ""){$data["UrlYahoo"] = "#";}
	}
	$Fields = array();
	$Fields["Ch"] = array(
		Title => "產品介紹",
		IndexLink => "../index.php",
	 	ZoomTitle => "點小圖放大圖"
		
		
	);
	$Fields["Cn"] = array(
		Title => "产品介绍",
		IndexLink => "index_cn.php",
		ZoomTitle => "点小图放大图"
	);
	$Fields["En"] = array(
		Title => "Product",
		IndexLink => "index_en.php",
		ZoomTitle => "zoom"
	);
?>
<?php if(count($data) > 0){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="6%">&nbsp;</td>
                    <td width="44%" class="title01">&nbsp;</td>
                    <td width="50%" align="right"><img src="images/00/img_01.jpg" width="8" height="8" /> <a href="<?php echo($Fields[$Lang]["IndexLink"]); ?>">Deary</a> / <a href="product_list.php"><?php echo($Fields[$Lang]["Title"]); ?></a> / <?php echo($CategoryName); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="35%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" valign="middle" style="padding-bottom:5px"><?php echo($data["img"]); ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="67%" height="28" align="right"><img src="images/03_product/img_06.jpg" width="20" height="20" /></td>
                                            <td width="33%" align="left" class="text03"><?php echo($Fields[$Lang]["ZoomTitle"]); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="65%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding-left:20px">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td height="34" valign="top">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td width="58%" class="title01"><?php echo($CategoryName); ?></td>
                                                                    <td width="42%" align="right">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=434202139965934";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
	<div class="fb-like" data-href="http://<?php echo($_SERVER["SERVER_NAME"]); ?>/<?php echo(strtolower($Lang))?>/product_main.php?G0=<?php echo($G0); ?>&amp;SerialNo=<?php echo($data["SerialNo"]); ?>" data-send="false" data-layout="button_count" data-width="82" data-show-faces="true" data-action="recommend" data-font="arial"></div>


                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="90%" height="24" class="h2"><?php echo($data["ProductName".$Lang]); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="24" class="text02" style="padding-bottom:15px"><?php echo($data["Use".$Lang]); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="24"><?php echo($data["Note".$Lang]); ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30">&nbsp;</td>
                                        </tr>
                                        <?php if($Lang == "Ch"){ ?>
                                        <tr>
                                            <td>
                                                <table width="437" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td colspan="3"><img src="images/03_product/img_04.jpg" width="437" height="39" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="<?php echo($data["UrlYahoo"]); ?>" target="_blank"><img src="images/03_product/but_yahoo.jpg" width="168" height="82" border="0" /></a></td>
                                                        <td><a href="<?php echo($data["UrlPchome"]); ?>" target="_blank"><img src="images/03_product/but_pchome.jpg" width="152" height="82" border="0" /></a></td>
                                                        <td><a href="<?php echo($data["UrlRakuten"]); ?>" target="_blank"><img src="images/03_product/but_ichiba.jpg" width="117" height="82" border="0" /></a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="25" colspan="2" align="right">&nbsp;</td>
                </tr>
                <tr>
                    <td height="60" colspan="2" align="right" valign="bottom" style="background-image:url(images/03_product/img_07.jpg); width:707px; height:28px; background-repeat:no-repeat;"><a href="product_list.php?G0=<?php echo($G0); ?>&Page=<?php echo($Page); ?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image35','','images/00/but_back_o.jpg',1)"><img src="images/00/but_back.jpg" name="Image35" width="90" height="28" border="0" id="Image35" /></a></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php } ?>