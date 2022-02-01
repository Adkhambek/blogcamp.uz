<?php require_once 'include/function.php';?>
<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

$getid = $_GET['id'];

if (isset($_POST["Submit"])) {

    imageupload("blog");
    $update = new Operation();

    if (!empty($_FILES["image"]["name"])) {
        $update->deleteimage("blog", $getid);
        $data = [
            'title' => $_POST["title"],
            'date' => datetime(),
            'author' => $_POST["author"],
            'category' => $_POST["category"],
            'post' => $_POST["post"],
            'image' => $_FILES["image"]["name"],
        ];
        $update->update("blog", $data, $getid, "Post updated successfully", "Something wrong", "blog_table");

    } else {

        $data = [
            'title' => $_POST["title"],
            'date' => datetime(),
            'author' => $_POST["author"],
            'category' => $_POST["category"],
            'post' => $_POST["post"],

        ];
        $update->update("blog", $data, $getid, "Post updated successfully", "Something wrong", "blog_table");
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
    <title>Dashboard: Edit Post</title>
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



        <div class="content-wrapper">
            <div class="main-content">
                <!-- Header -->

                <div class="content-header row align-items-center m-0">

                    <div class="col-sm-8 header-title p-0">
                        <div class="media">
                            <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                            <div class="media-body">
                                <h1 class="font-weight-bold">Blog Post Editting</h1>
                                <small>From now on you can edit blog post.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="body-content">

                    <div class="row">
                        <div class="col-md-12 col-lg-10 mx-auto">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">Editting Blog Post</h6>
                                    </div>

                                </div>
                                <div class="card-body">
                                <?php
$get = new Operation();
$stmt = $get->selectbyid("blog", $getid);
while ($rows = $stmt->fetch()) {
    $title = $rows["title"];
    $category = $rows["category"];
    $author = $rows["author"];
    $post = $rows["post"];
    $image = $rows["image"];

}
?>
                                    <form action="blog_edit.php?id=<?php echo $getid; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">

                                            <label for="exampleFormControlSelect1" class="font-weight-600">Post
                                                Body</label>
                                            <textarea id="summernote" name="post" required><?php echo $post; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Post Title</label>
                                            <input name="title" type="text" class="form-control mt-2" value ="<?php echo $title; ?>"
                                                placeholder="Type title here" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Author</label>
                                            <input name="author" type="text" class="form-control mt-2" value ="<?php echo $author; ?>"
                                                placeholder="Type author name here" required>
                                        </div>

                                        <div class="form-group mb-4">


                                    <label for="exampleInputEmail1" class="font-weight-600">Category</label>
                                                <select name="category" class="testselect1 SumoUnder"
                                                    onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')" tabindex="-1" required>
                                                    <option selected="selected"
                                                        value="<?php echo $category ?>"><?php echo $category ?></option>
                                                    <!--placeholder-->
                                                    <?php
$obj = new Operation();
$stmt = $obj->selectall("postc");
while ($rows = $stmt->fetch()) {
    $category = $rows["title"];

    ?>
                                                    <option><?php echo $category ?></option>
                                                <?php }?>
                                                </select>

</div>

                                        <div class="form-group mb-4">
                                        <div class="text-muted">
                                        Existed Image:
                                        <img class="mb-2" src="../images/blog/<?php echo $image; ?>" width="100px"; height="70px"; >
                                        </div>
                                        <input type="file" name="image" id="file-2"
                                            class="custom-input-file custom-input-file--2 "
                                            data-multiple-caption="{count} files selected" multiple="">
                                        <label for="file-2">
                                            <i class="fa fa-upload"></i>
                                            <span>Choose a image…</span>
                                        </label>
                                        </div>
                                    <div class="container">
                                    <div class="row">
                                            <div class="col-lg-6">
                                                    <button type="submit" name="Submit" class="btn btn-primary btn-block mt-5">Publish</button>
                                            </div>
                                            <div class="col-lg-6">
                                            <a href="blog_table.php" class="btn btn-warning btn-block text-white mt-5" > Back to Table</a>
                                            </div>


                                     </div>
                                     </div>
                                        </div>



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