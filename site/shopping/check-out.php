<?php
require '../../dao/pdo.php';
require '../../dao/hang-hoa.php';
require '../../dao/loai.php';
require '../connection.php';
require 'func-total.php';
session_start();
pdo_get_connection();
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
                header('Location: ../form/reset-code.php');
            }
        } else {
            header('Location: ../form/user-otp.php');
        }
    }
} else {
    header('location: ../form/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../../content/client/img/favicon.png" type="image/x-icon">
    <title>Checkout-Product</title>
    <!-- Font-icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/088d757bb6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../content/client/css/checkout.css">
    <link rel="stylesheet" href="../../content/client/css/fix-header.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Header  -->
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
        <div class="logo"><a href="../index.php"><img src="../../content/client/img/logo.png" alt=""></a></div>
        <div class="menu">
            <div class="menu_ngang">
                <a href="../index.php">Home</a>
            </div>
            <div class="menu_ngang">
                <a href="../about.php">About Us</i></a>
            </div>
            <div class="menu_ngang">
                <a href="../service.php">Services<i class='bx bx-chevron-down'></i></a>
                <ul class="menu_con">
                    <li> <a href="../service.php"> Landscaping</a></li>
                    <li> <a href="../service.php"> Pruning Plants</a></li>
                    <li> <a href="../service.php"> Lawn Maintenance</a></li>
                    <li> <a href="../service.php"> Lawn Moving</a></li>
                </ul>
            </div>
            <div class="menu_ngang">
                <a href="../product.php">Product</a>
            </div>
            <div class="menu_ngang">
                <a href="../blog.php">Blog</a>
            </div>
            <div class="menu_ngang"> <a href="../contact.php">Contact</a></div>
        </div>
        <div class="header_icon">
            <a class="openbtn" onclick="openSearch()" style="color: #000; cursor: pointer;">
                <i class='bx bx-search-alt-2'></i>
            </a>
            <a href="../shopping/cart.php" style="color: #0F4229; font-weight: bold;">
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
                                href="../form/login.php"><?php echo $fetch_info['ma_kh']; ?></a>
                        </li>
                        <li class="user__child-item" style="list-style: none;"><a class="user__link"
                                style="text-decoration: none;"
                                href="../profile.php?user=<?= $fetch_info['ma_kh']; ?>">Profile</a>
                        </li>
                        <?php
                        } else {
                        ?>
                        <li class="user__child-item" style="list-style: none;"><a class="user__link"
                                style="text-decoration: none;" href="../form/login.php">Login</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="user__child-item" style="list-style: none;"><a class="user__link"
                                style="text-decoration: none;" href="../form/logout.php">Logout</a>
                        </li>
                    </ul>
                </i>
            </div>
            <a href="../service.php">
                <button class="btn_header" style="display: flex; justify-content: center;align-items: center;">GET AQUET
                    <i style="font-size: 20px;" class='bx bx-right-arrow-alt'></i>
                </button></a>
        </div>
    </section>
    <!-- Content -->
    <div class="box">

        <div class="card">
            <div class="card-top border-bottom text-center">
                <a href="../product.php"> Back to shop</a>
                <span id="logo">Check-out Page</span>
            </div>
            <div class="card-body">
                <div class="row upper">
                    <span><i class="fa fa-check-circle-o"></i> Shopping bag</span>
                    <span><i class="fa fa-check-circle-o"></i> Order details</span>
                    <span id="payment"><span id="three">3</span>Payment</span>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="left border">
                            <div class="row">
                                <span class="header">Checkout</span>
                                <div class="icons">
                                    <img src="https://img.icons8.com/color/48/000000/visa.png" />
                                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                                    <img src="https://img.icons8.com/color/48/000000/maestro.png" />
                                </div>
                            </div>
                            <form action="check-out-ac.php" method="POST">
                                <br>
                                <input type="hidden" name="ma_kh" value="<?= $fetch_info['ma_kh'] ?>" required>
                                <span>Fullname:</span>
                                <br>
                                <input placeholder="Enter fullname" value="" name="ten_kh" required>
                                <span>Number Phone:</span>
                                <br>
                                <input placeholder="Enter your phone" name="sdt" required>
                                <span>Email</span>
                                <br>
                                <input placeholder="Enter your email" name="email" required
                                    value="<?= $fetch_info['email'] ?>">
                                <span>Address</span>
                                <br>
                                <input placeholder="Enter your address" name="dia_chi" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="right border">
                            <div class="header" style="text-align: center;">Order Details</div>
                            <p><?= total_amount($cart);  ?> items</p>
                            <?php foreach ($cart as $key => $value) : ?>
                            <div class="row item">
                                <div class="col-4 align-self-center"><img class="img-fluid"
                                        src="../../uploads/<?= $value['hinh'] ?>"></div>
                                <div class="col-8">
                                    <div class="row"><b>$ <?= $value['don_gia'] ?></b></div>
                                    <div class="row text-muted">Category: <?= $value['ten_loai'] ?></div>
                                    <div class="row">Qty:<?= $value['quality'] ?></div>
                                </div>
                            </div>
                            <?php
                            endforeach;
                            ?>
                            <hr>
                            <?php
                            if (isset($_POST['save_coup'])) {
                                $ten_km = $_POST['ten_km'];
                                if ($ten_km == "") {
                            ?>
                            <div class="alert alert-info" role="alert">
                                Not Apply voucher !
                            </div>
                            <?php
                                } else {
                                ?>
                            <div class="alert alert-success" role="alert">
                                Apllied Voucher : <?= $ten_km ?>
                            </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right">$ <?= number_format(total_price($cart)) ?></div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Coupon</div>
                                <div class="col text-right">
                                    <?php
                                    if (isset($_POST['save_coup'])) {
                                        $coupon = $_POST['coupon'];
                                        echo $coupon;
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right"><b>$
                                        <?php if (isset($coupon)) {
                                            echo number_format(total_price($cart) - $coupon);
                                        } else {
                                            echo number_format(total_price($cart));
                                        } ?></b></div>
                            </div>
                            <input type="hidden" name="tong_tien" value=" <?php if (isset($coupon)) {
                                                                                echo number_format(total_price($cart) - $coupon);
                                                                            } else {
                                                                                echo number_format(total_price($cart));
                                                                            } ?>">
                            <input type="hidden" name="ma_km" value="<?php
                                                                        if (isset($_POST['save_coup'])) {
                                                                            $ma_km = $_POST['ma_km'];
                                                                            echo $ma_km;
                                                                        }
                                                                        ?>">
                            <button class="btn" name="save_bill" type="submit">Place order</button>
                            <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
        </form>
    </div>
</body>

</html>