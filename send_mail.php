<?php

$result = array(); //declare empty array
$result['error']='';
$result['result']=1;
$result['crud']='E';


$err= "";
$name = $email = $subject = $message = "";
$errors = [];
$data = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
}

$to      = 'oriss800@gmail.com';
$subject = 'Contact_from_protfolio - ' . $subject;
$message = $message;
$headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

echo "The message send :)";
?>