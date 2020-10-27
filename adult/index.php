<?php
$php= htmlspecialchars($_GET['id']);
$t= htmlspecialchars($_GET['ideee']);
$stream=m3u82('http://erotixtv.com/'.$php.'.php',$t);
$streamurl=search($stream,'file:"','"});');
$streamurl=str_replace('http','https://iptvurl.herokuapp.com/adult/up.php/http',$streamurl);

header ("Location: $streamurl");

function m3u82($url2,$ideee)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url2);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
'Accept-Encoding: gzip, deflate',
'Accept-Language: es-ES,es;q=0.9,fr;q=0.8',
'Connection: keep-alive',
'Host: erotixtv.com',
'Referer: http://erotix-tv.com/'.$ideee.'.html',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36'

    ));
$server_output = urldecode(curl_exec($ch));
curl_close ($ch);
return $server_output;

}
function search($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);   
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}


?>
