<?php
require_once 'db_connect.php';
require_once 'db_operations.php';
require_once 'session.php';

if (isset($_POST["Submit"])) {
    $title = $_POST["title"];
    $date = $_POST["date"];

    $category = new Operation();

    $data = ['title' => $title, 'date' => $date];
    $tablename = 'postc';
    $successm = "Every thing is correct";
    $location = "test.php";
    $errorm = "Something wrong";

    $category->insert($data, $tablename, $successm, $location, $errorm);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo ErrorMessage();
echo SuccessMessage();
?>
  <form action="test.php" method ="post" >
  <input  name= "title" type="text">
  <input  name= "date" type="date">
  <button name ="Submit" type ="submit">Submit</button>
  </form>
</body>
</html>
