<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
$select = mysql_query("SELECT * FROM user_purchase where delivery_status=1  ORDER BY id DESC") or die("select quee error".mysql_error());

if($id=$_REQUEST['id'])
{
$uname1 = $_REQUEST['name'];
$s = mysql_query("select * from register where username='$uname1'");
$r = mysql_fetch_array($s);

				
	 $ins =mysql_query("Update user_purchase set delivery_status=2 where id='$id'");
	 
	 ?><script language="javascript">
					alert("Order Confirmation sent Successfully...");
					window.location.href="admin_view_purchase_user.php";
					</script>
	 
	 <?php
	 }
?>

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
        <p><?php
		
		
		$select = mysql_query("SELECT * FROM user_purchase where delivery_status=0  ORDER BY id DESC") or die("select quee error".mysql_error());
		?></p>
        <table width="80%" height="78" border="0" align="center">
          <tr align="center" bgcolor="#999999">
            <th bgcolor="#DDDDDD" scope="col">Sno:</th>
            <th bgcolor="#DDDDDD" scope="col"><LABEL for="checkbox_row_2">User Name </LABEL></th>
            <th bgcolor="#DDDDDD" scope="col">Order ID </th>
            <th bgcolor="#DDDDDD" scope="col">Product Name</th>
            <th bgcolor="#DDDDDD" scope="col">Price</th>
            <th bgcolor="#DDDDDD" scope="col">quantity</th>
            <th bgcolor="#DDDDDD" scope="col">Amount</th>
            <th bgcolor="#DDDDDD" scope="col">Date / Time </th>
            <th bgcolor="#DDDDDD" scope="col">Delivery</th>
          </tr>
		  <?php
		  $p = 0;
		  while($row = mysql_fetch_array($select)){
		  $p++;
		  ?>
          <tr align="center" bgcolor="#CCCCFF">
            <td><?php echo $p; ?></td>
            <td><?php echo $row['uname']; ?></td>
            <td><?php echo $row['pid']; ?></td>
            <td><?php echo $row['pname']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['uqut']; ?></td>
            <td><?php  
			$total = $row['price'] * $row['uqut']; 
			echo $total;
			?></td>
            <td><?php echo $row['rdate']; ?></td>
            <td color="#FFF5F0"><?php if($rrow['delivery_status']==0){?><a class="btn btn-success" href="admin_view_purchase_user.php?id=<?php echo $row['id'];?>&&name=<?php echo $row['uname'];?>">Delivery</a><?php } else { echo "Delivered";}?></td>
          </tr>
		  <?php
		  }
		  ?>
        </table>
        <p>&nbsp;</p>
        <p style="color:red">Delivered</p>
        </center>
        <?php
		$select1 = mysql_query("SELECT * FROM user_purchase where delivery_status=2  ORDER BY id DESC") or die("select quee error".mysql_error());
		?>
        
                           <table width="80%" height="78" border="0" align="center">
                                <tr align="center" bgcolor="#999999">
                                   <th bgcolor="#DDDDDD" scope="col">Sno:</th>
                                   <th bgcolor="#DDDDDD" scope="col"><LABEL for="checkbox_row_2">User Name </LABEL></th>
                                   <th bgcolor="#DDDDDD" scope="col">Catergory Id </th>
                                   <th bgcolor="#DDDDDD" scope="col">Product Name</th>
                                   <th bgcolor="#DDDDDD" scope="col">Price</th>
                                   <th bgcolor="#DDDDDD" scope="col">quantity</th>
                                   <th bgcolor="#DDDDDD" scope="col">Amount</th>
                                   <th bgcolor="#DDDDDD" scope="col">Date / Time </th>
                               </tr>
          <?php
		  $p = 0;
		  while($row1 = mysql_fetch_array($select1)){
		  $p++;
		  ?>
                                <tr align="center" bgcolor="#CCCCFF">
                                    <td><?php echo $p; ?></td>
                                    <td><?php echo $row1['uname']; ?></td>
                                    <td><?php echo $row1['catergory']; ?></td>
                                    <td><?php echo $row1['pname']; ?></td>
                                    <td><?php echo $row1['price']; ?></td>
                                    <td><?php echo $row1['uqut']; ?></td>
                                    <td><?php  
			                             $total1 = $row1['price'] * $row1['uqut']; 
			                             echo $total1;
			                             ?></td>
                                    <td><?php echo $row1['rdate']; ?></td>
                               </tr>
          <?php
		  }
		  ?>
          </table>

						
					</div>
      
</form>
		<p class="txt1">&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p></p></td>
    </tr>
    
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
  
</body>
</html>
