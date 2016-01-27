<script type="text/javascript">
$(function(){
	$("#SearchText").focus(function(){
		if($(this).val().trim()=="<?php echo $TitleArray[$lang]["Text2"]?>"){
			$(this).val("");
		}
	})
	$("#btnSearch").click(function(){
		/*
		if($("#SearchText").val().trim()==""){
			alert("<?php echo $TitleArray[$lang]["Text6"]?>");
			return false;
		}else{
			$("#SearchForm").submit();
			return false;
		}
		*/
		$("#SearchForm").submit();
		return false;
	})
});
</script> 
<tr>
	<td height="30" align="right" bgcolor="#DBDBDB">
		<form id="SearchForm" method="POST" action="<?php echo GetScriptName()?>" >
		<table width="51%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td   align="right"><img src="images/04_download/img_05.jpg" width="20" height="20" /></td>
				<td   align="right"><?php echo $TitleArray[$lang]["Text1"]?>：</td>
				<td width="" align="left">
					<input name="SearchText" type="text" id="SearchText"  style="width:220px;font-family:Arial, Helvetica, sans-serif; size:12px; color:#999" value="<?php echo $TitleArray[$lang]["Text2"]?>"/>
				</td>
				<td width="" align="left" style="padding-left:6px">
					<a id="btnSearch" href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image36','','images/04_download/but_search_o.jpg',1)">
					<img src="images/04_download/but_search.jpg" name="Image36" border="0" id="Image36" /></a>
				</td>
			</tr>
		</table>
		</form>
	</td>
</tr>
<?php 	if($SearchText!=""){?>
<tr>
	<td height="30" style="font-size:13pt;padding-left:10px" align="left" bgcolor="#ffffff">
		<span style="color:red"><?php echo $SearchText?></span>&nbsp;&nbsp;<?php echo $TitleArray[$lang]["Text3"]?> ：
	</td>
</tr>
<?php	}?>



