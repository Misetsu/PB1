<?php
require_once __DIR__ . '/database/class.php';
$form = new form();
require_once __DIR__ . '/pre.php';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
$title = $_POST['title-input'];
$message = $_POST['message-input'];
$selection = $_POST['selection-input'];

$form->insertForm($userid, $title, $message, $selection);

// リダイレクト
header("Location: index.php");
exit;
