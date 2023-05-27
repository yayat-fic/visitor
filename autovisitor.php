<?php
error_reporting(0);

$biru = "\e[34m";
$kuning = "\e[33m";
$cyan = "\e[96m";
$magenta = "\e[35m";
$hijau = "\e[92m";
$merah = "\e[91m";

echo "$cyan
██████╗ ██╗     ██╗  ██╗███████╗
██╔══██╗██║     ██║  ██║██╔════╝
██████╔╝██║     ██║  ██║█████╗	 @SKY
██╔══██╗██║     ██║  ██║██╔══╝
██████╔╝███████╗███████║███████╗
╚═════╝ ╚══════╝╚══════╝╚══════╝
$merah .Created by SomArt Design.
\n";

$authorceo = 'BLUESKY';

echo "$hijau [1] Enter Your Website or Blog Url :  ";
$url = trim(fgets(STDIN, 1024)); /** MANUAL URL $url = 'URL or Target'; **/
echo "$hijau [2] Enter Number of Visitors :  ";
$jumlah = trim(fgets(STDIN, 1024));
echo "$hijau [3] Enter Proxy Address [IPADDRESS:PORT] :  ";
$proxy       = rtrim( fgets( STDIN));
echo "\n";

echo "\n\e[1;35m+=========================\e[0m[# \e[1;32mPROSES\e[0m #]\e[1;35m=========================+\e[0m\n";
// $url = 'http://'.substr(trim($url), 1);
for ($x=1; $x<=$jumlah; $x++) {

/** FUNCTION CURL **/
$idsystem404 = curl_init();
curl_setopt($idsystem404, CURLOPT_URL, "https://idsystem404.000webhostapp.com/api/api-autovisitor.php?url=".$url);
curl_setopt($idsystem404, CURLOPT_REFERER, "https://www.google.com");
curl_setopt($idsystem404, CURLOPT_HEADER, 0);
curl_setopt($idsystem404, CURLOPT_PROXY, $proxy);
curl_setopt($idsystem404, CURLOPT_HTTPPROXYTUNNEL, $proxy);
curl_setopt($idsystem404, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($idsystem404, CURLOPT_RETURNTRANSFER, true);
curl_setopt($idsystem404, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($idsystem404, CURLOPT_TIMEOUT, 10);
curl_setopt($idsystem404, CURLOPT_ENCODING, "gzip");
$exec = curl_exec($idsystem404);
if(!curl_errno($idsystem404)){
//$info = curl_getinfo($idsystem404, CURLINFO_HTTP_CODE);
$info = curl_getinfo($idsystem404);
$ip = $info['primary_ip'];
$port = $info['primary_port'];
$code = $info['http_code'];
curl_close($idsystem404);
	if ($exec == "primary_ip") {
		$jumlah += 1;
		echo "ERROR";
		flush();
		sleep(0); /** Delay **/		
	} else {
		echo "$x. [\e[1;31m $authorceo \e[0m] | URL : [\e[1;34m $url \e[0m] [\e[1;33m $ip:$port \e[0m] [ \e[1;92mSUCCESS ]\e[0m\n";
		flush();
		sleep(0); /** Delay **/		
	}
}
}
echo "\n\e[1;31mERROR : Silahkan Periksa Koneksi Internet atau Isi Isian diatas dengan Benar!\e[0m\n";
?>
