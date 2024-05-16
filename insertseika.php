<?php
require_once __DIR__ . '/database/class.php';
require_once __DIR__ . '/pre.php';
$form = new form();
$username = $_POST['username-input'];
$title = $_POST['title-input'];
$message = $_POST['message-input'];
$site = $_POST['site-input'];
$shosai = $_POST['shosai-input'];
$selection = $_POST['selection-input'];

$form->insertseikabutu($userid, $title, $message, $site, $shosai, $selection);

?>
<?php
// insert.php

// フォームのデータを処理

// index.phpにリダイレクト
header("Location: seikabutuitirann.php");
exit; // リダイレクト後にスクリプトの実行を終了するために必要
?>