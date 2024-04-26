<?php
require_once __DIR__ . '/class.php';
$form = new form();
$userid = $_POST['userid'];
$text = $_POST['answer_text'];
$quesID = $_POST['ques_id'];

$form->insertAns($userid, $text, $quesID);

header("Location: shosai.php?ident=" . $quesID);
exit;
