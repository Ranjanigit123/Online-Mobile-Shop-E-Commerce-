<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$gqry=mysql_query("select * from amazon");
$select = mysql_query("SELECT * FROM user_purchase where delivery_status=1 ORDER BY id DESC") or die("select quee error".mysql_error());
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
        <h3>Stack Quantity Status </h3>
        <table width="76%" border="1">
          <tr>
            <th width="7%">Sno</th>
            <th width="13%">Product</th>
            <th width="14%">Category</th>
            <th width="9%">Price</th>
            <th width="13%">Quantity</th>
            <th width="22%">update image </th>
          </tr>
          <?php $i=0;
		  while($grow=mysql_fetch_array($gqry))
		  { $i++;
		  ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $grow['product']; ?></td>
            <td><?php echo $grow['catid']; ?></td>
            <td><?php echo $grow['price']; ?></td>
            <td><?php echo $grow['quantity']; ?></td>
            <td align="center"><a href="upload_image_update.php?gid=<?php echo $grow['id']; ?>" >EDIT</a></td>
          </tr>
          <?php
		  }
		  ?>
        </table>
        <h3>Deliverd Details </h3>
        <table width="71%" height="78" border="0" align="center">
          <tr align="center" bgcolor="#999999">
            <th scope="col">Sno:</th>
            <th scope="col"><label for="checkbox_row_2">User Name </label></th>
            <th scope="col">Catergory</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">quantity</th>
            <th scope="col">Amount</th>
            <th scope="col">Date / Time </th>
          </tr>
          <?php
		  $p = 0;
		  while($row = mysql_fetch_array($select)){
		  $p++;
		  ?>
          <tr align="center" bgcolor="#CCCCFF">
            <td><?php echo $p; ?></td>
            <td><?php echo $row['uname']; ?></td>
            <td><?php echo $row['catergory']; ?></td>
            <td><?php echo $row['pname']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['uqut']; ?></td>
            <td><?php  
			$total = $row['price'] * $row['uqut']; 
			echo $total;
			?></td>
            <td><?php echo $row['rdate']; ?></td>
          </tr>
          <?php
		  }
		  ?>
        </table>
        <p>&nbsp;</p>
        <p class="style1">&nbsp;</p>
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
</form>

</body>
</html>
