<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php require_once 'include/config.php';?>
<?php
$getid = $_GET['id'];
//$getip = $_SERVER['REMOTE_ADDR'];
$obj = new Operation();
$stmt = $obj->selectbyid("course", $getid);
$result = $stmt->rowcount();
if ($result == 1) {
    while ($rows = $stmt->fetch()) {
        $name = $rows["name"];
        $videon = $rows["videon"];
        $hours = $rows["hours"];
        $teacher = $rows["teacher"];
        $lang = $rows["lang"];
        $image = $rows["image"];
        $level = $rows["level"];
        $tasks = $rows["tasks"];
        $ucode = $rows["ucode"];
        $descript = $rows["description"];
    }
} else {
    $_SESSION["ErrorMessage"] = "Siz qidirayotkan sahifa topilmadi";
    Redirect_to("$url_path");
}
$title = htmlspecialchars($name);
$des = strip_tags($descript);
$des = substring($des, 120);
$description = htmlspecialchars($des);
$image = "images/course/" . $image;
$keywords = "";
$canonical = "lesson.php?id=" . $getid;
require_once 'inc/head.php'?>
<body>
 <!-- Header-top  -->
 <?php require_once 'inc/header.php'?>
    <section class="mt-2">
<div class="auto-container mt-3">
            <div class="row">
</div>
            <div class="row">
                <div class=" col-lg-8 col-md-12 col-sm-12 ">
                   <div class="embed-responsive embed-responsive-16by9 my-4">
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/videoseries?list=<?php echo htmlspecialchars($ucode); ?>"
                            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                    </div>
                    <!-- con1 -->
                    <div class="content-block">
                        <div class="card mb-3 rounded-0">
                            <div class="container ">
                                <div class="row">
                                    <div class="col-md-12">
                                   </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12 ">
                                        <div class="card-body px-3 py-3">
                                            <h4 class="card-title"><?php echo htmlspecialchars($name); ?></h4>
                                            <?php echo $descript; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <!-- side bar -->
                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                    <div class="status">
                        <div class="card rounded-0">
                            <div class="card-header">
                                Eslatma!!!
                            </div>
                            <div class="card-body">
                                video tugashi bilan o'z-o'zidan keyingi qismga o'tadi. <br> <br>
                                Yoki, tepa qismni o'ng tarafidagi <b>"playlist"</b> tugmasini bosgan holda boshqa
                                qismiga o'tqazishingiz mumkin..
                            </div>
                        </div>
                    </div>
                    <div class="status  mt-3">
                        <div class="card rounded-0">
                            <img class="card-img-top" src="<?php echo IMAGE ?>" alt ="<?php echo substring($name, 120); ?>" height="200" alt="Card image cap">
                            <div class="card-body">
                                <h5 style="color: #03382e;
                                font-weight: 600;
                                line-height: 1.3em" class="card-title"><?php echo htmlspecialchars($name); ?></h5>
                                <span style="color: #00ab15; font-size: 1rem;"><i class="fas fa-video"></i> <b>videolar
                                        soni: </b></span>
                                        <?php echo htmlspecialchars($videon); ?>ta <br>
                                <span style="color: #00ab15; font-size: 1rem;"><i class="fas fa-history"></i>
                                    <b>Davomiyligi: </b></span>
                                    <?php echo htmlspecialchars($hours); ?> soat<br>
                                <span style="color: #00ab15; font-size: 1rem;"><i class="fas fa-user-tie"></i>
                                    <b>Muallif: </b></span>
                                    <?php echo htmlspecialchars($teacher); ?><br>
                                <span style="color: #00ab15; font-size: 1rem;"><i class="fas fa-globe"></i> <b>Tili:
                                    </b></span>
                                    <?php echo htmlspecialchars($lang); ?><br>
                                <span style="color: #00ab15; font-size: 1rem;"><i class="fas fa-book"></i> <b>Daraja:
                                    </b></span>
                                    <?php echo htmlspecialchars($level); ?><br>
                                <span style="color: #00ab15; font-size: 1rem;"><i class="fas fa-tasks"></i>
                                    <b>Vazifalar: </b></span>
                                    <?php echo htmlspecialchars($tasks); ?>ta<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<!-- Footer -->
 <?php require_once 'inc/footer.php'?>
</body>

</html>
