<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

$getid = $_GET['id'];

if (isset($_POST["Submit"])) {

    imageupload("book");
    fileupload();

    $update = new Operation();
    $imagename = $_FILES["image"]["name"];
    $filename = $_FILES["file"]["name"];

    if (!empty($imagename) and !empty($filename)) {
        $update->deleteimage("book", $getid);
        $update->deletepdf($getid);

        $data = [
            'name' => $_POST["name"],
            'category' => $_POST["category"],
            'author' => $_POST["author"],
            'lang' => $_POST["language"],
            'publish' => $_POST["publish"],
            'date' => datetime(),
            'description' => $_POST["description"],
            'page' => $_POST["page"],
            'image' => $_FILES["image"]["name"],
            'file' => $_FILES["file"]["name"],
        ];
        $update->update("book", $data, $getid, "Book detail updated successfully", "Something wrong", "book_table");

    } elseif (!empty($imagename)) {

        $update->deleteimage("book", $getid);

        $data = [
            'name' => $_POST["name"],
            'category' => $_POST["category"],
            'author' => $_POST["author"],
            'lang' => $_POST["language"],
            'publish' => $_POST["publish"],
            'date' => datetime(),
            'description' => $_POST["description"],
            'page' => $_POST["page"],
            'image' => $_FILES["image"]["name"],

        ];
        $update->update("book", $data, $getid, "Book detail updated successfully", "Something wrong", "book_table");

    } elseif (!empty($filename)) {

        $update->deletepdf($getid);

        $data = [
            'name' => $_POST["name"],
            'category' => $_POST["category"],
            'author' => $_POST["author"],
            'lang' => $_POST["language"],
            'publish' => $_POST["publish"],
            'date' => datetime(),
            'description' => $_POST["description"],
            'page' => $_POST["page"],
            'file' => $_FILES["file"]["name"],

        ];
        $update->update("book", $data, $getid, "Book detail updated successfully", "Something wrong", "book_table");
    } else {

        $data = [

            'name' => $_POST["name"],
            'category' => $_POST["category"],
            'author' => $_POST["author"],
            'lang' => $_POST["language"],
            'publish' => $_POST["publish"],
            'date' => datetime(),
            'description' => $_POST["description"],
            'page' => $_POST["page"],

        ];
        $update->update("book", $data, $getid, "Book detail updated successfully", "Something wrong", "book_table");
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
    <title>Dashboard: Book Edit</title>
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


                <div class="content-header row align-items-center m-0">

                    <div class="col-sm-8 header-title p-0">
                        <div class="media">
                            <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                            <div class="media-body">
                                <h1 class="font-weight-bold">Book Editting</h1>
                                <small>From now on you can edit existed book.</small>
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
                                        <h6 class="fs-17 font-weight-600 mb-0">Editting Book</h6>
                                    </div>

                                </div>
                                <div class="card-body">
                                <?php
$get = new Operation();
$stmt = $get->selectbyid("book", $getid);
while ($rows = $stmt->fetch()) {

    $name = $rows["name"];
    $category = $rows["category"];
    $author = $rows["author"];
    $language = $rows["lang"];
    $publish = $rows["publish"];
    $description = $rows["description"];
    $page = $rows["page"];
    $image = $rows["image"];
    $file = $rows["file"];

}
?>
                                    <form action="book_edit.php?id=<?php echo $getid; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="font-weight-600">Description</label>
                                            <textarea id="summernote" name="description" ><?php echo $description; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Book Name</label>
                                            <input name="name" type="text" class="form-control mt-2"
                                                placeholder="Type book name here"  value ="<?php echo $name; ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Author</label>
                                            <input name="author" type="text" class="form-control mt-2"
                                                placeholder="Type author name here" value ="<?php echo $author; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Page</label>
                                            <input name="page" type="text" class="form-control mt-2"
                                                placeholder="Type page count here" value ="<?php echo $page; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Publish year</label>
                                            <input class="form-control" name="publish" type="text" value="<?php echo $publish; ?>" id="example-date-input">
                                        </div>

                                        <div class="form-group ">


                                                <label for="exampleInputEmail1" class="font-weight-600">Book Category</label>
                                                <select name="category" class="testselect1 SumoUnder"
                                                    onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')" tabindex="-1" required>
                                                    <option selected="selected"
                                                    value="<?php echo $category; ?>"><?php echo $category; ?></option>
                                                    <!--placeholder-->
                                                    <?php
$obj = new Operation();
$stmt = $obj->selectall("bookc");
while ($rows = $stmt->fetch()) {
    $category = $rows["category"];

    ?>
                                                    <option><?php echo $category ?></option>
                                                <?php }?>
                                                </select>
</div>
                                                <div class="form-group mb-4">


                                                <label for="exampleInputEmail1" class="font-weight-600">Language</label>
                                                <select name="language" class="testselect1 SumoUnder"
                                                    onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')" tabindex="-1" required>
                                                    <option  selected="selected"
                                                        value="<?php echo $language; ?>"><?php echo $language; ?></option>
                                                    <!--placeholder-->

                                                   <option>Ingliz tili</option>
                                                   <option>O'zbek tili</option>
                                                   <option>Rus tili</option>

                                                </select>

                                        </div>
                                        <div class="form-group mb-4">


                                        <a class="btn btn-warning text-white mb-3" href="../pdf/<?php echo $file; ?>" target="_blank">Existed File</a>

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
                                        Existed Image:
                                        <img class="mb-2" src="../images/book/<?php echo $image; ?>" width="90px"; height="130px"; >
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