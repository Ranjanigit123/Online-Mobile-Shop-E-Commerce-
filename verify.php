<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
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
	font-size: 18px;
	color: #FF0066;
}
.style3 {color: #FF0066}
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
      <td align="center" class="subhead"><a href="logout.php">Logout</a></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <p class="txt1">&nbsp;</p>
        <p class="txt1 style3">&nbsp;</p>
        <p class="txt1 style2"><strong>Your Secret Key is verfied Successfully...</strong></p>
        <p class="txt1"><strong><a href="user_page.php">Go to Your Account </a></strong></p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p></p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
