<?php
require_once __DIR__ . '/pre.php';

$userid = $_SESSION['userid'];
$username = $_SESSION['userName'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>I love「愛」チーム情報共有サイト</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <button id="menuBtn">
            <img id="menubutton" src="menubutton.png" alt="ボタン画像">
        </button>
        <nav id="menuContent">
            <ul>
                <?php
                if ($username === "ゲスト") {
                ?>
                    <li><a href="login.php">ログインページへ</a></li>
                <?php
                } else {
                ?>
                    <li><a href="mypage.php">マイページへ</a></li>
                <?php
                }
                ?>
                <li><a href="index.php">質問一覧ページへ</a></li>
                <li><a href="seikabutushosai.php">成果物詳細ページへ</a></li>
                <li><a href="otoiawase.php">お問い合わせページへ</a></li>
                <li><a href="rule.php">利用規約へ</a></li>
            </ul>
        </nav>