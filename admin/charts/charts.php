<?php
session_start();
require '../connection.php';
$email = $_SESSION['email_ad'];
$password = $_SESSION['password_ad'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM `admin` WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['trang_thai'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: ../reset-code.php');
            }
        } else {
            header('Location: ../user-otp.php');
        }
    }
} else {
    header('Location: ../login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../../content/admin/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../../content/admin/images/favicon.png" type="image/x-icon">
    <title>viho - Premium Admin Template</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="../../css2.css?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="../../css2-1.css?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="../../css2-2.css?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../../content/admin/css/fontawesome.css">
    <script src="https://kit.fontawesome.com/088d757bb6.js" crossorigin="anonymous"></script>
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../../content/admin/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../../content/admin/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../../content/admin/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../../content/admin/css/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../../content/admin/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../../content/admin/css/style.css">
    <link id="color" rel="stylesheet" href="../../content/admin/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../../content/admin/css/responsive.css">
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper">
                        <a href="../index.php"><i class="fa-solid fa-leaf" class="img-fluid"
                                style="font-size: 20px;">Gettree</i>
                    </div>
                    <div class="dark-logo-wrapper">
                        <a href="../index.php"><i class="fa-solid fa-leaf" class="img-fluid"
                                style="font-size: 20px; color:aliceblue;">Gettree</i></a>
                    </div>
                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
                            id="sidebar-toggle"></i></div>
                </div>
                <div class="left-menu-header col">
                    <ul>
                        <li>
                            <form class="form-inline search-form">
                                <div class="search-bg"><i class="fa fa-search"></i>
                                    <input class="form-control-plaintext" placeholder="Search here.....">
                                </div>
                            </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus">
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>
                        <li class="onhover-dropdown">
                            <div class="bookmark-box"><i data-feather="star"></i></div>
                            <div class="bookmark-dropdown onhover-show-div">
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fa fa-search"></i></span>
                                        </div>
                                        <input class="form-control" type="text" placeholder="Search for bookmark...">
                                    </div>
                                </div>
                                <ul class="m-t-5">
                                    <li class="add-to-bookmark"><i class="bookmark-icon"
                                            data-feather="inbox"></i>Email<span class="pull-right"><i
                                                data-feather="star"></i></span></li>
                                    <li class="add-to-bookmark"><i class="bookmark-icon"
                                            data-feather="message-square"></i>Chat<span class="pull-right"><i
                                                data-feather="star"></i></span></li>
                                    <li class="add-to-bookmark"><i class="bookmark-icon"
                                            data-feather="command"></i>Feather Icon<span class="pull-right"><i
                                                data-feather="star"></i></span></li>
                                    <li class="add-to-bookmark"><i class="bookmark-icon"
                                            data-feather="airplay"></i>Widgets<span class="pull-right"><i
                                                data-feather="star"> </i></span></li>
                                </ul>
                            </div>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <p class="f-w-700 mb-0">You have 3 Notifications<span
                                            class="pull-right badge badge-primary badge-pill">4</span></p>
                                </li>
                                <li class="noti-primary">
                                    <div class="media"><span class="notification-bg bg-light-primary"><i
                                                data-feather="activity">
                                            </i></span>
                                        <div class="media-body">
                                            <p>Delivery processing </p><span>10 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="noti-secondary">
                                    <div class="media"><span class="notification-bg bg-light-secondary"><i
                                                data-feather="check-circle">
                                            </i></span>
                                        <div class="media-body">
                                            <p>Order Complete</p><span>1 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="noti-success">
                                    <div class="media"><span class="notification-bg bg-light-success"><i
                                                data-feather="file-text">
                                            </i></span>
                                        <div class="media-body">
                                            <p>Tickets Generated</p><span>3 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="noti-danger">
                                    <div class="media"><span class="notification-bg bg-light-danger"><i
                                                data-feather="user-check">
                                            </i></span>
                                        <div class="media-body">
                                            <p>Delivery Complete</p><span>6 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="mode"><i class="fa fa-moon-o"></i></div>
                        </li>
                        <li class="onhover-dropdown"><i data-feather="message-square"></i>
                            <ul class="chat-dropdown onhover-show-div">
                                <li>
                                    <div class="media"><img class="img-fluid rounded-circle me-3"
                                            src="../../content/admin/images/user/4.jpg" alt="">
                                        <div class="media-body"><span>Ain Chavez</span>
                                            <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                                        </div>
                                        <p class="f-12">32 mins ago</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"><img class="img-fluid rounded-circle me-3"
                                            src="../../content/admin/images/user/1.jpg" alt="">
                                        <div class="media-body"><span>Erica Hughes</span>
                                            <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                                        </div>
                                        <p class="f-12">58 mins ago</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="media"><img class="img-fluid rounded-circle me-3"
                                            src="../../content/admin/images/user/2.jpg" alt="">
                                        <div class="media-body"><span>Kori Thomas</span>
                                            <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                                        </div>
                                        <p class="f-12">1 hr ago</p>
                                    </div>
                                </li>
                                <li class="text-center"> <a class="f-w-700" href="javascript:void(0)">See All </a></li>
                            </ul>
                        </li>
                        <li class="onhover-dropdown p-0">
                            <button class="btn btn-primary-light" type="button"><a href="../logout-user.php"><i
                                        data-feather="log-out"></i>Log out</a></button>
                        </li>
                    </ul>
                </div>
                <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper horizontal-menu">
            <!-- Page Sidebar Start-->
            <header class="main-nav">
                <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i
                            data-feather="settings"></i></a><img class="img-90 rounded-circle"
                        src="../../uploads/<?= $fetch_info['avatar'] ?>" alt="">
                    <div class="badge-bottom"><span class="badge badge-primary">Admin</span></div>
                    <a href="user-profile.html">
                        <h6 class="mt-3 f-14 f-w-600"><?= $fetch_info['ten_ad'] ?></h6>
                    </a>
                    <p class="mb-0 font-roboto">Human Resources Department</p>
                    <ul>
                        <li><span><span class="counter">19.8</span>k</span>
                            <p>Follow</p>
                        </li>
                        <li><span>2 year</span>
                            <p>Experince</p>
                        </li>
                        <li><span><span class="counter">95.2</span>k</span>
                            <p>Follower </p>
                        </li>
                    </ul>
                </div>
                <nav>
                    <div class="main-navbar">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="mainnav">
                            <ul class="nav-menu custom-scrollbar">
                                <li class="back-btn">
                                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Dashboard</h6>
                                    </div>
                                </li>
                                <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                            data-feather="home"></i><span>Category</span></a>
                                    <ul class="nav-submenu menu-content">
                                        <li><a href="../category/index.php">Main Table</a></li>
                                        <li><a href="../category/new.php">Add Category</a></li>
                                        <li><a href="../category/table_sold_out.php">Table sold out</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                            data-feather="database"></i><span>Products</span></a>
                                    <ul class="nav-submenu menu-content">
                                        <li><a href="../product/index.php">Main Table</a></li>
                                        <li><a href="../product/new.php">New Product</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                            data-feather="file-text"></i><span>Bills</span></a>
                                    <ul class="nav-submenu menu-content">
                                        <li><a href="../bills/index.php">Main Table</a></li>
                                        <li><a href="../bills/com_table.php">Completed Table</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                            data-feather="users"></i><span>Users</span></a>
                                    <ul class="nav-submenu menu-content">
                                        <li><a href="../users/index.php">Main Table</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                            data-feather="message-circle"></i><span>Comments</span></a>
                                    <ul class="nav-submenu menu-content">
                                        <li><a href="../comments/index.php">Main Table</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                            data-feather="gift"></i><span>Vouchers</span></a>
                                    <ul class="nav-submenu menu-content">
                                        <li><a href="index.php">Main Table</a></li>
                                        <li><a href="new.php">New voucher</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                            data-feather="bar-chart"></i><span>Charts</span></a>
                                    <ul class="nav-submenu menu-content">
                                        <li><a href="../charts/index.php">Main Table</a></li>
                                        <li><a href="../charts/charts_detail.php">Google Charts</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </div>
                </nav>
            </header>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Google Chart</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item">Charts</li>
                                    <li class="breadcrumb-item active">Google Chart</li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                                <!-- Bookmark Start-->
                                <div class="bookmark">
                                    <ul>
                                        <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                                data-placement="top" title="" data-original-title="Tables"><i
                                                    data-feather="inbox"></i></a></li>
                                        <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                                data-placement="top" title="" data-original-title="Chat"><i
                                                    data-feather="message-square"></i></a></li>
                                        <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                                data-placement="top" title="" data-original-title="Icons"><i
                                                    data-feather="command"></i></a></li>
                                        <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                                data-placement="top" title="" data-original-title="Learning"><i
                                                    data-feather="layers"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="bookmark-search"
                                                    data-feather="star"></i></a>
                                            <form class="form-inline search-form">
                                                <div class="form-group form-control-search">
                                                    <input type="text" placeholder="Search..">
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Bookmark Ends-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pie Chart <span class="digits">1</span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="pie-chart4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Area Chart <span class="digits">1</span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="area-chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Area Chart <span class="digits">2</span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="area-chart2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pie Chart <span class="digits">2</span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="pie-chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pie Chart <span class="digits">3</span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="pie-chart2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Pie Chart <span class="digits">4</span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="pie-chart3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Column Chart <span class="digits">1 </span></h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="chart-overflow" id="column-chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Column Chart <span class="digits">2</span></h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="chart-overflow" id="column-chart2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 box-col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Gantt Chart</h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="chart-overflow" id="gantt_chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 box-col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Line Chart</h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="chart-overflow" id="line-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 box-col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Combo Chart</h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="chart-overflow" id="combo-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 box-col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>bar-chart2</h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div id="bar-chart2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 box-col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>word tree</h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="word-tree" id="wordtree_basic"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2021-22 © viho All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="pull-right mb-0">Hand crafted & made with <i
                                    class="fa fa-heart font-secondary"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="../../content/admin/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="../../content/admin/js/icons/feather-icon/feather.min.js"></script>
    <script src="../../content/admin/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="../../content/admin/js/sidebar-menu.js"></script>
    <script src="../../content/admin/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="../../content/admin/js/bootstrap/popper.min.js"></script>
    <script src="../../content/admin/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="../../content/admin/js/chart/google/google-chart-loader.js"></script>
    <script src="../../content/admin/js/chart/google/google-chart.js"></script>
    <script src="../../content/admin/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../../content/admin/js/script.js"></script>
    <script src="../../content/admin/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
</body>

</html>