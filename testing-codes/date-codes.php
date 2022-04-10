<?php 
// date-codes.php
$date1 = "2016-05-07";  
$date2 = "2016-05-06";  
$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
echo $days . "days";


switch (true) {
    case ($diff <= 0):
        // Expired, need renewal
        break;
    case ($diff <= 45):
        // Expires within the next 45 days
        break;
    case ($diff <= 90):
        // Expires within the next 90 days
        break;
}


$expire = date('Y-m-d', strtotime('0 days'));
$alrt = date('Y-m-d', strtotime('+2 days')); //renewal alert 1 day
$alrt2 = date('Y-m-d', strtotime('+3 days')); //renewal alert 2 days

$dbDate = '2022-03-17';//expired
//$dbDate = '2021-04-16'; //1 day
//$dbDate = '2021-04-17'; //2 day

if (strtotime($dbDate) <= strtotime($expire))
{
    echo "<h2>subscription expired.</h2>";
    //
    
}
else if (strtotime($dbDate) > strtotime($expire))
{
    echo "<h2>Enjoy service.</h2>";
    if (strtotime($dbDate) < strtotime($alrt))
    {
        echo "<h2>expiring tommorow.please pay</h2>";
    }
    else if (strtotime($dbDate) < strtotime($alrt2))
    {
        echo "<h2>expiring in 2 days.please pay</h2>";
    }
    //
    
}

//get Date diff as intervals 
		$d1 = new DateTime("2018-01-10 00:00:00");
		$d2 = new DateTime("2019-05-18 01:23:45");
		$interval = $d1->diff($d2);
		$diffInSeconds = $interval->s; //45
		$diffInMinutes = $interval->i; //23
		$diffInHours   = $interval->h; //8
		$diffInDays    = $interval->d; //21
		$diffInMonths  = $interval->m; //4
		$diffInYears   = $interval->y; //1

		echo $diffInSeconds."<br>";
		echo $diffInMinutes."<br>";
		echo $diffInHours."<br>";
		echo $diffInDays."<br>";
		echo $diffInMonths."<br>";
		echo $diffInYears."<br>";