<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$gqry=mysql_query("select * from amazon");
?>
<?php
if(isset($btn))
{
	if($prd1!="")
	{
	$q=" where product='$prd1'";
	}
	if($prd!="")
	{
		if($q=="")
		{
		$q=" where price<=$prd";
		}
		else
		{
		$q.=" && price like '%$prd%'";
		}
	}
$gqry=mysql_query("select * from amazon $q");
$num=mysql_num_rows($gqry);
}
else
{
$gqry=mysql_query("select * from amazon ");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/menu.js"></script>
</head>

<body>





  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td class="subhead"><?php include("include/link_user.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><strong>Full Product Details </strong></td>
    </tr>
    <tr>
      <td align="center"  style="height:100px;">
	  
	  Search the Products
	  <form name="form1" action="" method="post">
	    <select name="prd1">
		<option value="">-Select-</option>
		<?php
		$qp=mysql_query("select distinct(product) from amazon");
		while($rp=mysql_fetch_array($qp))
		{
		?>
		<option <?php if($prd1==$rp['product']) echo "selected"; ?>><?php echo $rp['product']; ?></option>
		<?php
		}
		?>
        </select>
        <input type="text" name="prd" value="<?php echo $_REQUEST['prd']; ?>" />
&nbsp;&nbsp;
	  <input type="submit" name="btn" value="Search" />
	  </form></td>
    </tr>
    <tr>
      <td align="center" valign="top">
	  
        <p>&nbsp;</p>
        <p class="style1"><?php echo $msg; ?></p>
		
        <table width="76%" border="0">
          <tr bgcolor="#999999">
            <th width="9%">Sno</th>
            <th width="15%">Product</th>
            <th width="11%">Price</th>
            <th width="17%">Quantity</th>
            <th width="19%">Product Image </th>
            <th width="29%">Add to Cart</th>
          </tr>
		  <?php $i=0;
		  while($grow=mysql_fetch_array($gqry))
		  { $i++;
		  ?>
          <tr bgcolor="#99CCCC">
            <td><?php echo $i; ?></td>
            <td><?php echo $grow['product']; ?></td>
            <td><?php echo $grow['price']; ?></td>
            <td><?php echo $grow['quantity']; ?></td>
            <td align="center"><img src="product/<?php echo $grow['product_image']; ?>" alt="img" width="42" height="42" /></td>
            <td align="center"><a href="user_purchase_part.php?gid=<?php echo $grow['id']; ?>">Add to Cart</a></td>
          </tr>
		  <?php
		  }
		  ?>
        </table>
        <blockquote>
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
