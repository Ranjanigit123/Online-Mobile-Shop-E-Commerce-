<?php
include("sess_page.php");
include("include/protect.php");
include("include/dbconnect.php");
extract($_POST);
$uname=$_SESSION['uname'];
if(isset($btnSubmit))
{
	if(trim($category)=="")
	{
	$msg="Enter the Category";
	}
	else
	{
$max_qry = mysql_query("select max(id) maxid from category");
	$max_row = mysql_fetch_array($max_qry);
	$id=$max_row['maxid']+1;
	$rdate=date("Y-m-d");
	$pass=md5($pwd);
		$uqry="insert into category(id,category) values($id,'$category')";
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
//////////
if($_REQUEST['act']=="del")
{
$did=$_REQUEST['did'];
mysql_query("delete from category where id=$did");
header("location:add_cat.php");
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
function del()
{
	if(!confirm("Are you sure want to delete?"))
	{
	return false;
	}
	return true;
}
</script>
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
        <p class="style1"><?php echo $msg; ?></p>
        <table width="292" height="124" border="1">
          <tr>
            <th colspan="2">Add Category </th>
          </tr>
          <tr>
            <td width="132">Category Name </td>
            <td width="144"><input type="text" name="category" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="btnSubmit" value="Submit" /></td>
          </tr>
        </table>
        <blockquote>
          <p>&nbsp;</p>
          <table width="268" border="1" cellspacing="0" cellpadding="5">
            <tr>
              <th scope="col">Sno</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
			<?php
			$i=0;
			$q2=mysql_query("select * from category");
			while($r2=mysql_fetch_array($q2))
			{ $i++;
			?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $r2['category']; ?></td>
              <td><a href="add_cat.php?act=del&did=<?php echo $r2['id']; ?>" onclick="return del()">Delete</a></td>
            </tr>
			<?php
			}
			?>
          </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
      </blockquote>
      <p>&nbsp;</p>        <h3>&nbsp;</h3></td>
    </tr>
    <tr>
      <td align="center" class="subhead">&nbsp;</td>
    </tr>
  </table>
</form>
<?php
if(isset($btn2))
{
//header("location:search_user.php?gettxt=".$gettxt."&utype=".$utype);
?>
<script language="javascript">
window.location.href="search_user.php?gettxt=<?php echo $gettxt; ?>&utype=<?php echo $utype; ?>";
</script>
<?php
}
?>
</body>
</html>
