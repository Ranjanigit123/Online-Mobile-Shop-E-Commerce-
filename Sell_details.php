<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/menu.js"></script>
<style type="text/css">
<!--
.style3 {font-size: 16px}
-->
</style>
</head>

<body> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p class="style1"><?php echo $msg; ?></p>
		 <table width="646" height="99" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <th height="39" colspan="4" scope="col"><span class="style3">Product Sales Ranking </span></th>
          </tr>
          <tr>
            <th width="150" height="29" scope="col">Product Name </th>
            <th width="162" scope="col">No. of quantity </th>
            <th width="162" scope="col">Price</th>
            <th width="162" scope="col">Total</th>
          </tr>
		
		<?php
		
	$qry="SELECT pname, sum( uqut ) AS uqut, price
FROM user_purchase GROUP BY pname ORDER BY `uqut` DESC";

     $result=mysql_query($qry);

while($row=mysql_fetch_array($result))
{
$tot=$row['uqut'] * $row['price'];

?>
       
          <tr>
            <td height="29"><?php echo $row['pname']; ?></td>
            <td align="center"><?php echo $row['uqut']; ?></td>
            <td align="center"><?php echo $row['price']; ?></td>
            <td align="center"><?php echo $tot;?></td>
          </tr>
		  <?php
		
		}
		
		?>
        </table>
		
        <blockquote>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
      </blockquote></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>


</body>
</html>










