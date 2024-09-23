 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <?php
	if($uname!="")
	{
	?>
	<tr>
      <td width="33%" align="left">&nbsp;</td>
      <td width="33%" align="center">&nbsp;</td>
      <td width="34%" align="right"><strong>Welcome <?php echo $uname; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a></strong></td>
    </tr>
	<?php
	}
	?>
    <tr>
      <td colspan="3" align="center" class="heading"><?php //echo 'Shopping'; ?></td>
    </tr>
	</table>
