<?php
class Operation extends Database
{

    public function insert($data, $table)
    {
        $columnString = implode(',', array_keys($data));
        $valueString = ":" . implode(',:', array_keys($data));

        $sql = "INSERT INTO " . $table . "(" . $columnString . ")";
        $sql .= "VALUES(" . $valueString . ")";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $val) {
            $stmt->bindValue(':' . $key, $val);
        }
        $stmt->execute();

    }
    public function update($table, $data, $id)
    {
        $valueString = [];
        foreach ($data as $key => $val) {
            $valueString[] = $key . " = :" . $key;

        }

        $value = implode(', ', $valueString);
        $sql = "UPDATE " . $table . " SET " . $value . " WHERE id = :id ";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $val) {
            $stmt->bindValue(':' . $key, $val);
        }
        $stmt->bindValue(':id', $id);
        $update = $stmt->execute();

    }
    public function countview($table, $postid)
    {

        $sql = "SELECT COUNT(*) FROM " . $table . " where post_id=:post_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':post_id', $postid);
        $stmt->execute();
        return $result = $stmt->fetchColumn();

    }
    public function checkcount($mail)
    {

        $sql = "SELECT COUNT(*) FROM newsletter where mail=:mail";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':mail', $mail);
        $stmt->execute();
        return $result = $stmt->fetchColumn();
        // if ($res > 0) {
        //     echo "true";
        // } else {
        //     echo "false";
        // }
    }

    public function selectall($table)
    {
        $sql = "SELECT * FROM " . $table . " ORDER BY id DESC";
        return $stmt = $this->db->query($sql);

    }
    public function count($table)
    {
        $sql = "SELECT COUNT(*) FROM " . $table;
        return $stmt = $this->db->query($sql);

    }
    public function selectreverse($table, $limit)
    {
        $sql = "SELECT * FROM " . $table . " ORDER BY id ASC LIMIT $limit";
        return $stmt = $this->db->query($sql);

    }
    // not finished yet, there should be optimization like array usage

    public function selectbyid($table, $id)
    {

        $sql = "SELECT * FROM " . $table . " WHERE id='$id'";
        return $stmt = $this->db->query($sql);

    }
    public function selectbypopular($table, $limit)
    {

        $sql = "SELECT * FROM " . $table . " WHERE popular=1 ORDER BY id DESC LIMIT {$limit}";
        return $stmt = $this->db->query($sql);

    }

    public function selectcomment($table, $id)
    {

        $sql = "SELECT * FROM " . $table . " WHERE post_id='$id' ORDER BY id DESC";
        return $stmt = $this->db->query($sql);

    }
    public function selectorder($table, $order, $limit)
    {

        $sql = "SELECT * FROM " . $table . " ORDER BY " . $order . " DESC LIMIT $limit";
        return $stmt = $this->db->query($sql);

    }
    public function selectlimit($table, $limit)
    {

        $sql = "SELECT * FROM " . $table . " ORDER BY id DESC LIMIT $limit";
        return $stmt = $this->db->query($sql);

    }
    public function selectlimitoffset($table, $offset, $limit)
    {

        $sql = "SELECT * FROM " . $table . " ORDER BY id DESC LIMIT $offset, $limit";
        return $stmt = $this->db->query($sql);

    }
    public function selectorderlimit($table, $order, $limit)
    {

        $sql = "SELECT * FROM " . $table . " ORDER BY " . $order . " DESC LIMIT $limit";
        return $stmt = $this->db->query($sql);

    }

    public function selectbycategory($table, $category, $order)
    {

        $sql = "SELECT * FROM " . $table . " WHERE category='$category'" . " ORDER BY " . $order . " DESC";
        return $stmt = $this->db->query($sql);
    }

}
