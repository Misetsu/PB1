<?php
require_once __DIR__ . '/class.php';
$form = new form();
$name= $_POST['username-input'];
$title = $_POST['title-input'];
$message = $_POST['message-input'];
$selection = $_POST['selection-input'];


$form->insertForm($name, $title, $message, $selection);

