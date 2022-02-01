<?php
require_once 'session.php';
require_once 'telegram.php';
require_once 'mail/mail.php';

class Operation extends Database
{

    public function insert($data, $table, $successm, $location, $errorm)
    {
        $columnString = implode(',', array_keys($data));
        $valueString = ":" . implode(',:', array_keys($data));

        $sql = "INSERT INTO " . $table . "(" . $columnString . ")";
        $sql .= "VALUES(" . $valueString . ")";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $val) {
            $stmt->bindValue(':' . $key, $val);
        }

        if ($stmt->execute()) {
            $_SESSION["SuccessMessage"] = $successm;

            header("Location:" . $location);
            exit;
        } else {
            $_SESSION["ErrorMessage"] = $errorm;
            header("Location:" . $location);
            exit;
        };

    }

    public function delete($table, $id, $successm, $errorm, $location)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id={$id}";
        $result = $this->db->query($sql);
        while ($rows = $result->fetch()) {
            $imagedelete = $rows['image'];
        }
        $deleteimage = "../images/" . $table . "/" . $imagedelete;
        unlink($deleteimage);

        $sql = "DELETE FROM " . $table . " WHERE id={$id}";
        $stmt = $this->db->query($sql);
        if ($stmt) {

            $_SESSION["SuccessMessage"] = $successm;
            header("Location:" . $location);
            exit;

        } else {
            $_SESSION["ErrorMessage"] = $errorm;
            header("Location:" . $location);
            exit;
        }
    }

    public function selectall($table)
    {
        $sql = "SELECT * FROM " . $table . " ORDER BY id DESC";
        return $stmt = $this->db->query($sql);

    }

    public function selectbyid($table, $id)
    {

        $sql = "SELECT * FROM " . $table . " WHERE id='$id'";
        return $stmt = $this->db->query($sql);

    }
    public function selectbystatuscount($table, $status)
    {

        $sql = "SELECT COUNT(*) FROM " . $table . " WHERE status='$status'";
        $stmt = $this->db->query($sql);
        $rowtotal = $stmt->fetch();
        $count = array_shift($rowtotal);
        return $count;

    }
    public function selectbystatus($table, $status, $limit)
    {

        $sql = "SELECT * FROM " . $table . " WHERE status='$status' ORDER BY id DESC LIMIT " . $limit;
        return $stmt = $this->db->query($sql);

    }
    public function selectlimit($table, $order, $limit)
    {

        $sql = "SELECT * FROM " . $table . " ORDER BY " . $order . " DESC LIMIT " . $limit;
        return $stmt = $this->db->query($sql);

    }

    public function telegramsend()
    {

        $sql = "SELECT * FROM blog ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->query($sql);
        while ($rows = $stmt->fetch()) {
            $id = $rows["id"];
            $title = $rows["title"];
            $post = $rows["post"];
            $img = $rows["image"];
            $sub = substring($post, 250);
            $body1 = strip_tags($sub);
            $body = preg_replace('/[\p{Z}\s]{2,}/s',' ',$body1);

        }
        send1($title, $body, "https://blogcamp.uz/images/blog/".$img, "https://blogcamp.uz/post.php?id=" . $id);

    }

    public function gmailsend()
    {

        $sql = "SELECT * FROM blog ORDER BY id ASC LIMIT 1";
        $stmt = $this->db->query($sql);
        while ($rows = $stmt->fetch()) {
            $id = $rows["id"];
            $title = $rows["title"];
            $post = $rows["post"];
            $img = $rows["image"];
            $sub = substring($post, 250);
            $body = strip_tags($sub);

        }
        $sql = "SELECT mail FROM newsletter";
        $stmt = $this->db->query($sql);
        while ($rows = $stmt->fetch()) {
            $to = $rows["mail"];
            gmails($to, $title, "https://blogcamp.uz/images/blog/".$img, $body, "https://blogcamp.uz/post.php?id=" . $id);
        }

    }

    public function update($table, $data, $id, $successm, $errorm, $location)
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
        if ($update) {

            $_SESSION["SuccessMessage"] = $successm;
            header("Location:" . $location);
            exit;

        } else {

            $_SESSION["ErrorMessage"] = $errorm;
            header("Location:" . $location);
            exit;

        }

    }

    public function deletepdf($id)
    {

        $sql = "SELECT * FROM  book  WHERE id={$id}";
        $result = $this->db->query($sql);
        while ($rows = $result->fetch()) {
            $pdfdelete = $rows['file'];
        }
        $deletepdf = "../pdf/" . $pdfdelete;
        return unlink($deletepdf);
    }

    public function deleteimage($table, $id)
    {
        $sql = "SELECT image FROM " . $table . " WHERE id={$id}";
        $result = $this->db->query($sql);
        while ($rows = $result->fetch()) {
            $imagename = $rows['image'];
        }
        $deleteimage = "../images/" . $table . "/" . $imagename;
        return unlink($deleteimage);
    }

    public function deletecvpdf()
    {

        $sql = "SELECT * FROM  portfolio  WHERE id=1";
        $result = $this->db->query($sql);
        while ($rows = $result->fetch()) {
            $pdfdelete = $rows['cv'];
        }
        $deletepdf = "../pdf/cv/" . $pdfdelete;
        return unlink($deletepdf);
    }
    public $move;
    public function imageupload($direction)
    {

        $target = "../images/" . $direction . "/" . basename($_FILES["image"]["name"]);
        return $this->move = move_uploaded_file($_FILES["image"]["tmp_name"], $target);

    }

}
