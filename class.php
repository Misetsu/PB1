<?php

use LDAP\Result;

require_once __DIR__ . '/dbdata.php';

class form extends Dbdata
{
    public function insertForm($userid, $title, $message, $selection)
    {
        $sql = "INSERT INTO question VALUES (null, ?, ?, ?, ?)";
        $this->exec($sql, [$userid, $title, $message, $selection]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM question ORDER BY id DESC";
        $stmt = $this->query($sql, []);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getQues($ident)
    {
        $sql = "SELECT * FROM question INNER JOIN userinfo ON question.userid = userinfo.userid WHERE question.id = ?";
        $stmt = $this->query($sql, [$ident]);
        $result = $stmt->fetch();
        return $result;
    }

    public function insertAns($userid, $text, $quesID)
    {
        $sql = "INSERT INTO answer VALUES (null, ?, ?, ?)";
        $this->exec($sql, [$userid, $text, $quesID]);
    }

    public function getAllAns($quesID)
    {
        $sql = "SELECT * FROM answer WHERE ques_id = ?";
        $stmt = $this->query($sql, [$quesID]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function signUP($username, $email, $subject, $password)
    {
        $sql = "SELECT userid FROM userinfo WHERE email = ?";
        $stmt = $this->query($sql, [$email]);
        $result = $stmt->fetch();
        if ($result) {
            return 'この' . $email . 'は既に登録されています。';
        }

        $sql = "INSERT INTO userinfo VALUES (NULL, ?, ?, ?, ?)";
        $this->exec($sql, [$username, $subject, $email, $password]);

        $sql = "SELECT userid FROM userinfo WHERE email = ?";
        $stmt = $this->query($sql, [$email]);
        $userid = $stmt->fetch();
        $sql = "INSERT INTO profile VALUES (?, NULL, NULL, NULL)";
        $result = $this->exec($sql, [$userid['userid']]);

        if ($result) {
            return '';
        } else {
            return '新規登録できませんでした。管理者にお問い合わせください。';
        }
    }

    public function authUser($email, $password)
    {
        $sql = "SELECT * FROM userinfo WHERE email = ? AND password = ?";
        $stmt = $this->query($sql, [$email, $password]);
        $result = $stmt->fetch();
        return $result;
    }

    public function getProfile($userid)
    {
        $sql = "SELECT * FROM profile WHERE userid = ?";
        $stmt = $this->query($sql, [$userid]);
        $result = $stmt->fetch();
        return $result;
    }

    public function getInfo($userid)
    {
        $sql = "SELECT * FROM userinfo WHERE userid = ?";
        $stmt = $this->query($sql, [$userid]);
        $result = $stmt->fetch();
        return $result;
    }
}
