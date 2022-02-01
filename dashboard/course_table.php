<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
confirm_login();

if (isset($_GET['id'])) {

    $delete = new Operation();
    $delete->deleteimage("course", $_GET['id']);
    $delete->delete("course", $_GET['id'], "This course where id = " . $_GET['id'] . " deleted successfully", "Something wrong, try again", "course_table");
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="Bdtask">
    <title>Course Table</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/dist/img/favicon.png">
    <!--Global Styles(used by all pages)-->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
    <link href="assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Third party Styles(used by this page)-->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--Start Your Custom Style Now-->
    <link href="assets/dist/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Page loader -->
    <?php require_once 'page-section/loader.php'?>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php $page = 'courset';require_once 'page-section/sidebar.php'?>

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
                                <h1 class="font-weight-bold">Course Table</h1>
                                <small>In this page, you can delete or edit existed course</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="body-content">
                <?php

echo ErrorMessage();
echo SuccessMessage();

?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">Course Table</h6>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                   <div class="table-responsive">
                           <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Teacher</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        <th>Live Preview</th>


                                    </tr>
                                </thead>

                                <tbody>
                                <?php
$obj = new Operation();
$stmt = $obj->selectall("course");
$num = 0;
while ($rows = $stmt->fetch()) {
    $id = $rows["id"];
    $name = $rows["name"];
    $price = $rows["price"];
    $teacher = $rows["teacher"];
    $date = $rows["date"];
    $image = $rows["image"];
    $num++;

    ?>
                                    <tr>

                                        <td><?php echo $num; ?></td>
                                        <td><?php echo substring($name, 20); ?></td>
                                        <td><?php echo $price ?></td>
                                        <td><?php echo substring($teacher, 15); ?></td>
                                        <td><?php echo $date ?></td>
                                        <td class="text-center"><img src="../images/course/<?php echo $image; ?>" width="170px"; height="80px"></td>
                                        <td class="text-center">
                                        <a href="course_edit.php?id=<?php echo $id; ?>"><span class="btn btn-warning "><i class="fas fa-edit"></i></span></a>
                                        <a href="course_table.php?id=<?php echo $id; ?>"><span class="btn btn-danger "><i class="fas fa-trash-alt"></i></span></a>
                                        </td>
                                        <td class="text-center"><a href="../lesson.php?id=<?php echo $id; ?>"><span class="btn btn-primary "><i class="fas fa-search"></i> Preview</span></a></td>



                                    </tr>
                                    <?php }?>

                                </tbody>

                            </table>
</div>



                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    </div>

    </div>
    <!--Footer-->
    <?php require_once 'page-section/footer.php'?>

    <div class="overlay"></div>
    </div>

    </div>

    <!--Global script(used by all pages)-->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
    <script src="assets/dist/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>

    <!-- Third Party Scripts(used by this page)-->
    <script src="assets/plugins/datatables/dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!--Page Active Scripts(used by this page)-->
    <script src="assets/plugins/datatables/data-basic.active.js"></script>
    </section>
     <script>
      $(document).ready(function() {
    $('#example').DataTable({

        responsive: true,
        'columnDefs': [{
            'targets':[3,4],
            'orderable': false,
        }]

    });

} );
      </script>
    <script src="assets/dist/js/sidebar.js"></script>
</body>

</html>