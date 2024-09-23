<?php
include("sess_page.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";

?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {
	color: #990000
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_home.php"); ?></td>
    </tr>
    <tr>
      <td align="center"><p>&nbsp;</p>
        <p class="style1 style2">&nbsp;</p>
        <p class="txt_msg">Your account created successfully... </p>
        <p>&nbsp;</p>
        <p><a href="index.php">Go back your to Home </a></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
