<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/function.php';?>
<?php require_once 'include/config.php';?>
<?php
$title = "Kurslar bo'limi - siz bu yerda turli yo'nalishlardagi kurslarni topishingiz mumkin";
$description = "Kurslar bo'limi - turli mavzular bo'yicha: dasturchilik, dizaynerlik, muhandislik, til, adabiyotlarga doir kurslar to'plami";
$image = "assets/images/logo.png";
$keywords = "kurslar, dasturchilik, dizaynerlik, muhandislik, til, adabiyot, video kurslar, darsliklar";
$canonical = "course.php";
require_once 'inc/head.php'?>
<body>
<?php require_once 'inc/header.php'?>
    <section class="mt-2">
        <div class="auto-container ">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title">
                        <h2>Kurslar to'plami</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row clearfix">
                        <?php
$course = new Operation();
$stmt = $course->selectall("course");
while ($rows = $stmt->fetch()) {
    $id = $rows["id"];
    $name = $rows["name"];
    $price = $rows["price"];
    $videonum = $rows["videon"];
    $hours = $rows["hours"];
    $description = $rows["description"];
    $image = $rows["image"];
    $subtitle = substring($name, 35);
    $description = substring(strip_tags($description), 110);
    ?>
                        <div class="cource-block-two col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="lesson.php?id=<?php echo htmlspecialchars($id) ?>">
                                        <img src="images/course/<?php echo htmlspecialchars($image) ?>" height=200 alt="<?php echo htmlspecialchars($name) ?>" />
                                    </a>
                                </div>
                                <div class="lower-content">
                                    <div class="d-flex justify-content-between">
                                        <h5><a href="lesson.php?id=<?php echo htmlspecialchars($id) ?>"><?php echo htmlspecialchars($subtitle) ?></a></h5>
                                        <span class="hour"><?php echo htmlspecialchars($price) ?></span>
                                    </div>
                                    <div class="text"><?php echo htmlspecialchars($description) ?></div>
                                    <div class="d-flex justify-content-between">
                                        <div class="pull-left">
                                            <div class="students"><?php echo htmlspecialchars($videonum) ?>ta video</div>
                                        </div>
                                        <div class="pull-right">
                                            <div class="hour"><?php echo htmlspecialchars($hours) ?> Soat</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- Footer -->
     <?php require_once 'inc/footer.php'?>
</body>

</html>