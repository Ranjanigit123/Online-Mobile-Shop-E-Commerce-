<?php
include("sess_page.php");
include("include/dbconnect.php");

$sess_user=$_SESSION['uname'];
$user_qry=mysql_query("select * from register where username='$sess_user'");
$user_row=mysql_fetch_array($user_qry);
$credit=$user_row['credit'];
$pur_id=$_SESSION['purchase_id'];
$uname=$_REQUEST['user'];
$email=$user_row['email'];
//echo $sess_user;
//echo "$credit";

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
$btnBuy=$_POST['btnBuy'];
$creditno=$_POST['creditno'];

	if($sess_user==$_REQUEST['user'])
	{

if(isset($btnBuy))
   	{
  if($creditno==$credit)
 		 {
		 $up2=mysql_query("update user_purchase set status = 1 where uname='$sess_user' && pid='$pur_id'");
		 
		/* include("email.php");
									$objEmail	=	new CI_Email();
									$objEmail->from('shopping@gmail.com', "Shopping");
									//$objEmail->from('cloudservice@projectone.in', "Cloud Service");
									$objEmail->to("$email");
									//$objEmail->cc($txt_cc);
									//$objEmail->bcc($txt_bcc);
									$objEmail->subject("Purchase Confirmation");
									
									$objEmail->message('You have successfully purchased.. <a href="http://localhost/product_compare/rate_view.php?orderid='.$pur_id.'">Enter Your Rating here...</a>');
									
								
										//if(file_exists("report.xls"))
										//{
										//	$objEmail->attach("report.xls");
										//}
										if ($objEmail->send())
										{	
										//echo 'mail sent successfully';
										}
										else
										{	
										//echo 'failed';
										}*/
  //header("location:message.php");
  ?>
  <script language="javascript">
  alert("Ordered Successfully");
  window.location.href="view_purchase.php";
  </script>
  <?php
  	
  		}
		
else
	{
$msg="Invalid Card No..";
	}
	}
	}

/*$pq=mysql_query("select * from user_purchase where uname='$uname' && pid=$pur_id && status=0");
	while($pr=mysql_fetch_array($pq))
	{	
	$total = $pr['price'] * $pr['uqut']; 
	$tot[]=$total;
	}
$amount=@array_sum($tot);	


}

$btnBuy=$_POST['btnBuy'];
if(isset($btnBuy))
{
$credit=$_POST['creditno'];
$card=$_POST['select'];

if($card==1){$card1="visa";}
if($card==2){$card1="master";}
if($card==3){$card1="american";}





$sel1=mysql_query("select * from register where username='$uname'");
$usr_name=mysql_fetch_array($sel1);
$name=$usr_name['name'];

$sel2=mysql_query("select * from myacct where name='$name' && acct='$credit' && card='$card1'");
$user1=mysql_fetch_array($sel2);
$name1=$user1['name'];
$acctno=$user1['acct']; 
$cardname=$user1['card'];  
if(($cardname=$card1) && ($acctno==$credit))
{

$up3=mysql_query("select * from myacct where name='$name1'");
$row3=mysql_fetch_array($up3);
$amt1=$row3['depo'];

if($amount>$amt1)
{
$msg="Your balance is low, so you could not proceed!";
}
else{
$upd1=mysql_query("update myacct set depo=$amount+depo where name='admin'");
$up2=mysql_query("update myacct set depo=depo-$amount where name='$name1'");
$up2=mysql_query("update user_purchase set status = 1 where uname='$sess_user'");



}}
else
{
$msg="invalid account details";
}

}

/* $up=mysql_query("update user_purchase set status=1 where pid=$pur_id");

$ukey=$_POST['ukey'];
echo $accno;
if($_POST['accno']==$accno)
	{
	$aq=mysql_query("select * from myacct where acct='$accno'");
	$ar=mysql_fetch_array($aq);
	$bal_amt=$ar['depo'];
	
	$aq2=mysql_query("select * from myacct where acct='$admin_acc'");
	$ar2=mysql_fetch_array($aq2);
	$bal_amt2=$ar2['depo'];
	echo $bal_amt;
		if($bal_amt>$amount)
		{
		$bal=$bal_amt-$amount;
		$bal2=$bal_amt2+$amount;
		echo "update myacct set depo=$bal where acct='$accno'";
		$up=mysql_query("update myacct set depo=$bal where acct='$accno'");
		$up2=mysql_query("update myacct set depo=$bal2 where acct='$admin_acc'");
		
		header("location:message1.php");
		}
		else
		{
		$msg="Your balance is low, so you could not proceed!";
		}
	
	}
}
*/
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
	
	if(isNaN(document.form1.creditno.value))
	{
	alert("Invalid Account No!");
	document.form1.creditno.select();
	return false;
	}
	if(document.form1.creditno.value=="")
	{
	alert("Enter the Credi Card No.");
	document.form1.creditno.focus();
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
      <td width="26%" align="center" bgcolor="#E6EEFB" class="heading"><br />
      Online Payment </td>
      <td width="37%" align="right" valign="top" bgcolor="#E6EEFB"><img src="images/online_header.jpg" width="481" height="158" /></td>
      <td width="37%" align="center" valign="top" bgcolor="#E6EEFB">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><p>&nbsp;</p>
        <p class="txt1">Payment details </p>
        <p class="txt1"><?php echo $msg; ?></p>
        <table width="460" height="377" border="0" cellpadding="10" cellspacing="0">
          <tr>
            <td width="149">Credit Card No. </td>
            <td width="176"><input type="text" name="creditno" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><img src="images/credit.jpg" width="268" height="188" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btnBuy" value="Buy Online" onClick="return validate()" /></td>
          </tr>
        </table>
        <p>&nbsp;</p>
      <p><a href="<?php echo 'user_purch_view.php?user='.$uname; ?>">Go to Shopping</a></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
