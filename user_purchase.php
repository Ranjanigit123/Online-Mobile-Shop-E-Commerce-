<?php
include("sess_page.php");
session_start();
$ip22 = $_SERVER['REMOTE_ADDR'];
$_SESSION['ip22']= $ip22;
$uname=$_SESSION['ip22'];
include("include/dbconnect.php");
extract($_POST);

if(isset($btn))
{
$gqry=mysql_query("select * from product where product like '%$prd%'");
$num=mysql_num_rows($gqry);
}
else
{
$gqry=mysql_query("select * from product ");
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
      <td align="center"><?php include("include/header1.php"); ?></td>
    </tr>
    <tr>
      <td class="subhead"><?php include("include/link_user1.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><strong>Full Product Details </strong></td>
    </tr>
    <tr>
      <td align="center"  style="height:100px;">
	  
	  Search the Products
	  <form name="form1" action="" method="post">
        <input type="text" name="prd" value="<?php echo $_REQUEST['prd']; ?>" />
&nbsp;&nbsp;
	  <input type="submit" name="btn" value="Search" />
	  </form></td>
    </tr>
    <tr>
      <td align="center" valign="top">
	  
        <p>&nbsp;</p>
        <p class="style1"><?php echo $msg; ?></p>
		
		<?php
		if($num>0)
		{
		?>
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
            <td align="center"><a href="user_purchase_part1.php?gid=<?php echo $grow['id']; ?>">Add to Cart</a></td>
          </tr>
		  <?php
		  }
		  ?>
        </table>
		<?php
		}
		else
		{
		echo "Product is not available now....";
		}
		?>
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
