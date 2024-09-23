<?php
session_start();
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
$msg="";


$orderid=$_REQUEST['orderid'];
$qry=mysql_query("select * from user_purchase where pid=$orderid");
$num=mysql_num_rows($qry);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rating</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
.style3 {color:#009900}
-->
</style>
<style type="text/css">
<!--
.style3 {color:#009900}

@-webkit-keyframes blink {
    0% { background: rgba(255,0,0,0.5); }
    50% { background: rgba(255,0,0,0); }
    100% { background: rgba(255,0,0,0.5); }
}

@keyframes blink {
    0% { background: rgba(255,0,0,0.5); }
    50% { background: rgba(255,0,0,0); }
    100% { background: rgba(255,0,0,0.5); }
}

#animate { 
    /*height: 100px; 
    width: 100px;*/
    background: rgba(255,0,0,1);
}

#animate {
    -webkit-animation-direction: normal;
    -webkit-animation-duration: 1s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-name: blink;
    -webkit-animation-timing-function: ease;   

    animation-direction: normal;
    animation-duration: 1s;
    animation-iteration-count: infinite;
    animation-name: blink;
    animation-timing-function: ease;       
}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
<table width="538" height="114" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" class="hd3">
  <tr>
    <td width="372"><span class="txt1"><?php echo $rs['hotel']; ?></span></td>
  </tr>
  <tr>
    <td><strong class="msg2">Your Products </strong></td>
  </tr>
  <tr>
    <td>
	<?php
	if($num>0)
	{
	while($row=mysql_fetch_array($qry))
	{
	?>
	
        <?php
			
			$q2=mysql_query("select * from product where id=$row[nid]");
			$r2=mysql_fetch_array($q2);
			$rate=$r2['rating'];
			$prname[]=$r2['product'];
			$amount=$row['uqut']*$row['price'];
			?>
       <table width="225" height="141" border="0" align="center" cellpadding="5" cellspacing="5" class="border">
            <tr>
              <th colspan="2" bgcolor="#006699" scope="row"><span class="style2"><?php echo $r2['product']." ".$r2['models']; ?></span></th>
            </tr>
            <tr>
              <th colspan="2" scope="row"><?php echo '<a href="product/'.$r2['product_image'].'" target="_blank"><img src="product/'.$r2['product_image'].'" width="80" height="130"></a>'; ?></th>
            </tr>
            <tr>
              <th width="76" align="left" scope="row"><strong>Price</strong></th>
              <td width="114" align="left"><strong><?php echo "Rs.".$r2['price']; ?></strong></td>
            </tr>
            <tr>
              <th align="left" scope="row">Quantity</th>
              <td align="left"><?php echo "Rs.".$row['uqut']; ?></td>
            </tr>
            <tr>
              <th align="left" scope="row">Amount</th>
              <td align="left"><?php echo "Rs.".$r2['price']; ?></td>
            </tr>
            <tr>
              <th colspan="2" align="left" scope="row">&nbsp;</th>
            </tr>
            <tr>
              <th colspan="2" align="left" scope="row"><?php
						   $n=$rate;
						  for($j=1;$j<=5;$j++)
						  {
						  	if($j<=$n)
							{
							?>
                  <img src="images/star1.jpg" />
                <?php
							}
							else
							{
							?>
                <img src="images/star2.jpg" />
                <?php
							}
						  }
						  
						  ?></th>
            </tr>
            <tr>
              <th colspan="2" align="right" scope="row">
			  <a href="rating.php?orderid=<?php echo $_REQUEST['orderid']; ?>&pid=<?php echo $row['nid']; ?>">Rating</a>                  </th>
            </tr>
        </table>
	<?php
	}//while
	}
	else
	{
	echo "Purchase Empty!!";
	}
	?>	</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFCCFF"><strong>Related Products</strong> </td>
  </tr>
  <tr>
    <td><?php
	  $prd2=$prname[0];
	  	$gq2=mysql_query("select * from product where product like '%$prd2%'");
		$rq2=mysql_fetch_array($gq2);
		$gprice2=$rq2['price'];
		$ap2=$gprice2-1000;
		$bp2=$gprice2+1000;
		$gqry2=mysql_query("select * from product where product!='$prd2' && (price between $ap2 and $bp2) order by rating desc");
		$num2=mysql_num_rows($gqry2);

	  if($num2!=0)
	  {
	  
	  while($img_r2=mysql_fetch_array($gqry2))
		{
		$img2[] = $img_r2['id'];
		$rt2[] = $img_r2['rating'];
		}
		$img22 = array_chunk($img2,2);
		//print_r($rt);
		
		@rsort($rt2);
		$big2=$rt2[0];
	  ?>
      <table width="23%" height="112" border="0" cellpadding="10" cellspacing="10">
        <tr>
          <td bordercolor="#FFFFFF"></td>
        </tr>
        <?php
		foreach($img22 as $img32)
		{
		
		?>
        <tr>
          <?php
		  $b=0;
			for($ii=0;$ii<count($img32);$ii++)
			{
			$q22=mysql_query("select * from product where id=$img32[$ii]");
			$r22=mysql_fetch_array($q22);
			$rate2=$r22['rating'];
			
			
			//$prdn2=strtolower($r22['product']);
//			$prd22=strtolower($prd2);
//			$pos2 = strpos($prdn2, $prd22);
				/*if($pos===false)
				{
				$stid="animate";
				}
				else
				{
				$stid="";
				}
				if($rate>$b)
				{
				$b=$rate;
				}*/				
				if($rate2==$big2)
				{
				$stid2="animate";
				}
				else
				{
				$stid2="";
				}
			?>
          <td class="border"><table width="191" height="141" border="0" cellpadding="5" cellspacing="5" id="<?php echo $stid2; ?>">
              <tr>
                <th colspan="2" bgcolor="#EAF9FF" scope="row"><span class="style3" style="text-decoration:blink"><?php echo $r22['product']." ".$r22['models']; ?></span></th>
              </tr>
              <tr>
                <th colspan="2" scope="row"><?php echo '<a href="product/'.$r22['product_image'].'" target="_blank"><img src="product/'.$r22['product_image'].'" width="80" height="130"></a>'; ?></th>
              </tr>
              <tr>
                <th width="76" align="left" scope="row"><strong>Price</strong></th>
                <td width="114" align="left"><strong><?php echo "Rs.".$r22['price']; ?></strong></td>
              </tr>
              <tr>
                <th colspan="2" align="left" scope="row"><strong><?php echo $r22['description']; ?></strong></th>
              </tr>
              <tr>
                <th colspan="2" align="left" scope="row"><?php
						   $n2=$rate2;
						  for($jj=1;$jj<=5;$jj++)
						  {
						  	if($jj<=$n2)
							{
							?>
                    <img src="images/star1.jpg" />
                  <?php
							}
							else
							{
							?>
                  <img src="images/star2.jpg" />
                  <?php
							}
						  }
						  
						  ?></th>
              </tr>
              <tr>
                <th colspan="2" align="right" scope="row"> <!--<a href="javascript:rateWin('<?php //echo $img3[$i]; ?>')">Rating</a>&nbsp;&nbsp;&nbsp;&nbsp;-->
                    </th>
              </tr>
          </table></td>
          <?php
		  }
		  ?>
        </tr>
        <?php
		}
		?>
      </table>
      <?php
	  }//num
	  else
	  {
	  echo "No products found!";
	  }
	
	  ?></td>
  </tr>
  <tr>
    <td align="center"><a href="javascript:window.close()">Close</a></td>
  </tr>
</table>
</form>
</body>
</html>
