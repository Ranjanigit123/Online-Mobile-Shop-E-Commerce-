<?php
include("sess_page.php");
session_start();
$ip22 = $_SERVER['REMOTE_ADDR'];
$_SESSION['ip22']= $ip22;
$uname=$_SESSION['ip22'];
include("include/dbconnect.php");
include("email.php");
extract($_POST);
?>
<?php
      
$pur_id=$_SESSION['sess_id'];
?>
<?php




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


if(isset($btnBuy))
{
	

				$objEmail	=	new CI_Email();
					$objEmail->from('security@gmail.com', "Stock Details");
					$objEmail->to("$email");
					$objEmail->subject("Product Delivery Details");
					$objEmail->message("Your product will be delievered soon.. ");
						
					
						
						
							if ($objEmail->send())
							{	
							//echo 'mail sent successfully';
							$up=mysql_query("update user_purchase set status=1, cod_status=1 where uname='$uname'");
		$up1=mysql_query("insert into delivery (name,email,address,mob,pincode,uname) values ('$name','$email','$address','$mobno','$pin','$uname')");
							//header("location:message1.php");
							}
							else
							{
							?>	
							<script language="javascript">
							alert("Your mail ID is wrong! Try again..!");
							</script>
							<?php	
							}	
	
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
            <td colspan="2" align="center"><input type="submit" name="btnBuy" value="Order it!" onClick="return validate()" /></td>
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
