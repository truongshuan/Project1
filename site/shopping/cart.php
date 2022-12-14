<?php
session_start();
require '../connection.php';
require_once 'func-total.php';
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

if (isset($_POST['apply'])) {
    $voucher = mysqli_real_escape_string($con, $_POST['voucher']);
    $total = mysqli_real_escape_string($con, $_POST['total']);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngay_nhap =  date_format(date_create(), 'Y-m-d');
    $check_voucher = "SELECT * FROM khuyen_mai WHERE code = '$voucher'";
    $res = mysqli_query($con, $check_voucher);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $ma_km = $fetch['ma_km'];
        $ten_km = $fetch['code'];
        $start_date = $fetch['ngay_bat_dau'];
        $end_date = $fetch['ngay_het_han'];
        if ($ngay_nhap >= $start_date && $ngay_nhap <= $end_date) {
            $discount = $fetch['giam_gia'] / 100;
            $coupon = $total * $discount;
            $total_last = $total - $coupon;
            $_SESSION['status'] = "Applied Voucher Successfully";
            $_SESSION['status_code'] = "success";
        } else {
            $_SESSION['error_vou'] = "Coupon is Invalide or Expired on $end_date";
        }
    } else {
        $_SESSION['error_vou'] = "Coupon is not exists";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../content/client/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../content/client/css/Grid.css">
    <link rel="stylesheet" href="../../content/client/css/fix-header.css">
    <link rel="stylesheet" href="../../content/client/css/Grid.css">
    <link rel="stylesheet" href="../../admin/toastr/toastr.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="../../admin/toastr/toastr.min.js"></script>
    <script>
    function msg(massage) {
        $(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](massage)
        });
    }
    </script>
    <title>Gettree - Cart</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
    }

    body {
        background: #eee;
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
            <a href="cart.php" style="color: #0F4229; font-weight: bold;">
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
    <!-- CONTENT -->
    <div class="px-4 px-lg-0">
        <!-- For demo purpose -->
        <div class="container text-white py-5 text-center">
            <h1 class="display-4 fwb" style="color: #000;">My Cart</h1>
        </div>
        <!-- End -->
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($cart as $key => $value) :
                                    ?>
                                    <tr>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="../../uploads/<?= $value['hinh'] ?>" alt="" width="70"
                                                    class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="#"
                                                            class="text-dark d-inline-block align-middle"><?= $value['ten_hh'] ?></a>
                                                    </h5><span
                                                        class="text-muted font-weight-normal font-italic d-block">Category:
                                                        <?= $value['ten_loai'] ?></span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle"><strong>$<?= $value['don_gia'] ?></strong>
                                        </td>
                                        <td class="border-0 align-middle">
                                            <form action="cart-ac.php" method="GET">
                                                <input type="hidden" name="action" value="update">
                                                <input type="hidden" name="id" value="<?= $value['ma_hh'] ?>">
                                                <input type="number" name="quality" type="submit"
                                                    style="border: none; width: 50px; font-weight: bold;"
                                                    value="<?= $value['quality'] ?>">
                                            </form>
                                        </td>
                                        <td class="border-0 align-middle">
                                            <a href="cart-ac.php?id=<?= $value['ma_hh'] ?>&action=delete"
                                                class="text-dark"><i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>
                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                        <div class="p-4">
                            <?php
                            if (isset($_SESSION['error_vou'])) {
                            ?>
                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                <?php echo $_SESSION['error_vou'] ?>
                            </div>
                            <?php
                            }
                            ?>
                            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                            <form action="cart.php" method="POST">
                                <div class="input-group mb-4 border rounded-pill p-2">
                                    <input type="hidden" name="total" value="<?= total_price($cart) ?>">
                                    <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3"
                                        class="form-control border-0" name="voucher" required>
                                    <div class="input-group-append border-0">
                                        <button id="button-addon3" type="submit" name="apply"
                                            class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply
                                            coupon</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for
                            seller</div> -->
                        <a href="../product.php" class="btn btn-dark rounded-pill py-2 ">Back to shop</a>
                        <!-- <div class="p-4">
                            <p class="font-italic mb-4">If you have some information for the seller you can leave them
                                in the box below</p>
                            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                        </div> -->
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary
                        </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you
                                have entered.</p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Order Subtotal
                                    </strong><strong>$<?= number_format(total_price($cart)) ?> </strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Coupon</strong><strong>$
                                        <?php
                                        if (isset($coupon)) {
                                            echo $coupon;
                                        }
                                        ?>
                                    </strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold">$
                                        <?php if (isset($total_last)) {
                                            echo number_format($total_last);
                                        } else {
                                            echo number_format(total_price($cart));
                                        } ?></h5>
                                </li>
                            </ul>
                            <form action="check-out.php" method="POST">
                                <input type="hidden" name="ma_km" value="<?php if (isset($ma_km)) {
                                                                                echo $ma_km;
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
                                <input type="hidden" name="ten_km" value="<?php
                                                                            if (isset($ten_km)) {
                                                                                echo $ten_km;
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                            ?>">
                                <input type="hidden" name="coupon" value="<?php
                                                                            if (isset($coupon)) {
                                                                                echo $coupon;
                                                                            } else {
                                                                                echo 0;
                                                                            }
                                                                            ?>">
                                <button type="submit" name="save_coup"
                                    class="btn btn-dark rounded-pill py-2 btn-block">Procceed tocheckout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Srcipt -->
    <?php require '../alert/success.php'; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
if (isset($_SESSION['error_vou'])) {
    unset($_SESSION['error_vou']);
}
?>