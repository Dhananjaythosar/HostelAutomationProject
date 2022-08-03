<?php

include 'config.php';

session_start();
if (isset($_POST['submit'])) {
    $F_name = $_POST['F_name'];
    $L_name = $_POST['L_name'];
    $reg_no = $_POST['reg_no'];
    $mobile = $_POST['mobile'];
    $Father_name = $_POST['Father_name'];
    $Father_no = $_POST['Father_no'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $Year = $_POST['Year'];
    $Branch = $_POST['Branch'];
    $Nationality = $_POST['Nationality'];
    $State = $_POST['State'];
    $City = $_POST['City'];
    $pincode = $_POST['pincode'];
    $sendpass = $_POST['password'];
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['confirm_password']);
    $token = "";
    $typedoc = $_POST['typedoc'];
    $extension = array('jpeg', 'jpg', 'png', 'gif', 'pdf');

          $pdf1=$_FILES['pdf1']['name'];
          $pdf_type1=$_FILES['pdf1']['type'];
          $pdf_size1=$_FILES['pdf1']['size'];
          $pdf_tem_loc1=$_FILES['pdf1']['tmp_name'];
          $pdf_store1="pdf/".$pdf1;

          move_uploaded_file($pdf_tem_loc1,$pdf_store1);


          $pdf2=$_FILES['pdf2']['name'];
          $pdf_type2=$_FILES['pdf2']['type'];
          $pdf_size2=$_FILES['pdf2']['size'];
          $pdf_tem_loc2=$_FILES['pdf2']['tmp_name'];
          $pdf_store2="pdf/".$pdf2;

          move_uploaded_file($pdf_tem_loc2,$pdf_store2);

    

            for ($i = 1; $i <= 6; $i++) {
                $token .= substr("1357902468", (rand() % (strlen("1357902468"))), 1);
            }
            if ($pass == $cpass) {
                $sql = "SELECT * FROM registration WHERE email='$email'";
                $result = mysqli_query($conn, $sql);

                if (!$result->num_rows > 0) {
                    $sql2 = "SELECT * FROM pincode WHERE pincode='$pincode'";
                    $result2 = mysqli_query($conn, $sql2);

                    if (!$result2->num_rows > 0) {
                        $sql = "insert into registration(F_name,L_name,reg_no,mobile_no,Father_name,Father_no,gender,email,year,branch,Nationality,State,city,pincode,pass,valid,cat_id,token,typedoc,address_doc,fee_doc)values ('$F_name','$L_name','$reg_no','$mobile','$Father_name','$Father_no','$gender','$email','$Year','$Branch','$Nationality','$State','$City','$pincode','$pass','No','3','$token','$typedoc','$pdf1','$pdf2')";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $subject = "Registration Successfull for Pict-hostel!";
                            $body = "Hi, $F_name. Registration Completed, Once we verify your documents you will be able to login!!
                                \r\r\n\n Your Login credentials are: \r\n Login ID:$email\r\n Password:$sendpass \r\n\n\n Your request was received. We will call back or send an Email after confirming your documents. \r\r\n\nThank you!! ";
                            $headers = "From: pictpurchasesystem@gmail.com";
                            
                            if (mail($email, $subject, $body, $headers)) {
                                echo "<script>alert('Wow! User Registration Completed, Please check your Email for more details!!');document.location='index.php';</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('Email sending fail!')";
                                echo "<script>document.location='index.php';</script>";
                            }
                            $sql="insert into notification(reg_no,notification,category,gender)values('$reg_no','Students want access to login','Registration','$gender')";
                            $result = mysqli_query($conn, $sql);
                        } else {
                            echo "<script>alert('Woops! Something Wrong Went.')</script>";
                            echo "<script>document.location='index.php';</script>";
                        }
                    } else {
                        echo "<script>alert('You are under 50km range of college so you are not eligible to apply!!!')</script>";
                        echo "<script>document.location='index.php';</script>";
                    }
                } else {
                    echo "<script>alert('Woops! Email Already Exists.')</script>";
                    echo "<script>document.location='index.php';</script>";
                }
            } else {
                echo "<script>alert('Password Not Matched.')</script>";
                echo "<script>document.location='index.php';</script>";
            }
        }
//     }
// }








?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>PICT HOSTEL</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

    <!-- Template Main CSS File -->
    <link href="assets/css/registration.css" rel="stylesheet" />
</head>

<body>
    <!---------Registration form----------->
    <div>
        <div class="signup-form">
            <form action="registration.php" method="post" enctype="multipart/form-data">
                <h4>Student Registration</h4>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="F_name" placeholder="First Name" pattern="[a-zA-Z]+" title="Must contain only alphabets" required />
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" name="L_name" placeholder="Last Name" pattern="[a-zA-Z]+" title="Must contain only alphabets" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="reg_no" placeholder="Registration ID (C2K...)" required />
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile No." maxlength="10" pattern="([0-9]){10}" title="Must have 10 digits" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="Father_name" placeholder="Father's Name" pattern="[a-zA-Z]+" title="Must contain only alphabets" required />
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="Father_no" placeholder="Father's Contact No." maxlength="10" pattern="([0-9]){10}" title="Must have 10 digits" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <!-- <option value="others">Others</option> -->
                            </select>
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select class="form-control" name="Year" id="Year" required>
                                <option value="">Year of Admission</option>
                                <option value="FE">FE</option>
                                <option value="SE">SE</option>
                                <option value="TE">TE</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="Branch" id="Branch" required>
                                <option value="">Select Your Branch</option>
                                <option value="COMP">COMP</option>
                                <option value="IT">IT</option>
                                <option value="ENTC">ENTC</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="Nationality" placeholder="Nationality" required />
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="State" placeholder="State" pattern="[a-zA-Z]+" title="Must contain only alphabets" required />
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="City" placeholder="City" pattern="[a-zA-Z]+" title="Must contain only alphabets" required />
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="pincode" placeholder="Pincode" pattern="([0-9]){6}" title="Must have 6 digits"required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="password" id="id_password" autocomplete="current-password" class="form-control" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                            <p>
                                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px;cursor: pointer;"></i>
                            </p>
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <select name="typedoc" class="form-control">
                                <option value="">Select the document to upload:-</option>
                                <option value="Adhar card">Adhar card</option>
                                <option value="Light bill">Light bill</option>
                                <option value="Pan card">Pan card</option>
                                <option value="Tax recipt">Tax recipt</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="file" class="form-control" name="pdf1" required />
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <div class="row">
                        <div class="col">
                            <h6 style="margin-right:80px;">Upload Fee reciept</h6>
                            <input type="file" class="form-control" name="pdf2" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-success btn-lg btn-block">
                        Register Now
                    </button>

                </div>
                <div class="text-center">
                    <div class="row">
                        <div class="col" id="signup">
                            Already have account? <a href="index.php">Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!--------End of form------------>


    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template registration JS File -->
    <script src="assets/js/registration.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#id_password");
        togglePassword.addEventListener("click", function(e) {
            const type =
                password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("fa-eye-slash");
        });
    </script>

</body>

</html>