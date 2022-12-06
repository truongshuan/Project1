<?php
require_once 'controller.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../content/client/css/my-login.css">
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="../../content/client/img/logo.png" alt="logo">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Register</h4>
                            <?php
                            if (count($errors) == 1) {
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                            </div>
                            <?php
                            } elseif (count($errors) > 1) {
                            ?>
                            <div class="alert alert-danger">
                                <?php
                                    foreach ($errors as $showerror) {
                                    ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                                    }
                                    ?>
                            </div>
                            <?php
                            }
                            ?>
                            <form method="POST" action="register.php" class="my-login-validation" novalidate=""
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input id="name" type="text" class="form-control" name="ma_kh" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="ten_kh" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="mat_khau" required
                                        data-eye>
                                </div>
                                <div class="form-group">
                                    <label for="password">Confrim Password</label>
                                    <input id="password" type="password" class="form-control" name="mat_khau_con"
                                        required data-eye>
                                </div>
                                <div class="form-group">
                                    <label for="formFile" class="form-label">Avatar</label>
                                    <input class="form-control" type="file" id="formFile" name="avatar" required>
                                </div>
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-success btn-block" name="register">
                                        Register
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Already have an account? <a href="login.php">Login</a>
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