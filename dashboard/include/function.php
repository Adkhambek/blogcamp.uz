<?php
require_once 'db_connect.php';

function breadcrumb()
{
    $url = substr($_SERVER["REQUEST_URI"], 1);
    $crumbs = explode("/", $url);

    foreach ($crumbs as $crumb) {

        $rep1 = str_replace(array(".php", "_"), array("", " "), $crumb);
        echo "<li class='breadcrumb-item'>" . $rep1 . "</li>";
    }
}
function Redirect_to($New_Location)
{
    header("Location:" . $New_Location);
    exit;
}
function datetime()
{
    date_default_timezone_set("Asia/Tashkent");
    $CurrentTime = time();
    return $DateTime = strftime("%d-%m-%Y", $CurrentTime);
}

function fileupload()
{

    $target = "../pdf/" . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target);

}
function imageupload($direction)
{

    $target = "../images/" . $direction . "/" . basename($_FILES["image"]["name"]);
    return $move = move_uploaded_file($_FILES["image"]["tmp_name"], $target);

}
function substring($text, $num)
{
    if (strlen($text) > $num) {
        return substr($text, 0, $num) . '...';
    }

    return $text;
}
function cvupload()
{

    $target = "../pdf/cv/" . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $target);

}
function login_attampt($Username, $Password)
{
    $login = new Database();
    $db = $login->db;

    $sql = "SELECT * FROM admin WHERE username=:UserName AND password=:PassWord LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':UserName', $Username);
    $stmt->bindValue(':PassWord', $Password);
    $stmt->execute();
    $Result = $stmt->rowcount();
    if ($Result == 1) {
        return $Found_Account = $stmt->fetch();
    } else {
        return null;
    }
}
function confirm_login()
{
    if (isset($_SESSION["UserId"])) {
        return true;
    } else {
        $_SESSION["ErrorMessage"] = "Login Required !";
        Redirect_to("login");
    }
}
