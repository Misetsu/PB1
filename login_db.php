<?php
$userid = $_POST['username'];
$password = $_POST['password'];

require_once __DIR__ . '/class.php';
$form = new Form();
$result = $form->authUser($userid, $password);

session_start();
if (empty($result['id'])) {
    $_SESSION['login_error'] = 'ユーザーID、パスワードを確認してください。';
    header('Location: ' . 'login.php');
    exit();
}

$userid = $result['id'];
$username = $result['username'];

$_SESSION['userId'] = $result['id'];
$_SESSION['userName'] = $result['username'];
$_SESSION['userEmail'] = $result['email'];

setcookie("userId", $userid, time() + 60 * 60 * 24 * 14, '/');
setcookie("userName", $username, time() + 60 * 60 * 24 * 14, '/');

header(('Location:' . 'mypage.php'));
