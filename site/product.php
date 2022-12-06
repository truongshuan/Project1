<?php
require '../dao/pdo.php';
require '../dao/hang-hoa.php';
require '../dao/loai.php';
require '../admin/connection.php';
pdo_get_connection();
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
    <link rel="stylesheet" href="../content/client/css/header.css">
    <link rel="stylesheet" href="../content/client/css/foodter.css">
    <!-- Font-icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/088d757bb6.js" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="../content/client/js/onscroll.js"></script>
    <script src="../content/client/js/scrollreveal.min.js"></script>
    <script src="../content/client/js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
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

    .nav__list-child {
        z-index: 100000;
        padding-top: 43px;
        display: none;
        width: 100px;
        height: 112px;
        clip-path: polygon(15% 25%, 22% 36%, 100% 36%, 100% 100%, 0 100%, 0 36%, 12% 36%);
        background-color: gainsboro;
        position: absolute;
        line-height: 30px;
        margin: 0;
        margin-top: -60px;
        margin-left: -5px;
    }

    .nav__list-child li {
        list-style: none;
        border-bottom: 1px solid ghostwhite;
        margin-left: -35px;
    }

    .nav__list-child li>a {
        margin-left: 20px;
        text-decoration: none;
        color: black;
        font-weight: 600;
    }

    .nav__list-child li>a:hover {
        color: #348e38;
    }

    .nav__list-child>li>a {
        font-size: 16px;
    }

    .user:hover>.nav__list-child {
        display: block;
    }

    .form--search {
        position: fixed;
        background-color: #eee;
        width: 100%;
        height: 100%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        opacity: 0.9;
        display: none;
    }

    .search--content {
        position: relative;
        top: 40%;
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form--search input[type=text] {
        float: left;
        width: 330px;
        border: none;
        outline: none;
        padding: 17px;
        font-size: 15px;
        background-color: #fff;
        color: #000;
    }

    .form--search input[type=text]:hover {
        background-color: #fff;
    }

    .form--search button {
        float: left;
        width: 80px;
        font-size: 15px;
        padding: 17px;
        background-color: #0F4229;
        color: #fff;
    }

    .closebtn {
        position: absolute;
        top: 25px;
        right: 50px;
        font-size: 20px;
        color: #000;
        cursor: pointer;

    }

    .select {
        width: 200px;
        height: 50px;
        margin-right: 10px;
        padding: 10px;
        font-size: 16px;
        font-weight: normal;
        border: 2px solid rgb(212, 208, 208);
        transition: all .4s ease-in;
    }

    .btn__filter {
        width: 30px;
        height: 50px;
        font-size: 20px;
        font-weight: bold;
    }

    .filter--form {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>

<body>
    <!-- Header -->
    <?php
    include "page/header.php";
    ?>
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
                            <select name="filter_val" id="" class="select">
                                <option value="" class="option" disabled selected>Filter</option>
                                <option value="low" class="option">Sort by price: L to H</option>
                                <option value="high" class="option">Sort by price: H to L</option>
                                <option value="" class="option">Sort by Category</option>
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
                            while ($item_key = mysqli_fetch_assoc($result)) :
                        ?>
                        <div class="product__card">
                            <div class="product__card-img"
                                style="display: flex; align-items: center; justify-content: center;">
                                <img src="../uploads/<?= $item_key['hinh'] ?>" alt="" class="product--img"
                                    width="150px">
                            </div>
                            <span class="product__card-name"><?= $item_key['ten_hh'] ?></span>
                            <p class="product__card-price"><?= number_format($item_key['don_gia']) ?>$</p>
                            <div class="desc__icons">
                                <a href="" class="desc__icon"><i class="fa-solid fa-cart-shopping"></i></a>
                                <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                <a href="details.php?id_product=<?= $item_key['ma_hh'] ?>" class="desc__icon"><i
                                        class="fa-regular fa-eye"></i></a>
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
                        <div class="product__card">
                            <div class="product__card-img"
                                style="display: flex; align-items: center; justify-content: center;">
                                <img src="../uploads/<?= $item['hinh'] ?>" alt="" class="product--img" width="150px">
                            </div>
                            <span class="product__card-name"><?= $item['ten_hh'] ?></span>
                            <p class="product__card-price"><?= number_format($item['don_gia']) ?>$</p>
                            <div class="desc__icons">
                                <a href="" class="desc__icon"><i class="fa-solid fa-cart-shopping"></i></a>
                                <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                <a href="details.php?id_product=<?= $item['ma_hh'] ?>" class="desc__icon"><i
                                        class="fa-regular fa-eye"></i></a>
                            </div>
                        </div>
                        <?php
                                endforeach;
                            } else if ($filter == 'high') {
                                $list_product = hang_hoa_select_price_high($start, $limit);
                                foreach ($list_product as $item) :
                                ?>
                        <div class="product__card">
                            <div class="product__card-img"
                                style="display: flex; align-items: center; justify-content: center;">
                                <img src="../uploads/<?= $item['hinh'] ?>" alt="" class="product--img" width="150px">
                            </div>
                            <span class="product__card-name"><?= $item['ten_hh'] ?></span>
                            <p class="product__card-price"><?= number_format($item['don_gia']) ?>$</p>
                            <div class="desc__icons">
                                <a href="" class="desc__icon"><i class="fa-solid fa-cart-shopping"></i></a>
                                <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                <a href="details.php?id_product=<?= $item['ma_hh'] ?>" class="desc__icon"><i
                                        class="fa-regular fa-eye"></i></a>
                            </div>
                        </div>
                        <?php
                                endforeach;
                            }
                        } else {
                            $list_product = hang_hoa_select_all($start, $limit);
                            foreach ($list_product as $item) :
                                ?>
                        <div class="product__card">
                            <div class="product__card-img"
                                style="display: flex; align-items: center; justify-content: center;">
                                <img src="../uploads/<?= $item['hinh'] ?>" alt="" class="product--img" width="150px">
                            </div>
                            <span class="product__card-name"><?= $item['ten_hh'] ?></span>
                            <p class="product__card-price"><?= number_format($item['don_gia']) ?>$</p>
                            <div class="desc__icons">
                                <a href="" class="desc__icon"><i class="fa-solid fa-cart-shopping"></i></a>
                                <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                <a href="details.php?id_product=<?= $item['ma_hh'] ?>" class="desc__icon"><i
                                        class="fa-regular fa-eye"></i></a>
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