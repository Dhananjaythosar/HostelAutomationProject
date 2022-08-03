<?php

include 'config.php';

if (isset($_POST['submit'])) {

	$email = $_POST['email'];

    $sql= "SELECT * FROM registration WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $emailquery = mysqli_num_rows($result);

    if($emailquery==1){

        $userdata = mysqli_fetch_array($result);
        $username = $userdata['F_name'];
        $otp = $userdata['token'];
        // $to_email = "dhananjaythosar2002@gmail.com";
        $subject = "Password Reset";
        $body = "Hi, $username. Your OTP for Forgot Password request is $otp ";
        $headers = "From: pictpurchasesystem@gmail.com";

        if (mail($email, $subject, $body, $headers)) {
            echo "<script type='text/javascript'>alert('Link has been sent to your registered Email!'); document.location='reset.php';</script>";
        }else {
            echo "<script type='text/javascript'>alert('Email sending fail!')</script>";
        }
    }
    else{
        echo "<script>alert('Email not found!!!')</script>";
    }
}


?>