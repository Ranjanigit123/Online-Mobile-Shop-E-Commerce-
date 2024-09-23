<?php
$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=117.201.32.108");
echo $xml->geoplugin_countryName ;


echo "<pre>" ;
foreach ($xml as $key => $value)
{
    echo $key , "= " , $value ,  " \n" ;

}


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

?>