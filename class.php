<?php
require_once __DIR__ . '/dbdata.php';

class form extends Dbdata
{
    public function insertForm($name, $title, $message, $selection)
    {
        $sql = "INSERT INTO question VALUES (null, ?, ?, ?, ?)";
        $this->exec($sql, [$name, $title, $message, $selection]);
    }
}
