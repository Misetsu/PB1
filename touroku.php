<?php
require_once __DIR__ . '/class.php';
$form = new form();

$username = $_POST['username'];
$email = $_POST['address'];
$password = $_POST['password'];
$subject = $_POST['school'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['signup_error'] = '正しいメールアドレスを入力してください。';
    header('Location: ' . 'touroku.html');
    exit();
}

$result = $form->signUP($username, $email, $subject, $password);

if ($result == '') {
    header("Location: login.html");
} else {
    header('Location: signup.php');
}
exit;
