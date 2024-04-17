<?php
require_once __DIR__ . 'dbdata.php';

class form extends Dbdata
{
    public function insertForm($title, $author, $genre, $word, $url, $status, $cp, $fandom, $dramacd, $mascot, $remark)
    {
        $sql = "INSERT INTO book VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->exec($sql, [$title, $author, $genre, $word, $url, $status, $cp, $fandom, $dramacd, $mascot, $remark]);
    }
}
