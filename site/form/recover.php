<?php require_once "controller.php"; ?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: login-user.php');
}
if (!empty($_GET['user'])) {
    $ma_kh = $_GET['user'];
    $infor = khach_hang_select_by_id($ma_kh);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../content/client/css/my-login.css">
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center align-items-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="../../content/client/img/logo.png" alt="logo">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title text-center">Change Password</h4>
                            <?php
                            if (isset($_SESSION['info'])) {
                            ?>
                            <div class="alert alert-success text-center">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                            <?php
                            }
                            ?>
                            <?php
                            if (count($errors) > 0) {
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                            </div>
                            <?php
                            }
                            ?>
                            <form method="POST" action="recover.php?user=<?= $infor['ma_kh'] ?>"
                                class="my-login-validation">
                                <input type="hidden" name="ma_kh" value="<?= $infor['ma_kh'] ?>">
                                <div class="form-group">
                                    <label for="new-password">Current Password</label>
                                    <input id="new-password" type="password" class="form-control" name="current"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="new-password">New password</label>
                                    <input id="new-password" type="password" class="form-control" name="password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="new-password">Confirm password</label>
                                    <input id="new-password" type="password" class="form-control" name="cpassword"
                                        required>
                                </div>
                                <div class="form-group m-0">
                                    <button type="submit" name="recover-password" class="btn btn-success btn-block">
                                        Change Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; FPT Polytechnic - Group 1
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="../../content/js/my-login.js"></script>
</body>

</html>