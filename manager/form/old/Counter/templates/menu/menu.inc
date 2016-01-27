<script type="text/javascript" src="../../script/jquery.js"></script>
<script type="text/javascript">
var pHref,pA;
function hideHref(oHref)
{
    if (pA!=null) {
        pA.className = "";
    }
    oHref.className = "clicked";
    pA = oHref;
}

function formatHref()
{
    vHref = $("a");
	if(!vHref){
		for (i=0; i<vHref.length; i++){
			if (vHref.eq(i).prop("href") == window.parent.frames[1].location.href){
				pA = vHref.eq(i);
				pHref = vHref.eq(i).prop("href");
				vHref.eq(i).prop("className","clicked");
			}
		}
	}
}
$(function(){
	formatHref();
});
// -->
</script>
<br>
<?php
$cycleArray['cycle'] = array('#E6E6E6','#DADADA','#DADADA','#CDCDCD','#CDCDCD','#C1C1C1','#C1C1C1','#B4B4B4','#B4B4B4','#A7A7A7','#9A9A9A');
?>

<table cellpadding="0" cellspacing="0" width="100%">
    <tr><td valign="top" align="right">
        <table cellspacing="4">
            <tr height="20" style="background-color: <?php cycle() ?>">
				<td align="left" style="padding:0px 10px">
					<a href="main.php?actionID=TotalData" target="mainCounter" onclick="hideHref(this)">總 體 資 料</a>
				</td>

				<td align="left" style="padding:0px 10px">
					<a href="main.php?actionID=RecentlyRecord" target="mainCounter" onclick="hideHref(this)">最 新 記 錄</a>
				</td>
				<td align="left" style="padding:0px 10px">
					<a href="main.php?actionID=HoursStat" target="mainCounter" onclick="hideHref(this)">24 小 時 統 計</a>
				</td>
				<td align="left" style="padding:0px 10px">
					<a href="main.php?actionID=DayStat" target="mainCounter" onclick="hideHref(this)">日 統 計</a>
				</td>
				<td align="left" style="padding:0px 10px">
					<a href="main.php?actionID=WeekStat" target="mainCounter" onclick="hideHref(this)">週 統 計</a>
				</td>
				<td align="left" style="padding:0px 10px">
					<a href="main.php?actionID=MonthStat" target="mainCounter" onclick="hideHref(this)">月 統 計</a>
				</td>
				<td align="left" style="padding:0px 10px">
					<a href="main.php?actionID=ClientSoftwareStat" target="mainCounter" onclick="hideHref(this)">訪 問 者 軟 體</a>
				</td>
				<?php $id = $_COOKIE["id"] ?>
				<?php if($id=="admin"){?>
				<td align="left" style="padding:0px 10px">
					<a href="admin.php" target="mainCounter" onclick="hideHref(this)">管 理 員 登 入</a>
				</td>
				<?php } ?>
			</tr>
        </table>
    </td></tr>
</table>
<br>