<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'mail/mail.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

if (isset($_POST["Submit"])) {

    $sending = new Operation();

    $body = $_POST["body"];
    $subject = $_POST["subject"];

    $stmt = $sending->selectall("newsletter");
    while ($rows = $stmt->fetch()) {
        $members = $rows["mail"];

        gmail($members, $subject, $body);

    }
    if (!gmail($members, $subject, $body)) {
        $_SESSION["ErrorMessage"] = "Something wrong! check again or check codes";
        header("Location: gmail");
        exit;
    } else {
        $_SESSION["SuccessMessage"] = "Your message is sent successfully";
        header("Location: gmail");
        exit;
    }

}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="Bdtask">
    <title>Sending Gmail</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/dist/img/favicon.png">
    <!--Global Styles(used by all pages)-->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
    <link href="assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Third party Styles(used by this page)-->
    <link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="assets/plugins/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="assets/plugins/jquery.sumoselect/sumoselect.min.css" rel="stylesheet">
    <!--Start Your Custom Style Now-->
    <link href="assets/dist/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Page loader -->
    <?php require_once 'page-section/loader.php'?>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php $page = 'mail';require_once 'page-section/sidebar.php'?>

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
                                <h1 class="font-weight-bold">Sending via Gmail</h1>
                                <small>From now on you can send message to public.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="body-content">
                    <div class="row">
                        <div class="col-md-12 col-lg-10 my-2 mx-auto">
                            <?php
echo ErrorMessage();
echo SuccessMessage();
?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-10 mx-auto">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">Sending Message</h6>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <form action="gmail.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="font-weight-600">Body</label>
                                            <textarea id="summernote" name="body" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Subject</label>
                                            <input name="subject" type="text" class="form-control mt-2"
                                                placeholder="Type title here" required>
                                        </div>

                                                <button type="submit" name="Submit"

                                            class="btn btn-primary mt-5">Publish</button>
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
        <!-- Third Party Scripts(used by this page)-->
        <script src="assets/plugins/summernote/summernote.min.js"></script>
        <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="assets/plugins/jquery.sumoselect/jquery.sumoselect.min.js"></script>
        <script src="assets/dist/js/pages/demo.jquery.sumoselect.js"></script>
        <!--Page Active Scripts(used by this page)-->
        <script src="assets/plugins/summernote/summernote.active.js"></script>

        <!--Page Active Scripts(used by this page)-->
        <script src="assets/dist/js/pages/forms-basic.active.js"></script>

        <script>
       $('#summernote').find('.note-editable').focus();
       </script>

</body>

</html>