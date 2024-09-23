<?php
session_start();
//include("sess_page.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";
$sess_id=$_SESSION['sess_id'];

$ip = $_SERVER['REMOTE_ADDR'];
$host = gethostbyaddr($ip);

$os=$_REQUEST['os'];
$brow=$_REQUEST['browser'];
$mobile=$_REQUEST['mobile'];
$screen=$_REQUEST['screen'];

mysql_query("update ipdetails set os_det='$os',browser='$brow',mobile='$mobile',screen_size='$screen' where ipaddress='$ip' && sess_id='$sess_id'");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

</head>

<body>
</body>
</html>
