<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php require_once 'include/config.php';?>
<?php require_once 'include/strings.php'?>
<?php
if (isset($_POST["Submit"])) {
    $mail = $_POST["mail"];
    if (!empty($mail)) {
        $newsletter = new Operation();
        $result = $newsletter->checkcount($mail);
        if ($result > 0) {
            $_SESSION["ErrorMessage"] = "bu mail bilan oldin ham kirgansiz";
            Redirect_to($url_path);
        } else {
            $data = [
                'mail' => $mail,
                'date' => datetime(),
            ];
            $newsletter->insert($data, "newsletter");
            $_SESSION["SuccessMessage"] = "Siz yangiliklar bo\'limiga obuna bo\'ldingiz";
            Redirect_to($url_path);
        }
    } else {
        $_SESSION["ErrorMessage"] = "Katak bo\'sh, iltimos to\'ldiring";
        Redirect_to($url_path);
    }
}
?>
<?php
$title = "Blogcamp.uz - dasturlash, foydali postlar, videolar, kitoblar, kurslar va yangiliklar";
$description = "Blogcamp - turli mavzular bo'yicha blog postlar, turli xildagi kitoblar va onlayn kurslar to'plami";
$image = "assets/images/logo.png";
$keywords = "Blog postlar, texnologiyalar, kurslar, kitoblar, dasturlash";
$canonical = "";
require_once 'inc/head.php'?>
<body>
    <?php require_once 'inc/header.php'?>
    <section class="mt-2">
        <div class="auto-container">
            <div class="row">
                <!-- Search for mobile -->
                <div class="col-12 mt-3 d-lg-none mt-3">
                    <div class="search-boxed ">
                        <div class="search-box">
                            <form method="GET" action="<?php echo $url_path.'/'; ?>">
                                <div class="form-group">
                                    <input type="text" name="search" value="" placeholder="Qidiruv so'rovini kiriting"
                                        required="">
                                    <button class="shadow-none" type="submit"><span
                                            class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="two-dropdowns mt-3">
                    <!--Mavzular bolimi-->
                    <div class="dropdown">
                        <button class="btn dropdown-toggle shadow-none" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-book"></i> Mavzular</button>
                        <div class="dropdown-menu dropdown-primary">
                            <?php
$category = new Operation();
$stmt = $category->selectall("postc");
while ($rows = $stmt->fetch()) {
    $category = $rows["title"];
    ?>
                            <a class="dropdown-item"
                                href="?category=<?php echo $category; ?>"><?php echo $category; ?></a>
                            <?php }?>
                        </div>
                    </div>
                    <!--Saralash-->
                    <div class="dropdown ml-2">
                        <button class="btn dropdown-toggle shadow-none" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-filter"></i> Saralash</button>
                        <div class="dropdown-menu dropdown-primary">
                            <a class="dropdown-item" href="?filter=newest">Eng so'nggi</a>
                            <a class="dropdown-item" href="?filter=views">Ko'p ko'rilgan</a>
                            <a class="dropdown-item" href="?filter=oldest">Eski mavzular</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="auto-container mt-4">
            <div class="row">
                <div class="col-12">
<?php
$output;
?>
                </div>
            </div>
        </div>

        <div class="auto-container">
            <div class="row">
                <div class=" col-lg-8 col-md-12 col-sm-12 ">
<?php
$post = new Operation();
if (isset($_GET["search"])) {
    $Search = $_GET["search"];
    search();
} elseif (isset($_GET["category"])) {
    $category = $_GET["category"];
    category();
} elseif (isset($_GET["filter"])) {
    $filter = $_GET["filter"];
    filter();
} elseif (isset($_GET["page"])) {
    $page = $_GET["page"];
    page();
} else {
    $stmt = $post->selectlimit("blog", 5);
}
while ($rows = $stmt->fetch()) {
    $id = $rows["id"];
    $title = $rows["title"];
    $category = $rows["category"];
    $date = $rows["date"];
    $post = $rows["post"];
    $image = $rows["image"];
    $subtitle = substring($title, 25);
    $post = substring(strip_tags($post), 120);
    ?>
                    <div class="content-block">
                        <div class="card mb-3 rounded-0">
                            <div class="container ">
                                <div class="row ">
                                    <div class="col-md-5 p-0 ">
                                        <a href="post.php?id=<?php echo htmlspecialchars($id) ?>">
                                            <img src="images/blog/<?php echo htmlspecialchars($image) ?>"
                                                class="img-responsive  w-100" height="220">
                                        </a>
                                    </div>
                                    <div class="col-md-7 ">
                                        <div class="card-body px-3 py-3">
                                            <h4 class="card-title"><a
                                                    href="post.php?id=<?php echo htmlspecialchars($id) ?>"><?php echo htmlspecialchars($subtitle) ?></a>
                                            </h4>
                                            <small class="card-subtitle topic"><i class="fas fa-tags"
                                                    aria-hidden="true"></i>
                                                <?php echo htmlspecialchars($category) ?></small>
                                            <small class="card-subtitle hours"><i class="far fa-clock"
                                                    aria-hidden="true"></i>
                                                <?php echo htmlspecialchars($date) ?></small>
                                            <p class="card-text"><?php echo $post ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <!-- Pagination -->
                    <div class="styled-pagination mb-3">
                        <?php
if (!isset($page) and !isset($Search)) {
    ?>
                        <a href="?page=2" style="background: #00ab15; color: #fff;"
                            class="btn shadow-none">Boshqa maqolalar</a>
                        <?php }?>
                        <ul class="clearfix">
                            <?php
if (isset($page)) {
    if ($page > 1) {
        ?>
                            <li class="prev">
                                <a href="?page=<?php echo $page - 1; ?>"><span class="fa fa-angle-left"></span>
                                </a>
                            </li>
                            <?php }}?>
                            <?php
$post = new Operation();
$pagination = pagination();
for ($i = 1; $i <= $pagination; $i++) {
    if (isset($page)) {
        if ($i == $page) {
            ?>
                            <li class="active"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
} else {
            ?>

                            <li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php }}}?>

                            <?php
if (isset($page) && !empty($page)) {
    if ($page + 1 <= $pagination) {

        ?>
                            <li class="next">
                                <a href="?page=<?php echo $page + 1; ?>"><span class="fa fa-angle-right"></span>
                                </a>
                            </li>
                            <?php }}?>
                        </ul>
                    </div>
                </div>

                <!-- side bar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <!-- Hot topics -->
                    <div class="hot-topic mb-3">
                        <div class="card" ">
            <div class=" card-header">
                            Eng ko'p o'qilgan:
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
$post = new Operation();
$stmt = $post->selectorderlimit("blog", "view", 4);
while ($rows = $stmt->fetch()) {
    $title = $rows["title"];
    $id = $rows["id"];
    $title = substring($title, 35);
    ?>
                            <li class="list-group-item"><a
                                    href="post.php?id=<?php echo htmlspecialchars($id) ?>"><?php echo htmlspecialchars($title); ?></a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <!-- Subscribe newslater -->
                <div class="subscribe mb-3">
                    <div class="card   ">
                        <div class="card-header">
                            Xabarnomalar obunasi
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="form-group text-center">
                                    <input type="email" name="mail" class="form-control mb-4"
                                        placeholder="Email manzilingiz">
                                    <button type="submit" name="Submit" class="btn btn-block  shadow-none">
                                        Obuna bo'lish
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Status -->
                <div class="status  mb-3">
                    <div class="card rounded-0">
                        <div class="card-header">
                            Kun Statusi
                        </div>
                        <div class="card-body">
                            <?php
$quote = new Operation();
$stmt = $quote->selectlimit("quotes", 1);
while ($rows = $stmt->fetch()) {
    $quote = $rows["quote"];
    $author = $rows["author"];
    $quote = strip_tags($quote)

    ?>
                            <blockquote class="blockquote">
                                <p><?php echo htmlspecialchars($quote); ?></p>
                                <footer class="blockquote-footer"><cite
                                        title="Source Title"><?php echo htmlspecialchars($author); ?></cite>
                                </footer>
                            </blockquote>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="section-two mt-5" style="background-image: url(assets/images/backgr1.png)">
        <div class="auto-container">
            <div class="content">
                <?php echo $subscribe; ?>
            </div>
            <div class="subscribe-form mt-5">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group clearfix">
                        <span class="icon flaticon-mail"></span>
                        <input type="email" name="mail" value="" placeholder="Email manzilingizni kiriting" required="">
                        <button type="submit" name="Submit" class="theme-btn btn-style"><span class="txt"> Obuna bo'lish
                            </span></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php require_once 'inc/footer.php'?>
<script src="<?php echo URLROOT; ?>/assets/js/sweetalert.min.js"></script>
     <?php
echo SuccessMessage();
echo ErrorMessage();
?>
</body>
</html>