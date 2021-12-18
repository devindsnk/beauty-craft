<?php 

function logger($user,$log){
if(!file_exists('logfile/syslog.txt')){
file_put_contents('logfile/syslog.txt',"");


}

$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Asia/Colombo");
$time=date('m/d/y h:iA',time());


$contents=file_get_contents('logfile/syslog.txt');


$contents .= "\n$ip\t$time\t$user\t$log";


file_put_contents('logfile/syslog.txt',$contents);


}
