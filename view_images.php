<?php 
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_GET['uname'];

$img_q=mysql_query("select * from upload where uname='$uname'");
while($img_r=mysql_fetch_array($img_q))
{
$img[]=$img_r['up_file'];
}
$img2=array_chunk($img,3);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("include/title.php"); ?></title>
<link href="chat.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="uploader.js"></script>
<script type="text/javascript">
window.onload = init;
</script>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data" id="uploadform">
<table width="95%" height="572" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td align="center"><?php include("include/header.php"); ?></td>
  </tr>
  <tr>
    <td height="22" class="t1"><?php include("link.php"); ?></td>
  </tr>
  <tr>
    <td height="443" align="center" valign="top"><p>&nbsp;</p>
      <p class="style1">Welcome <?php echo $uname; ?>      </p>
      <p class="style1">&nbsp;</p>
      <table width="29%" height="34" border="0" cellpadding="10" cellspacing="0">
        <tr>
          <td>&nbsp;</td> <td>&nbsp;</td> <td>&nbsp;</td>
        </tr>
		<?php
		foreach($img2 as $img3)
		{
		
		?>
        <tr>
			<?php
			for($i=0;$i<count($img3);$i++)
			{
			?>
          <td><?php echo '<img src="upload/'.$img3[$i].'" width="80" height="80">'; ?>
		  <?php echo '<br><a href="share_image.php?">Share</a>';
		  echo ' / <a href="share_image.php?">View</a>'; ?>
		  </td>
		  <?php
		  }
		  ?>
        </tr>
		<?php
		}
		?>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
</table>
 
<p>&nbsp;</p>
</form>
</body>
</html>
