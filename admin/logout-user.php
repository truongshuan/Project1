<?php
session_start();
unset($_SESSION['email_ad']);
unset($_SESSION['password_ad']);
// session_destroy();
header('location: login-user.php');