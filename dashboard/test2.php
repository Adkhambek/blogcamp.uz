
<?php

$data = ['quote' => "Three things are infinite: the universe and human stupidity; and Im not sure about the universe.", 'author' => "Adhambek", 'date' => "7/24/2020"];
$table = "blog";
$id = 1;
$valueString = [];
foreach ($data as $key => $val) {
    $valueString[] = $key . " = : " . $key;

}

$value = implode(', ', $valueString);
echo $sql = "UPDATE " . $table . " SET " . $value . " WHERE id =$id";
$query = $this->db->prepare($sql);

foreach ($data as $key => $val) {
    $stmt->bindValue(':' . $key, $val);
}
$update = $stmt->execute();

//$valueString = implode('=: ', array_keys($data));

//print_r($ex);

// foreach ($data as $key => $val) {
//     $stmt->bindValue(':' . $key, $val);
// }

// $i = 0;
// $colvalSet = '';
// foreach ($data as $key => $val) {
//     $pre = ($i > 0) ? ', ' : '';
//     $colvalSet .= $pre . $key . "='" . $val . "'";
//     $i++;
// }
// echo $sql = "UPDATE " . $table . " SET " . $colvalSet . " WHERE id ='$id'";
// $query = $this->db->prepare($sql);
// $update = $query->execute();
