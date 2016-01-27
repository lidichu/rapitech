<table class="tbody" cellspacing="1" align="center" cellpadding="0">
    <tr>
        <td class="thead">
            &nbsp; <img src="images/tb_title.gif" align="absmiddle"> &nbsp;訪問者操作系統及數量
        </td>
    </tr>
    <tr>
        <td class="middle">

        <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
        <tr height="9"><td colspan="2"></td></tr>
        <tr height="10">
            <td></td>
            <td><img src="images/h_top.gif"></td>
        </tr>
        <?php foreach ($oslist as $value) { ?>
        <tr>
            <td style="padding-left: 20px">
                <span style="cursor: default" title="<?php echo($value['whichos']); ?><br>
訪問 <?php echo($value['visittimes']); ?> 次, <?php echo($value['percent']); ?>"><?php echo($value['whichos']); ?></span>
            </td>
            <td class="hback" align="left" style="background: url('images/h_back.gif') repeat-y;">
                <img src="images/h_bar.gif"
                    width="<?php echo($value['height']); ?>" height="11"
                    alt="<?php echo($value['whichos']); ?><br>
訪問 <?php echo($value['visittimes']); ?> 次, <?php echo($value['percent']); ?>">
                <span style="font-family:Arial; letter-spacing:-1"><?php echo($value['visittimes']); ?></span>
            </td>
        <tr>
        <?php } ?>
        <tr height="10">
            <td></td>
            <td><img src="images/h_bottom.gif"></td>
        </tr>
        <tr height="5"><td colspan="2"></td></tr>

        </table>


        </td>
    </tr>
</table>

<br>

