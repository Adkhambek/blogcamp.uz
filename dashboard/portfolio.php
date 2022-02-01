<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

if (isset($_POST["Submit"])) {

    imageupload("portfolio");
    cvupload();

    $update = new Operation();

    $imagename = $_FILES["image"]["name"];
    $filename = $_FILES["file"]["name"];

    if (!empty($imagename) and !empty($filename)) {

        $update->deleteimage("portfolio", 1);
        $update->deletecvpdf();

        $data = [
            'info' => $_POST["info"],
            'site' => $_POST["site"],
            'phone' => $_POST["phone"],
            'mail' => $_POST["mail"],
            'telegram' => $_POST["telegram"],
            'hobby' => $_POST["hobby"],
            'level' => $_POST["level"],
            'image' => $_FILES["image"]["name"],
            'cv' => $_FILES["file"]["name"],
        ];
        $update->update("portfolio", $data, 1, "Portfolio details updated successfully", "Something wrong", "portfolio.php");

    } elseif (!empty($imagename)) {

        $update->deleteimage("portfolio", 1);

        $data = [
            'info' => $_POST["info"],
            'site' => $_POST["site"],
            'phone' => $_POST["phone"],
            'mail' => $_POST["mail"],
            'telegram' => $_POST["telegram"],
            'hobby' => $_POST["hobby"],
            'level' => $_POST["level"],
            'image' => $_FILES["image"]["name"],

        ];
        $update->update("portfolio", $data, 1, "Portfolio details updated successfully", "Something wrong", "portfolio.php");

    } elseif (!empty($filename)) {

        $update->deletecvpdf();

        $data = [
            'info' => $_POST["info"],
            'site' => $_POST["site"],
            'phone' => $_POST["phone"],
            'mail' => $_POST["mail"],
            'telegram' => $_POST["telegram"],
            'hobby' => $_POST["hobby"],
            'level' => $_POST["level"],
            'cv' => $_FILES["file"]["name"],
        ];
        $update->update("portfolio", $data, 1, "Portfolio details updated successfully", "Something wrong", "portfolio.php");

    } else {

        $data = [
            'info' => $_POST["info"],
            'site' => $_POST["site"],
            'phone' => $_POST["phone"],
            'mail' => $_POST["mail"],
            'telegram' => $_POST["telegram"],
            'hobby' => $_POST["hobby"],
            'level' => $_POST["level"],

        ];
        $update->update("portfolio", $data, 1, "Portfolio details updated successfully", "Something wrong", "portfolio.php");
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
    <title>Dashboard: Portfolio</title>
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
 <?php $page = 'portfolio';require_once 'page-section/sidebar.php'?>

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
                                <h1 class="font-weight-bold">Portfolio Editting</h1>
                                <small>From now on you can edit your portfolio.</small>
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
                                        <h6 class="fs-17 font-weight-600 mb-0">Editting Portfolio</h6>
                                    </div>

                                </div>
                                <div class="card-body">
                                <?php
$get = new Operation();
$stmt = $get->selectall("portfolio");
while ($rows = $stmt->fetch()) {

    $info = $rows["info"];
    $site = $rows["site"];
    $phone = $rows["phone"];
    $mail = $rows["mail"];
    $telegram = $rows["telegram"];
    $hobby = $rows["hobby"];
    $level = $rows["level"];
    $profile = $rows["image"];
    $cv = $rows["cv"];

}
?>
                                    <form action="portfolio.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="font-weight-600">About me</label>
                                            <textarea id="summernote" name="info" ><?php echo $info; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">My Site</label>
                                            <input name="site" type="text" class="form-control mt-2"
                                                placeholder="Type book name here"  value ="<?php echo $site; ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Phone number</label>
                                            <input name="phone" type="text" class="form-control mt-2"
                                                placeholder="Type author name here" value ="<?php echo $phone; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Mail</label>
                                            <input name="mail" type="text" class="form-control mt-2"
                                                placeholder="Type page count here" value ="<?php echo $mail; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Telegram username</label>
                                            <input class="form-control" name="telegram" type="text" value="<?php echo $telegram; ?>" id="example-date-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">My hobby</label>
                                            <input class="form-control" name="hobby" type="text" value="<?php echo $hobby; ?>" id="example-date-input">
                                        </div>

                                        <div class="form-group ">


                                                <label for="exampleInputEmail1" class="font-weight-600">Profession level</label>
                                                <select name="level" class="testselect1 SumoUnder"
                                                    onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')" tabindex="-1" required>
                                                    <option selected="selected"
                                                    value="<?php echo $level; ?>"><?php echo $level; ?></option>
                                                    <!--placeholder-->
                                                    <option>Boshlang'ch</option>
                                                    <option>Orta</option>
                                                    <option>Yuqori</option>
                                                    <option>Malaka oshirishda</option>
                                                    <option>O'quvchi</option>



                                                </select>
                                        </div>

                                        <div class="form-group mb-4">


                                        <a class="btn btn-warning text-white mb-3" href="../pdf/cv/<?php echo $cv; ?>" target="_blank">Viewing CV file</a>

                                        <input type="file" name="file" id="file-1"
                                            class="custom-input-file custom-input-file--2 "
                                            data-multiple-caption="{count} files selected" multiple="">
                                        <label for="file-1">
                                            <i class="fa fa-upload"></i>
                                            <span>Choose a file…</span>
                                        </label>
                                        </div>

                                        <div class="form-group mb-4">
                                        <div class="text-muted">
                                        Existed Profile Image:
                                        <img class="mb-2" src="../images/portfolio/<?php echo $profile; ?>" width="120px"; height="130px"; >
                                        </div>
                                        <input type="file" name="image" id="file-2"
                                            class="custom-input-file custom-input-file--2 "
                                            data-multiple-caption="{count} files selected" multiple="">
                                        <label for="file-2">
                                            <i class="fa fa-upload"></i>
                                            <span>Choose a image…</span>
                                        </label>
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