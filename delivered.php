<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center"><?php
		if($_GET['act']=='ok')
		{
		$id=$_GET['id'];
		
		
		
		$select2=mysql_query("select * from user_purchase where pid='$id'");
		$row2=mysql_fetch_array($select2);
		$uname1=$row2['uname'];
		$q3=mysql_query("select * from register where username='$uname1'");
		$r3=mysql_fetch_array($q3);
		$email=$r3['email'];
		$mobile=$r3['contact'];
		$message="Your product has been delivered";
		
		
		
		$eamil_qry=mysql_query("Update user_purchase set delivery_status=1 where id='$id'"); 							
		header ("locatiion:admin_view_purchase_user.php");
		}
		
	
		?>&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><a href="admin_view_purchase_user.php">Back</a></p>
</body>
</html>
