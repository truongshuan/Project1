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
                                            data-feather="edit-2"></i><span>Blogs</span></a>
                                    <ul class="nav-submenu menu-content">
                                        <li><a href="../blog/index.php">Table</a></li>
                                        <li><a href="../blog/new.php">New Blog</a></li>
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
                <?php
                $sql_chart = "SELECT `loai` .* , COUNT(hang_hoa.ma_loai) AS 'quality' FROM `hang_hoa`INNER JOIN `loai` ON
                                hang_hoa.ma_loai = loai.ma_loai GROUP BY hang_hoa.ma_loai";
                $result = mysqli_query($con, $sql_chart);
                $data = [];
                while ($row = mysqli_fetch_array($result)) {
                    $data[] = $row;
                }
                $sql_chart_max_price = "SELECT don_gia,ten_hh,ngay_nhap FROM hang_hoa ORDER BY don_gia,ten_hh,ngay_nhap DESC";
                $result_max = mysqli_query($con, $sql_chart_max_price);
                $data_line = [];
                while ($row_line = mysqli_fetch_array($result_max)) {
                    $data_line[] = $row_line;
                }
                $comment = "SELECT hang_hoa .* , COUNT(binh_luan.ma_hh) AS 'quality' FROM `hang_hoa`INNER JOIN `binh_luan` ON hang_hoa.ma_hh = binh_luan.ma_hh GROUP BY binh_luan.ma_hh";
                $result = mysqli_query($con, $comment);
                $data_cmt = [];
                while ($cmt = mysqli_fetch_array($result)) {
                    $data_cmt[] = $cmt;
                }
                $sale = "SELECT ma_hd,tong_tien FROM `hoa_don` ORDER BY tong_tien ASC";
                $result = mysqli_query($con, $sale);
                $data_sale = [];
                while ($salee = mysqli_fetch_array($result)) {
                    $data_sale[] = $salee;
                }
                $top_view = "SELECT * FROM `hang_hoa` ORDER BY luot_xem ASC";
                $result = mysqli_query($con, $top_view);
                $data_view = [];
                while ($views = mysqli_fetch_array($result)) {
                    $data_view[] = $views;
                }
                $today = "SELECT DATE_FORMAT(ngay_dat,'%Y-%m-%d') AS `day`, COUNT(*) AS cnt,SUM(tong_tien) as tt FROM hoa_don GROUP BY DATE_FORMAT(ngay_dat,'%Y-%m-%d') ORDER BY `day`";
                $result = mysqli_query($con, $today);
                $data_today = [];
                while ($total_sale = mysqli_fetch_array($result)) {
                    $data_today[] = $total_sale;
                }
                $reply = "SELECT binh_luan .* , COUNT(phan_hoi.ma_bl) AS 'quality' FROM phan_hoi INNER JOIN binh_luan ON binh_luan.ma_bl = phan_hoi.ma_bl GROUP BY phan_hoi.ma_bl;
                ";
                $result = mysqli_query($con, $reply);
                $data_reply = [];
                while ($total_reply = mysqli_fetch_array($result)) {
                    $data_reply[] = $total_reply;
                }
                $bill = mysqli_query($con, "SELECT DATE_FORMAT(ngay_dat,'%Y-%m-%d') AS `day`, COUNT(*) AS cnt FROM hoa_don GROUP BY DATE_FORMAT(ngay_dat,'%Y-%m-%d') ORDER BY `day`");
                $data_bill = [];
                while ($bills = mysqli_fetch_assoc($bill)) {
                    $data_bill[] = $bills;
                }
                ?>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart", "bar"]
                });
                google.charts.load("current", {
                    packages: ["line"]
                });
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawBasic);

                function drawBasic() {
                    if ($("#pie-chart2").length > 0) {
                        var data = google.visualization.arrayToDataTable([
                            ['ten_loai', 'quality'],
                            <?php
                                foreach ($data as $item) {
                                    echo "['" . $item['ten_loai'] . "' , " . $item['quality'] . "],";
                                }
                                ?>
                        ]);
                        var options = {
                            title: "My Daily Activities",
                            is3D: true,
                            width: "100%",
                            height: 300,
                            colors: [
                                vihoAdminConfig.primary,
                                vihoAdminConfig.secondary,
                                "#e2c636",
                                "#222222",
                                "#717171"
                            ]
                        };
                        var chart = new google.visualization.PieChart(
                            document.getElementById("pie-chart2")
                        );
                        chart.draw(data, options);
                    }
                    if ($("#area-chart1").length > 0) {
                        var data = google.visualization.arrayToDataTable([
                            ['ten_hh', 'don_gia', 'ngay_nhap'],
                            <?php
                                foreach ($data_line as $arr_price) {
                                    echo "['" . $arr_price['ten_hh'] . "' , " . $arr_price['don_gia'] . "," . $arr_price['ngay_nhap'] . " ],";
                                }
                                ?>
                        ]);
                        var options = {
                            title: "Price Product",
                            hAxis: {
                                title: "Year",
                                titleTextStyle: {
                                    color: "#333"
                                }
                            },
                            vAxis: {
                                minValue: 0
                            },
                            width: "100%",
                            height: 400,
                            colors: [vihoAdminConfig.primary, vihoAdminConfig.secondary]
                        };
                        var chart = new google.visualization.AreaChart(
                            document.getElementById("area-chart1")
                        );
                        chart.draw(data, options);
                    }
                    if ($("#pie-chart3").length > 0) {
                        var data = google.visualization.arrayToDataTable([
                            ['ten_loai', 'quality'],
                            <?php
                                foreach ($data_cmt as $items) {
                                    echo "['" . $items['ten_hh'] . "' , " . $items['quality'] . "],";
                                }
                                ?>
                        ]);
                        var options = {
                            title: "Total Comment Product",
                            pieHole: 0.4,
                            width: "100%",
                            height: 300,
                            colors: [
                                vihoAdminConfig.secondary,
                                vihoAdminConfig.primary,
                                "#222222",
                                "#717171",
                                "#e2c636"
                            ]
                        };
                        var chart = new google.visualization.PieChart(
                            document.getElementById("pie-chart3")
                        );
                        chart.draw(data, options);
                    }
                    if ($("#column-chart1").length > 0) {
                        var a = google.visualization.arrayToDataTable([
                                ['Id Bill', 'Total'],
                                <?php
                                    foreach ($data_sale as $x) {
                                        echo "['" . $x['ma_hd'] . "' , '" . $x['tong_tien'] . "$'],";
                                    }
                                    ?>
                            ]),
                            b = {
                                chart: {
                                    title: "Top Sale",
                                    subtitle: "Bill Sales"
                                },
                                bars: "vertical",
                                vAxis: {
                                    format: "decimal"
                                },
                                height: 400,
                                width: "100%",
                                colors: [vihoAdminConfig.primary, vihoAdminConfig.primary, "#e2c636"]
                            },
                            c = new google.charts.Bar(document.getElementById("column-chart1"));
                        c.draw(a, google.charts.Bar.convertOptions(b));
                    }
                    if ($("#column-chart2").length > 0) {
                        var a = google.visualization.arrayToDataTable([
                                ['Name', 'View'],
                                <?php
                                    foreach ($data_view as $y) {
                                        echo "['" . $y['ten_hh'] . "' , '" . $y['luot_xem'] . "'],";
                                    }
                                    ?>
                            ]),
                            b = {
                                chart: {
                                    title: "Top View",
                                    subtitle: "Product views"
                                },
                                bars: "horizontal",
                                vAxis: {
                                    format: "decimal"
                                },
                                height: 400,
                                width: "100%",
                                colors: [vihoAdminConfig.primary, vihoAdminConfig.primary, "#e2c636"]
                            },
                            c = new google.charts.Bar(document.getElementById("column-chart2"));
                        c.draw(a, google.charts.Bar.convertOptions(b));
                    }
                    if ($("#column-chart3").length > 0) {
                        var a = google.visualization.arrayToDataTable([
                                ['Date', 'Total Sale'],
                                <?php
                                    foreach ($data_today as $cc) {
                                        echo "['" . $cc['day'] . "' , '" . $cc['tt'] . "$'],";
                                    }
                                    ?>
                            ]),
                            b = {
                                chart: {
                                    title: "Top Sale",
                                    subtitle: "Bill Sales"
                                },
                                bars: "vertical",
                                vAxis: {
                                    format: "decimal"
                                },
                                height: 400,
                                width: "100%",
                                colors: [vihoAdminConfig.primary, vihoAdminConfig.primary, "#e23636"]
                            },
                            c = new google.charts.Bar(document.getElementById("column-chart3"));
                        c.draw(a, google.charts.Bar.convertOptions(b));
                    }
                    if ($("#pie-chart1").length > 0) {
                        var data = google.visualization.arrayToDataTable([
                            ['ID', 'Quality'],
                            <?php
                                foreach ($data_reply as $rep) {
                                    echo "['" . $rep['ma_bl'] . "' , '" . $rep['quality'] . "'],";
                                }
                                ?>
                        ]);
                        var options = {
                            title: "Count reply comment",
                            width: "100%",
                            height: 300,
                            colors: [
                                // vihoAdminConfig.primary,
                                vihoAdminConfig.primary,
                                "#e2c636",
                                "#222222",
                                "#717171"
                            ]
                        };
                        var chart = new google.visualization.PieChart(
                            document.getElementById("pie-chart1")
                        );
                        chart.draw(data, options);
                    }

                    if ($("#column-chart4").length > 0) {
                        var a = google.visualization.arrayToDataTable([
                                ['Count Bill', 'Date'],
                                <?php
                                    foreach ($data_bill as $show_bill) {
                                        echo "['" . $show_bill['day'] . "' , '" . $show_bill['cnt'] . "'],";
                                    }
                                    ?>
                            ]),
                            b = {
                                chart: {
                                    title: "Bill Day",
                                    subtitle: "a"
                                },
                                bars: "horizontal",
                                vAxis: {
                                    format: "decimal"
                                },
                                height: 400,
                                width: "100%",
                                colors: [vihoAdminConfig.primary, vihoAdminConfig.primary, "#e2c636"]
                            },
                            c = new google.charts.Bar(document.getElementById("column-chart4"));
                        c.draw(a, google.charts.Bar.convertOptions(b));
                    }

                }
                </script>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Price Product<span class="digits"></span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="area-chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Reply Comment <span class="digits"></span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="pie-chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Product & Category<span class="digits"></span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="pie-chart2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-4 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Comment <span class="digits"></span></h5>
                                </div>
                                <div class="card-body p-0 chart-block">
                                    <div class="chart-overflow" id="pie-chart3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Total Sales Bill<span class="digits"> </span></h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="chart-overflow" id="column-chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Top View Chart<span class="digits"></span></h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="chart-overflow" id="column-chart2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Total Sales Day <span class="digits"> </span></h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="chart-overflow" id="column-chart3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-6 box-col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Bill Chart<span class="digits"></span></h5>
                                </div>
                                <div class="card-body chart-block">
                                    <div class="chart-overflow" id="column-chart4"></div>
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