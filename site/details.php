<?php
session_start();
require_once '../dao/hang-hoa.php';
require_once '../dao/binh-luan.php';
require_once '../admin/connection.php';
require 'shopping/func-total.php';
// Check Session
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
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
// Get infor product
if (isset($_GET['id_product'])) {
    $ma_hh = $_GET['id_product'];
    hang_hoa_tang_so_luot_xem($ma_hh);
    $result = hang_hoa_select_by_id($ma_hh);
    $_SESSION['id_product'] = $ma_hh;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- CDN -->
    <!-- Link css & icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../content/client/css/fix-header.css">
    <link rel="stylesheet" href="../content/client/css/foodter.css">
    <link rel="stylesheet" href="../content/client/css/Grid.css">
    <link rel="stylesheet" href="../content/client/css/backtotop.css">
    <link rel="stylesheet" href="../content/client/css/details.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="../content/client/js/onscroll.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../content/client/img/favicon.png" type="image/x-icon">
    <title>Details - Gettree</title>
    <style>
    .cc {
        width: 40px;
        height: 40px;
    }

    .view_reply,
    .reply_btn,
    .sub_reply_btn {
        border: none;
        outline: none;
        background-color: transparent;
    }

    .input_number {
        width: 70px;
        padding: 5px;
        text-align: center;
    }

    .add_comment_btn {
        position: absolute;
        right: 16px;
        height: 47px;
        border-radius: 18px;
        background-color: #348E38;
        border: none;
        font-weight: normal;
        /* border-top-right-radius: 20px;
        border-bottom-right-radius: 20px; */
    }

    .add_comment_btn:focus,
    .add_comment_btn:hover {
        background-color: #348E38;
        border: none;
    }
    </style>
</head>

<body>
    <!-- header -->
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
    <!-- Content -->
    <div class="container mt-5 mb-5">
        <h1 class=" d-flex justify-content-center align-items-center mb-4">Details product</h1>
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image"> <img src="../uploads/<?= $result['hinh'] ?>" id="main_product_image"
                                width="200">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="shopping/cart-ac.php" method="GET">
                        <div class="p-3 right-side">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3><?= $result['ten_hh'] ?></h3>
                                <span class="heart"><i class='bx bx-heart'></i></span>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <h6>Decriptsion</h6>
                                <p style="font-size: 15px;"><?= $result['mo_ta'] ?></p>
                            </div>
                            <h3>$<?= number_format($result['don_gia']) ?></h3>
                            <input type="number" name="quality" value="1" min="1" max="99"
                                class="form-control input_number">
                            <div class="ratings d-flex flex-row align-items-center">
                                <div class="d-flex flex-row">Category:
                                </div> <span style="font-weight: bold;"><?= $result['ten_loai'] ?></span>
                            </div>
                            <!-- <div class="ratings d-flex flex-row align-items-center">
                            <div class="d-flex flex-row">Related product
                            </div>
                            <li class="list"><a class="a" href="">sdf</a></li>
                        </div> -->
                            <input type="hidden" name="id" value="<?= $result['ma_hh'] ?>">
                            <div class="buttons d-flex flex-row mt-5 gap-3">
                                <button class="btn btn-outline-dark">Buy Now</button>
                                <button type="submit" class="btn btn-dark">Add to Cart</button>
                            </div>
                            <a href="product.php" class="back__btn buttons d-flex flex-row mt-5 gap-3">Back</a>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <div class="p-3">
                        <?php
                        $ma_hh = $result['ma_hh'];
                        $sql = "SELECT COUNT(binh_luan.ma_hh) AS 'quality' FROM `binh_luan` INNER JOIN hang_hoa ON binh_luan.ma_hh = hang_hoa.ma_hh WHERE binh_luan.ma_hh = $ma_hh GROUP BY binh_luan.ma_hh";
                        $query = mysqli_query($con, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            foreach ($query as $flag) :
                        ?>
                        <h6 class="fs-7 font-weight-bold">Comments(<span><?= $flag['quality'] ?></span>)</h6>
                        <?php
                            endforeach;
                        } else {
                            ?>
                        <h6 class="fs-7 font-weight-bold">Comments(<span>0</span>)</h6>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="p-3 " id="error_status"></div>
                    <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                        <?php
                        if (isset($_SESSION['email']) && $_SESSION['password']) {
                        ?>
                        <img src="../uploads/<?= $fetch_info['avatar'] ?>" width="50" class="rounded-circle mr-2">
                        <?php
                        } else {
                        ?>
                        <img src="https://png.pngtree.com/png-clipart/20210608/ourlarge/pngtree-dark-gray-simple-avatar-png-image_3418404.jpg"
                            width="50" class="rounded-circle mr-2">
                        <?php
                        }
                        ?>
                        <input type="text" class="form-control comment_textbox" placeholder="Enter your comment...">
                        <button type="button" class="btn btn-primary add_comment_btn">Send</button>
                    </div>
                    <div class="mt-2 comment-container">
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

    <script src="../content/client/js/comment.js"></script>
    <link rel="stylesheet" href="../toastr/toastr.min.css">
    <script src="../toastr/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>

</html>