<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
$del = $_REQUEST['did'];
extract($_POST);

$result = mysql_query("Select * from user_purchase where id=$del");
$row=mysql_fetch_array($result);

$pid=$row['nid'];
$qty=$row['uqut'];
$update=mysql_query("update product set quantity=quantity+$qty where id='$pid'");

$delet = mysql_query("DELETE FROM user_purchase WHERE id='$del'")or die("".mysql_error());
if($delet != 0)
{
@header('Location:user_purch_view.php');
}
?>