<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../script/jquery.js"></script>
<script language="JavaScript">
<!--
var w=150;
var repeat = 0;
$(function(){
	$("#btnNavi").click(function(){
		navi()
		return false;
	});
});
function navi() {
	if($("#imgNavi").prop("alt") == "隱藏Menu"){
		w-=15;
		if (w>-1) {
			$(window.parent.document).find("#fsMain").prop("cols",w + ",10,*")
			window.clearTimeout(repeat);
		    repeat = window.setTimeout("navi()",10);
		}
		else {
		    window.clearTimeout(repeat);
			$("#imgNavi").prop({"alt":"顯示Menu","src":"../images/open.gif"});
		}		
	}else{
		w+=15;
		if (w<165) {
			$(window.parent.document).find("#fsMain").prop("cols",w + ",10,*")
			window.clearTimeout(repeat);
		    repeat = window.setTimeout("navi()",10);
		}
		else {
		    window.clearTimeout(repeat);
			$("#imgNavi").prop({"alt":"隱藏Menu","src":"../images/close.gif"});
		}	
	}
}
//-->
</script>
</head>
<body bgcolor="FFFFFF" background="../images/vl_2.gif" leftmargin=0 topmargin=0>
<table border=0 cellspacing=0 cellpadding=0 height=100%>
	<tr>
		<td><a id="btnNavi" href="#" ><img id="imgNavi" src="../images/close.gif"  border="0" id="naviImg" alt="隱藏Menu" style="border:1px solid #A8A8A8;" /></a></td>
	</tr>
</table>
</body>
</html>