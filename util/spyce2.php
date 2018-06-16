#!/usr/local/bin/Resource/www/cgi-bin/php
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
//error_reporting(0);
$f="/usr/local/etc/dvdplayer/tvplay.txt";
if (file_exists($f))
  $pass=trim(file_get_contents($f));
else
  $pass="";
$l="http://hd4all.ml/d/gasvk.php?c=".$pass;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $l);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
      curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; rv:57.0) Gecko/20100101 Firefox/57.0");
      //curl_setopt($ch, CURLOPT_HEADER,1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $h = curl_exec($ch);
      curl_close($ch);
$tok = str_between($h,'tok="','"');
$serv = str_between($h,'url="','"' );
file_put_contents("/tmp/serv.txt",$serv);
file_put_contents("/tmp/tok.txt",$tok);
?>
