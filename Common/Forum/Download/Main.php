<script type="text/javascript">
$(function(){
	$(".lightbox").lightBox();
});
</script> 
<?php
	if(strtolower($opp)=="download"){
		//接收檔案下載流水號
		$SerialNoFile = CheckData(Request_Get("SN"));
		if($SerialNoFile==""){$SerialNoFile = 0;}
		$SQL="Select * From download  Where `SerialNo` = ".$SerialNoFile." And Status='上架'";
		$Rs = mysql_query($SQL,$Conn);
		if($Rs && mysql_num_rows($Rs) > 0){
			$Row = mysql_fetch_array($Rs);
			if($Row["FileHidden"]!=""){
				FileHandle::Downloadfile(VisualRoot."/files/Download/$lang/File/".$Row["FileHidden"],$Row["File"]);
			}else{
				die('File Not Found');
			}
		}else{
			die('File Not Found');
		}
		exit();
	}	
	$SearchText=$_REQUEST["SearchText"];
	$TitleArray["Ch"]=Array("Text1"=>"搜尋","Text2"=>"輸入關鍵字","Text3"=>"搜尋結果","Text4"=>"主旨","Text5"=>"檔案下載","Text6"=>"請輸入關鍵字");
	$TitleArray["En"]=Array("Text1"=>"Search","Text2"=>"Please enter a keyword","Text3"=>"Search Results","Text4"=>"Title","Text5"=>"Download","Text6"=>"Please enter a keyword");
	$TitleArray["Es"]=Array("Text1"=>"Buscar","Text2"=>"Por favor introduzca la palabra clave","Text3"=>"Resultados de la búsqueda","Text4"=>"Título","Text5"=>"Descargar","Text6"=>"Por favor, introduzca una palabra clave");
	$TitleArray["Ru"]=Array("Text1"=>"Поиск","Text2"=>"введите слово","Text3"=>"Результаты поиска","Text4"=>"Название","Text5"=>"Загрузить","Text6"=>"Пожалуйста, введите ключевое слово");
	$TitleArray["It"]=Array("Text1"=>"Ricerca","Text2"=>"Inserisci una parola chiave","Text3"=>"Risultati della ricerca","Text4"=>"Título","Text5"=>"Descargar","Text6"=>"Si prega di inserire una parola chiave");
	$TitleArray["Fr"]=Array("Text1"=>"Recherche","Text2"=>"entrez un mot clé","Text3"=>"Résultats de la recherche","Text4"=>"Fonction","Text5"=>"Téléchargement","Text6"=>"S'il vous plaît entrer un mot-clé");
?>
<?php
	$PageSize = 10;
	$Page = CheckData($_REQUEST["Page"]);
	if($Page == ""){$Page = 1;}
	$Page = intval($Page);
	if($SearchText!=""){
		$Query=" and Title like '%$SearchText%'";
		$OtherQuery="Search=".$SearchText;
	}else{
		$Query="";
	}
	$SQL = "Select Count(*) As DataAmount From download where Status = '上架' $Query and Lang='$lang'";
	$Rs = mysql_query($SQL,$Conn);
	$Row = mysql_fetch_array($Rs);
	$DataAmount = intval($Row["DataAmount"]);
	//計算分頁數量
	$PageAmount = NumHandle2($DataAmount,$PageSize) / $PageSize;
	//調整目前分頁
	if($Page > $PageAmount){$Page = $PageAmount;}
	if($Page < 1){$Page = 1;}
	$SQL = "Select * From download Where Status = '上架' and Lang='$lang' $Query Order By Sort,SerialNo DESC limit ".(($Page-1) * $PageSize).",".$PageSize;
	$Rs = mysql_query($SQL,$Conn);
?>
<td width="70%" align="left" valign="top" style="padding:15px 30px 0px 20px">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #D9D9D9">
					<?php include_once("../Common/Forum/Download/Search.php");?>
					<tr>
						<td align="center" bgcolor="#FFFFFF" style="padding:14px 0px" height="300" valign="top">
							<?php 
								if($DataAmount > 0){
							?>
							<table width="94%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="36" colspan="3" style="background-image:url(images/04_download/img_01.jpg); background-repeat:no-repeat; height:37px ">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td width="80%" align="center" class="h4"><?php echo $TitleArray[$lang]["Text4"]?></td>
												<td width="20%" align="center" class="h4"><?php echo $TitleArray[$lang]["Text5"]?></td>
											</tr>
										</table>
									</td>
								</tr>
								<?php
									while($Row = mysql_fetch_array($Rs)){ 
										$SerialNo=$Row["SerialNo"];																						
										$Title=$Row["Title"];
										if($Row["PICHidden"]!=""){
											$Pic="../files/Download/$lang/PIC/".$Row["PICHidden"];
											$BigPic="../files/Download/$lang/Big/".$Row["PICHidden"];
										}else{
											$Pic="";
											$BigPic="";
										}
										$FileName=$Row["File"];
										$FileArray=explode(".",$FileName);
										$ExtName=$FileArray[1];
										if($ExtName=="doc" || $ExtName=="docx"){
											$FilePic="images/04_download/icon_doc.jpg";
										}else if($ExtName=="pdf"){
											$FilePic="images/04_download/icon_pdf2.jpg";
										}
										else if($ExtName=="jpg" || $ExtName=="bmp" || $ExtName=="png" || $ExtName=="gif"){
											$FilePic="images/04_download/icon_pic.jpg";
										}else{
											$FilePic="images/04_download/icon_others.jpg";
										}
					
								?>
								<tr>
									<td width="24%" align="left" valign="top" style="border-bottom:1px solid #D9D9D9; padding:8px">
										<a class="lightbox" href="<?php echo $BigPic?>" target="_blank"><img src="<?php echo $Pic?>" width="110" height="107" border="0" class="photo" /></a>
									</td>
									<td width="56%" height="36" align="left" style="border-bottom:1px solid #D9D9D9;"><?php echo $Title?></td>
									<td width="20%" height="36" align="center" style="border-bottom:1px solid #D9D9D9">
										<a href="<?php echo(GetSCRIPTNAME());?>?SN=<?php echo($Row["SerialNo"]);?>&opp=download" target="_blank"><img src="<?php echo $FilePic?>"  border="0" /></a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
							<?php	}?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<?php include_once("../Common/PageBar/PageBar.php");?>
		<tr>
			<td height="35">&nbsp;</td>
		</tr>
	</table>
</td>

