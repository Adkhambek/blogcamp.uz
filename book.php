<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php require_once 'include/config.php';?>
<?php
$getid = $_GET['id'];
$obj = new Operation();
// fetch all result from blog post
$stmt = $obj->selectbyid("book", $getid);
$result = $stmt->rowcount();
if ($result == 1) {
    while ($rows = $stmt->fetch()) {
        $name = $rows["name"];
        $author = $rows["author"];
        $category = $rows["category"];
        $lang = $rows["lang"];
        $publish = $rows["publish"];
        $descript = $rows["description"];
        $page = $rows["page"];
        $file = $rows["file"];
        $image = $rows["image"];
    }
} else {
    $_SESSION["ErrorMessage"] = "Siz qidirayotkan sahifa topilmadi";
    Redirect_to("books.php");
}
$title = htmlspecialchars($name);
$des = strip_tags($descript);
$des = substring($des, 120);
$description = htmlspecialchars($des);
$image = "images/book/" . $image;
$keywords = "";
$canonical = "book.php?id=" . $getid;
require_once 'inc/head.php'
?>
<body>
<!-- Header-top  -->
<?php require_once 'inc/header.php'?>
<section class="book-section">
        <div class="books-detail-section">
            <div class="auto-container">
                <div class="row">
                    <!-- Info Section -->
                    <div class="info-column col-lg-3 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <img src="<?php echo IMAGE ?>" alt="<?php echo substring($name, 120); ?>">
                            </div>
                            <ul class="book-info">
                                <li>Nashr Qilingan: <span><?php echo htmlspecialchars($publish); ?></span></li>
                                <li>Kitob yo'nalishi: <span><?php echo htmlspecialchars($category); ?></span></li>
                                <li>Tili: <span><?php echo htmlspecialchars($lang); ?></span></li>
                                <li>Beti: <span><?php echo htmlspecialchars($page); ?></span></li>
                            </ul>
                            <a href="pdf/<?php echo $file ?>" download="<?php echo htmlspecialchars($file); ?>" class="theme-btn btn-style-two"><span class="txt"><i
                                        class="fas fa-download"></i> Ko'chirib olish</span></a>
                        </div>
                    </div>
                    <!-- Content Section -->
                    <div class="content-column col-lg-9 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h2><?php echo htmlspecialchars($name); ?></h2>
                            <div class="author">- <?php echo htmlspecialchars($author); ?></div>
                            <h4>Annotatsiya</h4>
                            <?php echo $descript; ?>
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
