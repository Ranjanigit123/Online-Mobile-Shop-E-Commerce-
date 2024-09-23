<?php
include("sess_page.php");
include("include/dbconnect.php");
extract($_POST);
$msg="";

$ip = $_SERVER['REMOTE_ADDR'];
//////MAC Address///////
ob_start();
//Get the ipconfig details using system commond
system('ipconfig /all');

// Capture the output into a variable
$mycom=ob_get_contents();
// Clean (erase) the output buffer
ob_clean();

$findme = "Physical";
//Search the "Physical" | Find the position of Physical text
$pmac = strpos($mycom, $findme);

// Get Physical Address
$mac=substr($mycom,($pmac+36),17);
////////////////////////////////////////////
if(isset($register))
{
 if(trim($name)=="") { $msg = "Enter the Name..."; }
 else if(trim($contact)=="") { $msg = "Enter the Contact No."; }
 else if(trim($email)=="") { $msg = "Enter the E-mail..."; }
 else if(trim($uname)=="") { $msg = "Enter the Username"; }
 else if(trim($pwd)=="") { $msg = "Enter the Password"; }
 else if(trim($cpass)=="") { $msg = "Enter the Confirm Password"; }
 else if($pwd!=$cpass) { $msg = "Both Password are not equal!"; }
	else
	{
	$max_qry = mysql_query("select max(id) maxid from register");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	$rdate=date("Y-m-d");
		$uqry="insert into register(id,name,gender,address,pincode,contact,email,credit,username,password,macaddress,rdate) values($id,'$name','$gender','$address','$pincode',$contact,'$email','0','$uname','$pwd','$mac','$rdate')";
		$res=mysql_query($uqry);
		

	
		if($res)
		{
		//header("location:register2.php");
		$_SESSION['username'] = $uname;
			?>
			<script language="javascript">
			alert("Your account has been created");
			window.location.href="register2.php";
			</script>
			<?php
		}
		else
		{
		$msg="Could not be stored!";
		}
	}	
	
}
?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {
	color: #990000
}
-->
</style>
<script language="javascript">
function validate()
{

	if(document.form1.name.value=="")
	{
	alert("Enter the Name...");
	document.form1.name.focus();
	return false;
	}
	if(document.form1.gender[0].checked==false && document.form1.gender[1].checked==false)
	{
	alert("Select the Gender");
	return false;
	}
	if(document.form1.address.value=="")
	{
	alert("Enter the Address...");
	document.form1.address.focus();
	return false;
	}
	if(document.form1.pincode.value=="")
	{
	alert("Enter the Pincode...");
	document.form1.pincode.focus();
	return false;
	}
	if(isNaN(document.form1.pincode.value))
	{
	alert("Invalid Pincode!");
	document.form1.pincode.select();
	return false;
	}
	if(document.form1.contact.value=="")
	{
	alert("Enter the Contact No...");
	document.form1.contact.focus();
	return false;
	}
	if(isNaN(document.form1.contact.value))
	{
	alert("Invalid Mobile No!");
	document.form1.contact.select();
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
	if(document.form1.uname.value=="")
	{
	alert("Enter the username!");
	document.form1.uname.focus();
	return false;
	}
	if(document.form1.pwd.value=="")
	{
	alert("Enter the Password...");
	document.form1.pwd.focus();
	return false;
	}
	if (document.form1.pwd.value!=document.form1.cpass.value)
	{
	alert("Both passwords are not equal!")
	document.form1.cpass.select();
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
      <td><?php include("include/link_home.php"); ?></td>
    </tr>
    <tr>
      <td align="center"><p>&nbsp;</p>
        <p class="style1 style2"><?php echo $msg; ?></p>
        <table width="405" height="360" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2" align="center"><strong>User Registration </strong></td>
          </tr>
          <tr>
            <td width="162">Name</td>
            <td width="162"><input type="text" name="name"></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td><input name="gender" type="radio" value="Male">
              Male
                <input name="gender" type="radio" value="Female">
            Female</td>
          </tr>
          <tr>
            <td>Address</td>
            <td><textarea name="address"></textarea></td>
          </tr>
          <tr>
            <td>Pincode</td>
            <td><input type="text" name="pincode"></td>
          </tr>
          <tr>
            <td>Mobile No. </td>
            <td><input type="text" name="contact"></td>
          </tr>
          <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" id="email"></td>
          </tr>
          <tr>
            <td>Username</td>
            <td><input type="text" name="uname" /></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="pwd" /></td>
          </tr>
          <tr>
            <td>Confirm Password </td>
            <td><input type="password" name="cpass"></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="register" value="Register" onClick="return validate()" />
            <input type="reset" name="Reset" value="Clear"></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
