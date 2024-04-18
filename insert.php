<?php
require_once __DIR__ . '/class.php';
$form = new form();
$name= $_POST['username-input'];
$title = $_POST['title-input'];
$message = $_POST['message-input'];
$selection = $_POST['selection-input'];


$form->insertForm($name, $title, $message, $selection);

?>
<?php
// insert.php

// フォームのデータを処理

// index.phpにリダイレクト
header("Location: index.php");
exit; // リダイレクト後にスクリプトの実行を終了するために必要
?>