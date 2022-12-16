<?php
session_start();
require 'connection.php';
require '../dao/hang-hoa.php';
require '../dao/khach-hang.php';
require '../dao/loai.php';
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
} else {
    header('location: form/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gettree – Garden & Landscaping</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../content/client/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../content/client/css/profile.css">
    <link rel="stylesheet" href="../content/client/css/fix-header.css">
    <link rel="stylesheet" href="../content/client/css/foodter.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="../content/client/js/onscroll.js"></script>
    <script src="../content/client/js/backtotop.js"></script>
    <title>Payment</title>
</head>

<body>
    <!-- HEADER -->
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
    <!-- CONTENT -->
    <div class="container" style="margin-top: 30px;">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 style="text-align: center; margin: 15px 0px;">Payment For Bill</h1>
                            <form action="payment/payment-ac.php" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Fullname</h6>
                                    </div>
                                    <input type="hidden" name="ma_kh" value="<?= $infor['ma_kh'] ?>">
                                    <div class="col-sm-9 text-secondary">
                                        <span><?= $_SESSION['bill_ten_kh'] ?></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <span><?= $_SESSION['bill_email'] ?></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <span><?= $_SESSION['bill_sdt'] ?></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <span><?= $_SESSION['bill_dia_chi'] ?></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <span><?= $_SESSION['bill_ngay_dat'] ?></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Voucher</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <span><?php
                                                if ($_SESSION['bill_ma_km'] == '') {
                                                    echo 'No';
                                                } else {
                                                    $ma_km = $_SESSION['bill_ma_km'];
                                                    $sql = "SELECT * FROM khuyen_mai WHERE ma_km = '$ma_km'";
                                                    $result = mysqli_query($con, $sql);
                                                    $infor_km = mysqli_fetch_assoc($result);
                                                    $ten_km = $infor_km['code'];
                                                    echo "Applied $ten_km ";
                                                }  ?></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Payment</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div class="form-check">
                                            <input name="payment" class="form-check-input" type="radio" value="vnpay"
                                                id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <img src="../content/client/img/vnpay.JPG" width="80px">
                                            </label>
                                        </div>
                                        <input type="hidden" id="tong_tien" name=""
                                            value="<?= $_SESSION['bill_tong_tien'] ?>">
                                        <div id="paypal-button" style="width: 200px;"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="hidden" name="code_payment" value="<?= $_SESSION['bill_code'] ?>">
                                        <input type="hidden" name="email_user" value="<?= $_SESSION['bill_email'] ?> ">
                                        <input type="hidden" name="tong_tien"
                                            value="<?= $_SESSION['bill_tong_tien'] ?>">
                                        <input name="redirect" type="submit" name="" class="btn btn-primary px-4"
                                            value="Payment">
                                    </div>
                                </div>
                            </form>
                            <form action="payment/payment-ac.php" method="POST">
                                <input name="cancel" type="submit" class="btn btn-primary px-4" value="Cancel">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">Details Bills</h5>
                                    <p>Lists</p>
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">id product</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">quality</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Views</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($cart as $key => $value) :
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $value['ma_hh'] ?></th>
                                                <td><?= $value['ma_hh'] ?></td>
                                                <td><?= $value['ten_hh'] ?></td>
                                                <td><?= $value['quality'] ?></td>
                                                <td><?= $_SESSION['bill_tong_tien'] ?>$</td>
                                                <td>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://www.paypal.com/sdk/js?client-id=Ad5SBFnURBnyGXJGDEm_cB1GTlAqamEMbXVoYG7uKymjXKfl_CBSjuCHAyPbci1t4tIIo16_XYFCc3dY&currency=USD">
    </script>
    <script>
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            var tong_tien = document.getElementById('tong_tien').value;
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: tong_tien // Can also reference a variable or function
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert(
                    `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                );
                window.location.replace(
                    'http://localhost/duan1/site/product.php?payment=paypal');
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button');
    </script>
</body>

</html>