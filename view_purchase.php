<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
if(isset($btn))
{

$select = mysql_query("SELECT * FROM user_purchase where uname='$uname' && delivery_status=2 && month1='$month1' && year1=$year1 ORDER BY pid DESC");
$num=mysql_num_rows($select);
}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function confirm_st()
{
	if(!confirm("Are you sure to continue?"))
	{
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
      <td align="left" class="subhead"><?php include("include/link_user.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <p class="txt1"><strong>Purchase Details </strong></p>
        <p class="txt1"><strong>Search by</strong>&nbsp;
          <select name="month1">
		   <option value="0">-MONTH1-</option>
		  <?php
		  $mq=mysql_query("select distinct(month1) from user_purchase where uname='$uname'");
		  while($mr=mysql_fetch_array($mq))
		  {
		  ?>
		  <option <?php if($month1==$mr['month1']) echo "selected"; ?>><?php echo $mr['month1']; ?></option>
		  <?php
		  }
		  ?>
          </select>
          &nbsp;
          <select name="year1">
		   <option value="0">-YEAR1-</option>
		  <?php
		  $yq=mysql_query("select distinct(year1) from user_purchase where uname='$uname'");
		  while($yr=mysql_fetch_array($yq))
		  {
		  ?>
		  <option <?php if($year1==$yr['year1']) echo "selected"; ?>><?php echo $yr['year1']; ?></option>
		  <?php
		  }
		  ?>
          </select>
          &nbsp;
          <input type="submit" name="btn" value="Submit">
        </p>
        <p class="txt1">
          <?php
	  if($num!=0)
	  {
	  ?>
        </p>
        <table width="70%" height="78" border="0" align="center">
          <tr align="center" bgcolor="#999999">
            <th scope="col">Sno:</th>
            <th scope="col">Product Name </th>
            <th scope="col">Price</th>
            <th scope="col">quantity</th>
            <th scope="col">Amount</th>
            <th scope="col">Date / Time</th>
            <th scope="col">Delivery</th>
          </tr>
		  <?php
		  $p = 0;
		  while($row = mysql_fetch_array($select)){
		  $p++;
		  ?>
          <tr align="center" bgcolor="#CCCCFF">
            <td><?php echo $p; ?></td>
            <td align="left"><?php echo $row['pname']; ?></td>
            <td align="left"><?php echo $row['price']; ?></td>
            <td align="left"><?php echo $row['uqut']; ?></td>
            <td align="left"><?php  
			$total = $row['price'] * $row['uqut']; 
			echo $total;
			$tot[]=$total;
			?></td>
            <td align="left"><?php echo $row['rdate']; ?></td>
            <td align="left"><?php 
			if($row['delivery_status']=="2")
			{
			echo "Delivered";
			}
			else
			{
			echo "Not Delivered";
			}
			?></td>
          </tr>
		  <?php
		  }
		  ?>
        </table>
		<?php
		}
		else
		{
		echo '<p class="style1">No data Found!</p>';
		}
		?>
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