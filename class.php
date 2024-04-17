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
}
