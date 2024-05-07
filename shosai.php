<?php
require_once __DIR__ . '/class.php';
require_once __DIR__ . '/pre.php';
$quesID = $_GET['ident'];
$form = new form();
$ques = $form->getQues($quesID);
$allAns = $form->getAllAns($quesID);
$counter = 0;

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
</head>

<body>
<header>
        <button id="menuBtn">メニュー</button>
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
        <h1>質問詳細ページ</h1>
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

    <div id="question-container">
        <h2><?= $ques['title'] ?></h2>
        <form action="/yourpage.php" method="GET">
        <a href="yourpage.php?ident=<?= $ques['userid'] ?>" style="text-align: right; display: block;">
            <?= $ques['username'] ?> さん
        </a>
        </form>

        <p class="text-container">
            <?= $ques['message'] ?>
            <br><br>
            <span class="tag"><?= $options[$ques['selection']] ?></span>
            <br><br>
        </p>
        <div style="display: flex; justify-content: flex-end;">
                    <button type="button" id="countButton<?= $counter ?>" onclick="like<?= $counter ?>()">
                        <img id="Buttonimg<?= $counter ?>" src="good.png" alt="ボタン画像"/>
                    </button>
                    <span id="count<?= $counter ?>">0</span>
                </div>
    </div>

    <div class="good-container">
        <video id="goodVideo" class="centered-movie" >
            <source src="good.mp4" controls>
        </video>
    </div>
    <script>
                    let count<?= $counter ?> = 0;//いいねの初期値(データベースから参照できるようにする)
                    const button<?= $counter ?> = document.getElementById('countButton<?= $counter ?>');

                    function like<?= $counter ?>() {//いいねボタンが押されたときの処理↓
                        if (count<?= $counter ?> === 0) {//実際はデータベースに入っているいいね数を比較対象にする
                            count<?= $counter ?> += 1;//いいねボタンのカウント追加（データベースに送る処理にする）
                            document.getElementById('count<?= $counter ?>').textContent = count<?= $counter ?>;//表示を更新
                            document.getElementById("Buttonimg<?= $counter ?>").src = "good2.png";//いいね画像の切り替え
                            const videoElement = document.getElementById('goodVideo');
                            goodVideo.style.display = 'block';//非表示の動画エフェクトを表示に切り替える
                            videoElement.play();//動画エフェクトを再生する
                        }
                        else {
                            count<?= $counter ?> -= 1;
                            document.getElementById('count<?= $counter ?>').textContent = count<?= $counter ?>;
                            document.getElementById("Buttonimg<?= $counter ?>").src = "good.png";//画像の切り替え（戻す）
                        }
                    }
                </script>

    <!-- 回答フォーム -->
    <div id="answer-container">
        <h2>回答</h2>
        <div id="answers-list">
            <!-- ここに回答が追加されます -->
            <?php
            $counter += 1;
            foreach ($allAns as $row) {
                echo '<h4 style="text-align: right;">' . $row['username'] . '　さん</h4>';
                echo '<div class="answer"><p>' . $ques['username'] . 'さんへの返信：</p><p>' . $row['text'] . '<p></div>';
                $count = $form->countLike($row['id']);
                $flag = $form->likeFlag($row['id'], $userid)
            ?>

                <div style="display: flex; justify-content: flex-end;">
                    <button type="button" id="countButton<?= $counter ?>" onclick="like<?= $counter ?>()">
                        <img id="Buttonimg<?= $counter ?>" src="good.png" alt="ボタン画像"/>
                    </button>
                    <span id="count<?= $counter ?>">0</span>
                </div>
                <br><br><br>


                <script>
                    let count<?= $counter ?> = 0;//いいねの初期値(データベースから参照できるようにする)
                    const button<?= $counter ?> = document.getElementById('countButton<?= $counter ?>');

                    function like<?= $counter ?>() {//いいねボタンが押されたときの処理↓
                        if (count<?= $counter ?> === 0) {//実際はデータベースに入っているいいね数を比較対象にする
                            count<?= $counter ?> += 1;//いいねボタンのカウント追加（データベースに送る処理にする）
                            document.getElementById('count<?= $counter ?>').textContent = count<?= $counter ?>;//表示を更新
                            document.getElementById("Buttonimg<?= $counter ?>").src = "good2.png";//いいね画像の切り替え
                            const videoElement = document.getElementById('goodVideo');
                            goodVideo.style.display = 'block';//非表示の動画エフェクトを表示に切り替える
                            videoElement.play();//動画エフェクトを再生する
                        }
                        else {
                            count<?= $counter ?> -= 1;
                            document.getElementById('count<?= $counter ?>').textContent = count<?= $counter ?>;
                            document.getElementById("Buttonimg<?= $counter ?>").src = "good.png";//画像の切り替え（戻す）
                        }
                    }
                </script>
            <?php
                $counter += 1;
            }
            ?>
        </div>
        <div id="add-ans" onclick="showAnsForm()">
            <p>✙ここに回答を追加する</p>
        </div>
        <div id="answer-form" style="display: none;">
            <form action="answer.php" method="POST">
                回答内容：
                <br>
                <textarea id="answer_text" name="answer_text" placeholder="回答を入力してください"></textarea>
                <br>
                <input type="hidden" value="<?= $quesID ?>" name="ques_id">
                <input type="hidden" value="<?= $userid ?>" name="userid">
                <input id="submit-ans" type="submit" value="回答する">
                <button class="cancel-button" onclick="hideAnsForm()" type="button">キャンセル</button>
            </form>
        </div>
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
    const video = document.getElementById('myVideo');
    document.addEventListener('DOMContentLoaded', (event) => {//動画エフェクトが終了したとき
        var video = document.getElementById('goodVideo');
        video.onended = function () {
            video.style.display = 'none';//動画を非表示にする
        };
    });
</script>

</html>