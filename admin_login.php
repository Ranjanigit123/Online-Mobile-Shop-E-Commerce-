<?php
include("sess_page.php");
include("include/dbconnect.php");
require_once("email.php");
extract($_POST);
$msg="";
if(isset($login))
{
 if(trim($uname=="")) { $msg = "Enter the Username"; }
 else if(trim($pwd=="")) { $msg = "Enter the Password"; }
	else
	{
			$qry = "select * from login where username='$uname' && password='".$pwd."'";
			$exe=mysql_query($qry);
			$row=mysql_fetch_array($exe);
			$email=$row['email'];
			$num=mysql_num_rows($exe);
				if($num==1)
				{
				$_SESSION['uname']=$uname;
					
				header("location:admin.php");
				}
				else
				{
				$msg="Login Incorrect!";
				}
}//login
}

?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style5 {font-size: 18px}
-->
</style>
<script language="javascript">
function validate()
{
	if(document.form1.uname.value=="")
	{
	alert("Enter the Username");
	document.form1.uname.focus();
	return false;
	}
	if(document.form1.pwd.value=="")
	{
	alert("Enter the Password");
	document.form1.pwd.focus();
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
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <p class="style1">&nbsp;</p>
      <table width="318" height="169" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2" align="center" class="txt1"><strong>Login</strong></td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="txt1"><span class="style1"><?php echo $msg; ?></span></td>
          </tr>
        <tr>
          <td width="94" class="txt1">Username</td>
          <td width="90" class="txt1"><input type="text" name="uname" /></td>
        </tr>
        <tr>
          <td class="txt1">Password</td>
          <td class="txt1"><input type="password" name="pwd" /></td>
        </tr>
		
		 <tr>
          <td width="94" class="txt1">&nbsp;</td>
          <td width="90" class="txt1">&nbsp;</td>
		 </tr>
		
        <tr>
          <td colspan="2" align="center" class="txt1"><input type="submit" name="login" value="Login" onClick="return validate()" />
            &nbsp;
            <input type="reset" name="Reset" value="Clear"></td>
        </tr>
      </table>
      <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
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
