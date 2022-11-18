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
    </style>
</head>

<body>
    <!-- Header -->
    <!-- Information Company -->
    <section class="infor_comp">
        <div class="address">
            <i class="fa-solid fa-location-dot"></i>
            <p class="address-dersc">2072 Pinnickinick Street, WA 98370</p>
        </div>
        <div class="header-social">
            <div class="email">
                <i class="fa-regular fa-envelope"></i>
                <p class="email-dersc">xuanptpc04031@fpt.edu.vn</p>
            </div>
            <div class="social-icons">
                <i class="fa-brands fa-facebook-f social-icon"></i>
                <i class="fa-brands fa-twitter social-icon"></i>
                <i class="fa-brands fa-google social-icon"></i>
                <i class="fa-brands fa-instagram social-icon"></i>
            </div>
        </div>
    </section>
    <header class="header " id="header">
        <nav class="nav">
            <a href="index.php"><img src="../content/client/img/logo_shop.PNG" alt="" class="nav__image"></a>
            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__link animation">
                        <a href="index.php" class="nav__item">Home <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown__list">
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Home 1</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Home 2</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Home 3</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Home 4</a></li>
                        </ul>
                    </li>
                    <li class="nav__link animation">
                        <a href="about.php" class="nav__item">About</a>
                        <!-- <ul class="dropdown__list">
                            <li class="dropdown__item"><a href="#" class="dropdown__link">About us</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Team members</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Case study</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Case single</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Elements</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Faq</a></li>
                        </ul> -->
                    </li>
                    <li class="nav__link animation">
                        <a href="service.php" class="nav__item">Services <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown__list">
                            <li class="dropdown__item"><a href="service.php" class="dropdown__link">Garden Walls</a>
                            </li>
                            <li class="dropdown__item"><a href="service.php" class="dropdown__link">Landscasings</a>
                            </li>
                            <li class="dropdown__item"><a href="service.php" class="dropdown__link">Lawn Moving</a></li>
                            <li class="dropdown__item"><a href="service.php" class="dropdown__link">Pruning Plants</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav__link animation">
                        <a href="product.php" class="nav__item">Shop <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown__list">
                            <li class="dropdown__item"><a href="product.php" class="dropdown__link">Product</a></li>
                            <!-- <li class="dropdown__item"><a href="#" class="dropdown__link">Home</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Home</a></li>
                            <li class="dropdown__item"><a href="#" class="dropdown__link">Home</a></li> -->
                        </ul>
                    </li>
                    <li class="nav__link animation">
                        <a href="blog.php" class="nav__item">Blog <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown__list">
                            <li class="dropdown__item"><a href="blog.php" class="dropdown__link">Blog Listing</a></li>
                            <li class="dropdown__item"><a href="blog.php" class="dropdown__link">Blog Single</a></li>
                        </ul>
                    </li>
                    <li class="nav__link">
                        <a href="contact.php" class="nav__item">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="nav__icons">
                <div class="nav__icons-list">
                    <div class="nav__icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="nav__icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="total__cart">0</span>
                    </div>
                </div>
            </div>
        </nav>
    </header>
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
                                <img src="../content/client/img/product1.png" alt="" class="featured__card-img">
                                <div class="featured__card-infor">
                                    <span class="card--name">Pike tail, or snake plant
                                    </span>
                                    <p class="card--price">$50.00
                                    </p>
                                </div>
                            </div>
                            <div class="featured__card">
                                <div class="featured__card-img">
                                    <img src="../content/client/img/product1.png" alt="">
                                </div>
                                <div class="featured__card-infor">
                                    <span class="card--name">Pike tail, or snake plant
                                    </span>
                                    <p class="card--price">$50.00
                                    </p>
                                </div>
                            </div>
                            <div class="featured__card">
                                <div class="featured__card-img">
                                    <img src="../content/client/img/product1.png" alt="">
                                </div>
                                <div class="featured__card-infor">
                                    <span class="card--name">Pike tail, or snake plant
                                    </span>
                                    <p class="card--price">$50.00
                                    </p>
                                </div>
                            </div>
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
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/product2.png" alt="" class="product--img">
                            </div>
                            <span class="product__card-name">Aloe vera</span>
                            <p class="product__card-price">$12.00</p>
                            <div class="desc__icons">
                                <a href="" class="desc__icon"><i class="fa-solid fa-cart-shopping"></i></a>
                                <a href="" class="desc__icon"><i class='bx bx-heart'></i></a>
                                <a href="" class="desc__icon"><i class="fa-regular fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/product3.png" alt="" class="product--img">
                            </div>
                            <span class="product__card-name">Aloe vera</span>
                            <p class="product__card-price">$12.00</p>
                        </div>
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/product4.png" alt="" class="product--img">
                            </div>
                            <span class="product__card-name">Aloe vera</span>
                            <p class="product__card-price">$12.00</p>
                        </div>
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/product5.png" alt="" class="product--img">
                            </div>
                            <span class="product__card-name">Aloe vera</span>
                            <p class="product__card-price">$12.00</p>
                        </div>
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/product2.png" alt="" class="product--img">
                            </div>
                            <span class="product__card-name">Aloe vera</span>
                            <p class="product__card-price">$12.00</p>
                        </div>
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/product2.png" alt="" class="product--img">
                            </div>
                            <span class="product__card-name">Aloe vera</span>
                            <p class="product__card-price">$12.00</p>
                        </div>
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/product2.png" alt="" class="product--img">
                            </div>
                            <span class="product__card-name">Aloe vera</span>
                            <p class="product__card-price">$12.00</p>
                        </div>
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/product2.png" alt="" class="product--img">
                            </div>
                            <span class="product__card-name">Aloe vera</span>
                            <p class="product__card-price">$12.00</p>
                        </div>
                        <div class="product__card">
                            <div class="product__card-img">
                                <img src="../content/client/img/product2.png" alt="" class="product--img">
                            </div>
                            <span class="product__card-name">Aloe vera</span>
                            <p class="product__card-price">$12.00</p>
                        </div>
                    </div>
                    <div class="page">
                        <ul class="page__navagation">
                            <li class="page__navagation-item"><a href="" class="page__navagation-link"><i
                                        class='bx bx-chevron-left'></i></a></li>
                            <li class="page__navagation-item"><a href="" class="page__navagation-link">1</a></li>
                            <li class="page__navagation-item"><a href="" class="page__navagation-link">2</a></li>
                            <li class="page__navagation-item"><a href="" class="page__navagation-link"><i
                                        class='bx bx-chevron-right'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
</body>

</html>