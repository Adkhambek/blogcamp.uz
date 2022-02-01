<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php require_once 'include/config.php';?>
<?php
$getid = $_GET['id'];
$getip = $_SERVER['REMOTE_ADDR'];
$obj = new Operation();
if (isset($_POST["Submit"])) {
    $fullname = $_POST["fullname"];
    $mail = $_POST["email"];
    $message = $_POST["message"];
    if (strlen($message) > 500) {
        $_SESSION["ErrorMessage"] = "Sizning fikringiz 500ta xarifdan oshmasligi kerak";
        Redirect_to("post.php?id={$getid}");
    } else {
        $data = [
            'name' => $fullname,
            'email' => $mail,
            'comment' => $message,
            'date' => datetime(),
            'post_id' => $getid,
        ];
        $obj->insert($data, "comments");
        $_SESSION["SuccessMessage"] = "Sizning fikringiz yuborildi";
        Redirect_to("post.php?id={$getid}");

    }
} elseif (isset($_POST["Submitn"])) {
    $mail = $_POST["mail"];
    if (!empty($mail)) {
        $newsletter = new Operation();
        $result = $newsletter->checkcount($mail);
        if ($result > 0) {
            $_SESSION["ErrorMessage"] = "bu mail bilan oldin ham kirgansiz";
            Redirect_to("post.php?id={$getid}");
        } else {
            $data = [
                'mail' => $mail,
                'date' => datetime(),
            ];
            $newsletter->insert($data, "newsletter");
            $_SESSION["SuccessMessage"] = "Siz yangiliklar bo\'limiga obuna bo\'ldingiz";
            Redirect_to("post.php?id={$getid}");
        }
    } else {
        $_SESSION["ErrorMessage"] = "Katak bo\'sh, iltimos to\'ldiring";
        Redirect_to("post.php?id={$getid}");
    }
}
//count view
postviewcount();
// fetch all result from blog post
$stmt = $obj->selectbyid("blog", $getid);
$result = $stmt->rowcount();
if ($result == 1) {
    while ($rows = $stmt->fetch()) {
        $theme = $rows["title"];
        $category = $rows["category"];
        $view = $rows["view"];
        $date = $rows["date"];
        $post = $rows["post"];
        $image = $rows["image"];
        $author = $rows["author"];
    }} else {
    $_SESSION["ErrorMessage"] = "Siz qidirayotkan sahifa topilmadi";
    Redirect_to("$url_path");
}
$title = htmlspecialchars($theme);
$des = strip_tags($post);
$des = substring($des, 120);
$description = htmlspecialchars($des);
$image = "images/blog/" . $image;
$keywords = "";
$canonical = "post.php?id=" . $getid;
require_once 'inc/head.php'?>
<body>
    <!-- Header-top  -->
    <?php require_once 'inc/header.php'?>
    <section class="mt-2">

        <div class="auto-container mt-3">
            <div class="row">
                <div class=" col-lg-8 col-md-12 col-sm-12 ">
                    <div class="content-block">
                        <div class="card mb-3 rounded-0">
                            <div class="container ">
                                <div class="row ">
                                    <div class="col-md-12 p-0 ">
                                        <img src="<?php echo IMAGE ?>" alt="<?php echo substring($theme, 120); ?>" class="img-responsive  w-100" height="auto">
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="card-body px-3 py-3">
                                            <h4 class="card-title"><?php echo htmlspecialchars($theme); ?></h4>
                                            <small class="card-subtitle topic"><i class="fas fa-tags"
                                                    aria-hidden="true"></i> <?php echo htmlspecialchars($category); ?></small>
                                            <small class="card-subtitle view"><i class="far fa-eye"
                                                    aria-hidden="true"></i> <?php echo htmlspecialchars($view); ?></small>
                                            <small class="card-subtitle hours"><i class="far fa-clock"
                                                    aria-hidden="true"></i> <?php echo htmlspecialchars($date); ?></small>

                                                    <?php echo $post; ?>

                                                    <div class="social-box mt-4">
                                                <h5>Do'stlarga Ulashish</h5>
                                                <div id="share"></div>
                                                     </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Comments -->
                     <!--  for future purpose
                            <div class="comment-box reply-comment">
                            <div class="comment">
                                <div class="author-thumb"><img src="assets/images/profile/author-13.jpg" alt=""></div>
                                <div class="comment-info clearfix"><strong>Paul Molive </strong>
                                    <div class="comment-time">July 01, 2019</div>
                                </div>
                                <div class="text">It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal tion of letters, as opposed to using
                                    'Content here</div>
                                <a class="theme-btn reply-btn" href="#"><i class="fas fa-reply"></i> Javob berish</a>
                            </div>
                        </div> -->

                    <div class="comments-area">
                        <div class="group-title">
                            <h4>So'ngi fikrlar:</h4>
                        </div>
<?php
$comment = new Operation();
$stmt = $comment->selectcomment("comments", $getid);
while ($rows = $stmt->fetch()) {
    $name = $rows["name"];
    $email = $rows["email"];
    $comment = $rows["comment"];
    $date = $rows["date"];
    $comment = strip_tags($comment);

    ?>
                        <div class="comment-box">
                            <div class="comment">
                                <div class="author-thumb"><img src="https://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($email))); ?>" alt="Profile Picture"></div>
                                <div class="comment-info clearfix"><strong><?php echo htmlspecialchars($name) ?> </strong>
                                    <div class="comment-time"><?php echo htmlspecialchars($date) ?></div>
                                </div>
                                <div class="text"><?php echo htmlspecialchars($comment) ?></div>

                            </div>
                        </div>
<?php }?>
                    </div>

                    <div class="comment-form mb-3">
                        <div class="group-title">
                            <h4>Fikr bildirish</h4>
                        </div>

                        <!--Comment Form-->
                        <?php

?>
                        <form method="post" action="post.php?id=<?php echo $getid; ?>">
                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="fullname" placeholder="To'liq ismingiz*" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email manzilingiz*" required="">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea class="" name="message"
                                        placeholder="O'z fikringizni yozing..." required=""></textarea>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-three" type="submit" name="Submit"
                                    data-toggle="modal" data-target="#example">
                                    <span class="txt">Fikrni Yuborish
                                    <i class="fa fa-angle-right"></i></span></button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>


                <!-- side bar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <!-- Hot topics -->
                    <div class="hot-topic mb-3">
                        <div class="card" ">
            <div class=" card-header">
                            O'xshash mavzular:
                        </div>
                        <ul class="list-group list-group-flush">
                        <?php
$related = new Operation();
$stmt = $related->selectbycategory("blog", $category, "id");
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
                        <form method="post" action="post.php?id=<?php echo $getid; ?>">
                                <div class="form-group text-center">
                                    <input type="email" name="mail" class="form-control mb-4"
                                        placeholder="Email manzilingiz">
                                    <button type="submit" name="Submitn" class="btn btn-block  shadow-none">
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
    <!-- Footer -->
    <?php require_once 'inc/footer.php'?>
   <script src="<?php echo URLROOT; ?>/assets/share/jssocials.min.js"></script>
    <script>

       $("#share").jsSocials({
    url: "<?php echo CANONICAL ?>",
    text: "text to share",
    showLabel: false,
    showCount: false,
    shareIn: "popup",
    shares: ["telegram", "facebook", "twitter",  "linkedin", "pinterest", "whatsapp"],
});
    </script>
     <script src="<?php echo URLROOT; ?>/assets/js/sweetalert.min.js"></script>
     <?php
echo SuccessMessage();
echo ErrorMessage();
?>
</body>
</html>