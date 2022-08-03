<?php
include '../../config.php';
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

</head>

<body class="light-edition">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/pict.jpeg">

            <div class="logo"><a href="#" class="simple-text logo-normal">
                    PICT HOSTEL
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active  ">
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
                    <li class="nav-item ">
                        <a class="nav-link" href="./feestatus.php">
                            <i class="material-icons">bubble_chart</i>
                            <p>Fees Details</p>
                        </a>
                    </li>
                    <li class="nav-item ">
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
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
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

                        <?php
                        if ($row1['gender'] == 'male') {
                            $sql = "select count(*) as total from notification where gender='male'";
                            $result = mysqli_query($conn, $sql);
                            $ans = mysqli_fetch_assoc($result);
                            $sql1 =  "select count(*) as total from notification where  category = 'Registration' and gender='male'";
                            $sql2 =  "select count(*) as total from notification where  category = 'Roomchange' and gender='male'";
                            $sql3 =  "select count(*) as total from notification where  category = 'fee'and gender='male'";
                            $sql4 =  "select count(*) as total from notification where  category = 'Refund'and gender='male'";
                            $sql5 =  "select count(*) as total from notification where  category = 'leave' and gender='male'";
                            $result1 = mysqli_query($conn, $sql1);
                            $result2 = mysqli_query($conn, $sql2);
                            $result3 = mysqli_query($conn, $sql3);
                            $result4 = mysqli_query($conn, $sql4);
                            $result5 = mysqli_query($conn, $sql5);
                            $ans1 = mysqli_fetch_assoc($result1);
                            $ans2 = mysqli_fetch_assoc($result2);
                            $ans3 = mysqli_fetch_assoc($result3);
                            $ans4 = mysqli_fetch_assoc($result4);
                            $ans5 = mysqli_fetch_assoc($result5);
                        } else {
                            $sql = "select count(*) as total from notification where gender='female'";
                            $result = mysqli_query($conn, $sql);
                            $ans = mysqli_fetch_assoc($result);
                            $sql1 =  "select count(*) as total from notification where  category = 'Registration'and gender='female'";
                            $sql2 =  "select count(*) as total from notification where  category = 'Roomchange'and gender='female'";
                            $sql3 =  "select count(*) as total from notification where  category = 'fee'and gender='female'";
                            $sql4 =  "select count(*) as total from notification where  category = 'Refund'and gender='female'";
                            $sql5 =  "select count(*) as total from notification where  category = 'leave'and gender='female'";
                            $result1 = mysqli_query($conn, $sql1);
                            $result2 = mysqli_query($conn, $sql2);
                            $result3 = mysqli_query($conn, $sql3);
                            $result4 = mysqli_query($conn, $sql4);
                            $result5 = mysqli_query($conn, $sql5);
                            $ans1 = mysqli_fetch_assoc($result1);
                            $ans2 = mysqli_fetch_assoc($result2);
                            $ans3 = mysqli_fetch_assoc($result3);
                            $ans4 = mysqli_fetch_assoc($result4);
                            $ans5 = mysqli_fetch_assoc($result5);
                        }
                        ?>

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification"><?php echo $ans['total']; ?></span>
                                    <p class="d-lg-none d-md-block">
                                        Some Actions
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <?php
                                    if ($ans1['total'] > 0) {
                                    ?>
                                        <a class="dropdown-item" href="javascript:void(0)"><?php echo $ans1['total']; ?> Students are waiting for Verification</a>
                                    <?php } ?>

                                    <?php
                                    if ($ans2['total'] > 0) {
                                    ?>
                                        <a class="dropdown-item" href="javascript:void(0)"><?php echo $ans2['total']; ?> Students wants to Roomchange</a>
                                    <?php } ?>

                                    <?php
                                    if ($ans3['total'] > 0) {
                                    ?>
                                        <a class="dropdown-item" href="javascript:void(0)"><?php echo $ans3['total']; ?> Students wants to verify Fee details</a>
                                    <?php } ?>

                                    <?php
                                    if ($ans4['total'] > 0) {
                                    ?>
                                        <a class="dropdown-item" href="javascript:void(0)"><?php echo $ans4['total']; ?> Students are waiting for Refund</a>
                                    <?php } ?>

                                    <?php
                                    if ($ans5['total'] > 0) {
                                    ?>
                                        <a class="dropdown-item" href="javascript:void(0)"><?php echo $ans5['total']; ?> Students are waiting to approve their leave application </a>
                                    <?php } ?>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <!-- <a class="dropdown-item" href="./#">Profile</a> -->
                                    <!-- <div class="dropdown-divider"></div> -->
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
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">person</i>
                                    </div>
                                    <p class="card-category">Profile</p>
                                    <h3 class="card-title">
                                        <small></small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <!--<div class="stats">
                                        <i class="material-icons text-warning">warning</i>
                                        <a href="#pablo" class="warning-link">Get More Space...</a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">store</i>
                                    </div>
                                    <p class="card-category">Rooms</p>
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="card-footer">
                                    <!--<div class="stats">
                                        <i class="material-icons">date_range</i> Last 24 Hours
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">list</i>
                                    </div>
                                    <p class="card-category">Attendance</p>
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="card-footer">
                                    <!-- <div class="stats">
                                        <i class="material-icons">local_offer</i> Tracked from Github
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">menu</i>
                                    </div>
                                    <p class="card-category">Mess Menu</p>
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="card-footer">
                                    <!-- <div class="stats">
                                        <i class="material-icons">local_offer</i> Tracked from Github
                                    </div>-->
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Important Notice</h4>
                                    <!--<p class="card-category">New employees on 15th September, 2016</p>-->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- <div class="card"> -->

                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div class="panel">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped title1">
                                                            <tr style="color:black">
                                                                <td><b>S.N.</b></td>
                                                                <td><b>Notice Title</b></td>
                                                                <td><b>Description</b></td>
                                                                <!-- <td><b>Date</b></td> -->
                                                            </tr>
                                                            <?php

                                                            $sql = "SELECT * from notice";
                                                            $result = $conn->query($sql);

                                                            $i = 1;
                                                            while ($row = $result->fetch_assoc()) {
                                                                //print_r($row) 

                                                            ?>
                                                                <tr>
                                                                    <!-- <td><?php $i; ?></td> -->

                                                                    <td>
                                                                        <?php echo $i; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row['title']; ?>
                                                                    </td>

                                                                    <td>
                                                                        <?php echo $row['description']; ?>
                                                                    </td>
                                                                    <!-- <td>
                                                                        <?php //echo $row['date1']; 
                                                                        ?>
                                                                    </td> -->



                                                                </tr>
                                                            <?php $i++;
                                                            }
                                                            ?>


                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Canteen's Todays Menu</h4>

                                    <!--<p class="card-category">New employees on 15th September, 2016</p>-->
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="panel">
                                            <div class="table-responsive">
                                                <table class="table table-striped title1">
                                                    <tr style="color:black">
                                                        <td><b>S.N.</b></td>
                                                        <td><b>Menu Name</b></td>
                                                        <td><b>Category</b></td>
                                                        <!-- <td><b>Edit/Delete</b></td> -->
                                                    </tr>
                                                    <?php

                                                    $sql = "SELECT * from menu";
                                                    $result = $conn->query($sql);

                                                    $i = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                        //print_r($row) 

                                                    ?>
                                                        <tr>
                                                            <!-- <td><?php $i; ?></td> -->

                                                            <td>
                                                                <?php echo $i; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['menu']; ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row['category']; ?>
                                                            </td>

                                                            <!-- <td>
                                                                <?php echo "<a href=\"edit_request.php?id=$row[id]\">Edit</a> | <a href=\"delete_request.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>"; ?>
                                                            </td> -->
                                                            <!--<td>
                                                <a href="editpass.php?editid=<=$row['id'];?>" class="btn btn-xs btn-primary"><i class="feather icon-edit m-t-10 f-16 " ></i></a>
                                                <a href="viewpass.php?viewid=<=$row['id'];?>" class="btn btn-xs btn-danger"><i class="feather icon-edit m-t-10 f-16 " ></i></a>

                                            </td>-->
                                                        </tr>
                                                    <?php $i++;
                                                    }
                                                    ?>


                                                </table>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>
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
                                <a href="#" target="_blank"> SuRd</a>
                            </div>
                        </div>
                    </footer>
                    <script>
                        const x = new Date().getFullYear();
                        let date = document.getElementById('date');
                        date.innerHTML = '&copy; ' + x + date.innerHTML;
                    </script>
                </div>
            </div>

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
            <script src="../assets/demo/demo.js"></script>
            <script>
                $(document).ready(function() {
                    $().ready(function() {
                        $sidebar = $('.sidebar');

                        $sidebar_img_container = $sidebar.find('.sidebar-background');

                        $full_page = $('.full-page');

                        $sidebar_responsive = $('body > .navbar-collapse');

                        window_width = $(window).width();

                        $('.fixed-plugin a').click(function(event) {

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
            <script>
                $(document).ready(function() {
                    // Javascript method's body can be found in assets/js/demos.js
                    md.initDashboardPageCharts();

                });
            </script>
</body>

</html>