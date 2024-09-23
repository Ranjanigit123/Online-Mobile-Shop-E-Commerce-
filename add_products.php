<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
if(isset($btnSubmit))
{
	if(trim($product)=="") { $msg="Enter the Product Name.."; }
	else if(trim($price)=="") { $msg="Enter the Price.."; }
	else if(trim($quantity)=="") { $msg="Enter the Qunatity.."; }
	else if(trim($description)=="") { $msg="Enter the Description.."; }
	else
	{
$max_qry = mysql_query("select max(id) maxid from amazon");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	echo "insert into amazon(id,catid,product,price,quantity,description) values($id,$catid,'$product',$price,$quantity,'$description')";
		$uqry="insert into amazon(id,catid,product,price,quantity,description) values($id,$catid,'$product',$price,$quantity,'$description')";
		$res=mysql_query($uqry);
		if($res)
		{
		$msg="Added Successfully...";
		}
		else
		{
		$msg="Could not be stored!";
		}
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="include/menu.js"></script>
<script language="javascript">
function validate()
{
	if(isNaN(document.form1.price.value))
	{
	alert("Invalid value!");
	document.form1.price.select();
	return false;
	}
	if(isNaN(document.form1.quantity.value))
	{
	alert("Invalid value!");
	document.form1.quantity.select();
	return false;
	}
return true;	
}
</script>
</head>

<body><form name="form1" method="post" action="">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"><?php include("include/header.php"); ?></td>
    </tr>
    <tr>
      <td><?php include("include/link_admin.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p>&nbsp;</p>
        <p class="style1"><?php echo $msg; ?></p>
        <table width="368" height="271" border="1">
          <tr>
            <th colspan="2">Add Products </th>
          </tr>
          <tr>
            <td align="left">Category</td>
            <td align="left"><select name="catid">
			<?php
			$cqry=mysql_query("select * from category");
			while($crow=mysql_fetch_array($cqry))
			{
			?>
			<option value="<?php echo $crow['id']; ?>"><?php echo $crow['category']; ?></option>
			<?php
			}
			?>
            </select>            </td>
          </tr>
          <tr>
            <td width="132" align="left">Product  Name </td>
            <td width="144" align="left"><input type="text" name="product" /></td>
          </tr>
          <tr>
            <td align="left">Price</td>
            <td align="left"><input type="text" name="price" /></td>
          </tr>
          <tr>
            <td align="left">Quantity</td>
            <td align="left"><input type="text" name="quantity" /></td>
          </tr>
          <tr>
            <td align="left">Description</td>
            <td align="left"><textarea name="description"></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btnSubmit" value="Submit" onclick="return validate()" /></td>
          </tr>
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
</form>

</body>
</html>
