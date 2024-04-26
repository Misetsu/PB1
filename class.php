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
        $sql = "SELECT * FROM question ORDER BY id DESC";
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

    public function signUP($username, $email, $subject, $password)
    {
        $sql = "SELECT id FROM userinfo WHERE email = ?";
        $stmt = $this->query($sql, [$email]);
        $result = $stmt->fetch();
        if ($result) {
            return 'この' . $email . 'は既に登録されています。';
        }

        $sql = "INSERT INTO userinfo VALUES (NULL, ?, ?, ?, ?)";
        $this->exec($sql, [$username, $subject, $email, $password]);

        $sql = "SELECT id FROM userinfo WHERE email = ?";
        $stmt = $this->query($sql, [$email]);
        $id = $stmt->fetch();
        $sql = "INSERT INTO profile VALUES (?, NULL, NULL, NULL)";
        $result = $this->exec($sql, [$id['id']]);

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

    public function getProfile($userId)
    {
        $sql = "SELECT * FROM profile WHERE id = ?";
        $stmt = $this->query($sql, [$userId]);
        $result = $stmt->fetch();
        return $result;
    }

    public function getInfo($userId)
    {
        $sql = "SELECT * FROM userinfo WHERE id = ?";
        $stmt = $this->query($sql, [$userId]);
        $result = $stmt->fetch();
        return $result;
    }

    public function insertseikabutu($username, $title, $message, $site, $shosai, $selection)
    {
        $sql = "INSERT INTO seikabutu VALUES (null, ?, ?, ?, ?, ?, ?)";
        $this->exec($sql, [$username, $title, $message, $site, $shosai, $selection]);
    }
    public function getAllSeikabutu()
    {
        $sql = "SELECT * FROM seikabutu ORDER BY id DESC";
        $stmt = $this->query($sql, []);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function updateUser($userId, $username, $subject)
    {
        $sql = "UPDATE userinfo SET username = ?, subject = ? WHERE id = ?";
        $this->exec($sql, [$username, $subject, $userId]);
    }

    public function updateProfile($userId, $age, $interest, $intro)
    {
        $sql = "UPDATE profile SET age = ?, interest = ?, intro = ? WHERE id = ?";
        $this->exec($sql, [$age, $interest, $intro, $userId]);
    }
}
