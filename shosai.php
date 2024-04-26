<?php
require_once __DIR__ . '/class.php';
// 接続
$dsn = 'mysql:dbname=ilove;host=localhost;charset=utf8';
$user = 'Ilove';
$password = '11111';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$quesID = $_GET['ident'];

require_once __DIR__ . '/class.php';
require_once __DIR__ . '/pre.php';

$form = new form();
$ques = $form->getQues($quesID);
$allAns = $form->getAllAns($quesID);

$options = array(
    'option1' => 'C言語',
    'option2' => 'C#',
    'option3' => 'C++',
    'option4' => 'Java',
    'option5' => 'Python',
    'option6' => 'HTML',
    'option7' => 'JavaScript',
    'option8' => 'SQL',
    'option9' => 'CSS',
    'option10' => 'PHP',
    'option11' => 'その他',
);


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>詳細ページ</title>
    <link rel="stylesheet" href="shosai.css">
    <link rel="stylesheet" href="button.css" />
</head>

<body>

    <li>
        <p>ユーザー名: <?= $ques['username'] ?></p>
    </li>

    <header>質問表示詳細ページ</header>
    <div id="question-container">
        <h2><?= $ques['title'] ?></h2>
        <a href="mypage.php" style="text-align: right;"><?= $ques['username'] ?>　さん</a>
        <p class="text-container">
            <?= $ques['message'] ?>
            <br><br>
            <span class="tag"><?= $options[$ques['selection']] ?></span>
            <br><br>
        </p>
    </div>
    </div>

    <div class="container">
        <video id="goodVideo" class="centered-movie">
            <source src="good.mp4" controls>
        </video>
    </div>

    <!-- 回答フォーム -->
    <div id="answer-container">
        <h2>回答</h2>
        <div id="answers-list">
            <!-- ここに回答が追加されます -->
            <?php
            foreach ($allAns as $row) {
                echo '<h4 style="text-align: right;">' . $row['name'] . '　さん</h4>';
                echo '<div class="answer"><p>' . $ques['name'] . 'さんへの返信：</p><p>' . $row['text'] . '<p></div>';
                $count = $form->countLike($row['id']);
                $flag = $form->likeFlag($row['id'], $userid)
            ?>
                <div style="display: flex; justify-content: flex-end;">
                    <?php
                    if ($flag['count'] == 0) {
                    ?>
                        <!-- <button type="button" onclick="like()"> -->
                        <img onclick="change(this)" src="good.png">
                        <!-- </button> -->
                    <?php
                    } else {
                    ?>
                        <!-- <button type="button" onclick="dislike()"> -->
                        <img onclick="change(this)" src="good2.png">
                        <!-- </button> -->
                    <?php
                    }
                    ?>
                    <span id="count"><?= $count['count'] ?></span>
                </div>
                <br><br><br>
            <?php
            }
            ?>
        </div>
        <div id="add-ans" onclick="showAnsForm()">
            <p>✙ここに回答を追加する</p>
        </div>
        <div id="answer-form" style="display: none;">
            <form action="answer.php" method="POST">
                回答者：<input type="text" name="username" placeholder="ユーザー名">
                <br><br>
                回答内容：
                <br>
                <textarea id="answer_text" name="answer_text" placeholder="回答を入力してください"></textarea>
                <br>
                <input type="hidden" value="<?= $quesID ?>" name="ques_id">
                <input id="submit-ans" type="submit" value="回答する">
                <button class="cancel-button" onclick="hideAnsForm()" type="button">キャンセル</button>
            </form>
        </div>
    </div>
    <div style="text-align: center;">
        <a href="index.php">記事一覧を見る</a>
    </div>
    <footer>
        <p>&copy; I love 「愛」チーム情報共有サイト</p>
    </footer>
</body>

<script>
    function showAnsForm() {
        document.getElementById('add-ans').style.display = "none";
        document.getElementById('answer-form').style.display = "block";
    }

    function hideAnsForm() {
        document.getElementById('add-ans').style.display = "block";
        document.getElementById('answer-form').style.display = "none";

    }

    // let count = 0; //いいねの初期値

    // const button = document.getElementById('countButton');
    // var a = document.getElementsByClassName("a");

    // button.addEventListener('click', function() { //いいねボタンが押されたとき
    //     if (count === 0) {
    //         count += 1; //いいねボタンのカウント追加
    //         document.getElementById('count').textContent = count; //表示を更新
    //         document.getElementById("Buttonimg").src = "good2.png"; //いいね画像の切り替え
    //         const videoElement = document.getElementById('goodVideo');
    //         goodVideo.style.display = 'block'; //非表示の動画エフェクトを表示に切り替える
    //         videoElement.play(); //動画エフェクトを再生する
    //     } else {
    //         count -= 1;
    //         document.getElementById('count').textContent = count;
    //         document.getElementById("Buttonimg").src = "good.png"; //画像の切り替え（戻す）
    //     }

    // });
    // const video = document.getElementById('myVideo');

    // document.addEventListener('DOMContentLoaded', (event) => { //動画エフェクトが終了したとき
    //     var video = document.getElementById('goodVideo');
    //     video.onended = function() {
    //         video.style.display = 'none'; //動画を非表示にする
    //     };
    // });

    // function like() { //いいねボタンが押されたとき
    //     if (count === 0) {
    //         count += 1; //いいねボタンのカウント追加
    //         document.getElementById('count').textContent = count; //表示を更新
    //         document.getElementById("Buttonimg").src = "good2.png"; //いいね画像の切り替え
    //         const videoElement = document.getElementById('goodVideo');
    //         goodVideo.style.display = 'block'; //非表示の動画エフェクトを表示に切り替える
    //         videoElement.play(); //動画エフェクトを再生する
    //     } else {
    //         count -= 1;
    //         document.getElementById('count').textContent = count;
    //         document.getElementById("Buttonimg").src = "good.png"; //画像の切り替え（戻す）
    //     }
    // }

    function change(img) {
        if (img.src.includes("good.png")) {
            img.src = "good2.png";
            like();
        } else {
            img.src = "good.png";
            dislike();
        }
    }

    function like() {

    }

    function dislike() {

    }
</script>

</html>