<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
$pur_id=$_SESSION['purchase_id'];
$select = mysql_query("SELECT * FROM user_purchase where uname='$uname' && status=0 ORDER BY id DESC");

$num=mysql_num_rows($select);
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
        <p class="txt1"><strong>Purchase</strong></p>
        <?php
	  if($num!=0)
	  {
	  ?>
        <table width="70%" height="78" border="0" align="center">
          <tr align="center" bgcolor="#999999">
            <th scope="col">Sno:</th>
            <th scope="col"><LABEL for="checkbox_row_2">Catergory</LABEL></th>
            <th scope="col">Product Name </th>
            <th scope="col">Price</th>
            <th scope="col">quantity</th>
            <th scope="col">Amount</th>
            <th scope="col">Date / Time</th>
            <th scope="col">Delete</th>
          </tr>
		  <?php
		  $p = 0;
		  while($row = mysql_fetch_array($select)){
		  $p++;
		  ?>
          <tr align="center" bgcolor="#CCCCFF">
            <td><?php echo $p; ?></td>
            <td><?php echo $row['catergory']; ?></td>
            <td><?php echo $row['pname']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['uqut']; ?></td>
            <td><?php  
			$total = $row['price'] * $row['uqut']; 
			echo $total;
			$tot[]=$total;
			?></td>
            <td><?php echo $row['rdate']; ?></td>
            <td><a href="delet_purchase.php?did=<?php echo $row['id']; ?>">Remove</a></td>
          </tr>
		  <?php
		  }
		  ?>
        </table>
        <p><strong>Total Amount: </strong>Rs. <?php
		$amount=array_sum($tot);
		echo $amount;
		?></p>
		
        <p class="txt1"><a href="user_purch_view.php?act=buy" onClick="return confirm_st()"><img src="images/buy.jpg" width="252" height="133"></a><a href="user_purch_view.php?act=delivery" onClick="return confirm_st1()"><img src="images/cod1.png" width="252" height="133"></a></p>
        <p class="txt1">&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
	  <p>
	    <?php
		}
		else
		{
		echo '<p class="style1">Purchase any Product....</p>';
		}
		?>
	    </p>
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
<?php
if($_REQUEST['act']=="buy")
{

$_SESSION['user']=$uname;
$_SESSION['purchase_id']=$pur_id;
header("location:payment.php?user=".$uname."&pur_id=".$pur_id);
}

if($_REQUEST['act']=="delivery")
{

$_SESSION['user']=$uname;
$_SESSION['sess_id']=$pur_id;
header("location:cash_delivery.php?user=".$uname."&pur_id=".$pur_id);
}


?>
</body>
</html>
