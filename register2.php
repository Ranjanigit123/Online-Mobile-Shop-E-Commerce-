<?php
include("sess_page.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['username'];
$msg="";
//echo $uname;
if(isset($register))
{

		$uqry=mysql_query("update register set credit=$credit where username='$uname'");
		if($uqry)
		{
		header("location:index.php");
		}
		else
		{
		$msg="Could not be stored!";
		}	
}
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
<script language="javascript">
function validate()
{

	if(isNaN(document.form1.credit.value))
	{
	alert("Invalid Credit Card No..!");
	document.form1.credit.select();
	return false;
	}
	if(document.form1.credit.value=="")
	{
	alert("Enter the Credit Card No...");
	document.form1.credit.focus();
	return false;
}
return true;	
}
</script>
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
        <p class="style1 style2"><?php echo $msg; ?></p>
        <table width="405" height="360" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2" align="center"><strong>Enter Account Details </strong></td>
          </tr>
          <tr>
            <td width="162">Credit Card No. </td>
            <td width="162"><input type="text" name="credit"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="register" value="Register" onClick="return validate()" />
            <input type="reset" name="Reset" value="Clear"></td>
          </tr>
        </table>
        <p>&nbsp;</p>
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
