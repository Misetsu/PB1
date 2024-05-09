<?php
require_once __DIR__ . '/pre.php';
require_once __DIR__ . '/class.php';
require_once __DIR__ . '/dbdata.php';

// POSTされた現在のパスワードと新しいパスワードを取得
$form = new form();
$info = $form->getInfo($userid);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['old_password']) && isset($_POST['new_password'])) {
        $inputpass = $_POST['old_password'];
        $newPass = $_POST['new_password'];

        // パスワードの検証
        if (password_verify($inputpass, $info['password'])) {

            // パスワードの更新
            $sql = "UPDATE userinfo SET password = newPass WHERE userid = ?";
            $stmt = $this->query($sql, []);
            $result = $stmt->fetchAll();
            return $result;

            echo "パスワードが正常に更新されました。";
        } else {
            echo "古いパスワードが正しくありません。";
            header("Location: passchange.php");
exit();
        }
    } else {
        echo "必要なデータが送信されていません。";
    }
}

header("Location: login.php");
exit();
?>