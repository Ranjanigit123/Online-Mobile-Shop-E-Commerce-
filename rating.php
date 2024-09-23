<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
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


$pid=$_REQUEST['pid'];
$orderid=$_SESSION['purchase_id'];
$mqry=mysql_query("select max(id) as maxid from product_review");
$mrow=mysql_fetch_array($mqry);
$id1 = $mrow['maxid'];
$id2 = $id1+1;	
$dis=0;


$q1=mysql_query("select * from register where username='$uname'");
$r1=mysql_fetch_array($q1);
$mac2=$r1['macaddress'];
	if(isset($btn))
	{
	$review=$_REQUEST['review'];
	$q2=mysql_query("select * from product_review where uname='$uname' && pid=$pid && orderid=$orderid && service='$service'");
	$n2=mysql_num_rows($q2);
		if($n2==0 && $mac==$mac2)
		{
	//$r2=mysql_fetch_array($q2);
	//$rid=$r2['id'];
		//		$dis=$id1-$rid;
				
		//}
	
		//if($dis>=10 || $n2==0)
		//{
		
	$r=$review;
			if($r==1)
			{
			mysql_query("update $service set star1=star1+1 where id='".$pid."'");
			}
			else if($r==2)
			{
			mysql_query("update $service set star2=star2+1 where id='".$pid."'");
			}
			else if($r==3)
			{
			mysql_query("update $service set star3=star3+1 where id='".$pid."'");
			}
			else if($r==4)
			{
			mysql_query("update $service set star4=star4+1 where id='".$pid."'");
			}
			else if($r==5)
			{
			mysql_query("update $service set star5=star5+1 where id='".$pid."'");
			}
	
	
	$a=0;
	$b=0;
	$c=0;
	$d=0;
	$e=0;
	$qs2=mysql_query("select * from $service where id='".$pid."'");
	$rs2=mysql_fetch_array($qs2);
	$a=$rs2['star1'];
	$b=$rs2['star2'];
	$c=$rs2['star3'];
	$d=$rs2['star4'];
	$e=$rs2['star5'];
	
		if($a>$b && $a>$c && $a>$d && $a>$e)
		{
		mysql_query("update $service set rating='1' where id='".$pid."'");
		}
		else if($b>$c && $b>$d && $b>$e)
		{
		mysql_query("update $service set rating='2' where id='".$pid."'");
		}
		else if($c>$d && $c>$e)
		{
		mysql_query("update $service set rating='3' where id='".$pid."'");
		}
		else if($d>$e)
		{
		mysql_query("update $service set rating='4' where id='".$pid."'");
		}
		else
		{
		mysql_query("update $service set rating='5' where id='".$pid."'");
		}
		
	////////////
	$comment=$_REQUEST['comment'];
	
			$n =mysql_query("insert into product_review(id,orderid,service,uname,pid,star,review) values(".$id2.",'$orderid','$service','$uname','".$pid."','".$review."','".$comment."')"); 
		
	$msg="<span class=msg2>Rating Addedd Successfully....</span>";	
		
		}
		else
		{
		$msg="<span class=style1>Your Rating was Fake!!!</span>";
		}		
		
	
	}//btn

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rating</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" method="post" action="">
<table width="382" height="114" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" class="hd3">
  <tr>
    <td width="372"><span class="txt1"><?php echo $rs['hotel']; ?></span></td>
  </tr>
  <tr>
    <td><strong class="msg2">Your Rating </strong></td>
  </tr>
  <tr>
    <td><span class="msg2">Star 5 </span>
        <input name="review" type="radio" value="5" />
      Excellent </td>
  </tr>
  <tr>
    <td><span class="msg2">Star 4</span>
        <input name="review" type="radio" value="4" />
      Very Good</td>
  </tr>
  <tr>
    <td><span class="msg2">Star 3</span>
        <input name="review" type="radio" value="3" />
      Average</td>
  </tr>
  <tr>
    <td><span class="msg2">Star 2</span>
        <input name="review" type="radio" value="2" />
      Poor</td>
  </tr>
  <tr>
    <td><span class="msg2">Star 1</span>
        <input name="review" type="radio" value="1" />
      Terrible </td>
  </tr>
  <tr>
    <td class="msg2">Your Review </td>
  </tr>
  <tr>
    <td><textarea name="comment" cols="40" rows="5"></textarea></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="btn" value="Submit" />    </td>
  </tr>
  <tr>
    <td align="center"><?php echo $msg; ?></td>
  </tr>
  <tr>
    <td align="center">
	<a href="rate_view.php?orderid=<?php echo $_REQUEST['orderid']; ?>">Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="javascript:window.close()">Close</a></td>
  </tr>
</table>
</form>
</body>
</html>
