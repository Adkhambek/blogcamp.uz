<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

if (isset($_POST["Submit"])) {

    $category = new Operation();

    $data = ['quote' => $_POST["quote"], 'author' => $_POST["author"], 'date' => datetime()];
    $category->insert($data, "quotes", "Quote added successfully", "quote.php", "Something wrong");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="Bdtask">
    <title>Quote</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/dist/img/favicon.png">
    <!--Global Styles(used by all pages)-->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
    <link href="assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Start Your Custom Style Now-->
    <link href="assets/dist/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Page loader -->
    <?php require_once 'page-section/loader.php'?>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php $page = 'quote';require_once 'page-section/sidebar.php'?>

        <div class="content-wrapper">
            <div class="main-content">
                <!-- Header -->
                <?php require_once 'page-section/header.php'?>

                <div class="content-header row align-items-center m-0">
                    <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
                        <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                            <?php breadcrumb();?>
                        </ol>
                    </nav>
                    <div class="col-sm-8 header-title p-0">
                        <div class="media">
                            <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                            <div class="media-body">
                                <h1 class="font-weight-bold">Quote Adding</h1>
                                <small>From now on you can add a new quote.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="body-content">
                <div class="row">
                <div class="col-md-12 col-lg-6 my-2 mx-auto">
                    <?php
echo ErrorMessage();
echo SuccessMessage();
?>
                </div>
                </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6 mx-auto" style ="min-height: 400px;">
                            <div class="card mb-4">
                                <div class="card-header">
                                        <div>
                                            <h6 class="fs-17 font-weight-600 mb-0">Adding Quote</h6>
                                        </div>

                                </div>
                                <div class="card-body">
                                    <form action="quote.php" method="post">
                                    <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="font-weight-600">Quote</label>
                                                <textarea class="form-control" name="quote" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Author</label>
                                            <input type="text" name="author" class="form-control mt-2"
                                                 placeholder="Type author name">

                                        </div>


                                        <button type="submit" name="Submit" class="btn btn-success">Publish</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="overlay"></div>
            </div>

        </div>

        <!--Global script(used by all pages)-->

        <script src="assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
        <script src="assets/dist/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="assets/dist/js/sidebar.js"></script>
</body>

</html>