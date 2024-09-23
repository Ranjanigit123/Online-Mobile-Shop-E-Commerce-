<?php
session_start();

include("include/dbconnect.php");
$rdate=date("d-m-Y");
$month=date("m");
$year=date("Y");
$day=date("d");
$ip22 = $_SERVER['REMOTE_ADDR'];
$host22 = gethostbyaddr($ip22);

$sq1=mysql_query("select * from ipdetails where ipaddress='$ip22' order by id desc");
$sr1=mysql_fetch_array($sq1);

//echo $_SESSION['sess_id'];
if($_SESSION['sess_id']=="")
{
$sess_id=$sr1['sess_id']+1;
$_SESSION['sess_id']=$sess_id;
$stime=date("d-m-Y h:i:s");

$max_qry22 = mysql_query("select max(id) maxid from ipdetails");
	$max_row22 = mysql_fetch_array($max_qry22);
	$id22=$max_row22['maxid']+1;
//echo $ip22;

mysql_query("insert into ipdetails(id,ipaddress,hostname,rdate,sess_id,stime,day,month,year) values('$id22','$ip22','$host22','$rdate','$sess_id','$stime','$day','$month','$year')");

}
else
{
$sess_id=$_SESSION['sess_id'];
mysql_query("update ipdetails set sess_id='$sess_id' where ipaddress='$ip22' && sess_id='$sess_id'");
}


$sq2=mysql_query("select * from ipdetails where ipaddress='$ip22' && sess_id='$sess_id'");
$sr2=mysql_fetch_array($sq2);
$apage=$sr2['access_page'];
$d1=$sr2['stime'];
$d2=date("d-m-Y h:i:s");


$fname=$_SERVER['SCRIPT_NAME'];
$fn1=explode("/",$fname);
$fn2=count($fn1)-1;
$ap=$fn1[$fn2];


$sec=strtotime($d2)-strtotime($d1);


if($apage=="")
{
$apage2=$ap;
}
else
{
$apage2=$apage."|".$ap;
}




mysql_query("update ipdetails set duration='$sec',access_page='$apage2' where ipaddress='$ip22' && sess_id='$sess_id'");

?>