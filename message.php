<?php
include("sess_page.php");
//include("include/dbconnect.php");
$uname=$_SESSION['uname'];

/*$host=$_SERVER['HTTP_HOST'];
$path=explode("/",$_SERVER['REQUEST_URI']);
$cpath=count($path);
for($x=1;$x<$cpath-2;$x++)
{
$path2[]=$path[$x];
}
$path3=implode("/",$path2);
$url=$host."/".$path3;*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="26%" align="center" bgcolor="#E6EEFB" class="heading"><br />
      Online Payment </td>
      <td width="37%" align="right" valign="top" bgcolor="#E6EEFB"><img src="images/online_header.jpg" width="481" height="158" /></td>
      <td width="37%" align="center" valign="top" bgcolor="#E6EEFB"><img src="images/img2.jpg" width="240" height="158" /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><p>&nbsp;</p>
        <p class="txt1">Your Process is going...</p>
        <p>&nbsp;</p>
        <p><a href="<?php echo 'user_purch_view.php?user='.$uname; ?>">Go to your account </a></p>
        <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
