<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../content/client/css/contact.css">
    <link rel="stylesheet" href="../content/client/css/Grid.css">
    <link rel="stylesheet" href="../content/client/css/header.css">
    <link rel="stylesheet" href="../content/client/css/foodter.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="../content/client/js/onscroll.js"></script>
    <link rel="stylesheet" href="../content/client/css/backtotop.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="../content/client/js/backtotop.js"></script>
</head>

<body>
    <!-- header -->
    <?php
    include "page/header.php";
    ?>
    <section class="tiltle_about" style="background-image:linear-gradient(rgba(15,66,41,0.95),rgba(15,66,41,0.95)),url(../content/client/img/record.jfif);">
        <div class="tiltle_about_content">
            <p>Contact</p>
            <div class="tiltle_about_content1">
                <a href="">Home</a>
                <hr>
                <a href="">Contact</a>
            </div>
        </div>
    </section>
    <section class="grid wide ">
        <div class="row">
            <div class="col l-6">
                <div class="contact_left">
                    <span>CONTACT US</span>
                    <p>We are available for
                        24/7 for Garden</p>
                    <b>The Most Relaiable & Professional Company for Gardening & Lawncare . Please contact or leave information on the form</b>
                    <div class="box box1">
                        <i class='bx bx-map'></i>
                        <div class="content">
                            <p>Our Address</p>
                            <b>An Khanh, Ninh Kieu, Can Tho</b>
                        </div>
                    </div>
                    <div class="box">
                        <i class='bx bx-phone-call'></i>
                        <div class="content">
                            <p>Our Phone</p>
                            <b>0941477074 - 0948533285</b>
                        </div>
                    </div>
                    <div class="box">
                        <i class='bx bx-envelope'></i>
                        <div class="content">
                            <p>Our Email</p>
                            <b>hoangthuan@gmail.com</b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-6">
                <form action="" class="forms_contact">
                    <div class="form_contact">
                        <div class="left">
                            <label for="">Name (required)</label>
                            <input type="text" placeholder="Full Name" class="input" require>
                            <label for="">Email address (required)</label>
                            <input type="email" placeholder="Email Address" require>
                        </div>
                        <div class="right">
                            <label for="">Phone (optional)</label>
                            <input type="text" placeholder="Phone number">
                            <label for="">Services (required)</label>
                            <select name="services" id="services" class="services">
                                <option value="">Choose Services</option>
                                <option value="">Garden Walls</option>
                                <option value="">Landscaping</option>
                                <option value="">Lawn Maintenance</option>
                                <option value="">Lawn Moving</option>

                            </select>
                        </div>
                    </div>
                    <label for="">Your Massage</label>
                    <br>
                    <br>
                    <textarea name="" id="" cols="30" rows="10" class="message" placeholder="Your Message"></textarea>
                    <button class="btn_services">Send message</button>
                </form>
            </div>
        </div>
    </section>
    <div class="map">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1XRP3XzTIILnhkzeZVYJ1UhXDNRMlKIGh&ehbc=2E312F" width="100%" height="100%">
        </iframe>
    </div>
    <section class="foodter_img">
        <img src="../content/client/img/foodter.jpg" alt="">
    </section>
    <!-- foodter -->
    <?php
    include "page/foodter.php"
    ?>
     <section id="goTop">
        <i title="Lên đầu trang" class='bx bx-chevron-up'></i>
    </section>
</body>

</html>