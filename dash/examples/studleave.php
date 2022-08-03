<?php
include '../../config.php';
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "select * from registration where id=" . $id;
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gender = $row['gender'];
    } else {
        $errorMsg = 'Could not Find Any Record';
    }
}
if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $studname = $_POST['studname'];
    $outime = $_POST['outime'];
    $intime = $_POST['intime'];
    $reason = $_POST['reason'];
    $mess = $_POST['mess'];
    $reg_no = $row['reg_no'];
    $chk = "";
    foreach ($mess as $chk1) {
        $chk .= $chk1 . ",";
    }
    
    $count = 0;
    $out_day = date("Y-m-d",strtotime($outime));
    $in_day = date("Y-m-d",strtotime($intime));
    $sql1 = "select * from leave_details where id=" . $id;
    $result1 = mysqli_query($conn, $sql1);
    while ($row = $result1->fetch_assoc()) {
        $out_day1 = date("Y-m-d",strtotime($row['outime']));
        $in_day1 = date("Y-m-d",strtotime($row['intime']));
        if(($out_day >= $out_day1) && ($out_day <= $in_day1) || ($in_day >= $out_day1) && ($in_day <= $in_day1)) {
            $count = $count + 1;
            break;
        }
    }
    // $outime1 = date("Y-m-d H:i:s",strtotime($outime));
    // $disable = "";
    // if($outime < date("Y-m-d H:i:s"))
    // {
    //     $disable = "disabled";   
    // }
    if($count == 0){
        $sql2 = "insert into leave_details(id,reg_no,studname,gender,outime,intime,reason,mess,status) values('$id','$reg_no','$studname','$gender','$outime','$intime','$reason','$chk',1)";
        if ($conn->query($sql2)) {
            echo "<script type='text/javascript'>alert('Leave details inserted !!!');document.location='leavedetails.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('error');document.location='leavedetails.php';</script>";
        }
        $sql="insert into notification(reg_no,notification,category,gender)values('$reg_no','Students are waiting to approve their leave application','leave','$gender')";
        $result = mysqli_query($conn, $sql);
    }else{
        echo "<script type='text/javascript'>alert('You are already on leave');document.location='leavedetails.php';</script>";
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
</head>

<body class="light-edition">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/pict.jpeg">

            <div class="logo"><a href="#" class="simple-text logo-normal">
                    PICT HOSTEL
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item  ">
                        <a class="nav-link" href="./dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./user.php">
                            <i class="material-icons">person</i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">
                            <i class="material-icons">content_paste</i>
                            <p>Attendance</p>
                        </a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link" href="./leavedetails.php">
                            <i class="material-icons">library_books</i>
                            <p>Leave Details</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./fees.php">
                            <i class="material-icons">bubble_chart</i>
                            <p>Fees Status</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="./checkout.php">
                            <i class="material-icons">content_copy</i>
                            <p>Book Hostel </p>
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
                        <a class="navbar-brand" href="javascript:void(0)">Leave Form</a>
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
                                <a class="navbar-brand" href="javascript:void(0)"><strong>Welcome <?php echo $row['F_name'];
                                                                                                    echo " ";
                                                                                                    echo $row['L_name']; ?></strong></a>
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
                                    <!-- <a class="dropdown-item" href="./user.php">Profile</a> -->
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="logout.php">Log out</a>
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
                                    <h4 class="card-title">Fill Leave Details</h4>
                                    <!-- <p class="card-category">Complete your profile</p> -->
                                </div>
                                <div class="card-body">
                                    <form id="main" method="post" action="">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Name of Candidate: </label>
                                                    <input type="text" class="form-control" id="studname" name="studname" value="<?php echo $row['F_name'] . " " . $row['L_name']; ?>" readonly="true">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Date: </label>
                                                    <input type="text" class="form-control" name="date" value="<?php echo date(" d/m/Y "); ?>" readonly="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row"></div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Date and OUT-TIME (24 Hrs format): </label>
                                                    <input type="datetime-local" class="form-control" id="outime" name="outime" value="" onchange="updateCheckBox(this)">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Date and IN-TIME (24 Hrs format):</label>
                                                    <input type="datetime-local" class="form-control" id="intime" name="intime" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row"></div>
                                        <div class="row">
                                            <div class="col-md-auto">
                                                <div class="form-group">
                                                    <label>Reason for leaving:</label>
                                                    <textarea class="form-control" rows="5" cols="30" id="reason" name="reason" value=""></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-auto">
                                                    <input type="checkbox" name="mess[]" value="lunch before leaving" >
                                                    <label>Are you going to take lunch before leaving the hostel</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-auto">
                                                    <input type="checkbox" name="mess[]" value="dinner before leaving" >
                                                    <label>Are you going to take dinner before leaving the hostel</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-auto">
                                                    <input type="checkbox" name="mess[]" value="lunch after arriving">
                                                    <label>Are you going to take lunch after arriving to the hostel</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-auto">
                                                    <input type="checkbox" name="mess[]" value="dinner after arriving">
                                                    <label>Are you going to take dinner after arriving to the hostel</label>
                                                </div>
                                            </div>
                                        </div>

                                
                                        <div class="form-group row">

                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" name="submit" class="btn btn-primary m-b-0">Submit</button>
                                                </div>
                                            </div>

                                    </form>
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
                        <a href="#" target="_blank">SuRd</a>
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
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
        function updateCheckBox(outtime){
            var outtime = outtime.value;
            var chks = document.getElementsByName("mess[]");
            let dateComponents = outtime.split('T');
            let datePieces = dateComponents[0].split("-");
            let timePieces = dateComponents[1].split(":");
            var odate = new Date(datePieces[0] , datePieces[1]-1 , datePieces[2],timePieces[0],timePieces[1],'00');
            var today = new Date();
            if(odate.getTime() > today.getTime()){
                for(var i = 0;i <= chks.length - 1; i++){
                    chks[i].disabled = false;
                }
            }
            else{
                for(var i = 0;i <= chks.length - 1; i++){
                    chks[i].disabled = true;
                }
            }
        }
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