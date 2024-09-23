<?php
$pfile="report.pdf";
$hfile="hreport.html";
$day=$_REQUEST['day'];
$month=$_REQUEST['month'];
$year=$_REQUEST['year'];
		$filename="report/$pfile";

		$host=$_SERVER['HTTP_HOST'];
		$uri=$_SERVER['REQUEST_URI'];
		$x=explode("/",$uri);
		for($i=0;$i<count($x)-1;$i++)
		{
		$path.=$x[$i]."/";
		}
		$url_path = "http://".$host.$path;
		$file2="print.php?day=".$day."&month=".$month."&year=".$year;
		//$file = file_get_contents("http://localhost/PHP-CLASS/sample.php", true);
		$file = file_get_contents($url_path.$file2, true);
		file_put_contents("report/$hfile",$file);
		
		require('html2fpdf.php');
		$pdf=new HTML2FPDF();
		$pdf->AddPage();
		
		
		
		$fp = fopen("report/$hfile","r");
		$strContent = fread($fp, filesize("report/$hfile"));
		fclose($fp);
		$pdf->WriteHTML($strContent);
		$pdf->Output("report/$pfile");
		
		header("location:download.php");
?>