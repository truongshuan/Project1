<?php
session_start();
require '../dao/pdo.php';
require '../admin/connection.php';
pdo_get_connection();
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
require 'shopping/func-total.php';
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gettree - Blogs</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../content/client/img/favicon.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="../content/client/css/blog.css">
    <link rel="stylesheet" href="../content/client/css/Grid.css">
    <link rel="stylesheet" href="../content/client/css/foodter.css">
    <link rel="stylesheet" href="../content/client/css/fix-header.css">
    <!-- Font-icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/088d757bb6.js" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="../content/client/js/onscroll.js"></script>
    <script src="../content/client/js/scrollreveal.min.js"></script>
    <script src="../content/client/js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
</head>

<body>
    <!-- Header -->
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
            <div class="list__user">
                <i class='bx bx-user-pin'>
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
    <!-- banner -->
    <section class="banner"
        style="background-image: linear-gradient(rgba(15, 66, 41, 0.95), rgba(15, 100, 41, 0.95)), url(../content/client/img/blog1.jpg);">
        <div class="banner__content">
            <h1 class="banner__content-tittle">News </h1>
            <div class="banner__content-add">
                <a href="index.php" class="banner--link">Home</a>
                <hr>
                <a href="blog.php" class="banner--link">News</a>
            </div>
        </div>
    </section>
    <!-- Content -->
    <main class="main grid wide" id="main">
        <div class="row content">
            <div class="col l-8 news">
                <div class="new">
                    <div class="new__img" style="background: url(../content/client/img/blog1.jpg);">
                        <!-- <img src="" alt="" class="new__img-de"> -->
                        <div class="new__time">
                            <i class='bx bx-calendar new__time-icon'></i>
                            <p class="new__time-date">May 18, 2022</p>
                        </div>
                    </div>
                    <div class="new__content">
                        <div class="new__infors">
                            <div class="new__infor">
                                <i class='bx bx-user new__infor-icon'></i>
                                <p class="new__infor-desc">By Admin</p>
                            </div>
                            <div class="new__infor">
                                <i class='bx bx-folder-open new__infor-icon'></i>
                                <p class="new__infor-desc">Dolor Porin</p>
                            </div>
                            <div class="new__infor">
                                <i class='bx bx-chat new__infor-icon'></i>
                                <p class="new__infor-desc">No comment</p>
                            </div>
                        </div>
                        <h2 class="new__tittle">16 garden design ideas to make the best of your</h2>
                        <p class="new__desc">These garden design ideas are key to creating a scheme you'll love for
                            years to come. Whether you're looking for garden landscaping ideas to overhaul your outdoor
                            space – however big or small – attract more wildlife, or be more
                            sustainable, we've compiled some fabulous garden ideas to help you transform your back
                            garden – and it'll even help to boost your property value […]</p>
                        <div class="new__links">
                            <a href="" class="new__link">Read More</a>
                            <i class="fa-solid fa-arrow-right new__links-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="new">
                    <div class="new__img" style="background: url(../content/client/img/blog2.jpg);">
                        <div class="new__time">
                            <i class='bx bx-calendar new__time-icon'></i>
                            <p class="new__time-date">APR 14, 2021</p>
                        </div>
                    </div>
                    <div class="new__content">
                        <div class="new__infors">
                            <div class="new__infor">
                                <i class='bx bx-user new__infor-icon'></i>
                                <p class="new__infor-desc">By Admin</p>
                            </div>
                            <div class="new__infor">
                                <i class='bx bx-folder-open new__infor-icon'></i>
                                <p class="new__infor-desc">Dolor Porin</p>
                            </div>
                            <div class="new__infor">
                                <i class='bx bx-chat new__infor-icon'></i>
                                <p class="new__infor-desc">No comment</p>
                            </div>
                        </div>
                        <h2 class="new__tittle">How to grow and arrange your own wedding</h2>
                        <p class="new__desc">These garden design ideas are key to creating a scheme you'll love for
                            years to come. Whether you're looking for garden landscaping ideas to overhaul your outdoor
                            space – however big or small – attract more wildlife, or be more
                            sustainable, we've compiled some fabulous garden ideas to help you transform your back
                            garden – and it'll even help to boost your property value […]</p>
                        <div class="new__links">
                            <a href="" class="new__link">Read More</a>
                            <i class="fa-solid fa-arrow-right new__links-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="new">
                    <div class="new__img" style="background: url(../content/client/img/blog4.jpg);">
                        <!-- <img src="" alt="" class="new__img-de"> -->
                        <div class="new__time">
                            <i class='bx bx-calendar new__time-icon'></i>
                            <p class="new__time-date">APR 14, 2021
                            </p>
                        </div>
                    </div>
                    <div class="new__content">
                        <div class="new__infors">
                            <div class="new__infor">
                                <i class='bx bx-user new__infor-icon'></i>
                                <p class="new__infor-desc">By Admin</p>
                            </div>
                            <div class="new__infor">
                                <i class='bx bx-folder-open new__infor-icon'></i>
                                <p class="new__infor-desc">Dolor Porin</p>
                            </div>
                            <div class="new__infor">
                                <i class='bx bx-chat new__infor-icon'></i>
                                <p class="new__infor-desc">No comment</p>
                            </div>
                        </div>
                        <h2 class="new__tittle">The top 5 garden renovation trends this</h2>
                        <p class="new__desc">These garden design ideas are key to creating a scheme you'll love for
                            years to come. Whether you're looking for garden landscaping ideas to overhaul your outdoor
                            space – however big or small – attract more wildlife, or be more
                            sustainable, we've compiled some fabulous garden ideas to help you transform your back
                            garden – and it'll even help to boost your property value […]</p>
                        <div class="new__links">
                            <a href="" class="new__link">Read More</a>
                            <i class="fa-solid fa-arrow-right new__links-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="page">
                    <ul class="page__links">
                        <li class="page__item">
                            <a href="" class="page__link">1</a>
                        </li>
                        <li class="page__item">
                            <a href="" class="page__link">2</a>
                        </li>
                        <li class="page__item">
                            <a href="" class="page__link">3</a>
                        </li>
                        <li class="page__item">
                            <a href="" class="page__link"><i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col l-4 tools">
                <div class="search">
                    <h2 class="sreach__tittle">Search</h2>
                    <form action="" class="search__form">
                        <input type="text" placeholder="Search here" class="search__form-group">
                        <button type="submit" class="search__form-btn"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="category">
                    <h2 class="category__tittle">Category</h2>
                    <div class="category__lists">
                        <div class="category__item">
                            <a href="" class="category__name">Dolor proin</a>
                            <i class="fa-solid fa-caret-right"></i>
                        </div>
                        <div class="category__item">
                            <a href="" class="category__name">Dolor proin</a>
                            <i class="fa-solid fa-caret-right"></i>
                        </div>
                        <div class="category__item">
                            <a href="" class="category__name">Dolor proin</a>
                            <i class="fa-solid fa-caret-right"></i>
                        </div>
                        <div class="category__item">
                            <a href="" class="category__name">Dolor proin</a>
                            <i class="fa-solid fa-caret-right"></i>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card__img">
                        <img src="../content/client/img/blog3.png" alt="" class="card__img-de">
                    </div>
                    <div class="card__contacts">
                        <div class="card__num">
                            <div class="card__num-phone">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="card__num-desc">
                                <p>Call us</p>
                                <span style="font-weight: bold; font-size: 16px;">0961518977</span>
                            </div>
                        </div>
                        <div class="card__email">
                            <div class="card__email-phone">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="card__email-desc">
                                <p>Our email</p>
                                <span style="font-weight: bold; font-size: 16px;">xuanptpc04031</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </script>

</body>

</html>