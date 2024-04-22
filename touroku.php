<?php
require_once __DIR__ . '/class.php';
$form = new form();

$username = $_POST['username'];
$email = $_POST['address'];
$password = $_POST['password'];
$subject = $_POST['school'];

$form->signUP($username, $email, $subject, $password);

header("Location: login.html");
exit;
