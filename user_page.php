<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
$uname=$_SESSION['uname'];
extract($_POST);
$msg="";
echo $_SESSION['purchase_id'];

?>
<html>
<head>
<title><?php include("include/title.php"); ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
/*.style3 {color:#009900}

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
}*/
-->
</style>
<script language="javascript">
function rateWin(id,ppp)
{
window.open("rating.php?pid="+id+"&service="+ppp,"Rating","width=400,height=500,menubar=0,toolbar=0,statusbar=0,scrollbars=1");
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
      <td align="left" class="subhead"><?php include("include/link_user.php"); ?></td>
    </tr>
    <tr>
      <td align="center" valign="top"><p class="txt1">&nbsp;</p>
        <p class="txt1"><strong>Welcome <?php echo $uname; ?></strong></p>
        <p class="style1"><?php echo $msg; ?></p>
        <table width="684" height="71" border="0">
          <tr>
            <th align="left" scope="row">Search the Products        &nbsp;&nbsp;</th>
            <td align="left"><input type="text" name="prd" value="<?php echo $_REQUEST['prd']; ?>">
              <input type="submit" name="btn" value="Search"></td>
          </tr>
        </table>
        <p>&nbsp;</p>
	  <?php
	  if(isset($btn))
	  {
	  ?>
	  
	  
	  <?php
		$gqry=mysql_query("select * from amazon where product like '%$prd%' || description like '%$prd%' order by rating desc");
		$num=mysql_num_rows($gqry);

	  if($num!=0)
	  {
	  
	  while($img_r=mysql_fetch_array($gqry))
		{
		$img[] = $img_r['id'];
		$rt[] = $img_r['rating'];
		}
		$img2 = array_chunk($img,3);
		//print_r($rt);
		
		@rsort($rt);
		$big=$rt[0];
	  ?>
	  <?php
	  }//num
	  else
	  {
	  //echo "No products found!";
	  }
	  }
	  ?>
<p>
  <?php
		$gqry1=mysql_query("select * from amazon where product like '%$prd%' || description like '%$prd%' order by rating desc");
		$num1=mysql_num_rows($gqry1);

	  if($num1!=0)
	  {
	  
	  while($img_r1=mysql_fetch_array($gqry1))
		{
		$img1[] = $img_r1['id'];
		$rt1[] = $img_r1['rating'];
		}
		$img21 = array_chunk($img1,3);
		//print_r($rt);
		
		@rsort($rt1);
		$big1=$rt1[0];
	  ?>
</p>
      <!--<table width="23%" height="112" border="0" cellpadding="10" cellspacing="10">
        <tr>
          <td bordercolor="#FFFFFF"></td>
        </tr>
        <?php
		foreach($img21 as $img31)
		{
		
		?>
        <tr>
          <?php
		  $b=0;
			for($i=0;$i<count($img31);$i++)
			{
			$q1=mysql_query("select * from amazon where id=$img31[$i]");
			$r1=mysql_fetch_array($q1);
			$rate1=$r1['rating'];
			
			
			$prdn1=strtolower($r1['product']);
			$prd21=strtolower($prd);
			//$pos1 = strpos($prdn1, $prd21);
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
				if($rate1==$big1)
				{
				$stid1="animate";
				}
				else
				{
				$stid1="";
				}
			?>
          <td class="border"><table width="225" height="141" border="0" cellpadding="5" cellspacing="5" id="<?php echo $stid1; ?>">
              <tr>
                <th colspan="2" bgcolor="#EAF9FF" scope="row"><span class="style3" style="text-decoration:blink"><?php echo $r1['product']." ".$r1['models']; ?></span></th>
              </tr>
              <tr>
                <th colspan="2" scope="row"><?php echo '<a href="amazon/'.$r1['product_image'].'" target="_blank"><img src="product/'.$r1['product_image'].'" width="80" height="130"></a>'; ?></th>
              </tr>
              <tr>
                <th width="76" align="left" scope="row"><strong>Price</strong></th>
                <td width="114" align="left"><strong><?php echo "Rs.".$r1['price']; ?></strong></td>
              </tr>
              <tr>
                <th colspan="2" align="left" scope="row"><strong>
                  <?php 
	echo $r1['adfrom']."<br><br>";
	echo $r1['description']; 
	echo "<br>Product by Amazon";
	?>
                </strong></th>
              </tr>
              <tr>
                <th colspan="2" align="left" scope="row"><?php
						   $n1=$rate1;
						  for($j=1;$j<=5;$j++)
						  {
						  	if($j<=$n1)
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
                <th colspan="2" align="right" scope="row"> <a href="javascript:rateWin('<?php echo $img2[$i]; ?>','amazon')">Rating</a>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo '<a href="user_purchase_part.php?gid='.$r1['id'].'">Add to Cart</a>'; ?></th>
              </tr>
          </table></td>
          <?php
		  }
		  ?>
        </tr>
        <?php
		}
		?>
      </table>-->
	  <p>
	    <?php
	  }//num
	  else
	  {
	  //echo "No products found!";
	  }
	  
	  ?>
	    </p>
	  <p>
        <?php
		$gqry2=mysql_query("select * from flipkart where product like '%$prd%' || description like '%$prd%' order by rating desc");
		$num2=mysql_num_rows($gqry2);

	  if($num2!=0)
	  {
	  
	  while($img_r2=mysql_fetch_array($gqry2))
		{
		$img2[] = $img_r2['id'];
		$rt2[] = $img_r2['rating'];
		}
		$img22 = array_chunk($img2,3);
		//print_r($img22);
		
		@rsort($rt2);
		$big2=$rt2[0];
	  ?>
</p>
	  <p>
	    <?php
	  }//num
	  else
	  {
	  //echo "No products found!";
	  }
	 
	  ?>
</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>
        <?php
		$gqry3=mysql_query("select * from epay where product like '%$prd%' || description like '%$prd%' order by rating desc");
		$num3=mysql_num_rows($gqry3);

	  if($num3!=0)
	  {
	  
	  while($img_r3=mysql_fetch_array($gqry3))
		{
		$img3[] = $img_r3['id'];
		$rt3[] = $img_r3['rating'];
		}
		$img24 = array_chunk($img3,3);
		//print_r($rt);
		
		@rsort($rt);
		$big=$rt[0];
	  ?>
</p>
	  
	  <p>
	    <?php
	  }//num
	  else
	  {
	  //echo "No products found!";
	  }
	 
	  ?>
	  </p>
	  <p>&nbsp;</p>
	  <p>
        <?php
		$gqry4=mysql_query("select * from snapdeal where product like '%$prd%' || description like '%$prd%' order by rating desc");
		$num4=mysql_num_rows($gqry4);

	  if($num4!=0)
	  {
	  
	  while($img_r4=mysql_fetch_array($gqry4))
		{
		$img4[] = $img_r4['id'];
		$rt4[] = $img_r4['rating'];
		}
		$img25 = array_chunk($img4,3);
		//print_r($rt);
		
		@rsort($rt4);
		$big4=$rt4[0];
	  ?>
</p>
	  <?php
	  }//num
	  else
	  {
	  //echo "No products found!";
	  }
	  
	  ?>
<p>&nbsp; </p>
      <p>&nbsp;      </p>
      <p><a href="user_parchase_order.php">View All Products</a></p>
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