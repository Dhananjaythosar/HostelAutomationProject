<?php
include('../../config.php');
session_start();

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "select * from registration where id=" . $id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row1 = mysqli_fetch_assoc($result);
    } else {
        $errorMsg = 'Could not Find Any Record';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        PICT HOSTEL
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <!--Bootstrap for jquary tables-->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" /> -->
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet" />


</head>

<body class="light-edition">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/pict.jpeg">

            <div class="logo"><a href="#" class="simple-text logo-normal">
                    PICT HOSTEL
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="./dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./Registered_Students.php">
                            <i class="material-icons">person</i>
                            <p>Students Verification</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./room_reg.php">
                            <i class="material-icons">store</i>
                            <p>Roomchange Requests</p>
                        </a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link" href="./feestatus.php">
                            <i class="material-icons">bubble_chart</i>
                            <p>Fees Details</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./Allocated.php">
                            <i class="material-icons">store</i>
                            <p>Allocated Rooms</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./refund.php">
                            <i class="material-icons">circle</i>
                            <p>Refund Requests</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">
                            <i class="material-icons">content_paste</i>
                            <p>Students Attendance</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./sleavedetails.php">
                            <i class="material-icons">library_books</i>
                            <p>Leave Details</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:void(0)">Students Profile</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <a class="navbar-brand" href="javascript:void(0)"><strong>Welcome <?php echo $row1['email']; ?></strong></a>
                                <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">

                                    <a class="dropdown-item" href="../../logout.php">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Reqested to access Hostel </h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive dt-responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th><b> Sr. No </b></th>
                                                    <th><b>Register Number</b></th>
                                                    <th><b>Name</b></th>
                                                    <th><b>Mobile Number</b></th>
                                                    <th><b>Email</b></th>
                                                    <th><b>Type of Room</b></th>
                                                    <th><b>Fee Reciept</b></th>
                                                    <th><b>Action</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if ($row1['gender'] == 'male') {

                                                    $sql = "SELECT * from registration WHERE cat_id=3 and gender='male'";
                                                    $result = $conn->query($sql);
                                                    $i = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        if ($row['hostel_fee'] != '') {
                                                            if ($row['feespaid'] == 'No') {

                                                ?>


                                                                <tr>

                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $row['reg_no']; ?></td>
                                                                    <td><?php echo $row['F_name'];
                                                                        echo " ";
                                                                        echo $row['L_name']; ?></td>
                                                                    <td><?php echo $row['mobile_no']; ?></td>
                                                                    <td><?php echo $row['email']; ?></td>
                                                                    <td><?php echo $row['roomtype']; ?></td>

                                                                    <td>
                                                                        <center><?php echo "<a  target='_blank' href=\"pdfshow.php?hid=$row[id]\">View</a>"; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-success"><?php echo "<a style='outline-style: none; color:white;' href=\"feestatus.php?sr_no=$row[id]&regid=$row[reg_no]\" onClick=\"return confirm('Are you sure you want to Accept?')\">Allow</a>"; ?></button>

                                                                    </td>




                                                                </tr>

                                                <?php $i++;
                                                            }
                                                        }
                                                    }
                                                } ?>
                                                <?php
                                                if ($row1['gender'] == 'female') {

                                                    $sql = "SELECT * from registration WHERE cat_id=3 and gender='female'";
                                                    $result = $conn->query($sql);
                                                    $i = 1;

                                                    while ($row = $result->fetch_assoc()) {
                                                        if ($row['hostel_fee'] != '') {
                                                            if ($row['feespaid'] == 'No') {

                                                ?>


                                                                <tr>

                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $row['reg_no']; ?></td>
                                                                    <td><?php echo $row['F_name'];
                                                                        echo " ";
                                                                        echo $row['L_name']; ?></td>
                                                                    <td><?php echo $row['mobile_no']; ?></td>
                                                                    <td><?php echo $row['email']; ?></td>
                                                                    <td><?php echo $row['roomtype']; ?></td>

                                                                    <td>
                                                                        <center><?php echo "<a  target='_blank' href=\"pdfshow.php?hid=$row[id]\">View</a>"; ?></center>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-success"><?php echo "<a style='outline-style: none; color:white;' href=\"feestatus.php?sr_no=$row[id]&regid=$row[reg_no]\" onClick=\"return confirm('Are you sure you want to Accept?')\">Allow</a>"; ?></button>

                                                                    </td>




                                                                </tr>

                                                <?php $i++;
                                                            }
                                                        }
                                                    }
                                                }
                                                if (isset($_GET['sr_no'])) {
                                                    $sr_no = $_GET['sr_no'];
                                                    $sql = "UPDATE registration SET feespaid='Yes' WHERE id=" . $sr_no;
                                                    if ($conn->query($sql)) {
                                                        $sql = "SELECT * FROM registration WHERE id=" . $sr_no;
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = $result->fetch_assoc()) {
                                                            $email = $row['email'];
                                                            $F_name = $row['F_name'];
                                                            $reg_no =$_GET['regid'];
                                                            if ($result) {
                                                                $subject = "Verification Completed!";
                                                                $body = "Hi, $F_name. Your documents are verified!!
                                       \r\r\n\n You can now book ypur hostel through Portal & do update your fees Status. \r\r\n\nThank you!! ";
                                                                $headers = "From: pictpurchasesystem@gmail.com";
                                                                if (mail($email, $subject, $body, $headers)) {
                                                                    echo "<script>alert('Your Record is Successfully Updated !!!!!');document.location='feestatus.php';</script>";
                                                                } else {
                                                                    echo "<script type='text/javascript'>alert('Email sending fail!')";
                                                                    echo "<script>document.location='index.php';</script>";
                                                                }

                                                                $sql = "delete from notification where reg_no ='$reg_no'";
                                                                $result = mysqli_query($conn, $sql);
                                                            }
                                                        }
                                                    } else {
                                                        echo "<script type='text/javascript'>alert('error');document.location='leavedetails.php';</script>";
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Register Number</th>
                                                    <th>Name</th>
                                                    <th>Mobile Number</th>
                                                    <th>Email</th>
                                                    <th>Type of Room</th>
                                                    <th>Fee Reciept</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">ALL FEES DETAILS </h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive dt-responsive">
                                        <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th><b> Sr. No </b></th>
                                                    <th><b>Register Number</b></th>
                                                    <th><b>Name</b></th>
                                                    <th><b>Type of Payment</b></th>
                                                    <th><b>Account Holder's Name</b></th>
                                                    <th><b>Account Holder's Phone Number</b></th>
                                                    <th><b>Account Holder's Email Id</b></th>
                                                    <th><b>Total fees Paid</b></th>
                                                    <th><b>Fee Receipt</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $sql = "SELECT * from fees";
                                                $result = $conn->query($sql);
                                                $i = 1;

                                                while ($row = $result->fetch_assoc()) {


                                                ?>


                                                    <tr>

                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['regid']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td>
                                                            <?php echo $row['typeofpayment']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Accholdername']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Accholderno']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['Accholderemail']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['total']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "<a  target='_blank' href=\"pdfshow.php?ids=$row[id]\">View</a>"; ?>
                                                        </td>



                                                    </tr>

                                                <?php $i++;
                                                }
                                                //     }
                                                // }
                                                ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Register Number</th>
                                                    <th>Name</th>
                                                    <th>Type of Payment</th>
                                                    <th>Account Holder's Name</th>
                                                    <th>Account Holder's Phone Number</th>
                                                    <th>Account Holder's Email Id</th>
                                                    <th>Total fees Paid</th>
                                                    <th>Fee Receipt</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="#">
                                    PICT HOSTEL
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <div class="copyright float-right" id="date">
                        , made with <i class="material-icons">favorite</i> by
                        <a href="#" target="_blank">SuRd</a>
                    </div>
                </div>
            </footer>
            <script>
                const x = new Date().getFullYear();
                let date = document.getElementById('date');
                date.innerHTML = '&copy; ' + x + date.innerHTML;
            </script>




            <!--   Core JS Files   -->
            <script src="../assets/js/core/jquery.min.js"></script>
            <script src="../assets/js/core/popper.min.js"></script>
            <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
            <script src="https://unpkg.com/default-passive-events"></script>
            <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
            <!-- Place this tag in your head or just before your close body tag. -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
            <!--  Google Maps Plugin    -->
            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
            <!-- Chartist JS -->
            <script src="../assets/js/plugins/chartist.min.js"></script>
            <!--  Notifications Plugin    -->
            <script src="../assets/js/plugins/bootstrap-notify.js"></script>
            <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
            <!-- Material Dashboard DEMO methods, don't include it in your project! -->
            <script src="../assets/demo/demo.js"></script>
            <!--Bootstrap for jquary table-->
            <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
            <!--script for jquary table-->
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#example1').DataTable();
                });
            </script>
            <script>
                $(document).ready(function() {
                    $().ready(function() {
                        $sidebar = $('.sidebar');

                        $sidebar_img_container = $sidebar.find('.sidebar-background');

                        $full_page = $('.full-page');

                        $sidebar_responsive = $('body > .navbar-collapse');

                        window_width = $(window).width();

                        $('.fixed-plugin a').click(function(event) {
                            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                            if ($(this).hasClass('switch-trigger')) {
                                if (event.stopPropagation) {
                                    event.stopPropagation();
                                } else if (window.event) {
                                    window.event.cancelBubble = true;
                                }
                            }
                        });

                        $('.fixed-plugin .active-color span').click(function() {
                            $full_page_background = $('.full-page-background');

                            $(this).siblings().removeClass('active');
                            $(this).addClass('active');

                            var new_color = $(this).data('color');

                            if ($sidebar.length != 0) {
                                $sidebar.attr('data-color', new_color);
                            }

                            if ($full_page.length != 0) {
                                $full_page.attr('filter-color', new_color);
                            }

                            if ($sidebar_responsive.length != 0) {
                                $sidebar_responsive.attr('data-color', new_color);
                            }
                        });

                        $('.fixed-plugin .background-color .badge').click(function() {
                            $(this).siblings().removeClass('active');
                            $(this).addClass('active');

                            var new_color = $(this).data('background-color');

                            if ($sidebar.length != 0) {
                                $sidebar.attr('data-background-color', new_color);
                            }
                        });

                        $('.fixed-plugin .img-holder').click(function() {
                            $full_page_background = $('.full-page-background');

                            $(this).parent('li').siblings().removeClass('active');
                            $(this).parent('li').addClass('active');


                            var new_image = $(this).find("img").attr('src');

                            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                                $sidebar_img_container.fadeOut('fast', function() {
                                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                                    $sidebar_img_container.fadeIn('fast');
                                });
                            }

                            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                                $full_page_background.fadeOut('fast', function() {
                                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                                    $full_page_background.fadeIn('fast');
                                });
                            }

                            if ($('.switch-sidebar-image input:checked').length == 0) {
                                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            }

                            if ($sidebar_responsive.length != 0) {
                                $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                            }
                        });

                        $('.switch-sidebar-image input').change(function() {
                            $full_page_background = $('.full-page-background');

                            $input = $(this);

                            if ($input.is(':checked')) {
                                if ($sidebar_img_container.length != 0) {
                                    $sidebar_img_container.fadeIn('fast');
                                    $sidebar.attr('data-image', '#');
                                }

                                if ($full_page_background.length != 0) {
                                    $full_page_background.fadeIn('fast');
                                    $full_page.attr('data-image', '#');
                                }

                                background_image = true;
                            } else {
                                if ($sidebar_img_container.length != 0) {
                                    $sidebar.removeAttr('data-image');
                                    $sidebar_img_container.fadeOut('fast');
                                }

                                if ($full_page_background.length != 0) {
                                    $full_page.removeAttr('data-image', '#');
                                    $full_page_background.fadeOut('fast');
                                }

                                background_image = false;
                            }
                        });

                        $('.switch-sidebar-mini input').change(function() {
                            $body = $('body');

                            $input = $(this);

                            if (md.misc.sidebar_mini_active == true) {
                                $('body').removeClass('sidebar-mini');
                                md.misc.sidebar_mini_active = false;

                                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                            } else {

                                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                                setTimeout(function() {
                                    $('body').addClass('sidebar-mini');

                                    md.misc.sidebar_mini_active = true;
                                }, 300);
                            }

                            // we simulate the window Resize so the charts will get updated in realtime.
                            var simulateWindowResize = setInterval(function() {
                                window.dispatchEvent(new Event('resize'));
                            }, 180);

                            // we stop the simulation of Window Resize after the animations are completed
                            setTimeout(function() {
                                clearInterval(simulateWindowResize);
                            }, 1000);

                        });
                    });
                });
            </script>

</body>

</html>