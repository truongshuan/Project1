
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
        .contact_home2_content{
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php
    include "page/header.php";
    ?>
    <!-- banner -->
    <section class="banner" style="background-image: linear-gradient(rgba(15, 66, 41, 0.95), rgba(15, 66, 41, 0.95)), url(../content/client/img/record.jfif);">
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
                            <li class="category__item">
                                <a href="" class="category__link">Tree</a>
                                <span class="category__nums">5</span>
                            </li>
                            <li class="category__item">
                                <a href="" class="category__link">Tree</a>
                                <span class="category__nums">5</span>
                            </li>
                            <li class="category__item">
                                <a href="" class="category__link">Tree</a>
                                <span class="category__nums">5</span>
                            </li>
                            <li class="category__item">
                                <a href="" class="category__link">Tree</a>
                                <span class="category__nums">5</span>
                            </li>
                            <li class="category__item">
                                <a href="" class="category__link">Tree</a>
                                <span class="category__nums">5</span>
                            </li>
                            <li class="category__item">
                                <a href="" class="category__link">Tree</a>
                                <span class="category__nums">5</span>
                            </li>
                        </ul>
                    </div>
                    <div class="featured">
                        <h1 class="featured__tittle">Featured Products
                        </h1>
                        <div class="featured__list">
                     
                            <div class="featured__card">
                   
                            <?php
                    require '../admin/connection.php';
                    require '../dao/hang-hoa.php';
                    $hang_hoa = hang_hoa_select_top10();
                foreach($hang_hoa as $hh):
                          
                    ?>
                                <img src="../content/client/img/<?=$hh['hinh'] ?>" alt="" class="featured__card-img">
                                <div class="featured__card-infor">
                                    <span class="card--name"><?=$hh['ten_hh'] ?>
                                    </span>
                                    <p class="card--price"><?=$hh['don_gia'] ?>
                                    </p>
                                    
                                </div>
                            
                            </div>
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
                        <select name="" id="" class="select">
                            <option value="" class="option">Sort by price: L to H</option>
                            <option value="" class="option">Sort by price: H to L</option>
                            <option value="" class="option">Sort by name</option>
                        </select>
                    </div>
                    <div class="product__list">
                    <?php
                    require '../admin/connection.php';
                    require '../dao/loai.php';
                    $sql = "SELECT * FROM hang_hoa";
                    $result = $con->query($sql);
                    if($result->num_rows > 0):
                        while($row = $result->fetch_assoc()):
                    ?>
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/<?=$row['hinh']?>" alt="" class="product--img">
                            </div>
                            <span class="product__card-name"><?=$row['ten_hh']?></span>
                            <p class="product__card-price"><?=$row['don_gia']?>$</p>
                            
                            <div class="desc__icons">
                                <a href="" class="desc__icon"><i class="fa-solid fa-cart-shopping"></i></a>
                                <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                <a href="details.php" class="desc__icon"><i class="fa-regular fa-eye"></i></a>
                            </div>
                        </div>     
                        <?php
                        endwhile;
                    endif;
                        ?>
                    </div>
                    <div class="page">
                        <ul class="page__navagation">
                            <li class="page__navagation-item"><a href="" class="page__navagation-link"><i class='bx bx-chevron-left'></i></a></li>
                            <li class="page__navagation-item"><a href="" class="page__navagation-link">1</a></li>
                            <li class="page__navagation-item"><a href="" class="page__navagation-link">2</a></li>
                            <li class="page__navagation-item"><a href="" class="page__navagation-link"><i class='bx bx-chevron-right'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php
  print_r($hh);
        ?>
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
    <!-- <script>
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
    </script> -->
</body>

</html>