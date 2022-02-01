<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php
if (isset($_POST["Submit"])) {
    $Username = $_POST["username"];
    $Password = $_POST["password"];

    if (empty($Username) || empty($Password)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("login");
    } else {

        $Found_Account = login_attampt($Username, $Password);
        if ($Found_Account) {
            $_SESSION["UserId"] = $Found_Account["id"];
            $_SESSION["UserName"] = $Found_Account["username"];
            $_SESSION["SuccessMessage"] = "Welcom " . $_SESSION["UserName"] . "!";

            if (isset($_SESSION["TrackingURL"])) {
                Redirect_to($_SESSION["TrackingURL"]);
            } else {
                Redirect_to("index");
            }
        } else {
            $_SESSION["ErrorMessage"] = "Incorrect Username/Password";
            Redirect_to("login");
        }

    }
}

?>
<!doctype html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Adkhambek">
        <title>Login</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/dist/img/favicon.png">
        <!--Global Styles(used by all pages)-->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
        <link href="assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
        <!--Third party Styles(used by this page)-->

        <!--Start Your Custom Style Now-->
        <link href="assets/dist/css/style.css" rel="stylesheet">
    </head>
    <body class="bg-white">
        <div class="d-flex align-items-center justify-content-center text-center h-100vh">
            <div class="form-wrapper m-auto">
                <div class="form-container my-4">
                    <div class="register-logo text-center mb-4">
                        <img src="assets/dist/img/logo2.png" alt="">
                    </div>
                    <div class="text-center my-3">
                    <?php
echo ErrorMessage();
echo SuccessMessage();
?>
                    </div>
                    <div class="panel">
                        <div class="panel-header text-center mb-3">
                            <h3 class="fs-24">Sign into your account!</h3>
                            <p class="text-muted text-center mb-0">Nice to see you! Please log in with your account.</p>
                        </div>

                        <form action="login.php" method="post" class="register-form">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Enter username">

                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control"  placeholder="Password">

                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember me next time </label>
                            </div>
                            <button type="submit" name="Submit" class="btn btn-success btn-block">Sign in</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.End of form wrapper -->
        <!--Global script(used by all pages)-->
        <script src="assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
        <script src="assets/dist/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <!-- Third Party Scripts(used by this page)-->

        <!--Page Active Scripts(used by this page)-->

        <!--Page Scripts(used by all page)-->
        <script src="assets/dist/js/sidebar.js"></script>
    </body>

<!-- Mirrored from bhulua.thememinister.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jul 2020 14:47:42 GMT -->
</html>
