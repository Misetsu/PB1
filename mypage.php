<!DOCTYPE html>
<html lang="ja">

<?php
require_once __DIR__ . '/pre.php';
require_once __DIR__ . '/class.php';
$form = new Form();
$profile = $form->getProfile($userid);
$info = $form->getInfo($userid);
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>マイページ</title>
    <link rel="stylesheet" href="mypage.css" />
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
        <h1>マイページ</h1>
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
    <h1><?= $username ?>さんのマイページ</h1>

    <h2>プロフィール</h2>
    <section id="profile">
        <div id="profileInfo">
            <form action="update.php" method="POST">
                <label>名前：</label><input id="name" name="name" value="<?= $username ?>" disabled>
                <br><br>
                <label>年齢：</label><input id="age" name="age" value="<?= is_null($profile['age']) ? '未入力' : $profile['age']; ?>" disabled>
                <br><br>
                <label>趣味：</label><input id="hobby" name="hobby" value="<?= is_null($profile['interest']) ? '未入力' : $profile['interest']; ?>" disabled>
                <br><br>
                <label>所属：</label><input id="company" name="company" value="<?= $info['subject'] ?>" disabled>
                <br><br>
                <label>メッセージ：</label><input id="description" name="description" value="<?= is_null($profile['intro']) ? '未入力' : $profile['intro']; ?>" disabled>
                <br><br>
                <input name="userid" value="<?= $userid ?>" type="hidden">
                <div id="formButton" style="display: none;">
                    <input type="submit" value="保存する" id="submitEdit" class="enterButton">
                    <button id="cancelEdit" type="button" onclick="hideEdit()">キャンセル</button>
                </div>
            </form>
        </div>
        <button id="editButton" type="button" onclick="showEdit()" class="enterButton">編集する</button>
    </section>
    <h2>過去の質問履歴</h2>
    <section id="questionlist">
        <a href="shosai.html">プログラムがわからない</a>
    </section>

    <h2>過去の回答履歴</h2>
    <section id="answerlist">
        <a href="shosai.html">Javaは理解できれば難しくない</a>
    </section>

    <h2>投稿された成果物</h2>
    <section id="worklist">
        <a href="seikabutu.html">〇×ゲーム</a>
    </section>

    <script src="mypagescript.js"></script>
    <div class="center">
        <a href="logout.php">ログアウト</a>
    </div>
    <footer>
        <p>&copy; I love 「愛」チーム情報共有サイト</p>
    </footer>
</body>



</html>