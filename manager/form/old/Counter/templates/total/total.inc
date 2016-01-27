<?php
$cycleArray['cycle'] = array('#FFFBEE','#FFF4CE');
?>

<table class="tbody" cellspacing="1" align="center" cellpadding="0">
    <tr>
        <td class="thead">
            &nbsp; <img src="images/tb_title.gif" align="absmiddle"> &nbsp;總體資料
        </td>
    </tr>
    <tr>
        <td class="middle" align="center">
			<table cellpadding="4" style="margin-left:10px" width="98%" border="0" align="center">
				<tr style="background-color: <?php cycle() ?>">
					<td>開始統計日: </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vfirst']); ?></td>
					<td>最後統計日: </td>
					<td style="padding-left:20px;color:blue"><?php echo(date('Y-m-d H:i:s',$recentdata[0][0])); ?></td>					
				</tr>
				<tr style="background-color: <?php cycle() ?>">
					<td>總天數: </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vdays']); ?></td>
					<td>總人數: </td>
					<td style="padding-left:20px;color:blue"> <?php echo($toShow['vtotal']); ?> </td>					
				</tr>
				<tr style="background-color: <?php cycle() ?>">
					<td>昨日人數: </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vyesterday']); ?> </td>
					<td width="25%">本日人數: </td>
					<td width="25%" style="padding-left:20px;color:blue"><?php echo($toShow['vtoday']); ?> </td>					
				</tr>
				<tr style="background-color: <?php cycle() ?>">
					<td>本月人數: </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vthismonth']); ?> </td>
					<td>本年人數: </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vthisyear']); ?> </td>
				</tr>
				<tr style="background-color: <?php cycle() ?>">
					<td width="25%">平均人數(日): </td>
					<td width="25%" style="padding-left:20px;color:blue"><?php echo($toShow['vdayavg']); ?> </td>
					<td>平均人數(月): </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vmonthavg']); ?> </td>
				</tr>
				<tr style="background-color: <?php cycle() ?>">
					<td>最大人數(日): </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vdaymax']); ?> </td>
					<td>最大人數日期: </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vmaxday']); ?> </td>
				</tr>
				<tr style="background-color: <?php cycle() ?>">
					<td>最大人數(月): </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vmonthmax']); ?> </td>
					<td>最大人數月份: </td>
					<td style="padding-left:20px;color:blue"><?php echo($toShow['vmaxmonth']); ?> </td>
				</tr>
			</table>

        </td>
    </tr>
</table>