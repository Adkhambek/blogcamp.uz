<?php require_once 'include/db_connect.php';?>
<?php require_once 'include/db_operations.php';?>
<?php require_once 'include/function.php';?>
<?php require_once 'include/config.php';?>
<?php
$title = "Portfolio - siz bu yerda men haqimda to'liq ma'lumotga ega bo'lasiz";
$description = "Portfolio - men haqimda, qilgan proyektlarim, qaysi soxalarni bilishim va boshqalar";
$image = "assets/images/logo.png";
$keywords = "portfolio, Muzaffarov Adhambek";
$canonical = "portfolio.php";
require_once 'inc/head.php'
?>
<body>
<?php require_once 'inc/header.php'?>
<section>
<?php
$portfolio = new Operation();
$stmt = $portfolio->selectall("portfolio");
while ($rows = $stmt->fetch()) {
    $info = $rows["info"];
    $site = $rows["site"];
    $phone = $rows["phone"];
    $mail = $rows["mail"];
    $telegram = $rows["telegram"];
    $hobby = $rows["hobby"];
    $level = $rows["level"];
    $image = $rows["image"];
    $cv = $rows["cv"];
}
?>
        <div class="home-section" id="home">
            <div class="auto-container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="home-content">
                            <div class="home-image">
                                <img src="<?php echo URLROOT; ?>/assets/images/<?php echo htmlspecialchars($image) ?>" alt="Muzaffarov Adhambek">
                            </div>
                            <div class="home-main-content">
                                <h4 class="heading ">
                                    Muzaffarov Adhambek
                                </h4>
                                <div class="designation">
                                    <span>
                                        Men <span class="type"></span>
                                    </span>
                                </div>
                                <div class="social-info">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-telegram-plane"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="about-links  " data-wow-delay="0.6s"
                                    style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                                    <a href="#contact" class="theme-btn btn-style-three"> <span
                                            class="txt">Bo'g'lanish</span></a>
                                    <a href="#"
                                        class="theme-btn btn-style-three"> <span class="txt"> <i
                                                class="fas fa-play"></i> Intro</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="auto-container mt-5">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="title-about">
                        <h2>Men Haqimda</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="auto-container mt-3">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">

                    <div class="about-image  ">
                        <img src="<?php echo URLROOT; ?>/assets/images/<?php echo htmlspecialchars($image) ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 mt-4">
                    <div class="short-description">
                        <p>
                        <?php echo htmlspecialchars(strip_tags($info)) ?>
                        </p>

                        <div class="about-links">
                            <a href="<?php echo URLROOT; ?>/pdf/cv/<?php echo $cv ?>" download="<?php echo htmlspecialchars($cv); ?>"" class="theme-btn btn-style"> <span class="txt">CV ko'chirib olish</span> </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                    <div class="shortinfo">
                        <div class="personal-info">
                            <ul>
                                <li>
                                    <span><label>Tug'lgan:</label> 27.11.1999</span>
                                </li>
                                <li>
                                    <span><label>Yosh:</label>
                             <?php echo mayage(); ?>
                                 </span>
                                </li>
                                <li>
                                    <span><label>Shaxar:</label> Toshkent, Uzbekiston</span>
                                </li>
                                <li>
                                    <span><label>Qiziqish:</label><?php echo htmlspecialchars($hobby); ?></span>
                                </li>
                                <li>
                                    <span><label>Ta'lim:</label> Toshkent Inha Universitet</span>
                                </li>
                                <li>
                                    <span><label>Daraja:</label> <?php echo htmlspecialchars($level) ?></span>
                                </li>
                                <li>
                                    <span><label>Vebsayt:</label> <a href="<?php echo URLROOT; ?>"><?php echo htmlspecialchars($site) ?></a></span>
                                </li>
                                <li>
                                    <span><label>Mail:</label> <a href="mailto:<?php echo htmlspecialchars($mail) ?>"><?php echo htmlspecialchars($mail) ?></a></span>
                                </li>
                                <li>
                                    <span><label>Phone:</label> <?php echo htmlspecialchars($phone) ?></span>
                                </li>
                                <li>
                                    <span><label>Telegram:</label> <a href="https://t.me/<?php echo htmlspecialchars($telegram) ?>">@<?php echo htmlspecialchars($telegram) ?></a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="service-wrapper" id="service">
            <div class="auto-container mt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="title-about">
                            <h2>Mening Xizmatlarim</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="auto-container mt-3">


                <div class="row justify-content-center">
<?php
$service = new Operation();
$stmt = $service->selectall("service");
while ($rows = $stmt->fetch()) {
    $name = $rows["name"];
    $image = $rows["photo"];
    $serviceinfo = $rows["description"];

    ?>
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="service-card">
                            <img src="<?php echo URLROOT; ?>/assets/images/services/<?php echo htmlspecialchars($image) ?>" alt="">
                            <div class="content">
                                <h4>
                                <?php echo htmlspecialchars($name); ?>
                                </h4>
                                <p>
                                <?php echo htmlspecialchars(strip_tags($serviceinfo)); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>

        <div class="resume-wrapper" id="resume">


            <div class="auto-container mt-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="title-about">
                            <h2>Mening Yo'nalishlarim</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="auto-container mt-3">


                <div class="row">

                    <div class="col-lg-6 mt-4">
                        <div class="resume-box">
                            <div class="resume-title">
                                <h4 class="title">
                                    Texnologiyalar
                                </h4>
                            </div>
                            <div class="skill-list">
                                <div class="single-skill">
                                    <div class="heading">
                                        <h4 class="name">
                                        PHP
                                        </h4>
                                        <h5 class="value">
                                            75%
                                        </h5>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="single-skill  ">
                                    <div class="heading">
                                        <h4 class="name">
                                            Bootstrap
                                        </h4>
                                        <h5 class="value">
                                            75%
                                        </h5>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="single-skill">
                                    <div class="heading">
                                        <h4 class="name">
                                            HTML5 (HTML/CSS/JS)
                                        </h4>
                                        <h5 class="value">
                                            55%
                                        </h5>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 55%"></div>
                                    </div>
                                </div>
                                <div class="single-skill  ">
                                    <div class="heading">
                                        <h4 class="name">
                                         API (Telegram bot)
                                        </h4>
                                        <h5 class="value">
                                            75%
                                        </h5>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 75%"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="resume-box">
                            <div class="resume-title">
                                <h4 class="title">
                                    Tillar
                                </h4>
                            </div>
                            <div class="skill-list">
                                <div class="single-skill  ">
                                    <div class="heading">
                                        <h4 class="name">
                                            O'zbek tili
                                        </h4>
                                        <h5 class="value">
                                            75%
                                        </h5>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 95%"></div>
                                    </div>
                                </div>
                                <div class="single-skill  ">
                                    <div class="heading">
                                        <h4 class="name">
                                            Ingliz tili
                                        </h4>
                                        <h5 class="value">
                                            65%
                                        </h5>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 65%"></div>
                                    </div>
                                </div>
                                <div class="single-skill  ">
                                    <div class="heading">
                                        <h4 class="name">
                                            Rus tili
                                        </h4>
                                        <h5 class="value">
                                            30%
                                        </h5>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 30%"></div>
                                    </div>
                                </div>
                                <div class="single-skill">
                                    <div class="heading">
                                        <h4 class="name">
                                            Arab tili
                                        </h4>
                                        <h5 class="value">
                                            30%
                                        </h5>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 30%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="resume-box">
                            <div class="resume-title">
                                <h4 class="title">
                                    Yo'nalishlar
                                </h4>
                            </div>
                            <div class="skill-list2">
                                <div class="single-skill2">
                                    <div class="circle-progress">
                                        <div class="background" style="background-color: rgb(179, 206, 246);"></div>
                                        <div class="rotate"
                                            style="background-color: rgb(75, 134, 219); transform: rotate(220deg);">
                                        </div>
                                        <div class="left"
                                            style="background-color: rgb(179, 206, 246); animation: 1250ms step-start 0s 1 normal none running toggle; opacity: 0;">
                                        </div>
                                        <div class="right"
                                            style="background-color: rgb(75, 134, 219); animation: 1250ms step-end 0s 1 normal none running toggle; opacity: 1;">
                                        </div>
                                        <div class=""><span>70%</span></div>
                                    </div>
                                    <h4 class="name">
                                        Back-end
                                    </h4>
                                </div>
                                <div class="single-skill2">
                                    <div class="circle-progress">
                                        <div class="background" style="background-color: rgb(179, 206, 246);"></div>
                                        <div class="rotate"
                                            style="background-color: rgb(75, 134, 219); transform: rotate(190deg);">
                                        </div>
                                        <div class="left"
                                            style="background-color: rgb(179, 206, 246); animation: 1111.11ms step-start 0s 1 normal none running toggle; opacity: 0;">
                                        </div>
                                        <div class="right"
                                            style="background-color: rgb(75, 134, 219); animation: 1111.11ms step-end 0s 1 normal none running toggle; opacity: 1;">
                                        </div>
                                        <div class=""><span>50%</span></div>
                                    </div>
                                    <h4 class="name">
                                        Veb dizayn
                                    </h4>
                                </div>
                                <div class="single-skill2">
                                    <div class="circle-progress">
                                        <div class="background" style="background-color: rgb(179, 206, 246);"></div>
                                        <div class="rotate"
                                            style="background-color: rgb(75, 134, 219); transform: rotate(200deg);">
                                        </div>
                                        <div class="left"
                                            style="background-color: rgb(179, 206, 246); animation: 1428.57ms step-start 0s 1 normal none running toggle; opacity: 0;">
                                        </div>
                                        <div class="right"
                                            style="background-color: rgb(75, 134, 219); animation: 1428.57ms step-end 0s 1 normal none running toggle; opacity: 1;">
                                        </div>
                                        <div class=""><span>60%</span></div>
                                    </div>
                                    <h4 class="name">
                                        Front-end
                                    </h4>
                                </div>
                                <div class="single-skill2">
                                    <div class="circle-progress" data-percent="85">
                                        <div class="background" style="background-color: rgb(179, 206, 246);"></div>
                                        <div class="rotate"
                                            style="background-color: rgb(75, 134, 219); transform: rotate(200deg);">
                                        </div>
                                        <div class="left"
                                            style="background-color: rgb(179, 206, 246); animation: 1176.47ms step-start 0s 1 normal none running toggle; opacity: 0;">
                                        </div>
                                        <div class="right"
                                            style="background-color: rgb(75, 134, 219); animation: 1176.47ms step-end 0s 1 normal none running toggle; opacity: 1;">
                                        </div>
                                        <div class=""><span>60%</span></div>
                                    </div>
                                    <h4 class="name">
                                        Telegram bot
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="resume-box">
                            <div class="resume-title">
                                <h4 class="title">
                                    Bilim
                                </h4>
                            </div>
                            <div class="knowledge-list">

<?php
$knowladge = new Operation();
$stmt = $service->selectall("knowladge");
while ($rows = $stmt->fetch()) {
    $info = $rows["info"];
    ?>

                                <div class="single-knowledge">
                                    <p>
                                        <?php echo htmlspecialchars(strip_tags($info)); ?>
                                    </p>
                                </div>
 <?php }?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mywork">


                <div class="auto-container mt-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="title-about">
                                <h2>Mening Ishlarim</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="auto-container mt-3">


                    <div class="row">
                        <div class="col-lg-12 mt-4">
                            <div class="mywork-card">
                                <ol>
                                <?php
$knowladge = new Operation();
$stmt = $service->selectall("mywork");
while ($rows = $stmt->fetch()) {
    $name = $rows["name"];
    $link = $rows["link"];
    $description = $rows["description"];
    ?>
                                    <li>
                                        <a href="https://<?php echo htmlspecialchars($link); ?>" target="_blank"><?php echo htmlspecialchars($name); ?></a> - <?php echo htmlspecialchars(strip_tags($description)); ?>
                                    </li>
<?php }?>
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="contactme mb-5" id="contact">
                <div class="auto-container mt-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="title-about">
                                <h2>Menga Bog'lanish</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="auto-container mt-3">
                    <div class="row">
                        <div class="col-lg-4 mt-4">
                            <div class="single-contact">

                                <div class="info-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Telefon Raqam:</h5>
                                    <p><?php echo htmlspecialchars($phone); ?></p>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-4 mt-4">
                            <div class="single-contact">


                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-contentr">
                                    <h5>Elektron pochta:</h5>
                                    <p><?php echo htmlspecialchars($mail); ?></p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 mt-4">
                            <div class="single-contact">

                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Manzilim:</h5>
                                    <p>Toshkent sh, Mirzo Ulug'bek</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
<!-- Footer -->
<?php require_once 'inc/footer.php'?><br>
    <script src="assets/js/typed.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>