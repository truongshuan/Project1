<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN -->
    <!-- Link css & icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../content/client/css/header.css">
    <link rel="stylesheet" href="../content/client/css/foodter.css">
    <link rel="stylesheet" href="../content/client/css/Grid.css">
    <link rel="stylesheet" href="../content/client/css/user.css">
    <link rel="stylesheet" href="../content/client/css/backtotop.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="../content/client/js/onscroll.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../content/client/img/favicon.png" type="image/x-icon">
    <title>Details - Gettree</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        .contact_home1 {
            margin-top: 10px;
            width: 100%;
        }

        .about_home>hr {
            color: white;
        }

        .contact_home1>img {
            width: 100%;
            height: 90px;
        }

        .about_home>p {
            margin-top: 20px;
        }

        .contact_home2_content {
            margin-top: 20px;
        }



        .card {
            border: none;
            overflow: hidden
        }

        .thumbnail_images ul {
            list-style: none;
            justify-content: center;
            display: flex;
            align-items: center;
            margin-top: 10px
        }

        .thumbnail_images ul li {
            margin: 5px;
            padding: 10px;
            border: 2px solid #eee;
            cursor: pointer;
            transition: all 0.5s
        }

        .thumbnail_images ul li:hover {
            border: 2px solid #000
        }

        .main_image {
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid #eee;
            height: 400px;
            width: 100%;
            overflow: hidden
        }

        .heart {
            height: 29px;
            width: 29px;
            background-color: #eaeaea;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .content p {
            font-size: 12px
        }

        .ratings span {
            font-size: 14px;
            margin-left: 12px
        }

        .colors {
            margin-top: 5px
        }

        .colors ul {
            list-style: none;
            display: flex;
            padding-left: 0px
        }

        .colors ul li {
            height: 20px;
            width: 20px;
            display: flex;
            border-radius: 50%;
            margin-right: 10px;
            cursor: pointer
        }

        .colors ul li:nth-child(1) {
            background-color: #6c704d
        }

        .colors ul li:nth-child(2) {
            background-color: #96918b
        }

        .colors ul li:nth-child(3) {
            background-color: #68778e
        }

        .colors ul li:nth-child(4) {
            background-color: #263f55
        }

        .colors ul li:nth-child(5) {
            background-color: black
        }

        .right-side {
            position: relative
        }

        .search-option {
            position: absolute;
            background-color: #000;
            overflow: hidden;
            align-items: center;
            color: #fff;
            width: 200px;
            height: 200px;
            border-radius: 49% 51% 50% 50% / 68% 69% 31% 32%;
            left: 30%;
            bottom: -250px;
            transition: all 0.5s;
            cursor: pointer
        }

        .search-option .first-search {
            position: absolute;
            top: 20px;
            left: 90px;
            font-size: 20px;
            opacity: 1000
        }

        .search-option .inputs {
            opacity: 0;
            transition: all 0.5s ease;
            transition-delay: 0.5s;
            position: relative
        }

        .search-option .inputs input {
            position: absolute;
            top: 200px;
            left: 30px;
            padding-left: 20px;
            background-color: transparent;
            width: 300px;
            border: none;
            color: #fff;
            border-bottom: 1px solid #eee;
            transition: all 0.5s;
            z-index: 10
        }

        .search-option .inputs input:focus {
            box-shadow: none;
            outline: none;
            z-index: 10
        }

        .search-option:hover {
            border-radius: 0px;
            width: 100%;
            left: 0px
        }

        .search-option:hover .inputs {
            opacity: 1
        }

        .search-option:hover .first-search {
            left: 27px;
            top: 25px;
            font-size: 15px
        }

        .search-option:hover .inputs input {
            top: 20px
        }

        .search-option .share {
            position: absolute;
            right: 20px;
            top: 22px
        }

        .buttons .btn {
            height: 50px;
            width: 150px;
            border-radius: 0px !important
        }


        /* comment */

        .card {
            background-color: #fff;
            border: none;
        }

        .form-color {
            background-color: #fafafa;
        }

        .form-control {
            height: 48px;
            border-radius: 25px;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #35b69f;
            outline: 0;
            box-shadow: none;
            text-indent: 10px;
        }

        .c-badge {
            background-color: #35b69f;
            color: white;
            height: 20px;
            font-size: 11px;
            width: 92px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2px;
        }

        .comment-text {
            font-size: 13px;
        }

        .wish {
            color: #35b69f;
        }

        .user-feed {
            font-size: 14px;
            margin-top: 12px;
        }

        .back__btn {
            font-weight: bold;
            text-decoration: none;
            color: #000;
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php
    require 'page/header.php';
    ?>
    <div class="container mt-5 mb-5">
        <h1 class=" d-flex justify-content-center align-items-center mb-4">Details product</h1>
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image"> <img src="../content/client/img/product1.png" id="main_product_image" width="200">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>dfasdfasdf
                            </h3> <span class="heart"><i class='bx bx-heart'></i></span>
                        </div>
                        <div class="mt-2 pr-3 content">
                            <h6>Decriptsion</h6>
                            <p style="font-size: 15px;">asdfafds</p>
                        </div>
                        <h3>$123</h3>
                        <div class="ratings d-flex flex-row align-items-center">
                            <div class="d-flex flex-row">Category:
                            </div> <span style="font-weight: bold;">Plant</span>
                        </div>
                        <!-- <div class="ratings d-flex flex-row align-items-center">
                            <div class="d-flex flex-row">Related product
                            </div>
                            <li class="list"><a class="a" href="">sdf</a></li>
                        </div> -->
                        <div class="buttons d-flex flex-row mt-5 gap-3"> <button class="btn btn-outline-dark">Buy
                                Now</button> <button class="btn btn-dark">Add to Cart</button> </div>
                        <a href="product.php" class="back__btn buttons d-flex flex-row mt-5 gap-3">Back</a>
                    </div>
                </div>
                <div class="card">
                    <div class="p-3">
                        <h6 class="fs-7 font-weight-bold">Comments(<span>10</span>)</h6>
                    </div>
                    <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                        <img src="https://i.imgur.com/zQZSWrt.jpg" width="50" class="rounded-circle mr-2">
                        <input type="text" class="form-control" placeholder="Enter your comment...">
                    </div>
                    <div class="mt-2">
                        <div class="d-flex flex-row p-3">
                            <img src="https://i.imgur.com/zQZSWrt.jpg" width="40" height="40" class="rounded-circle mr-3">
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center">
                                        <span class="mr-2">Brian selter</span>
                                        <small class="c-badge">Top Comment</small>
                                    </div>
                                    <small>12h ago</small>
                                </div>
                                <p class="text-justify comment-text mb-0">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam</p>
                                <div class="d-flex flex-row user-feed">
                                    <span class="wish"><i class="fa fa-heartbeat mr-2"></i>24</span>
                                    <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row p-3">
                            <img src="https://i.imgur.com/3J8lTLm.jpg" width="40" height="40" class="rounded-circle mr-3">
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center">
                                        <span class="mr-2">Seltos Majito</span>
                                        <small class="c-badge">Top Comment</small>
                                    </div>
                                    <small>2h ago</small>
                                </div>
                                <p class="text-justify comment-text mb-0">Tellus in hac habitasse platea dictumst
                                    vestibulum. Lectus nulla at volutpat diam ut venenatis tellus. Aliquam etiam erat
                                    velit scelerisque in dictum non consectetur. Sagittis nisl rhoncus mattis rhoncus
                                    urna neque viverra justo nec. Tellus cras adipiscing enim eu turpis egestas pretium
                                    aenean pharetra. Aliquam faucibus purus in massa.</p>
                                <div class="d-flex flex-row user-feed">
                                    <span class="wish"><i class="fa fa-heartbeat mr-2"></i>14</span>
                                    <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row p-3">
                            <img src="https://i.imgur.com/agRGhBc.jpg" width="40" height="40" class="rounded-circle mr-3">
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-center">
                                        <span class="mr-2">Maria Santola</span>
                                        <small class="c-badge">Top Comment</small>
                                    </div>
                                    <small>12h ago</small>
                                </div>
                                <p class="text-justify comment-text mb-0"> Id eu nisl nunc mi ipsum faucibus. Massa
                                    massa ultricies mi quis hendrerit dolor. Arcu bibendum at varius vel pharetra vel
                                    turpis nunc eget. Habitasse platea dictumst quisque sagittis purus sit amet
                                    volutpat. Urna condimentum mattis pellentesque id.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua. Ut enim ad minim veniam</p>
                                <div class="d-flex flex-row user-feed">

                                    <span class="wish"><i class="fa fa-heartbeat mr-2"></i>54</span>
                                    <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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