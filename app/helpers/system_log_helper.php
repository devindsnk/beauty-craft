<?php

class Systemlog
{
    private $data;
    public function __construct()
    {

        if (!file_exists('logfile/syslog.txt'))
        {
            file_put_contents('logfile/syslog.txt', "");
        }

        // $this->data = array(
        //     "name" => $_SESSION['username'],
        //     "mobileNo" => $_SESSION['userMobileNo'],
        // );
    }


    public static function signin()
    {


        $userNo = $_SESSION['userMobileNo'];
        $userName = $_SESSION['username'];
        $ip = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Colombo");
        $time = date('m/d/y h:iA', time());
        $log = 'user signin to the system';


        $contents = file_get_contents('logfile/syslog.txt');


        $contents .= "\n$ip\t$time\t$userNo\t$userName\t$log";


        file_put_contents('logfile/syslog.txt', $contents);
    }

    public static function signout()
    {
        // print_r($this->data);
        // die("");
        $userNo = $_SESSION['userMobileNo'];
        $userName = $_SESSION['username'];
        $ip = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Colombo");
        $time = date('m/d/y h:iA', time());
        $log = 'user signout from the system';


        $contents = file_get_contents('logfile/syslog.txt');


        $contents .= "\n$ip\t$time\t$userNo\t$userName\t$log";


        file_put_contents('logfile/syslog.txt', $contents);
    }
}






















// function logger($user, $log)
// {
//     if (!file_exists('logfile/syslog.txt'))
//     {
//         file_put_contents('logfile/syslog.txt', "");
//     }

//     $ip = $_SERVER['REMOTE_ADDR'];
//     date_default_timezone_set("Asia/Colombo");
//     $time = date('m/d/y h:iA', time());


//     $contents = file_get_contents('logfile/syslog.txt');


//     $contents .= "\n$ip\t$time\t$user\t$log";


//     file_put_contents('logfile/syslog.txt', $contents);
// }
