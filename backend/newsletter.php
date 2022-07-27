<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

require ('../phpmailer/Exception.php');
require ('../phpmailer/PHPMailer.php');
require ('../phpmailer/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


session_start();
$User_id = $_SESSION['user_id'];

//email send function

function emailSend($demomail){
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pbgp123456@gmail.com';                     //SMTP username
        $mail->Password   = 'cerkaarewkaofidf';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setfrom('sagar.sain@sigmainfo.net', 'Mailer');
        $mail->addaddress($demomail, "user");     //Add a recipient



        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thanks for subscribing our Newsletter';
        $mail->Body    = 'Newsletter subcribed on <b>Grocery.com</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $_SESSION['newsletter_subscription'] = 'Thanks For Subscribing for Newsletter';

        if ($_SESSION['newsletter_subscription']){
            echo 1;
        }

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


$email = $_POST['Email'];
require 'db-config.php';

$query = "SELECT * from users WHERE UserID='$User_id' ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);

    if ($row['newsletterSubscribe'] === 1){
        session_start();
        $_SESSION['newsletter_subscription'] = 'This Email has Already Subscribed for Newsletter';
    }else{
        $subscribed = 1;
        $newsletter = "UPDATE users SET newsletterSubscribe = '$subscribed' WHERE UserID='$User_id' ";

        if (mysqli_query($conn, $newsletter)) {
            emailSend($email);
        } else {
            $_SESSION['newsletter_subscription'] = 'Something Went Wrong';
        }
    }
}
?>