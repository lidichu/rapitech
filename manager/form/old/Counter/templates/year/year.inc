<table class="tbody" cellspacing="1" align="center" cellpadding="0">
    <tr>
        <td class="thead">
            &nbsp; <img src="images/tb_title.gif" align="absmiddle"> &nbsp;所有年份訪問量
        </td>
    </tr>
    <tr>
        <td class="middle">

        <table border="0" cellpadding="0" cellspacing="0" align="center">
            <tr height="9"><td colspan="29">&nbsp;</td></tr>
            <tr height="101">
                <td align="right" valign="top" style="padding-right: 2px">
                    <span style="height:20px"><?php echo($maxallyear); ?></span><br>
                    <span style="height:25px"><?php echo(ceil($maxallyear*3/4)); ?></span><br>
                    <span style="height:25px"><?php echo(ceil($maxallyear/2)); ?></span><br>
                    <span style="height:25px"><?php echo(ceil($maxallyear/4)); ?></span><br>
                </td>

                <td width="9" valign="top"><img src="images/v_left.gif"></td>

                <?php foreach ($allyearlist as $value) { ?>
                <td style="background: url('images/v_back.gif') repeat-x;" class="vback" width="25" valign="bottom" align="center">
                <?php if ($value['visittimes'] != 0) {?>
                <img src="images/v_bar.gif"
                     height="<?php echo($value['height']); ?>" width="11"
                     alt=" <?php echo($value['whichyear']); ?> 年, 訪問 <?php echo($value['visittimes']); ?> 次<br>
<?php echo($value['percent']); ?>">
                <?php } ?>
                </td>
                <?php } ?>

                <td width="10" valign="top"><img src="images/v_right.gif"></td>
                <td width="10">&nbsp;</td>
            </tr>

            <tr>
                <td align="right" valign="top" style="padding-right:2">0</td>
                <td width="10">&nbsp;</td>

                <?php foreach ($allyearlist as $value) { ?>
                <td width="25" valign="bottom" align="center" class="vback">
                <span style="font-family: Arial; letter-spacing: -1; cursor: default"
                     title=" <?php echo($value['whichyear']); ?> 年, 訪問 <?php echo($value['visittimes']); ?> 次<br>
<?php echo($value['percent']); ?>">
                <?php echo($value['whichyear']); ?>
                </span>
                </td>
                <?php } ?>

                <td width="10"></td>
                <td width="10"></td>
            </tr>
            <tr height="5"><td colspan="29">&nbsp;</td></tr>
        </table>

        </td>
    </tr>
</table>

<br>

