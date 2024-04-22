<?php
$email = $_POST['username'];
$password = $_POST['password'];

require_once __DIR__ . '/class.php';
$form = new Form();
$result = $form->authUser($email, $password);

session_start();
if (empty($result['username'])) {
    $_SESSION['login_error'] = 'ユーザーID、パスワードを確認してください。';
    header('Location: ' . 'login.html');
    exit();
}

$username = $result['username'];

$_SESSION['userId'] = $result['id'];
$_SESSION['userName'] = $result['username'];
$_SESSION['userEmail'] = $result['email'];

header(('Location:' . 'mypage.php'));
