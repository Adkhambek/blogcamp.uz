<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

$getid = $_GET['id'];

if (isset($_POST["Submit"])) {

    imageupload("course");
    $update = new Operation();

    if (!empty($_FILES["image"]["name"])) {
        $update->deleteimage("course", $getid);
        $data = [

            'name' => $_POST["name"],
            'price' => $_POST["price"],
            'videon' => $_POST["video"],
            'hours' => $_POST["hour"],
            'teacher' => $_POST["teacher"],
            'lang' => $_POST["language"],
            'level' => $_POST["level"],
            'tasks' => $_POST["task"],
            'date' => datetime(),
            'ucode' => $_POST["code"],
            'description' => $_POST["description"],
            'image' => $_FILES["image"]["name"],

        ];

        $update->update("course", $data, $getid, "Course details updated successfully", "Something wrong", "course_table");

    } else {

        $data = [

            'name' => $_POST["name"],
            'price' => $_POST["price"],
            'videon' => $_POST["video"],
            'hours' => $_POST["hour"],
            'teacher' => $_POST["teacher"],
            'lang' => $_POST["language"],
            'level' => $_POST["level"],
            'tasks' => $_POST["task"],
            'date' => datetime(),
            'ucode' => $_POST["code"],
            'description' => $_POST["description"],

        ];

        $update->update("course", $data, $getid, "Course details updated successfully", "Something wrong", "course_table.php");
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
    <title>Course Edit</title>
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
                                <h1 class="font-weight-bold">Course Editting</h1>
                                <small>From now on you can edit existed course.</small>
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
                                        <h6 class="fs-17 font-weight-600 mb-0">Editting Course</h6>
                                    </div>

                                </div>
                                <div class="card-body">

                                <?php
$get = new Operation();
$stmt = $get->selectbyid("course", $getid);
while ($rows = $stmt->fetch()) {

    $name = $rows["name"];
    $price = $rows["price"];
    $videon = $rows["videon"];
    $language = $rows["lang"];
    $hours = $rows["hours"];
    $description = $rows["description"];
    $teacher = $rows["teacher"];
    $image = $rows["image"];
    $level = $rows["level"];
    $tasks = $rows["tasks"];
    $ucode = $rows["ucode"];

}
?>
                                    <form action="course_edit.php?id=<?php echo $getid; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="font-weight-600">Description</label>
                                            <textarea id="summernote" name="description" required><?php echo $description; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Course Name</label>
                                            <input name="name" type="text" class="form-control mt-2"
                                                placeholder="Type course name here" value ="<?php echo $name; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Course Price</label>
                                            <input name="price" type="text" class="form-control mt-2"
                                                placeholder="Type course price here" value ="<?php echo $price; ?>" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Teacher</label>
                                            <input name="teacher" type="text" class="form-control mt-2"
                                                placeholder="Type teacher name here" value ="<?php echo $teacher; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Youtube code</label>
                                            <input name="code" type="text" class="form-control mt-2"
                                                placeholder="Type youtube code here" value ="<?php echo $ucode; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Video Number</label>
                                            <input name="video" type="text" class="form-control mt-2"
                                                placeholder="Type video number here" value ="<?php echo $videon; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Lessons hour</label>
                                            <input name="hour" type="text" class="form-control mt-2"
                                                placeholder="Type lessons hour here" value ="<?php echo $hours; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-600">Tasks</label>
                                            <input name="task" type="text" class="form-control mt-2"
                                                placeholder="Type task number here" value ="<?php echo $tasks; ?>" required>
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


                                                <label for="exampleInputEmail1" class="font-weight-600">Level</label>
                                                <select name="level" class="testselect1 SumoUnder"
                                                    onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')" tabindex="-1" required>
                                                    <option  selected="selected"
                                                        value="<?php echo $level; ?>"><?php echo $level; ?></option>
                                                    <!--placeholder-->

                                                   <option>Boshlang'ich</option>
                                                   <option>O'rta</option>
                                                   <option>Yuqori</option>

                                                </select>

                                        </div>



                                        <div class="form-group ">
                                        <div class="text-muted mb-2">
                                        Existed Image:
                                        <img class="mb-2" src="../images/course/<?php echo $image; ?>" width="100px"; height="70px"; >
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

                                            class="btn btn-primary ">Publish</button>
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