<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/function.php';?>
<?php require_once 'include/config.php';?>
<?php
$aboutus = new Operation();
$stmt = $aboutus->selectall("about");
while ($rows = $stmt->fetch()) {
    $theme = $rows["title"];
    $info = $rows["info"];
}
$title = htmlspecialchars($theme);
$des = strip_tags($info);
$des = substring($des, 120);
$description = htmlspecialchars($des);
$image = "assets/images/logo.png";
$keywords = "about us";
$canonical = "aboutus.php";
require_once 'inc/head.php'?>
<body>
<?php require_once 'inc/header.php'?>
<section class="mt-5">
        <div class="auto-container my-5">
            <div class="inner-container">
            <?php

?>
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2><?php echo htmlspecialchars($theme); ?></h2>
                </div>
                <!-- About US -->
                <div class="aboutus">

                    <p><?php echo htmlspecialchars(strip_tags($info)) ?></p>
                </div>

            </div>
        </div>
    </section>
<!-- Footer -->
<?php require_once 'inc/footer.php'?>
</body>
</html>
