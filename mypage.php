<!DOCTYPE html>
<html lang="ja">


<?php
require_once __DIR__ . '/pre.php';
require_once __DIR__ . '/class.php';
$form = new Form();
$profile = $form->getProfile($userid);
$info = $form->getInfo($userid);
$questions = $form->getUserQues($userid);
$answers = $form->getUserAns($userid);
$seikas = $form->getUserSeika($userid);

require_once __DIR__ . '/header.php';
?>

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
    document.addEventListener('click', function(event) { //全体にクリックイベントを設定
        if (!document.getElementById('menuBtn').contains(event.target)) { // メニューバー以外をクリックしたとき
            document.getElementById('menuContent').style.display = 'none'; // メニューバーを閉じる
        }
    });
</script>
</header>
<h1><?= $username ?>さんのマイページ</h1>

<h2>プロフィール</h2>
<section id="profile">
    <div id="profileInfo">
        <form action="update.php" method="POST" class="mypage">
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
    <?php
    if (empty($questions)) {
    ?>
        <p>質問履歴がございません。</p>
        <?php
    } else {
        foreach ($questions as $question) {
            $like = $form->countQuesLike($question['id']);
            $ans = $form->countAns($question['id']);
        ?>
            <p>
                <a href="shosai.php?ident=<?= $question['id'] ?>"><?= $question['title'] ?></a>
                <span style="float:right;">いいね数：<?= $like['count'] ?>　回答数：<?= $ans['count'] ?></span>
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
            $like = $form->countLike($answer['id']);
        ?>
            <p>
                <a href="shosai.php?ident=<?= $answer['ques_id'] ?>"><?= $answer['title'] ?></a>
                <span style="float:right;">いいね数：<?= $like['count'] ?></span>
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
        <p class="workp">成果物の投稿履歴がございません。</p>
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
<div class="center">
    <br>
    <a href="logout.php">ログアウト</a><br>
    <a href="passchange.php">パスワード変更フォームへ</a>
</div>
<footer>
    <p>&copy; I love 「愛」チーム情報共有サイト</p>
</footer>
</body>



</html>