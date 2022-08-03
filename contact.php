<?php

if (isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$sub = $_POST['subject'];
$message = $_POST['message'];

$subject = "Thanks For Contacting!!";
        $body = "Hi $name , Your message has been received. Thank You For Contacting Us!!";
        $headers = "From: hostelregistrar@pict.edu";

        if (mail($email, $subject, $body, $headers)) {
            echo "<script type='text/javascript'>alert('Your message has been sent. Thank you!');document.location='index.php';</script>";
            
        }else {
            echo "Email sending failed...";
        }
    }
?>