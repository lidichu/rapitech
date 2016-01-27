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
<script language="javascript"><!--房間介紹滑過背景-->
	$(function(){
		//當滑鼠滑入時將div的class換成divOver
		$('.divbox').hover(function(){
				$(this).addClass('divOver');		
			},function(){
				//滑開時移除divOver樣式
				$(this).removeClass('divOver');	
			}
		);
	});
</script>
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
					<a href="../index.php"><img src="../images/index/logo.png"></a>
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
						<li><a href="specification.php" onMouseOut="MM_swapImgRestore()"
							onMouseOver="MM_swapImage('Image5','','../images/index/but2_1.png',1)"><img
								src="../images/index/but2.png" name="Image5" width="16"
								height="212" id="Image5"></a></li>
						<li><a href="price.php" onMouseOut="MM_swapImgRestore()"
							onMouseOver="MM_swapImage('Image6','','../images/index/but3_1.png',1)"><img
								src="../images/index/but3.png" name="Image6" width="16"
								height="212" id="Image6"></a></li>
						<li><a href="scenic.php" onMouseOut="MM_swapImgRestore()"
							onMouseOver="MM_swapImage('Image8','','../images/index/but5_1.png',1)"><img
								src="../images/index/but5.png" name="Image8" width="16"
								height="212" id="Image8"></a></li>
						<li><a href="contact.php"><img src="../images/index/but4_1.png"
								width="16" height="212"></a></li>
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
					<!--聯絡我們-->
					<div id="contact_left">
						<!--聯絡資訊-->
						<img src="images/contact/title.png" width="133" height="120">
						<div>
							<img src="images/contact/1.png" width="66" height="25">
						</div>
						<div class="style5">74448</div>
						<div class="style5">台南市新市區和平街166號</div>
						<div class="style5">
							No.166, Heping St., Xinshi Dist., <br> Tainan City 74448, Taiwan
							(R.O.C.)
						</div>
						<div class="contact_margin">
							<img src="images/contact/2.png" width="66" height="25">
						</div>
						<div class="style5">06-5990-031</div>
						<div class="style5">+886-6-5990-031</div>
						<div class="contact_margin">
							<img src="images/contact/3.png" width="66" height="25">
						</div>
						<div class="style5">0932-469-496</div>
						<!--<div class="contact_margin"><img src="images/contact/4.png" width="66" height="25"></div>
                        <div class="style5"><a href="mailto:tiffany9792004@yahoo.com.tw" class="style5"><u>tiffany9792004@yahoo.com.tw</u></a></div>-->
						<div class="contact_margin">
							<a
								href="https://www.google.com.tw/maps/place/744%E5%8F%B0%E5%8D%97%E5%B8%82%E6%96%B0%E5%B8%82%E5%8D%80%E5%92%8C%E5%B9%B3%E8%A1%97166%E8%99%9F/@23.079608,120.2896193,15.25z/data=!4m2!3m1!1s0x346e7a5751661953:0x96b464b0e83ba7f2"
								target="_blank"><img src="images/contact/google_map.png"
								width="184" height="123"></a>
						</div>
					</div>
					<!--聯絡資訊 End-->
					<div id="contact_right">
						<!--map-->
						<div class="left">
							<img src="images/contact/title_1.png" width="53" height="71">
						</div>
						<div class="left">
							<div style="margin-top: 20px">
								<img src="images/contact/title_2.png" width="180" height="25">
							</div>
							<div class="style6">
								國道 8 號下新市交流道（往南科園區方向），沿新港社大道經民生路→和平街→「雅苑麗緻會館」<br> 距離南科園區約 1
								公里，開車大約 3 分鐘
							</div>
							<div>
								<img src="images/contact/title_3.png" width="150" height="47">
							</div>
							<div class="style6">
								火車 / 區間車：抵達新市火車站後步行20分，或是搭乘計程車。<br> 高鐵 /
								台南站：可轉搭台鐵沙崙線至新市火車站，或是搭乘計程車。
							</div>
							<br class="clear-both">
							<div>
								<img src="images/contact/map.png" width="593" height="385">
							</div>

						</div>
					</div>
					<!--map End-->
				</div>
				<!--聯絡我們 End-->
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
