<?php
function Redirect_to($New_Location)
{
    header("Location:" . $New_Location);
    exit;
}
function mayage()
{
    date_default_timezone_set("Asia/Tashkent");
    $CurrentTime = time();
    $DateTime = strftime("%Y", $CurrentTime);
    return $DateTime - 1999;
}
function substring($text, $num)
{
    if (strlen($text) > $num) {
        return substr($text, 0, $num) . '...';
    }

    return $text;
}
function datetime()
{
    date_default_timezone_set("Asia/Tashkent");
    $CurrentTime = time();
    return $DateTime = strftime("%d-%m-%Y", $CurrentTime);
}
function postviewcount()
{
    global $obj, $getid, $getip;
    $data = [
        'post_id' => $getid,
        'ip' => $getip,
        'date' => datetime(),
    ];
    $stmt = $obj->insert($data, "view_count");
    $result = $obj->countview("view_count", $getid);
    $data = [
        'view' => $result,
    ];
    $obj->update("blog", $data, $getid);
}
function filter()
{
    global $filter, $output, $post, $stmt;
    switch ($filter) {
        case 'newest':
            $title = "Eng so'ngi maqolalar";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            $stmt = $post->selectlimit("blog", 5);
            break;
        case 'views':
            $title = "Eng ko'p ko'rilgan maqolalar";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            $stmt = $post->selectorder("blog", "view", 10);
            break;
        case 'comments':
            $title = "Muhokamali";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            break;

        default:
            $title = "Eng eski maqolalar";
            $output = str_replace('%TITLE%', $title, $output);
            echo $output;
            $stmt = $post->selectreverse("blog", 10);
            break;
    }

}
function search()
{
    global $Search, $output, $stmt;
    $title = "\"" . $Search . "\"" . " so'rovi bo'yicha qidiruv natijalari";
    $output = str_replace('%TITLE%', $title, $output);
    echo $output;
    $dbc = new Database();
    $sql = "SELECT * FROM blog WHERE title LIKE :search OR category LIKE :search OR date LIKE :search OR author LIKE :search OR post LIKE :search";
    $stmt = $dbc->db->prepare($sql);
    $stmt->bindValue(':search', '%' . $Search . '%');
    $stmt->execute();

}
function category()
{
    global $category, $output, $post, $stmt;
    $title = $category . " mavzusiga oid maqolalar";
    $output = str_replace('%TITLE%', $title, $output);
    echo $output;
    $category;
    $stmt = $post->selectbycategory("blog", $category, "id");
}
function page()
{
    global $page, $post, $stmt;
    if ($page == 0 || $page < 0) {
        $ShowPostFrom = 0;
    } else {
        $ShowPostFrom = ($page * 5) - 5;
    }
    $stmt = $post->selectlimitoffset("blog", $ShowPostFrom, 5);
}
function pagination()
{
    global $stmt, $post;
    $stmt = $post->count("blog");
    $RowPagination = $stmt->fetch();
    $TotalPosts = array_shift($RowPagination);
    $PostPagination = $TotalPosts / 5;
    return $PostPagination = ceil($PostPagination);
}
