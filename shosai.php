<?php
$quesID = $_GET['ident'];

require_once __DIR__ . '/class.php';

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
    <link rel="stylesheet" href="button.css" />
</head>

<body>

    <header>質問表示詳細ページ</header>
    <div id="question-container">
        <h2><?= $ques['title'] ?></h2>
        <h4 style="text-align: right;"><?= $ques['name'] ?>　さん</h4>
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
            ?>


                <div style="display: flex; justify-content: flex-end;">
                    <button type="button" id="countButton<?= $counter ?>" onclick="like<?= $counter ?>()">
                        <img id="Buttonimg<?= $counter ?>" src="good.png" alt="ボタン画像"/>
                    </button>
                    <span id="count<?= $counter ?>">0</span>
                </div>
                <br><br><br>


                <script>
                    let count<?= $counter ?> = 0;//いいねの初期値
                    const button<?= $counter ?> = document.getElementById('countButton<?= $counter ?>');

                    function like<?= $counter ?>() {//いいねボタンが押されたとき
                        if (count<?= $counter ?> === 0) {
                            count<?= $counter ?> += 1;//いいねボタンのカウント追加
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
    const video = document.getElementById('myVideo');
    document.addEventListener('DOMContentLoaded', (event) => {//動画エフェクトが終了したとき
        var video = document.getElementById('goodVideo');
        video.onended = function () {
            video.style.display = 'none';//動画を非表示にする
        };
    });
</script>

</html>