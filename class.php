<?php
require_once __DIR__ . '/dbdata.php';

class form extends Dbdata
{
    public function insertForm($name, $title, $message, $selection)
    {
        $sql = "INSERT INTO question VALUES (null, ?, ?, ?, ?)";
        $this->exec($sql, [$name, $title, $message, $selection]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM question";
        $stmt = $this->query($sql, []);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getQues($ident)
    {
        $sql = "SELECT * FROM question WHERE id = ?";
        $stmt = $this->query($sql, [$ident]);
        $result = $stmt->fetch();
        return $result;
    }

    public function insertAns($name, $text, $quesID)
    {
        $sql = "INSERT INTO answer VALUES (null, ?, ?, ?)";
        $this->exec($sql, [$name, $text, $quesID]);
    }

    public function getAllAns($quesID)
    {
        $sql = "SELECT * FROM answer WHERE ques_id = ?";
        $stmt = $this->query($sql, [$quesID]);
        $result = $stmt->fetchAll();
        return $result;
    }
}
