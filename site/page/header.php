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
    <div class="logo"><img src="../content/client/img/logo.png" alt=""></div>
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
        <a class="openbtn" onclick="openSearch()">
            <i class='bx bx-search-alt-2'></i>
        </a>
        <a href="shopping/cart.php" style="color: #000;"><i class='bx bxs-cart'></i></a>
        <div class="user">
            <i class='bx bx-user-pin'></i>
            <ul class="nav__list-child">
                <?php
                if (isset($_SESSION['home'])) {
                ?>
                <li class="nav__list-child-item"><a href="#" class="nav__link"><?php echo $ma_kh; ?>
                    </a>
                </li>
                <li class="nav__list-child-item"><a href="user/profile.php?id_user=<?= $ma_kh ?>"
                        class="nav__link">Profile</a>
                </li>
                <?php
                } else {
                ?>
                <li class="nav__list-child-item"><a href="form/login.php" class="nav__link">Login </a>
                </li>
                <?php
                }
                ?>
                <?php
                if (isset($infor['vai_tro'])) {
                    $vai_tro = $infor['vai_tro'];
                    if ($vai_tro == 1) {
                ?>
                <li class="nav__list-child-item"><a href="../admin/" class="nav__link">Admin</a>
                </li>
                <?php
                    }
                }
                ?>
                <li class="nav__list-child-item"><a href="log/logout.php" class="nav__link">Logout</a>
                </li>
            </ul>
        </div>
        <a href="service.php"><button class="btn_header">GET AQUET <div><i style="font-size: 28px;"
                        class='bx bx-right-arrow-alt'></i>
                </div></button></a>
    </div>
</section>