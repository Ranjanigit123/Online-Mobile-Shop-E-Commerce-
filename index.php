<?php
session_start();
include("sess_page.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";
$rdate=date("d-m-Y");
$ip = $_SERVER['REMOTE_ADDR'];



$host = gethostbyaddr($ip);
$mqry=mysql_query("select max(id) from ipdetails");
$mrow=mysql_fetch_array($mqry);
$id=$mrow['max(id)']+1;

$q1=mysql_query("select * from ipdetails where ipaddress='$ip'");
$n1=mysql_num_rows($q1);
	/*if($n1==0)
	{
	
mysql_query("insert into ipdetails(id,ipaddress,hostname,visit,rdate) values('$id','$ip','$host','1','$rdate')");
	}
	else
	{
mysql_query("update ipdetails set visit=visit+1,rdate='$rdate' where ipaddress='$ip'");	
	}*/

// display it back
//echo "<h2>Client IP Demo</h2>";
//echo "Your IP address : " . $ip;
//echo "<br>Your hostname : ". gethostbyaddr($ip);


/////////////////////////////////////////////////////
//$timezone = new DateTimeZone("Asia/Kolkata" );
//$date = new DateTime();
//$date->setTimezone($timezone );
//echo  $date->format( 'H:i:s A  /  D, M jS, Y' );
//$dh=$date->format('H');
//$dm=$date->format('i');
//$ds=$date->format('s');
//$stime=$date->format('H:i:s');
//////////////////////////////////////////////
//$_SESSION['stime']="";
//$mk1=mktime(0,0,0,date("m"),date("d"),date("Y"));
//$mk2=mktime(0,50,0,date("m"),date("d"),date("Y"));

/*$d1=date("d-m-Y h:i:s");
echo $d1;
echo $d2="17-05-2014 10:30:40";

$sq1=mysql_query("select * from ipdetails where ipaddress='$ip'");
$sr1=mysql_fetch_array();*/





?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/menu.js"></script>

</head>

<body>
<iframe src="os_det.php" width="100" height="100" style="display:none"></iframe>

<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      
    </tr>
    <tr>
      <td colspan="3"><?php include("include/link_home.php"); ?></td>
    </tr>
    <tr>
      <td width="19%" align="center" valign="top"><table width="87%" border="0" align="left" cellpadding="10" cellspacing="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <?php
		  $qry=mysql_query("select * from category");
		  echo '<ul>';
		  while($row=mysql_fetch_array($qry))
		  {
		  ?>
        <tr>
          <td><?php /*echo '<li class="bottom" style="list-style:none"><a href="index.php?catid='.$row['id'].'">'.$row['category'].'</a></li>';
		  		if($_REQUEST['catid']==$row['id'])
				{ 
		  			echo '<ul type="Square">';
					$pqry=mysql_query("select * from product where catid=".$row['id']."");
					while($prow=mysql_fetch_array($pqry))
					{
					echo '<li><a href="index.php?catid='.$row['id'].'&pid='.$prow['id'].'">'.$prow['product'].'</a></li>';
		  			}
					echo '</ul>';
				}*/
		  ?></td>
        </tr>
        <?php
		  }
		  echo '</ul>';
		  ?>
      </table>
        <p class="txt1">&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td width="60%" align="center" valign="top" bordercolor="1"><p>&nbsp;</p>
        <p>&nbsp;</p>
	  <p><img src="images/dept.jpg" width="293" height="172"></p>      
	  <p></p></td>
      <td width="21%" align="center" valign="top"><p>&nbsp;</p>
      <p><img src="images/online-sho.gif" width="396" height="247"></p></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><?php include("include/footer.php");?></td>
    </tr>
  </table>
</form>


</body>
</html>