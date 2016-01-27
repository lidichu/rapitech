<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include("../PageHead.php"); ?>
<title><?php echo $title; ?></title>
<meta name="robots" content="all">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="3 days" />
<meta name="spiders" content="all" />
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="author" content="<?php echo $author; ?>">
<meta name="copyright" content="<?php echo $copyright; ?>">
<meta name="description" content="<?php echo $description; ?>">
<meta http-equiv="Content-Style-Type" content="text/css" />
<script type="text/javascript" src="../js/jquery-latest.min.js"></script>
<!--banner輪播、按鈕翻轉-->
<script src="../js/jquery-1.4.1.min.js"></script>
<!--房間介紹滑過背景-->
<script type="text/javascript" src="../js/jquery.backgroundPosition.js"></script>
<!--按鈕翻轉-->
<script type="text/javascript" src="../js/jq.js"></script>
<!--banner輪播-->
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<style>
body {
	background: url(../images/index/bk.png) repeat-x;
}
</style>
<script type="text/javascript">
	$(function(){
		// 幫 #hmenu li a 加上 hover 事件
		$("#hmenu li a").hover(function(){
			var _this = $(this),
				_height = _this.height() * -1;

			if(_this.hasClass('selected')) return;
			// 滑鼠移進選項時..
			// 把背景圖片的位置往上移動
			_this.stop().animate({
				backgroundPosition: "0px " + _height + "px"
			}, 200);
		}, function(){
			var _this = $(this),
				_height = _this.height() * -1;

			if(_this.hasClass('selected')) return;
			// 滑鼠移出選項時..
			// 把背景圖片的位置移回原位
			_this.stop().animate({
				backgroundPosition: "0px 0px"
			}, 200);
		}).click(function(){
			$(this).toggleClass('selected');
			return false;
		});
	});
</script>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body
	onLoad="MM_preloadImages('../images/index/but2_1.png','../images/index/but3_1.png','../images/index/but4_1.png','../images/index/but1_1.png')">
	<!--fb分享-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div id="content">
		<!--all-->
		<div id="frame">
			<!--content-->
			<div>
				<img src="../images/index/top_bk.png" width="1200" height="137">
			</div>
			<!--top-->
			<div id="memu_left">
				<!--menu_left-->
				<div align="center">
					<a href="../index.php"><img src="../images/index/logo.png"
						width="70" height="285"></a>
				</div>
				<div align="center">
					<img src="../images/index/line.png" width="184" height="30">
				</div>
				<div>
					<!--menu-->
					<ul class="menu">
						<li><a href="../index.php" onMouseOut="MM_swapImgRestore()"
							onMouseOver="MM_swapImage('Image17','','../images/index/but1_1.png',1)"><img
								src="../images/index/but1.png" name="Image17" width="16"
								height="212" id="Image17"></a></li>
						<li><a href="specification.php"><img
								src="../images/index/but2_1.png" width="16" height="212"></a></li>
						<li><a href="price.php" onMouseOut="MM_swapImgRestore()"
							onMouseOver="MM_swapImage('Image6','','../images/index/but3_1.png',1)"><img
								src="../images/index/but3.png" name="Image6" width="16"
								height="212" id="Image6"></a></li>
						<li><a href="scenic.php" onMouseOut="MM_swapImgRestore()"
							onMouseOver="MM_swapImage('Image8','','../images/index/but5_1.png',1)"><img
								src="../images/index/but5.png" name="Image8" width="16"
								height="212" id="Image8"></a></li>
						<li><a href="contact.php" onMouseOut="MM_swapImgRestore()"
							onMouseOver="MM_swapImage('Image23','','../images/index/but4_1.png',1)"><img
								src="../images/index/but4.png" name="Image23" width="16"
								height="212" id="Image23"></a></li>
					</ul>
					<br class="clear-both">
				</div>
				<!--menu End-->
				<div align="center">
					<a href="https://www.facebook.com/南科日租雅苑麗緻會館-384842424893263/"
						target="_blank"><img src="../images/index/fb.png" width="184"
						height="61"></a>
				</div>
			</div>
			<!--menu_left End-->
			<div id="banner_right">
				<!--banner_right-->
				<div id="banner">
					<!--banner-->
					<ul class="list">
                       <?php include("../Common/banner.php"); ?>
                    </ul>
				</div>
				<!--banner End-->
				<br class="clear-both">
				<div>
					<!--房間介紹-->
					<div id="room_left">
						<!--房間介紹menu-->
						<img src="images/rooms/title.png" width="133" height="120">
						<div align="center">
							<img src="images/rooms/menu.png" width="195" height="27">
						</div>
						<ul class="room_menu">
							<li onClick="window.location='specification.php'">房間規格說明</li>
							<li onClick="window.location='facilities.php'">房間配備</li>
							<li onClick="window.location='bathroom.php'">衛浴設備</li>
							<li onClick="window.location='sale.php'" class="current">安全管理</li>
						</ul>
					</div>
					<!--房間介紹menu End-->
					<div id="room_right1">
						<!--content-->
						<div id="sale_bk">
							<div
								style="padding: 415px 0 0 0px; width: 430px; text-align: right">
								<p class="style6">
									加強賃居房客住屋安全管理。<br> <br> 24HR監控門禁管理，刷卡管制進出。<br>
									各樓層設置緩降機、滅火器、緊急照明設備， <br> 頂樓無違建，安全性高。
								</p>
							</div>
						</div>
					</div>
					<!--content End-->
				</div>
				<!--房間介紹 End-->
			</div>
			<!--banner_right End-->
			<br class="clear-both">
		</div>
		<!--content End-->
		<div id="footer_line">
			<!--footer-->
			<div id="footer_share" align="right">
				<img src="../images/index/share.png" width="30" height="34">
				<div class="fb-share-button"
					data-href="http://www.tndgdemo2.com/house/"
					data-layout="button_count"
					style="margin: 7px 0 0 10px; float: right"></div>
				<br class="clear-both">
			</div>
			<div id="footer_contact">
				<!--聯絡-->
				<div align="center" class="style2" id="frame">
					<span class="style3">ADD /</span> 台南市新市區和平街 166 號<span
						class="style3"> TEL /</span> 06-5990-031 ‧ 0932-469-496 陳 小姐
				</div>
			</div>
			<!--聯絡-->
			<div id="frame" align="center">
				<span class="style4">&copy; 雅苑麗緻會館 2015. All Rights Reserved. Design
					by </span><a href="http://www.tndg.com.tw/index.asp"
					target="_blank" class="style4"><u>TNDG</u></a>
			</div>
		</div>
		<!--footer End-->
	</div>
	<!--all End-->
</body>
</html>
