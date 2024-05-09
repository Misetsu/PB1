<?php
require_once __DIR__ . '/pre.php';
require_once __DIR__ . '/class.php';
require_once __DIR__ . '/dbdata.php';

// POSTされた現在のパスワードと新しいパスワードを取得
$form = new form();
$info = $form->getInfo($userid);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $inputpass = $_POST['old_password'];
    $newPass = $_POST['new_password'];
    $newpasswordhash = password_hash($newPass, PASSWORD_DEFAULT);
    if (password_verify($inputpass, $info['password'])){
        // パスワードの更新
        $form->getpass($userid, $newpasswordhash);
        echo "パスワードが正常に更新されました。";
    }
    else{
        echo "パスワードがちげぇ";
    }
} else {
    echo "必要なデータが送信されていません。";
}


exit();
?>


