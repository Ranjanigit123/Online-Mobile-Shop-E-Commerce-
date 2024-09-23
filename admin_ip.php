<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
include("geoiploc.php"); 

extract($_POST);
$uname=$_SESSION['uname'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/menu.js"></script>
</head>

<body><form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <blockquote>
          <h3>Client IP Details</h3>
          <p>
		  <select name="day">
			<option value="">-All-</option>
			<?php
			$dq3=mysql_query("select distinct(day) from ipdetails where day!=0");
			while($dr3=mysql_fetch_array($dq3))
			{
			?>
			<option <?php if($dr3['day']==$day) echo "selected"; ?>><?php echo $dr3['day']; ?></option>
			<?php
			}
			?>
            </select>
			  &nbsp;
            <select name="month">
			<option value="">-All-</option>
			<?php
			$dq1=mysql_query("select distinct(month) from ipdetails where month!=0");
			while($dr1=mysql_fetch_array($dq1))
			{
			?>
			<option <?php if($dr1['month']==$month) echo "selected"; ?>><?php echo $dr1['month']; ?></option>
			<?php
			}
			?>
            </select>
            &nbsp;
            <select name="year">
			<option value="">-All-</option>
			<?php
			$dq2=mysql_query("select distinct(year) from ipdetails where year!=0");
			while($dr2=mysql_fetch_array($dq2))
			{
			?>
			<option <?php if($dr2['year']==$year) echo "selected"; ?>><?php echo $dr2['year']; ?></option>
			<?php
			}
			?>
            </select>
            &nbsp;
            <input type="submit" name="btn" value="Submit" />
          </p>
		  <?php
		  if(isset($btn))
		  {
		  	if($day!="" && $month!="" && $year!="")
			{
			$qry="select * from ipdetails where day='$day' && month='$month' && year='$year' order by id desc";
			}
			else
			{
			$qry="select * from ipdetails order by id desc";
			}
		  $q1=mysql_query($qry);
		  $n1=mysql_num_rows($q1);
		  if($n1>0)
		  {
		  ?>
          <table width="635" border="1" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <th scope="col">Sno</th>
              <th scope="col">IP Address </th>
              <th scope="col">Hostname</th>
              <th scope="col">Os Details </th>
              <th scope="col">Browser</th>
              <th scope="col">Country</th>
              <th scope="col">Time Duration </th>
              <th scope="col">Last time visit </th>
              <th scope="col">Visited Pages </th>
            </tr>
			<?php
			$i=0;
			
			while($r1=mysql_fetch_array($q1))
			{
			if($r1['ipaddress']=="127.0.0.1")
			{
			$r1['ipaddress']="117.201.32.108";
			
			}
			$i++;
			?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $r1['ipaddress']; ?></td>
              <td><?php echo $r1['hostname']; ?></td>
              <td><?php echo $r1['os_det']; ?></td>
              <td><?php echo $r1['browser']; ?></td>
              <td><?php echo getCountryFromIP($r1['ipaddress'], "Name"); ?></td>
			  
			  <?php

$init = $r1['duration'];;
$hours = floor($init / 3600);
$minutes = floor(($init / 60) % 60);
$seconds = $init % 60;

?>
			  
			  
              <td><?php if($r1['duration']>0) { echo "$hours:$minutes:$seconds"; } else { echo "0"; } ?></td>
              <td><?php echo $r1['dtime']; ?></td>
              <td><?php
			  //$myArray = array("Kyle","Ben","Sue","Phil","Ben","Mary","Sue","Ben");
			  if($r1['access_page']!="")
			  {
			  $myArray = explode("|",$r1['access_page']);
				$newArray = array_count_values($myArray);
				
				foreach ($newArray as $key => $value) {
						echo "$key - <strong>$value</strong> <br />"; 
					}
				}
			  ?></td>
            </tr>
			<?php
			}
			?>
          </table>
		  <?php
		  echo '<h3><a href="generate.php?day='.$day.'&month='.$month.'&year='.$year.'">Report</a> </h3>';
		  }
		  else
		  {
			echo '<p class="msg" align="center">No Data Found!</p>';		  
		  }
		  }
		  ?>
          
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
      </blockquote></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>
