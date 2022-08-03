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
                    <li class="nav-item active">
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
                                    <h4 class="card-title">Refund Request</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive dt-responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th><b>Sr No.</b></th>
                                                    <th><b>Year</b></th>
                                                    <th><b>Room No</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Details</b></th>
                                                    <th><b>Registration Id</b></th>
                                                    <th><b>Occupied By</b></th>
                                                    <th><b>City</b></th>

                                                    <th><b>Action</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if ($row1['gender'] == 'male') {

                                                    $sql = "SELECT * FROM mainbook WHERE cancle='Yes' and gender='male'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $i = 1;
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                ?>


                                                            <tr>
                                                                <td>
                                                                    <?php echo $i; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['year']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['room']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['status']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['details']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['regid']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['city']; ?>
                                                                </td>

                                                                <td>
                                                                    <button type="button" name="submit" class="btn btn-success"><?php echo "<a style='outline-style: none; color:white;' href=\"refund.php?room_no=$row[room]&regid=$row[regid]\" onClick=\"return confirm('Are you sure you want to Refund?')\">Refund</a>"; ?></button>

                                                                </td>

                                                            </tr>

                                                <?php $i++;
                                                        }
                                                    }
                                                } ?>


                                                <?php
                                                if ($row1['gender'] == 'female') {

                                                    $sql = "SELECT * FROM mainbook WHERE cancle='Yes' and gender='female'";
                                                    $result = mysqli_query($conn, $sql);
                                                    $i = 1;
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                ?>


                                                            <tr>
                                                                <td>
                                                                    <?php echo $i; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['year']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['room']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['status']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['details']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['regid']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['name']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row['city']; ?>
                                                                </td>

                                                                <td>
                                                                    <button type="button" name="submit" class="btn btn-success"><?php echo "<a style='outline-style: none; color:white;' href=\"refund.php?room_no=$row[room]&regid=$row[regid]\" onClick=\"return confirm('Are you sure you want to Refund?')\">Refund</a>"; ?></button>

                                                                </td>

                                                            </tr>

                                                <?php $i++;
                                                        }
                                                    }
                                                }
                                                if (isset($_GET['room_no'])) {
                                                    $room = $_GET['room_no'];
                                                    $reg_no=$_GET['regid'];
                                                    $sql = "UPDATE mainbook SET ref_id=0, regid ='',name ='',city='',status='Available',cancle='No' WHERE room='$room'";
                                                    if ($conn->query($sql)) {
                                                        echo "<script type='text/javascript'>alert('Data is added !!!');document.location='refund.php';</script>";
                                                        $sql="delete from notification where reg_no ='$reg_no'";
                                                        $result = mysqli_query($conn, $sql);
                                                    } else {
                                                        echo "error";
                                                    }
                                                } 
                                                ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Year</th>
                                                    <th>Room No</th>
                                                    <th>Status</th>
                                                    <th>Details</th>
                                                    <th>Registration Id</th>
                                                    <th>Occupied By</th>
                                                    <th>City</th>

                                                    <th>Action</th>

                                                </tr>
                                            </tfoot>
                                        </table>
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