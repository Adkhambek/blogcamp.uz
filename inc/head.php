<?php
define('CANONICAL', URLROOT . '/' . $canonical);
define('IMAGE', URLROOT . '/' . $image);
define('DESCRIPTION', $description);
define('KEYWORDS', $keywords);
define('TITLE', $title);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- MetaTags for SEO -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php echo TITLE; ?>">
    <meta name="robots" content="index, follow" />
    <meta name="description" content="<?php echo DESCRIPTION; ?>" />
    <meta name="keywords" content="<?php echo KEYWORDS; ?>">
    <meta property="og:title" content="<?php echo TITLE; ?>">
    <meta property="og:description" content="<?php echo DESCRIPTION; ?>">
    <meta property="og:image" content="<?php echo IMAGE; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo CANONICAL; ?>">
    <meta property="og:site_name" content="blogcamp.uz">
    <link rel="canonical" href="<?php echo CANONICAL ?>" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/responsive.css">
    <?php
if ($canonical = "portfolio.php") {
    echo '<link rel="stylesheet" href="assets/css/multicolor.css">';
}
?>


    <!-- Share -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/share/jssocials.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/share/jssocials-theme-flat.css">
    <!-- Favicon -->
     <link rel="icon" href="<?php echo URLROOT; ?>/assets/images/favicon.png">
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo URLROOT; ?>/assets/images/favicon.png" type="image/x-icon">
    <!-- font family -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Titillium+Web:wght@300;400;600;700;900&display=swap"
        rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/8c685f9586.js" crossorigin="anonymous"></script>
    <title><?php echo TITLE; ?></title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-175228225-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-175228225-1');
</script>

</head>