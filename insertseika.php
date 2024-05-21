<?php
require_once __DIR__ . '/database/class.php';
require_once __DIR__ . '/pre.php';

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}

$form = new form();
$title = $_POST['title-input'];
$message = $_POST['message-input'];
$site = $_POST['site-input'];
$shosai = $_POST['shosai-input'];
$selection = $_POST['selection-input'];

$datetime = date('Y/m/d H:i');

$form->insertseikabutu($userid, $title, $message, $site, $shosai, $selection, $datetime);

?>
<?php
// insert.php

// フォームのデータを処理

// index.phpにリダイレクト
header("Location: seikabutuitirann.php");
exit; // リダイレクト後にスクリプトの実行を終了するために必要
?>