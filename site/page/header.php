<?php
require '../dao/pdo.php';
require '../dao/khach-hang.php';
require 'connection.php';
require 'shopping/func-total.php';
session_start();
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email  = $_SESSION['email'];
    $password = $_SESSION['password'];
    $sql = "SELECT * FROM khach_hang WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
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
    } else {
        session_destroy();
        header('location: index.php');
    }
}
?>
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
        <div class="list__user">
            <i class='bx bx-user-pin'>
                <ul class="list__user-child">
                    <?php
                    if (isset($_SESSION['email']) && $_SESSION['password']) {
                    ?>
                    <li class="user__child-item" style="list-style: none;"><a class="user__link"
                            style="text-decoration: none;" href="form/login.php"><?php echo $fetch_info['ma_kh']; ?></a>
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
            <button class="btn_header" style="display: flex; justify-content: center;align-items: center;">GET AQUET <i
                    style="font-size: 20px;" class='bx bx-right-arrow-alt'></i>
            </button></a>
    </div>
</section>