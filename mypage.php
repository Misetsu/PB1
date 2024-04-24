<!DOCTYPE html>
<html lang="ja">

<?php
if (!isset($_SESSION)) {
    session_start();
}
$userid = isset($_SESSION['userId']) ? $_SESSION['userId'] : '';
$username = isset($_SESSION['userName']) ? $_SESSION['userName'] : '';

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
    <header>マイページ</header>
    <h1><?= $username ?>さんのマイページ</h1>

    <h2>プロフィール</h2>
    <section id="profile">
        <div id="profileInfo">
            <form>
                <label>名前：</label><input id="name" name="name" value="<?= $username ?>" disabled>
                <br><br>
                <label>年齢：</label><input id="age" name="name" value="<?= is_null($profile['age']) ? '未入力' : $profile['age'] . '歳'; ?>" disabled>
                <br><br>
                <label>趣味：</label><input id="hobby" name="hobby" value="<?= is_null($profile['interest']) ? '未入力' : $profile['interest']; ?>" disabled>
                <br><br>
                <label>所属：</label><input id="company" name="company" value="<?= $info['subject'] ?>" disabled>
                <br><br>
                <label>メッセージ：</label><input id="description" name="description" value="<?= is_null($profile['intro']) ? '未入力' : $profile['intro']; ?>" disabled>
                <input type="submit" value="保存する" style="display: none;">
                <button id="cancelEdit" type="button" onclick="hideEdit()" style="display: none;">キャンセル</button>
            </form>
        </div>
        <button id="editButton" type="button" onclick="showEdit()">編集する</button>
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

    <button id="changeColorButton">背景色を変更する</button>

    <script src="mypagescript.js"></script>
</body>

<div class="center">
    <a href="question.html">質問投稿ページへ行く</a>
    <p></p>
    <a href="login.html">ログインページへ戻る</a>
    <p></p>
    <a href="rule.html">利用規約を確認</a>
</div>

</html>