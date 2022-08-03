<?php

include 'config.php';

if (isset($_POST['submit'])) {

    $otp = $_POST['otp'];
    $newpass = md5($_POST['New_password']);
    $cpass = md5($_POST['confirm_password']);
    $sql = "SELECT * FROM registration WHERE token='$otp'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {

        if ($newpass == $cpass) {

            $sql1 = "UPDATE registration SET pass='$newpass' WHERE token='$otp'";
            $result1 = mysqli_query($conn, $sql1);
            if ($result1) {
                $token = "";

                for ($i = 1; $i <= 6; $i++) {
                    $token .= substr("1357902468", (rand() % (strlen("1357902468"))), 1);
                }
                $sql2 = "UPDATE registration SET token='$token' WHERE pass='$newpass'";
                $result2 = mysqli_query($conn, $sql2);

                //header('location:login.php');
                echo "<script type='text/javascript'>alert('Wow! Your Password has been Updated!');document.location='index.php';</script>";
            } else {
                //echo "<script>alert('Oops! Something Wrong Went. Please try again')</script>";
                echo "<script type='text/javascript'>alert('Oops! Something Wrong Went. Please try again');document.location='reset.php';</script>";
                //header('location:reset.php');
            }
        } else {
            echo "<script>alert('Password Not Matched.')</script>";
        }
    } else {
        echo "<script>alert('OTP is wrong!!!')</script>";
    }
}


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
        <link href="assets/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div>
                <img src="assets/img/Pict_logo.png" alt="" />
            </div>
            <div class="container">
                <div class="
            header-container
            d-flex
            align-items-center
            justify-content-between
          ">
                    <div class="logo">
                        <h1 class="text-light">
                        <a href="index.php"><span>PICT HOSTEL</span></a>
                    </h1>
                    </div>

                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                            <li><a class="nav-link scrollto" href="#about">About</a></li>
                            <li>
                                <a class="nav-link scrollto" href="#services">Services</a>
                            </li>

                            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                            <li>
                                <a class="getstarted scrollto" id="button"><i class="fas fa-user"></i>LOGIN</a>

                            </li>

                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav>
                    <!-- .navbar -->
                </div>
                <!-- End Header Container -->
            </div>
        </header>
        <!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
            <!-- <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <h1>Welcome to PICT Hostel Portal</h1>
            <a href="#about" class="btn-get-started scrollto">MORE INFO</a>
        </div> -->
            <div id="reset" class="signup-form">
                <!-- <img src="assets/img/cross.png" alt="Close" class="close3" /> -->
                <form action="reset.php" method="POST">
                    <h2 style="color:black;">Reset Password</h2>
                    <!-- <p class="hint-text">Please enter your new Password</p> -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="otp" placeholder="Enter the OTP" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" id="id_password" autocomplete="current-password" class="form-control" name="New_password" placeholder="New password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required">
                        <p> <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="required">
                    </div>

                    <script>
                        const togglePassword = document.querySelector('#togglePassword');
                        const password = document.querySelector('#id_password');
                        togglePassword.addEventListener('click', function (e) {
                            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                            password.setAttribute('type', type);
                            this.classList.toggle('fa-eye-slash');
                        });
                    </script>

                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-success btn-lg btn-block">Update Password</button>
                    </div>

                </form>
            </div>
            </div>

        </section>
        <!-- End Hero -->

        <main id="main">
            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="row content">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <h2>PUNE INSTITUTE OF COMPUTER TECHNOLOGY</h2>
                            <h3>Awesome Institute For Technical Studies</h3>
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
                            <p>
                                Pune Institute Of Computer Technology(PICT),which is rightly known as "The Oxford Of The East" playing an inspiring role in the education sector.PICT believes in value-based quality education in the field of Information and Communication Technology(ICT) and we are constantly endeavouring to achieve higher levels of technical excellence by offering UG Programs in Computer Engineering,Electronics & Telecommunication Engineering and Information Technology. PICT is home to many hostelers.
                            </p>
                            <ul>
                                <li><i class="ri-check-double-line"></i> Quality Education</li>
                                <li><i class="ri-check-double-line"></i> Experience Staff</li>
                                <li><i class="ri-check-double-line"></i> Best Placements</li>
                                <li><i class="ri-check-double-line"></i> Library</li>
                                <li>
                                    <i class="ri-check-double-line"></i> Specialized Laboratories
                                </li>
                                <li><i class="ri-check-double-line"></i> Various Clubs</li>
                                <li><i class="ri-check-double-line"></i> Hostel</li>
                            </ul>
                            <p class="fst-italic">
                                To be the leading and the most sought after institute of education and research in emerging engineering and technology disciplines that attract,retains and sustains gifted individuals of significant potential.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Section -->

            <!-- ======= Counts Section ======= -->
            <section id="counts" class="counts">
                <div class="container">
                    <div class="row counters">
                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="348" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hostelers</p>
                        </div>

                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="3406" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Day Scholars</p>
                        </div>

                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="220" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Staff</p>
                        </div>

                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="201" data-purecounter-end="250" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Rank Band</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Counts Section -->

            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
                <div class="container">
                    <div class="section-title" data-aos="zoom-out">
                        <h2>Services</h2>
                        <p>
                            If a student is willing to admit themselves for Hostel Accommodation then for both Girls and Boys hostel facility is provided considering the facts that it is totally SAFE for both since it is located within the college campus followed by strict rules and regulations,provided with safe and secure facilities such as seperate medical facilities and other daily general facilities.
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="icon-box" data-aos="zoom-in-left">
                                <div class="icon">
                                    <i class="bi bi-bucket" style="color: #ff689b"></i>
                                </div>
                                <h4 class="title"><a href="">Mess</a></h4>
                                <p class="description">
                                    The Mess Facility is there for both Girls and Boys....
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                                <div class="icon">
                                    <i class="bi bi-columns-gap" style="color: #e9bf06"></i>
                                </div>
                                <h4 class="title"><a href="">Play Grounds</a></h4>
                                <p class="description">
                                    The Play Ground is there for both Girls and Boys.......
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                                <div class="icon">
                                    <i class="bi bi-google" style="color: #3fcdc7"></i>
                                </div>
                                <h4 class="title"><a href="">Internet</a></h4>
                                <p class="description">
                                    The Internet Facility is there for both Girls and Boys
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
                                <div class="icon">
                                    <i class="bi bi-lightbulb" style="color: #41cf2e"></i>
                                </div>
                                <h4 class="title"><a href="">Electricity</a></h4>

                                <p class="description">
                                    The Electricity Facility is there for both Girls and Boys
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
                                <div class="icon">
                                    <i class="bi bi-droplet-fill" style="color: #d6ff22"></i>
                                </div>
                                <h4 class="title"><a href="">Water</a></h4>

                                <p class="description">
                                    The Water Facility is there for both Girls and Boys...
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
                                <div class="icon">
                                    <i class="bi bi-eyedropper" style="color: #4680ff"></i>
                                </div>
                                <h4 class="title"><a href="">Medical Checkup</a></h4>

                                <p class="description">
                                    The Medical Checkup is there for both Girls and Boys
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Services Section -->

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container">
                    <div class="section-title" data-aos="zoom-out">
                        <h2>Contact</h2>
                        <p>Contact Us</p>
                    </div>

                    <div class="row mt-5">
                        <div class="col-lg-4" data-aos="fade-right">
                            <div class="info">
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>
                                        Survey No.27, Near Trimurti Chowk Dhankwadi, Pune-411043
                                    </p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>registrar@pict.edu</p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>+91 20 24371101</p>
                                    <p>+91 20 24364741</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required />
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" rows="3" placeholder="Message" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">
                                        Your message has been sent. Thank you!
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact Section -->
        </main>
        <!-- End #main -->

        <!-- ======= Footer ======= -->

        <footer id="footer">
            <div class="container">
                <h3>PICT HOSTEL</h3>
                <p>PICT is home for many hostelers.</p>
                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
                <div class="copyright">
                    &copy; Copyright <strong><span>PICT HOSTEL</span></strong>. All Rights Reserved
                </div>
            </div>
        </footer>
        <!--End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
    </body>

    </html>