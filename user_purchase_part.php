<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
require_once("email.php");
extract($_POST);
$uname=$_SESSION['uname'];
$id = $_REQUEST['gid'];

$qry = "select * from register where username='admin'";
			$exe=mysql_query($qry);
			$row=mysql_fetch_array($exe);
			$email=$row['email'];

$select = mysql_query("SELECT * FROM amazon WHERE id ='$id'") or die("query image field error".mysql_error());
$sea = mysql_query("SELECT * FROM amazon WHERE id ='$id'") or die("query image field error".mysql_error());
$prow = mysql_fetch_array($sea);
///////////
$cal = mysql_query("SELECT * FROM amazon WHERE id ='$id'")or die("".mysql_error());
$cals = mysql_fetch_array($cal);
$tot_qty=$cals['quantity'];

$pur_id=$_SESSION['purchase_id'];

$catid=$cals['catid'];
/////////////////////
if(isset($butsub)){

	if($tot_qty>0)
	{	
		if($tot_qty>=$uqut)
		{
$day1=date("d");
$month1=date("M");
$year1=date("Y");

$mq=mysql_query("select max(id) from user_purchase");
$mr=mysql_fetch_array($mq);
$id111=$mr['max(id)']+1;


$inspur_ord = mysql_query("INSERT INTO user_purchase(id,catergory,pname,price,uqut,uname,pid,nid,day1,month1,year1) VALUES($id111,'$catid','".$prow['product']."',
'".$prow['price']."','$uqut','$uname',$pur_id,'".$prow['id']."',$day1,'$month1',$year1)");


/******************************************calculation work*************************************/

$total = $cals['quantity'] - $uqut;

$action  = mysql_query("UPDATE amazon SET quantity='$total',pcount=pcount+1 WHERE id='$id'")or die("update error".mysql_error());


//////////
$q1=mysql_query("select * from amazon where quantity<5");
				$n1=mysql_num_rows($q1);
						if($n1>0)
						{
							while($r1=mysql_fetch_array($q1))
							{
							//echo $r1['quantity'];
							$qt[]=$r1['product']."=".$r1['quantity'];
							}
							$pq=@implode(",",$qt);
						//email
						//echo $message="Low Stock: ".$pq;
						
							/*$objEmail	=	new CI_Email();
					$objEmail->from('security@gmail.com', "Stock Details");
					$objEmail->to("$email");
					$objEmail->subject("Stock Available for Low level");
					$objEmail->message("Low Stock: ".$pq);
						
							if ($objEmail->send())
							{	//echo 'mail sent successfully';
							}
							else
							{	//echo 'failed';
							}*/
						}//n1			

///////
if($inspur_ord != 0){
@header('Location:user_purch_view.php');
}
			}
			else
			{
			echo '<script language="">alert("Available only '.$tot_qty.' qunatity!")</script>';
			}
	}
	else
	{
	echo '<script language="">alert("You have could not purchase this product!")</script>';

	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<script language="javascript">
function validate()
{
	
	if(document.form1.uqut.value=="")
	{
	alert("Enter the Quantity");
	document.form1.uqut.focus();
	return false;
	}
	if(isNaN(document.form1.uqut.value))
	{
	alert("Invalid Value!");
	document.form1.uqut.select();
	return false;
	}
	
return true;	
}
</script>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="516" border="0" bgcolor="#0099FF" align="center">
    <tr>
      <td width="3">&nbsp;</td>
      <td width="503"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><table width="200" border="0" align="center" cellpadding="10">
        <tr>
          <?php 
	$row = mysql_fetch_array($select);
	?>
          <td>&nbsp;</td>
          <td><img src="product/<?php echo $row['product_image']; ?>" alt="img" width="232" height="218" /></td>
        </tr>
        <tr>
          <td><strong>Catergory</strong></td>
          <td>
            <?php
			$cqry=mysql_query("select * from category where id=$catid");
			$crow=mysql_fetch_array($cqry);
			echo $crow['category'];
			?>			</td>
        </tr>
        <tr>
          <td><strong>Product Name </strong></td>
		   <td><label><?php echo $row['product']; ?></label></td>
        </tr>
        <tr>
          <td><strong>Description</strong></td>
          <td><?php echo $row['description']; ?></td>
        </tr>
        <tr>
          <td><strong>Price</strong></td>
		          <td><label><?php echo $row['price']; ?></label></td>
        </tr>
        <tr>
          <td><strong>Actual quntity </strong></td>
          <td><?php echo $row['quantity']; ?></td>
        </tr>
        <tr>
          <td><strong>quantity</strong></td>
          <td><input type="text" name="uqut" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="butsub" type="submit" id="butsub" value="Submit" onclick="return validate()" />
&nbsp;&nbsp;&nbsp;<a href="user_parchase_order.php">RETURN</a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
