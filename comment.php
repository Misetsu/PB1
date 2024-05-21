<?php

require_once __DIR__ . '/header.php';

if ($username === "ゲスト") {
    $_SESSION['login_error'] = 'コメントするにログインしてください。';
    header('Location: ' . 'login.php');
    exit();
}

require_once __DIR__ . '/database/class.php';
$form = new form();
$userid = $_POST['userid'];
$text = $_POST['comment_text'];
$seikaID = $_POST['seika_id'];

$form->insertComment($userid, $text, $seikaID);

header("Location: seikabutushosai.php?ident=" . $seikaID);
exit;
