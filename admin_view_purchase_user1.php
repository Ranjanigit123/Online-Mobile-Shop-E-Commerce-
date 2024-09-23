<?php
include("sess_page.php");
include("email.php");
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
if($_GET['act']=='ok')
{
$id=$_GET['id'];



$select1=mysql_query("Update user_purchase set delivery_status=1 where id='$id'");
$select2=mysql_query("select * from user_purchase where id='$id'");
$row2=mysql_fetch_array($select2);
$uname1=$row2['uname'];
$prodid=$row2['nid'];

$up3=mysql_query("update product set quantity=quantity-1 where id='$prodid'");
$select3=mysql_query("select * from delivery where uname='$uname1' order by id desc");
$row3=mysql_fetch_array($select3);
$email=$row3['email'];
//echo $email;


	$objEmail	=	new CI_Email();
					$objEmail->from('security@gmail.com', "Stock Details");
					$objEmail->to("$email");
					$objEmail->subject("Product Delivery Details");
					$objEmail->message("Your product will be delievered soon.. ");
						
							if ($objEmail->send())
							{	
							//echo 'mail sent successfully';
							$aa=1;
	$eamil_qry=mysql_query("Update user_purchase set email_status=1 where uname='$uname1'"); 
							}
							else
							{
							$aa=2;
								//echo 'failed';
	$eamil_qry=mysql_query("Update user_purchase set status=2 where uname='$uname1'"); 
							}	
header ("location:admin_view_purchase_user1.php?action=$aa");
}
$select = mysql_query("SELECT * FROM user_purchase where cod_status=1 && delivery_status=0 ORDER BY id DESC") or die("select quee error".mysql_error());
$value=mysql_num_rows($select);

?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/menu.js"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td align="left" class="subhead"><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <h3>User's Purchase Details </h3>
		<?php
		if($value>0)
		{
		
				
		?>
		
        <table width="73%" height="78" border="0" align="center">
          <tr align="center" bgcolor="#999999">
            <th bgcolor="#DDDDDD" scope="col">Sno:</th>
            <th bgcolor="#DDDDDD" scope="col"><LABEL for="checkbox_row_2">User Name </LABEL></th>
            <th bgcolor="#DDDDDD" scope="col">Product Name</th>
            <th bgcolor="#DDDDDD" scope="col">Price</th>
            <th bgcolor="#DDDDDD" scope="col">quantity</th>
            <th bgcolor="#DDDDDD" scope="col">Amount</th>
            <th bgcolor="#DDDDDD" scope="col">Date / Time </th>
            <th bgcolor="#DDDDDD" scope="col">Delivery status </th>
          </tr>
		  <?php
		  $p = 0;
		  while($row = mysql_fetch_array($select)){
		  $p++;
		  ?>
          <tr align="center" bgcolor="#CCCCFF">
            <td><?php echo $p; ?></td>
            <td><?php echo $row['uname']; ?></td>
            <td><?php echo $row['pname']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['uqut']; ?></td>
            <td><?php  
			$total = $row['price'] * $row['uqut']; 
			echo $total;
			?></td>
            <td><?php echo $row['rdate']; ?></td>
            <td><?php
			if($row['cod_status']==1)
			{
			?>
			<a href="admin_view_purchase_user1.php?act=ok&id=<?php echo $row['id']; ?>">Proceed</a>
			<?php
			}
			else{
			
			echo "Delivered";
			
			}
						
			?>			</td>
          </tr>
		  <?php
		  }
		  ?>
        </table>
		<?php
		}
		else
		{
			if($_REQUEST['action']=="1")
			{
			echo "Mail has been sent successfully...";
			}
			else if($_REQUEST['action']=="2")
			{
			echo "Mail could not sent! Your Mail ID was wrong!!!";
			}
			else
			{
		echo "No new Delivery status has been found.....";
			}
	}?>
        <p class="txt1">&nbsp;</p>
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
