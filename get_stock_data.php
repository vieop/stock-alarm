<?php

$srv_ip = '221.179.180.78';//你的目标服务地址或频道.hq.sinajs.cn
$srv_port = 80;
//$url = '/list=sh601006'; //接收你post的URL具体地址 ,大秦铁路http://hq.sinajs.cn/list=sh601006
$url = '/list=sh600050';   //中国联通,http://hq.sinajs.cn/list=sh600050
$fp = '';
$resp_str = '';
$errno = 0;
$errstr = '';
$timeout = 1;
$post_str = "username=demo&str=aaaa";//要提交的内容.

//echo $url_str;
if ($srv_ip == ''){
echo('ip or dest url empty<br>');
}
//echo($srv_ip);

$fp = fsockopen($srv_ip,$srv_port,$errno,$errstr,$timeout);
if (!$fp){
echo('fp fail');
}

$content_length = strlen($post_str);
$post_header = "POST $url HTTP/1.1\r\n";
$post_header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$post_header .= "User-Agent: MSIE\r\n";
$post_header .= "Host: ".$srv_ip."\r\n";
$post_header .= "Content-Length: ".$content_length."\r\n";
$post_header .= "Connection: close\r\n\r\n";
$post_header .= $post_str."\r\n\r\n";

fwrite($fp,$post_header);

while(!feof($fp)){
$resp_str .= fgets($fp,512);//返回值放入$resp_str
}
fclose($fp);

echo($resp_str);//处理返回值.

//unset ($resp_str);
?>
