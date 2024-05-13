<!DOCTYPE html>
<html lang="ja">

<?php

require_once __DIR__ . '/pre.php';
require_once __DIR__ . '/class.php';
$form = new Form();


// GETメソッドで送信されたuseridの取得
$ident = $_GET['ident'];

// ユーザー情報の取得
$profile = $form->getProfile($ident);
$info = $form->getInfo($ident);
$questions = $form->getUserQues($ident);
$answers = $form->getUserAns($ident);
$seikas = $form->getUserSeika($ident);

require_once __DIR__ . '/header.php';
?>

<h1>ユアページ</h1>
<script>
    document.getElementById("menuBtn").addEventListener("click", function() {
        var menu = document.getElementById("menuContent");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    });
</script>
</header>
<h1><?= $info['username'] ?>さんのプロフィール</h1>

<h2>プロフィール</h2>
<section id="profile">
    <div id="profileInfo">
        <label>名前：</label><input id="name" name="name" value="<?= $info['username'] ?>" disabled>
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
    </div>
</section>
<h2>過去の質問履歴</h2>
<section id="questionlist">
    <?php
    if (empty($questions)) {
    ?>
        <p>質問履歴がございません。</p>
        <?php
    } else {
        foreach ($questions as $question) {
        ?>
            <p>
                <a href="shosai.php?ident=<?= $question['id'] ?>"><?= $question['title'] ?></a>
            </p>
    <?php
        }
    }
    ?>
</section>

<h2>過去の回答履歴</h2>
<section id="answerlist">
    <?php
    if (empty($answers)) {
    ?>
        <p>回答履歴がございません。</p>
        <?php
    } else {
        foreach ($answers as $answer) {
        ?>
            <p>
                <a href="shosai.php?ident=<?= $answer['ques_id'] ?>"><?= $answer['title'] ?></a>
            </p>
    <?php
        }
    }
    ?>
</section>

<h2>投稿された成果物</h2>
<section id="worklist">
    <?php
    if (empty($seikas)) {
    ?>
        <p>成果物の投稿履歴がございません。</p>
        <?php
    } else {
        foreach ($seikas as $seika) {
        ?>
            <p>
                <a href="seikabutushosai.php"><?= $seika['title'] ?></a>
            </p>
    <?php
        }
    }
    ?>
</section>


<script src="mypagescript.js"></script>
<footer>
    <p>&copy; I love 「愛」チーム情報共有サイト</p>
</footer>
</body>

</html>