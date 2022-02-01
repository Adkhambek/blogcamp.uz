<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php require_once 'include/config.php';?>
<?php
$title = "Kitob bo'limi - siz bu yerda turli yo'nalishlardagi kitoblarni topishingiz mumkin";
$description = "Kitob bo'limi - turli mavzular bo'yicha: dasturchilik, dizaynerlik, muhandislik, til, adabiyotlarga doir kitoblar to'plami";
$image = "assets/images/logo.png";
$keywords = "kitoblar, mashxur kitoblar, adabiyotlar, kitob ko'chirish, til, video kurslar, darsliklar";
$canonical = "books.php";
require_once 'inc/head.php'?>
<body>
<?php require_once 'inc/header.php'?>
    <section class="mt-4">
        <div class="auto-container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title">
                        <h2>Kitoblar Bo'limi</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <ul class="tab-btns tab-buttons clearfix">
<?php
$category = new Operation();
$stmt = $category->selectall("bookc");
while ($rows = $stmt->fetch()) {
    $category = $rows["title"];
    ?>
                        <a href="books.php?category=<?php echo $category; ?>"><li class="tab-btn"><?php echo $category; ?></li></a>
<?php }?>
                        <!-- <li class="tab-btn active-btn">Badiiy</li> -->
                    </ul>
                    <div class="tabs-content">
                        <div class="content">
                            <div class="row">
                                <?php
$book = new Operation();
if (isset($_GET["category"])) {
    $category = $_GET["category"];
    $stmt = $book->selectbycategory("book", $category, "id");
} else {
    $stmt = $book->selectlimit("book", 50);
}
while ($rows = $stmt->fetch()) {
    $id = $rows["id"];
    $name = $rows["name"];
    $image = $rows["image"];
    $subname = substring($name, 35);
    ?>
                                <div class="book-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                        <a href="book.php?id=<?php echo htmlspecialchars($id) ?>"><img src="images/book/<?php echo htmlspecialchars($image) ?>" alt="<?php echo htmlspecialchars($subname) ?>"></a>
                                            <!-- Overlay Box -->
                                       </figure>
                                        <div class="lower-box">
                                            <h6><a href="book.php?id=<?php echo htmlspecialchars($id) ?>""><?php echo htmlspecialchars($subname) ?></a></h6>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination in the future when collection becomes more and more -->
                </div>
                <div class="widgets-column col-lg-4 col-md-12 col-sm-12 ">
                    <div class="inner-column">
                        <h5>Ommabop kitoblar</h5>
                        <div class="widgets-outer">

                            <!-- Book Widget -->
                            <?php
$popular = new Operation();
$stmt = $popular->selectbypopular("book", 5);
while ($rows = $stmt->fetch()) {
    $id = $rows["id"];
    $name = $rows["name"];
    $image = $rows["image"];
    $author = $rows["author"];
    $subname = substring($name, 35);

    ?>
                            <div class="book-widget">
                                <div class="widget-inner">
                                    <div class="image">
                                        <a href="book.php?id=<?php echo htmlspecialchars($id) ?>"><img src="images/book/<?php echo htmlspecialchars($image) ?>" alt="<?php echo htmlspecialchars($subname) ?>"></a>
                                    </div>
                                    <h6><a href="book.php?id=<?php echo htmlspecialchars($id) ?>"><?php echo htmlspecialchars($subname) ?></a></h6>
                                    <div class="author">- <?php echo htmlspecialchars($author) ?></div>
                                </div>
                            </div>
<?php }?>
                       </div>
                    </div>
                </div>
            </div>
        </div>
</section>
 <!-- Footer -->
<?php require_once 'inc/footer.php'?><br>
<script src="<?php echo URLROOT; ?>/assets/js/sweetalert.min.js"></script>
     <?php
echo SuccessMessage();
echo ErrorMessage();
?>
</body>
</html>