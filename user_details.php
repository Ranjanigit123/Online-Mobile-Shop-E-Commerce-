<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
$select = mysql_query("SELECT * FROM register ORDER BY id DESC")or die("user registration error </br>".mysql_error());
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
.style2 {color: #FFFFFF}
-->
</style>
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
        <h3>Customer Information </h3>
        <table width="85%" height="58" border="0" align="center">
          <tr bgcolor="#CC66CC">
		    <th bgcolor="#000066" scope="col"><span class="style2">
		      <label for="checkbox_row_2">Sno:</label>
		      </span></th>
		    <th bgcolor="#000066" scope="col"><span class="style2">
		      <label for="checkbox_row_2">Name</label>
		      </span></th>
		    <th bgcolor="#000066" scope="col"><span class="style2">
		      <label for="checkbox_row_3">Gender</label>
		      </span></th>
		    <th bgcolor="#000066" scope="col"><span class="style2">
		      <label for="checkbox_row_4">Address</label>
		      </span></th>
		    <th bgcolor="#000066" scope="col"><span class="style2">
		      <label for="checkbox_row_5">Pincode</label>
		      </span></th>
		    <th bgcolor="#000066" scope="col"><span class="style2">
		      <label for="checkbox_row_6">Contact No </label>
		      </span></th>
		    <th bgcolor="#000066" scope="col"><span class="style2">
		      <label for="checkbox_row_7">Email Id </label>
		      </span></th>
		    <th bgcolor="#000066" scope="col"><span class="style2">
		      <label for="checkbox_row_10">Username</label>
		      <label for="checkbox_row_8"></label>
		      </span></th>
		    <th bgcolor="#000066" scope="col"><span class="style2">Register Date </span></th>
          </tr>
		  <?php
		  $r = 0;
		  while($rrow = mysql_fetch_array($select)){
		  $r++;
		  ?>
          <tr bgcolor="#CCCCFF">
            <td bgcolor="#FFFFFF"><?php echo $r; ?></td>
            <td bgcolor="#FFFFFF"><?php echo $rrow['name']; ?></td>
            <td bgcolor="#FFFFFF"><?php echo $rrow['gender']; ?></td>
            <td bgcolor="#FFFFFF"><?php echo $rrow['address']; ?></td>
            <td bgcolor="#FFFFFF"><?php echo $rrow['pincode']; ?></td>
            <td bgcolor="#FFFFFF"><?php echo $rrow['contact']; ?></td>
            <td bgcolor="#FFFFFF"><?php echo $rrow['email']; ?></td>
            <td bgcolor="#FFFFFF"><?php echo $rrow['username']; ?></td>
            <td bgcolor="#FFFFFF"><?php echo $rrow['rdate']; ?></td>
          </tr>
		  <?php 
		  }
		  ?>
        </table>
        <p class="style1">&nbsp;</p>
        <blockquote>
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
