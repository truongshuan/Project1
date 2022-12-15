<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// new
// require 'vendor/autoload.php';
// 
require "../PHPMailer/src/SMTP.php";
require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/PHPMailer.php";
$mail = new PHPMailer(true);
require '../dao/pdo.php';
require '../dao/hang-hoa.php';
require '../dao/loai.php';
require '../admin/connection.php';
require 'shopping/func-total.php';
session_start();
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
pdo_get_connection();
// Check Session
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email  = $_SESSION['email'];
    $password = $_SESSION['password'];
    $sql = "SELECT * FROM khach_hang WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $fetch_info = mysqli_fetch_assoc($result);
        $status = $fetch_info['trang_thai'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: form/reset-code.php');
            }
        } else {
            header('Location: form/user-otp.php');
        }
    }
}
if (isset($_GET['payment']) == 'paypal') {
    unset($_SESSION['cart']);
    $code_payment = $_SESSION['bill_code'];
    $email_user = $_SESSION['bill_email'];
    $sql = "SELECT * FROM hoa_don WHERE code_payment = '$code_payment'";
    $result = mysqli_query($con, $sql);
    $item = mysqli_fetch_assoc($result);
    $ma_hd = $item['ma_hd'];
    $update = "UPDATE hoa_don SET trang_thai = 2 WHERE ma_hd = '$ma_hd'";
    $query = mysqli_query($con, $update);
    // Send mail 
    if ($mail) {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $subject = "Email Thank For Payment!";
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 465; // set the SMTP port for the GMAIL server
        $mail->Username = "xuanptpc04031@fpt.edu.vn"; // GMAIL username
        $mail->Password = "Shuan0310.."; // GMAIL password
        $mail->AddAddress($email_user);
        $mail->SetFrom('xuanptpc04031@fpt.edu.vn', 'Admin: Shuandz');
        $mail->Subject = $subject;
        $mail->Body = 'Thank For You Payment Bill'
            . "\n"
            .  'Dear User,'
            . "\n"
            . 'Thank you so much for using Gettree service andd paying for your order by Paypal';
        $mail->addEmbeddedImage('../content/client/img/logo.png', 'logo.png');
        $mail->Send();
    }
    header('location:  product.php');
}
// Navagation
$product = mysqli_query($con, "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai");
$total = mysqli_num_rows($product);
$limit = 4;
$page = ceil($total / $limit);
$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
$start = ($cr_page - 1) * $limit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gettree - Product</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../content/client/img/favicon.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="../content/client/css/product.css">
    <link rel="stylesheet" href="../content/client/css/Grid.css">
    <link rel="stylesheet" href="../content/client/css/fix-header.css">
    <link rel="stylesheet" href="../content/client/css/foodter.css">
    <link rel="stylesheet" href="../content/client/css/mobile.css">
    <!-- Font-icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/088d757bb6.js" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="../content/client/js/onscroll.js"></script>
    <script src="../content/client/js/scrollreveal.min.js"></script>
    <script src="../content/client/js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
    .desc__icons {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        background-color: transparent;
        opacity: 0;
        transition: 0.3s;
    }

    .desc__icon {
        margin: 0px 10px;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #fff;
        background: #348e38;
        cursor: pointer;
        transition: all .3s;
        font-size: 17px;
    }

    .desc__icon:hover {
        background-color: #10412D;
    }

    .product__card:hover .desc__icons {
        opacity: 1;
        transform: translateY(-20px);
    }

    #goTop {
        bottom: 200px;
        cursor: pointer;
        display: none;
        height: 35px;
        position: fixed;
        right: 50px;
        width: 44px;
        z-index: 1000000;
    }

    .bx-chevron-up {
        text-align: center;
        background-color: #348e38;
        border-radius: 50%;
        height: 40px;
        width: 40px;
        color: white;
        font-size: 40px;
    }

    /* @keyframes fade_up {
        0% {
            opacity: 0;
            transform: translateY(50px);
        }

        100% {
            opacity: 1;
            transform: none;
        }
    } */
    .menu_con li {
        margin-left: 0px;
    }

    .about_home>p {
        margin-top: 20px;
    }

    .contact_home2_content {
        margin-top: 20px;
    }

    .form--search {
        position: fixed;
        height: 100vh;
        width: 100%;
        top: 0;
        left: 0;
        display: none;
        z-index: 500;
        background-color: #eee;
        opacity: 0.9;
    }

    .search--content {
        position: relative;
        top: 40%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form--search input[type=text] {
        float: left;
        width: 350px;
        height: 60px;
        padding: 15px;
        font-size: 15px;
        background-color: #fff;
        border: none;
        outline: none;
        color: #000;
    }

    .form--search button {
        float: left;
        width: 80px;
        height: 60px;
        padding: 15px;
        font-size: 20px;
        background-color: #0F4229;
        color: #fff;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .closebtn {
        position: absolute;
        top: 25px;
        right: 50px;
        font-size: 25px;
        font-weight: bold;
        cursor: pointer;
    }

    .btn__filter {
        width: 50px;
        height: 50px;
        font-size: 20px;
        font-weight: bold;
    }

    .filter--form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .select {
        padding: 10px;
        font-weight: normal;
        height: 50px;
        font-size: 14px;
        border: 2px solid #eee;
        margin-right: 5px;
    }
    </style>
</head>

<body>
    <!-- Header -->
    <!-- infor -->
    <section class="infor">
        <div class="infor_left">
            <div class="infor_left_content"><i class='bx bx-check-circle'></i>
                ISO 9001:2015,Certified Landscape Designer</div>
            <div class="infor_left_content"><i class='bx bx-map'></i>
                331 An Khánh, Cần Thơ</div>
            <div class="infor_left_content"> <i class='bx bx-time-five'></i>
                Sun - Friday, 08 am - 05 pm</div>
        </div>
        <div class="infor_right">
            <div>Select Language</div>
            <div><i class='bx bxl-facebook'></i></div>
            <div><i class='bx bxl-twitter'></i></div>
            <div><i class='bx bxl-google'></i></div>
            <div><i class='bx bxl-instagram-alt'></i></div>
        </div>
    </section>
    <!-- header -->
    <section class="header" id="header">
        <div class="logo"><a href="index.php"><img src="../content/client/img/logo.png" alt=""></a></div>
        <div class="menu">
            <div class="menu_ngang">
                <a href="index.php">Home</a>
            </div>
            <div class="menu_ngang">
                <a href="about.php">About Us</i></a>
            </div>
            <div class="menu_ngang">
                <a href="service.php">Services<i class='bx bx-chevron-down'></i></a>
                <ul class="menu_con">
                    <li> <a href="service.php"> Landscaping</a></li>
                    <li> <a href="service.php"> Pruning Plants</a></li>
                    <li> <a href="service.php"> Lawn Maintenance</a></li>
                    <li> <a href="service.php"> Lawn Moving</a></li>
                </ul>
            </div>
            <div class="menu_ngang">
                <a href="product.php">Product</a>
            </div>
            <div class="menu_ngang">
                <a href="blog.php">Blog</a>
            </div>
            <div class="menu_ngang"> <a href="contact.php">Contact</a></div>
        </div>
        <div class="header_icon">
            <a class="openbtn" onclick="openSearch()" style="color: #000; cursor: pointer;">
                <i class='bx bx-search-alt-2'></i>
            </a>
            <a href="shopping/cart.php" style="color: #0F4229; font-weight: bold;">
                <i class='bx bxs-cart item-count'></i>
                <span style="font-size: 18px;"><?= number_format(total_amount($cart)) ?></span>
            </a>
            <div class=" list__user">
                <i class=' bx bx-user-pin'>
                    <ul class="list__user-child">
                        <?php
                        if (isset($_SESSION['email']) && $_SESSION['password']) {
                        ?>
                        <li class="user__child-item" style="list-style: none;"><a class="user__link"
                                style="text-decoration: none;"
                                href="form/login.php"><?php echo $fetch_info['ma_kh']; ?></a>
                        </li>
                        <li class="user__child-item" style="list-style: none;"><a class="user__link"
                                style="text-decoration: none;"
                                href="profile.php?user=<?= $fetch_info['ma_kh']; ?>">Profile</a>
                        </li>
                        <?php
                        } else {
                        ?>
                        <li class="user__child-item" style="list-style: none;"><a class="user__link"
                                style="text-decoration: none;" href="form/login.php">Login</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="user__child-item" style="list-style: none;"><a class="user__link"
                                style="text-decoration: none;" href="form/logout.php">Logout</a>
                        </li>
                    </ul>
                </i>
            </div>
            <a href="service.php">
                <button class="btn_header" style="display: flex; justify-content: center;align-items: center;">GET AQUET
                    <i style="font-size: 20px;" class='bx bx-right-arrow-alt'></i>
                </button></a>
        </div>
    </section>
    <!-- search -->
    <div class="form--search" id="SearchOverlay">
        <div class="search--content">
            <form action="product.php" method="GET">
                <input type="text" placeholder="Type to search..." name="keyword">
                <button type="submit"><i class='bx bx-search-alt-2'></i></button>
            </form>
        </div>
        <span class="closebtn" onclick="closeSearch()" class="" title="close">X</span>
    </div>
    <!-- banner -->
    <section class="banner"
        style="background-image: linear-gradient(rgba(15, 66, 41, 0.95), rgba(15, 66, 41, 0.95)), url(../content/client/img/record.jfif);">
        <div class="banner__content">
            <h1 class="banner__content-tittle">Shop </h1>
            <div class="banner__content-add">
                <a href="index.php" class="banner--link">Home</a>
                <hr>
                <a href="product.php" class="banner--link">Product</a>
            </div>
        </div>
    </section>
    <!-- main-->
    <main class="main">
        <section class="grid wide">
            <div class="row">
                <div class="col l-3">
                    <div class="category">
                        <h1 class="category__tittle">Categories</h1>
                        <ul class="category__list">
                            <?php
                            $list_category = select_loai();
                            foreach ($list_category as $item) :
                            ?>
                            <li class="category__item">
                                <a href="" class="category__link"><?= $item['ten_loai'] ?></a>
                                <span class="category__nums"><?= $item['sl'] ?></span>
                            </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    <div class="featured">
                        <h1 class="featured__tittle">TopViews Product
                        </h1>
                        <div class="featured__list">
                            <?php
                            $top_product = hang_hoa_select_top10();
                            foreach ($top_product as $item) :
                            ?>
                            <a class="featured__card" href="details.php?id_product=<?= $item['ma_hh'] ?>">
                                <img src="../uploads/<?= $item['hinh'] ?>" alt="" class="featured__card-img">
                                <div class="featured__card-infor">
                                    <span class="card--name" style="color: #000;"><?= $item['ten_hh'] ?></span>
                                    <p class="card--price" style="color: #000;"><?= number_format($item['don_gia']) ?>$
                                    </p>
                                </div>
                            </a>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="tags">
                        <h1 class="tags__tittle">Product Tag</h1>
                        <div class="tags__list">
                            <a href="#" class="tag">Shoppe</a>
                            <a href="#" class="tag">ficus</a>
                            <a href="#" class="tag">rubber</a>
                        </div>
                    </div>
                </div>
                <div class="col l-9">
                    <div class="console">
                        <h1 class="show__tittle">Showing 1-9 of 10 results</h1>
                        <form method="POST" action="product.php" class="filter--form">
                            <select name="filter_val" id="" class="select" required>
                                <option value="" class="option" disabled selected>Filter</option>
                                <option value="low" class="option">Sort by price: L to H</option>
                                <option value="high" class="option">Sort by price: H to L</option>
                                <?php
                                $filter_cate = loai_query();
                                foreach ($filter_cate as $result_cate) :
                                ?>
                                <option value="<?= $result_cate['ma_loai'] ?>" class="option">Sort by
                                    <?= $result_cate['ten_loai'] ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                            <button type="submit" class="btn__filter" name="filter"><i
                                    class='bx bx-filter-alt'></i></button>
                        </form>
                    </div>
                    <div class="product__list">
                        <?php
                        if (!empty($_GET['keyword'])) {
                            $key = $_GET['keyword'];
                            $sql = "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE ten_hh LIKE '%$key%' ORDER BY ma_hh ASC LIMIT $start,$limit";
                            $result = mysqli_query($con, $sql);
                            while ($item = mysqli_fetch_assoc($result)) :
                        ?>
                        <div class="product__card card">
                            <div class="content">
                                <img src="../uploads/<?= $item['hinh'] ?>" alt="" class="product--img" width="150px">
                                <span class="product__card-name"><?= $item['ten_hh'] ?></span>
                                <p class="product__card-price"><?= number_format($item['don_gia']) ?>$</p>
                                <div class="desc__icons buttons">
                                    <a href="shopping/cart-ac.php?id=<?= $item['ma_hh'] ?>"
                                        class="desc__icon cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                    <a href="details.php?id_product=<?= $item['ma_hh'] ?>" class="desc__icon"><i
                                            class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            // if (mysqli_fetch_assoc($result) == '') {
                            //     echo '<h1> NO RESULT </h1>';
                            // }
                        } else if (isset($_POST['filter'])) {
                            $filter = $_POST['filter_val'];
                            if ($filter == 'low') {
                                $list_product = hang_hoa_select_price_low($start, $limit);
                                foreach ($list_product as $item) :
                                ?>
                        <div class="product__card card">
                            <div class="content">
                                <img src="../uploads/<?= $item['hinh'] ?>" alt="" class="product--img" width="150px">
                                <span class="product__card-name"><?= $item['ten_hh'] ?></span>
                                <p class="product__card-price"><?= number_format($item['don_gia']) ?>$</p>
                                <div class="desc__icons buttons">
                                    <a href="shopping/cart-ac.php?id=<?= $item['ma_hh'] ?>"
                                        class="desc__icon cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                    <a href="details.php?id_product=<?= $item['ma_hh'] ?>" class="desc__icon"><i
                                            class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                                endforeach;
                            } else if ($filter == 'high') {
                                $list_product = hang_hoa_select_price_high($start, $limit);
                                foreach ($list_product as $item) :
                                ?>
                        <div class="product__card card">
                            <div class="content">
                                <img src="../uploads/<?= $item['hinh'] ?>" alt="" class="product--img" width="150px">
                                <span class="product__card-name"><?= $item['ten_hh'] ?></span>
                                <p class="product__card-price"><?= number_format($item['don_gia']) ?>$</p>
                                <div class="desc__icons buttons">
                                    <a href="shopping/cart-ac.php?id=<?= $item['ma_hh'] ?>"
                                        class="desc__icon cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                    <a href="details.php?id_product=<?= $item['ma_hh'] ?>" class="desc__icon"><i
                                            class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                                endforeach;
                            } else {
                                $list_product = mysqli_query($con, "SELECT * FROM hang_hoa INNER JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE hang_hoa.ma_loai = '$filter' ORDER BY ma_hh DESC LIMIT $start,$limit");
                                while ($item = mysqli_fetch_assoc($list_product)) :
                                ?>
                        <div class="product__card card">
                            <div class="content">
                                <img src="../uploads/<?= $item['hinh'] ?>" alt="" class="product--img" width="150px">
                                <span class="product__card-name"><?= $item['ten_hh'] ?></span>
                                <p class="product__card-price"><?= number_format($item['don_gia']) ?>$</p>
                                <div class="desc__icons buttons">
                                    <a href="shopping/cart-ac.php?id=<?= $item['ma_hh'] ?>"
                                        class="desc__icon cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                    <a href="details.php?id_product=<?= $item['ma_hh'] ?>" class="desc__icon"><i
                                            class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                                endwhile;
                            }
                        } else {
                            $list_product = hang_hoa_select_all($start, $limit);
                            foreach ($list_product as $item) :
                                ?>
                        <div class="product__card card">
                            <div class="content">
                                <img src="../uploads/<?= $item['hinh'] ?>" alt="" class="product--img" width="150px">
                                <span class="product__card-name"><?= $item['ten_hh'] ?></span>
                                <p class="product__card-price"><?= number_format($item['don_gia']) ?>$</p>
                                <div class="desc__icons buttons">
                                    <a href="shopping/cart-ac.php?id=<?= $item['ma_hh'] ?>"
                                        class="desc__icon cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                    <a href="details.php?id_product=<?= $item['ma_hh'] ?>" class="desc__icon"><i
                                            class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        }
                        ?>
                    </div>
                    <div class="page">
                        <ul class="page__navagation">
                            <?php
                            if ($cr_page - 1 > 0) {
                            ?>
                            <li class="page__navagation-item"><a href="product.php?page=<?= $cr_page - 1 ?>"
                                    class="page__navagation-link"><i class='bx bx-chevron-left'></i></a></li>
                            <?php
                            }
                            ?>
                            <?php
                            for ($i = 1; $i <= $page; $i++) :
                            ?>
                            <li class="page__navagation-item"><a href="product.php?page=<?= $i ?>"
                                    class="page__navagation-link"><?= $i ?></a>
                            </li>
                            <?php
                            endfor;
                            ?>
                            <?php
                            if ($cr_page + 1 <= $page) {
                            ?>
                            <li class="page__navagation-item"><a href="product.php?page=<?= $cr_page + 1 ?>"
                                    class="page__navagation-link"><i class='bx bx-chevron-right'></i></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <section class="foodter_img">
        <img src="../content/client/img/foodter.jpg" alt="">
    </section>
    <?php
    require 'page/foodter.php';
    ?>
    <section id="goTop">
        <i title="Lên đầu trang" class='bx bx-chevron-up'></i>
    </section>
    <script>
    let count = 0;
    //if add to cart btn clicked
    $(".cart-btn").on("click", function() {
        let cart = $(".cart-nav");
        // find the img of that card which button is clicked by user
        let imgtodrag = $(this)
            .parent(".buttons")
            .parent(".content")
            .parent(".card")
            .find("img")
            .eq(0);
        if (imgtodrag) {
            // duplicate the img
            var imgclone = imgtodrag
                .clone()
                .offset({
                    top: imgtodrag.offset().top,
                    left: imgtodrag.offset().left
                })
                .css({
                    opacity: "0.8",
                    position: "absolute",
                    height: "150px",
                    width: "150px",
                    "z-index": "100"
                })
                .appendTo($("body"))
                .animate({
                        top: cart.offset().top + 20,
                        left: cart.offset().left + 30,
                        width: 75,
                        height: 75
                    },
                    1000,
                    "easeInOutExpo"
                );

            setTimeout(function() {
                count++;
                $(".cart-nav .item-count").text(count);
            }, 1500);

            imgclone.animate({
                    width: 0,
                    height: 0
                },
                function() {
                    $(this).detach();
                }
            );
        }
    });
    </script>
    <script>
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) $("#goTop").fadeIn();
            else $("#goTop").fadeOut();
        });
        $("#goTop").click(function() {
            $("body,html").animate({
                    scrollTop: 0
                },
                "fast"
            );
        });
    });
    sr.reveal(`.product__list`);
    sr.reveal(`.contact_home`, {
        origin: "top"
    });
    sr.reveal(`.about_home`, {});
    // Preload
    window.onload = function() {
        $("#loader").fadeOut();
        $("body").remove;
    };
    </script>
    <script>
    function openSearch() {
        document.getElementById("SearchOverlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("SearchOverlay").style.display = "none";
    }
    </script>
</body>

</html>