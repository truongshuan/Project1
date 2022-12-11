<?php
require '../dao/hang-hoa.php';
require '../dao/khach-hang.php';
require '../dao/loai.php';
require 'connection.php';
require 'shopping/func-total.php';
session_start();
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
if (!empty($_GET['user'])) {
    $ma_kh = $_GET['user'];
    $infor = khach_hang_select_by_id($ma_kh);
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
    <title>Profile this user</title>
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
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="../uploads/<?= $infor['avatar'] ?>" alt="Admin"
                                    class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4><?= $infor['ten_kh'] ?></h4>
                                    <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    <a href="form/recover.php?user=<?= $infor['ma_kh'] ?>" class="btn btn-primary"
                                        style="color: #fff;">Recover
                                        Password</a>
                                </div>
                            </div>
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe me-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>Website</h6>
                                    <span class="text-secondary">https://bootdey.com</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-github me-2 icon-inline">
                                            <path
                                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                            </path>
                                        </svg>Github</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter me-2 icon-inline text-info">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg>Twitter</h6>
                                    <span class="text-secondary">@bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram me-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook me-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>Facebook</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="form/controller.php" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Username</h6>
                                    </div>
                                    <input type="hidden" name="ma_kh" value="<?= $infor['ma_kh'] ?>">
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled name="a" type="text" class="form-control"
                                            value="<?= $infor['ma_kh'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="email" disabled type="text" class="form-control"
                                            value="<?= $infor['email'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="ten_kh" type="text" class="form-control"
                                            value="<?= $infor['ten_kh'] ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="address" type="text" class="form-control" value=" ">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Avatar</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="avatar" type="file" class="form-control"
                                            value="<?= $infor['avatar'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="change-infor" type="submit" class="btn btn-primary px-4"
                                            value="Save Changes">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">History Bills</h5>
                                    <p>Lists</p>
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Id bill</th>
                                                <th scope="col">id product</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">quality</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Views</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require 'connection.php';
                                            $sql = "SELECT * FROM hoa_don INNER JOIN chi_tiet_hoa_don ON hoa_don.ma_hd = chi_tiet_hoa_don.ma_hd INNER JOIN hang_hoa ON chi_tiet_hoa_don.ma_hh = hang_hoa.ma_hh WHERE hoa_don.ma_kh= '$ma_kh' ORDER BY hoa_don.ma_hd ASC";
                                            $result = mysqli_query($con, $sql);
                                            while ($item = mysqli_fetch_assoc($result)) :
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $item['ma_hd'] ?></th>
                                                <td><?= $item['ma_hh'] ?></td>
                                                <td><?= $item['ten_hh'] ?></td>
                                                <td><?= $item['so_luong'] ?></td>
                                                <td><?= number_format($item['tong_tien']) ?>$</td>
                                                <td>
                                                    <a href="test_pdf.php?id_bill=<?= $item['ma_hd'] ?>"
                                                        class="btn btn-primary">PDF</a>
                                                </td>
                                            </tr>
                                            <?php
                                            endwhile;
                                            ?>
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
</body>

</html>