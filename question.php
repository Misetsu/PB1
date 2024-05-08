<?php
require_once __DIR__ . '/dbdata.php';

// 接続
$dsn = 'mysql:dbname=ilove;host=localhost;charset=utf8';
$user = 'Ilove';
$password = '11111';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// ユーザーがログインしたときのコード
session_start();

if(isset($_SESSION['userId'])) {
    $userid = $_SESSION['userId'];
}

// 質問を投稿するコード
if(isset($_POST['submit_question'])) {
    // 質問のタイトルとメッセージを取得
    $title = $_POST['title'];
    $message = $_POST['message'];

    // SQLクエリを準備
    $sql = "INSERT INTO question (userid, title, message) VALUES (:userid, :title, :message)";

    // プリペアドステートメントを作成
    $stmt = $dbh->prepare($sql);

    // パラメーターをバインドしてSQLを実行
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':message', $message);
    $stmt->execute();
}
?>





<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>質問投稿頁</title>
    <link rel="stylesheet" href="question.css" />
    <script type="text/javascript">
        function disableButton() {
            document.getElementById("submitButton").disabled = true;
            document.getElementById("submitButton").form.submit();
        }
    </script>
</head>

<body>
<header>
        <button id="menuBtn"><img id="menubutton" src="menubutton.png" alt="ボタン画像"/></button>
    <nav id="menuContent">
        <ul>
            <li><a href="signup.php">利用登録ページへ</a></li>
            <li><a href="login.php">ログインページへ</a></li>
            <li><a href="question.php">質問投稿ページへ</a></li>
            <li><a href="index.php">質問一覧ページへ</a></li>
            <li><a href="mypage.php">マイページへ</a></li>
            <li><a href="otoiawase.html">お問い合わせページへ</a></li>
            <li><a href="seikabutu.html">成果物投稿ページへ</a></li>
            <li><a href="seikabutushosai.php">成果物詳細ページへ</a></li>
            <li><a href="rule.html">利用規約へ</a></li>
        </ul>
    </nav>
        <h1>質問投稿フォーム</h1>
        <script>
            document.getElementById("menuBtn").addEventListener("click", function() {
        var menu = document.getElementById("menuContent");
        if (menu.style.display === "block") {
        menu.style.display = "none";
        } else {
        menu.style.display = "block";
         }
        });
        document.addEventListener('click', function(event) {//全体にクリックイベントを設定
                if (!document.getElementById('menuBtn').contains(event.target)) {// メニューバー以外をクリックしたとき
                    document.getElementById('menuContent').style.display = 'none';// メニューバーを閉じる
                }
            });
        </script>
    </header>
    <h1>IT質問用投稿フォーム</h1>
    <!-- <p>ここはITに関する質問を投稿するためのフォームです。</p> -->
    <p>状況や問題点が一目でわかるように詳細に情報や環境を入力すると回答される可能性が高くなります。
    </p>
    <div class="form-container">
        <div class="form-wrapper">
            <form action="insert.php" method="POST">
                <label for="title-input">タイトル</label>
                <input type="text" id="title-input" name="title-input" placeholder="タイトルを入力してください" required>
                <label for="message-input">詳細情報</label>
                <textarea id="message-input" name="message-input" placeholder="ここに詳細情報を入力してください" required></textarea>
                <label for="selection-input">開発言語を選択</label>
                <select id="selection-input" name="selection-input">
                    <option value="option1">C言語</option>
                    <option value="option2">C#</option>
                    <option value="option3">C++</option>
                    <option value="option4">Java</option>
                    <option value="option5">Python</option>
                    <option value="option6">HTML</option>
                    <option value="option7">JavaScript</option>
                    <option value="option8">SQL</option>
                    <option value="option9">CSS</option>
                    <option value="option10">PHP</option>
                    <option value="option11">その他</option>
                </select>
                <input type="submit" id="submitButton" value="投稿" onclick="disableButton()">
            </form>
        </div>
    </div>
</body>

</html>