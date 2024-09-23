<?php
session_start();
//include("sess_page.php");
//include("include/protect.php");
include("include/dbconnect.php");
include("geoiploc.php"); 

extract($_POST);
$uname=$_SESSION['uname'];

$day=$_REQUEST['day'];
$month=$_REQUEST['month'];
$year=$_REQUEST['year'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>

<script language="javascript" src="include/menu.js"></script>
</head>

<body bgcolor="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  
        <p class="style1">&nbsp;</p>
        
          <h3 align="center">Client IP - Report </h3>
          <table width="851" height="71" border="1" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <th width="38" scope="col">Sno</th>
              <th width="117" scope="col">IP Address </th>
              <th width="122" scope="col">Hostname</th>
              <th width="126" scope="col">Country</th>
              <th width="107" scope="col">Time Duration </th>
              <th width="114" scope="col">Last time visit </th>
              <th width="178" scope="col">Visited Pages </th>
            </tr>
			<?php
			$i=0;
				if($day!="" && $month!="" && $year!="")
				{
				$q1=mysql_query("select * from ipdetails where day='$day' && month='$month' && year='$year' order by id desc");
				}
				else if($month!="" && $year!="")
				{
				$q1=mysql_query("select * from ipdetails where month='$month' && year='$year' order by id desc");
				}
				else if($year!="")
				{
				$q1=mysql_query("select * from ipdetails where year='$year' order by id desc");
				}
				else
				{
				$q1=mysql_query("select * from ipdetails order by id desc");
				}
			while($r1=mysql_fetch_array($q1))
			{
			$i++;
			?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $r1['ipaddress']; ?></td>
              <td><?php echo $r1['hostname']; ?></td>
              <td><?php echo getCountryFromIP($r1['ipaddress'], "code")." - ".getCountryFromIP($r1['ipaddress']); ?></td>
              <td><?php if($r1['duration']>0) { echo $r1['duration']." seconds"; } else { echo "0"; } ?></td>
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
          <h3>&nbsp;</h3>
          <p>&nbsp;</p>
     
</form>

</body>
</html>
