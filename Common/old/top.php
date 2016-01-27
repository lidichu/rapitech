<?php
	$opp=CheckData($_REQUEST["opp"]);
	$MemAccount=CheckData($_REQUEST["MemAccount"]);
	$MemPWD=CheckData($_REQUEST["MemPWD"]);
	if($UrlCh!=""){
		$BURL=GetSCRIPTNAME()."?".$UrlCh;
	}else{
		$BURL=GetSCRIPTNAME();
	}
	switch($opp){
		case "Login":
			if($opp=="" || $MemAccount=="" || $MemPWD==""){
				notify("資料不齊全");
			}else{
				$Param=array(
					"EMail"  =>$MemAccount,
					"PWD"=>MD5($MemPWD)
				);
				$Row=GetTable("member","*",$Param,"",1);
				if($Row){
					if($Row["ActiveStatus"]=='false'){
						notify("尚未開通");
					}else{
						setcookie("Member",$Row["SerialNo"]."_".md5($Row["PWD"].$CookieKey.$Row["SerialNo"]), time() + 24*60*60,"/","",0);
						notify($Row["MemberName"]." 歡迎您回來",$BURL,"");
						$LoginView=true;
						$MemSerialNo = $Row["SerialNo"];
					}
				}else{
					notify("帳號或密碼錯誤");
				}
			}
			exit();
			break;
		case "Logout":
			if($IsLogin == false){
				notify("請先登入");
			}else{
				setcookie("Member","",time() - 24*60*60,"/","",0);
				notify("登出完成","index.php","");
			}
			exit();
			break;
	}
?>
<script type="text/javascript">
$(function(){
	$("#loginsubmit").click(function(){
		$("#form5").submit();
		return false;
	});
	$("#form5").on({
		"submit":function(){
		}
	});
})

function chtype1()
{
	document.getElementById("MemPWD").value="";
	document.getElementById("MemPWD").type="password";
}

function chtype2()
{
	if(document.getElementById("MemPWD").value=="")
	{
		document.getElementById("MemPWD").type="text";
		document.getElementById("MemPWD").value="密碼";
	}else{   
		document.getElementById("MemPWD").type="password";
	}
}
</script>
<tr>
	<td align="left" valign="top">
		<table width="1265" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="527" align="left" valign="top"><a href="index.php"><img src="../images/index/i_01.png" alt="" width="527" height="115" /></a></td>
				<td width="738" align="left" valign="top">
					<table width="738" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="55" align="right" valign="middle" style="padding-right:34px">
								<form action="<?php echo(GetSCRIPTNAME()); ?><?php if($UrlCh!=""){ echo ("?".$UrlCh); }?>" name="form5" target="MyIframe" method="post" id="form5" style="padding:0px;margin:0px;">
									<input type="hidden" name="opp" value="Login" />
									<table width="80%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<?php
												if($IsLogin==true){
											?>	
												<td width="70%" align="right" valign="middle" style="color:#FFFFFF"><?php echo ($MemberInfo["MemberName"]); ?> 您好</td>
												<td width="8%" align="right" valign="middle" style="color:#FFFFFF"><a href="<?php echo(GetSCRIPTNAME()); ?>?opp=Logout<?php if($UrlCh!=""){ echo ("&".$UrlCh); }?>" style="color:#FFFFFF"> [登出]</a></td>
											<?php	
												}else{
													$IframeView=true;
											?>
												<td width="42%" align="right" valign="middle"><input name="MemAccount" type="text" id="MemAccount" style="border:1px solid #999"  value="帳號" onfocus="this.value=(this.value=='帳號') ? '' : this.value;" onblur="this.value=(this.value=='') ? '帳號' : this.value;"/></td>
												<td width="28%" align="right" valign="middle"><label for="textfield2"></label><input name="MemPWD" type="text" id="MemPWD" style="border:1px solid #999" value="密碼" onfocus="chtype1();" onblur="chtype2();"/></td>
												<td width="8%" align="right" valign="middle"><input name="loginsubmit" type="image" id="loginsubmit" src="../images/index/i_04.png" width="37" height="23" border="0"/></td>
											<?php
												}
											?>
											<td width="12%" align="center" valign="middle"><a href="forgot.php"><img src="../images/index/i_06.png" width="58" height="23" border="0" /></a></td>
											<?php 
												if($IsLogin==false){
											?>
											<td width="10%" align="right" valign="middle"><a href="join.php"><img src="../images/index/i_08.png" width="58" height="23" border="0" /></a></td>
											<?php
												}
											?>
											
										</tr>
									</table>
								</form>
							</td>
						</tr>
						<tr>
							<td height="60" align="left" valign="top">
								<table width="738" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="125" align="left" valign="top"><a href="about.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','../images/index/i-over_13.png',1)"><img src="../images/index/i_13.png" alt="" name="Image2" width="125" height="60" border="0" id="Image2" /></a></td>
										<td width="112" align="left" valign="top"><a href="news.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','../images/index/i-over_14.png',1)"><img src="../images/index/i_14.png" alt="" name="Image3" width="112" height="60" border="0" id="Image3" /></a></td>
										<td width="112" align="left" valign="top"><a href="product.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../images/index/i-over_15.png',1)"><img src="../images/index/i_15.png" alt="" name="Image4" width="112" height="60" border="0" id="Image4" /></a></td>
										<td width="112" align="left" valign="top"><a href="member.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','../images/index/i-over_16.png',1)"><img src="../images/index/i_16.png" alt="" name="Image5" width="112" height="60" border="0" id="Image5" /></a></td>
										<td width="112" align="left" valign="top"><a href="shopping.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../images/index/i-over_17.png',1)"><img src="../images/index/i_17.png" alt="" name="Image6" width="112" height="60" border="0" id="Image6" /></a></td>
										<td width="131" align="left" valign="top"><a href="contact.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../images/index/i-over_18.png',1)"><img src="../images/index/i_18.png" alt="" name="Image7" width="131" height="60" border="0" id="Image7" /></a></td>
										<td width="34" align="left" valign="top">&nbsp;</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>