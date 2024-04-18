<?php
require_once __DIR__ . '/class.php';
$form = new form();
$name = $_POST['username'];
$text = $_POST['answer_text'];
$quesID = $_POST['ques_id'];

$form->insertAns($name, $text, $quesID);

header("Location: shosai.php?ident=" . $quesID);
exit;
