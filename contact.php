<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/session.php';?>
<?php require_once 'include/function.php';?>
<?php require_once 'include/config.php';?>
<?php require_once 'include/strings.php'?>
<?php
$obj = new Operation();
if (isset($_POST["Submit"])) {
    $message = $_POST["message"];
    if (strlen($message) > 500) {
        $_SESSION["ErrorMessage"] = "Sizning fikringiz 500ta xarifdan oshmasligi kerak";
        Redirect_to("contact.php");
    } else {
        $data = [
            'name' => $_POST["username"],
            'surname' => $_POST["lastname"],
            'mail' => $_POST["email"],
            'tel' => $_POST["phone"],
            'message' => $message,
            'date' => datetime(),
        ];
        $obj->insert($data, "contact");
        $_SESSION["SuccessMessage"] = "Sizning xabaringiz yuborildi";
        Redirect_to("contact.php");

    }
} elseif (isset($_POST["Submitn"])) {
    $mail = $_POST["mail"];
    if (!empty($mail)) {
        $newsletter = new Operation();
        $result = $newsletter->checkcount($mail);
        if ($result > 0) {
            $_SESSION["ErrorMessage"] = "bu mail bilan oldin ham kirgansiz";
            Redirect_to("contact.php");
        } else {
            $data = [
                'mail' => $mail,
                'date' => datetime(),
            ];
            $newsletter->insert($data, "newsletter");
            $_SESSION["SuccessMessage"] = "Siz yangiliklar bo\'limiga obuna bo\'ldingiz";
            Redirect_to("contact.php");
        }
    } else {
        $_SESSION["ErrorMessage"] = "Katak bo\'sh, iltimos to\'ldiring";
        Redirect_to("contact.php");
    }
}
?>
<?php
$title = "Bizga bog'lanish";
$description = "Bizga bog'lanish...";
$image = "assets/images/logo.png";
$keywords = "contact us";
$canonical = "contact.php";
require_once 'inc/head.php'?>
<body>
<?php require_once 'inc/header.php'?>
    <section class="mt-5">
        <div class="auto-container mt-3">
            <div class="inner-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2>Bizga bog'lanish</h2>
                </div>
                <!-- Contact Form -->
                <div class="contact-form">
                    <!-- Profile Form -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="contact-form">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="username" placeholder="Ismingiz*" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="lastname" placeholder="Familyangiz*" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email*" required="">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" placeholder="Telefon Raqamingiz*" required="">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea class="" name="message" placeholder="Sizning Xabaringiz"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                                <button class="theme-btn btn-style-three" type="submit" name="Submit"><span
                                        class="txt">Xabarni yuborish <i class="fa fa-angle-right"></i></span></button>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
            <div class="contact-info-section">
                <div class="title-box">
                    <h2>Bog'lanish turlari:</h2>
               </div>
                <div class="row clearfix">
                    <!-- Info Column -->
                    <div class="info-column col-lg-4 col-md-6 col-sm-12">
                        <div class="info-inner">
                            <div class="icon fa fa-phone"></div>
                            <strong>Telefon</strong>
                            <ul>
                                <li><a href="tel:+998998000334">+998 (99) 800-03-34</a></li>
                                <li><a href="tel:+1-123-456-7890">+998 (94) 405-08-18</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Info Column -->
                    <div class="info-column col-lg-4 col-md-6 col-sm-12">
                        <div class="info-inner">
                            <div class="icon fa fa-envelope-o"></div>
                            <strong>Email</strong>
                            <ul>
                                <li><a href="mailto:info@blogcamp.com">info@blogcamp.com</a></li>
                                <li><a href="mailto:muzaffarov.adham@gmail.com">muzaffarov.adham@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Info Column -->
                    <div class="info-column col-lg-4 col-md-6 col-sm-12">
                        <div class="info-inner">
                            <div class="icon fa fa-map-marker"></div>
                            <strong>Manzil</strong>
                            <ul>
                                <li>Mirzo Ulug'bek tumani, Toshkent shahri</li>
                            </ul>
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
                        <button type="submit" name="Submitn" class="theme-btn btn-style"><span class="txt"> Obuna bo'lish
                            </span></button>
                    </div>
                </form>
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