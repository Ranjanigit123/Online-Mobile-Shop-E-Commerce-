<?php
include("sess_page.php");
include("include/dbconnect.php");
extract($_POST);
$sess_user=$_SESSION['uname'];
$admin_qry=mysql_query("select * from register where username='admin'");
$admin_row=mysql_fetch_array($admin_qry);
$admin_acc=$admin_row['acc_no'];

$pur_id=$_REQUEST['pur_id'];
$uname=$_REQUEST['user'];

/*$host=$_SERVER['HTTP_HOST'];
$path=explode("/",$_SERVER['REQUEST_URI']);
$cpath=count($path);
for($x=1;$x<$cpath-2;$x++)
{
$path2[]=$path[$x];
}
$path3=implode("/",$path2);
$url=$host."/".$path3;
*/


if($sess_user==$_REQUEST['user'])
{

$uq=mysql_query("select * from register where username='$uname'");
$ur=mysql_fetch_array($uq);
$accno=$ur['acc_no'];


$pq=mysql_query("select * from user_purchase where uname='$uname' && pid=$pur_id && status=0");
	while($pr=mysql_fetch_array($pq))
	{	
	$total = $pr['price'] * $pr['uqut']; 
	$tot[]=$total;
	}
$amount=@array_sum($tot);	


}

if(isset($btnBuy))
{

$up=mysql_query("update user_purchase set status=1, cod_status=1 where pid=$pur_id");



header("location:message1.php");
		}
		
		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function validate()
{
	if(document.form1.name.value=="")
	{
	alert("Enter the  Name...");
	document.form1.name.focus();
	return false;
	}
	if(document.form1.email.value=="")
	{
	alert("Enter the E-mail ID...");
	document.form1.email.focus();
	return false;
	}
	reEmail=/^[\w-|+|'|]+(\.[\w-|+|'|]+)*@([a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*?\.[a-zA-Z]{2,6}|(\d{1,3}\.){3}\d{1,3})(:\d{4})?$/
	if(!(reEmail.test(document.form1.email.value))){
     alert("E-Mail Invalid");
        return false;
	} 
	if(isNaN(document.form1.mobno.value))
	{
	alert("Invalid Mobile No!");
	document.form1.mobno.select();
	return false;
	}
	if(isNaN(document.form1.pin.value))
	{
	alert("Invalid Pincode No!");
	document.form1.pin.select();
	return false;
	}
	if(document.form1.address.value=="")
	{
	alert("Enter the address.");
	document.form1.address.focus();
	return false;
	}
return true;	
}
</script>



</script>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center" bgcolor="#E6EEFB" class="heading"><br />
      <img src="images/COD.jpg" width="704" height="227" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><p>&nbsp;</p>
        <p class="txt1">Check your details </p>
        <p class="txt1"><?php echo $msg; ?></p>
        <table width="460" height="377" border="0" cellpadding="10" cellspacing="0">
          <tr>
		
            <td width="149">Name</td>
			
            <td width="176"><input type="text" name="name"/> </td>
          </tr>
          <tr>
            <td>Email Address </td>
            <td><input type="text" name="email"/></td>
          </tr>
          <tr>
            <td>Address</td>
            <td><textarea name="address"></textarea></td>
          </tr>
          <tr>
            <td>Mobile Number </td>
            <td><input type="text" name="mobno" /></td>
          </tr>
          <tr>
            <td>Pin code </td>
            <td><input type="text" name="pin" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btnBuy" value="Order it!" onclick="return validate()" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      <p><a href="<?php echo 'user_purch_view.php?user='.$uname; ?>">Go to Shopping</a></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
