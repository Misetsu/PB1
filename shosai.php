<?php
require_once __DIR__ . '/class.php';
require_once __DIR__ . '/pre.php';
$userid = $_SESSION['userid'];
$quesID = $_GET['ident'];
$form = new form();
$ques = $form->getQues($quesID);
$allAns = $form->getAllAns($quesID);

$count = $form->countQuesLike($quesID);
$flag = $form->quesLikeFlag($quesID, $userid);

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

require_once __DIR__ . '/header.php';

?>

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
    document.addEventListener('click', function(event) { //全体にクリックイベントを設定
        if (!document.getElementById('menuBtn').contains(event.target)) { // メニューバー以外をクリックしたとき
            document.getElementById('menuContent').style.display = 'none'; // メニューバーを閉じる
        }
    });
</script>
</header>

<div id="question-container">
    <h2><?= $ques['title'] ?></h2>
    <a href="yourpage.php?ident=<?= $ques['userid'] ?>" style="text-align: right; display: block;">
        <?= $ques['username'] ?> さん
    </a>

    <p class="text-container">
        <?= $ques['message'] ?>
        <br><br>
        <span class="tag"><?= $options[$ques['selection']] ?></span>
        <br><br>
    </p>

    <?php
    if ($flag['count'] == 0) {
    ?>
        <div style="display: flex; justify-content: flex-end;">
            <form class="rateques">
                <input type="hidden" name="quesid" value="<?= $ques['id'] ?>">
                <input type="hidden" name="userid" value="<?= $userid ?>">
                <input id="quesflag" type="hidden" name="type" value="0">
                <input id="quesbutton" type="image" src="good.png">
                <span id="quescount"><?= $count['count'] ?></span>
            </form>
        </div>
    <?php
    } else {
    ?>
        <div style="display: flex; justify-content: flex-end;">
            <form class="rateques">
                <input type="hidden" name="quesid" value="<?= $ques['id'] ?>">
                <input type="hidden" name="userid" value="<?= $userid ?>">
                <input id="quesflag" type="hidden" name="type" value="1">
                <input id="quesbutton" type="image" src="good2.png">
                <span id="quescount"><?= $count['count'] ?></span>
            </form>
        </div>
    <?php
    }
    ?>
</div>

<div class="good-container">
    <video id="goodVideo" class="centered-movie" style="display: none;">
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
        ?>
            <a href="yourpage.php?ident=<?= $row['userid'] ?>">
                <h4 style="text-align: right;"><?= $row['username'] ?> さん</h4>
            </a>
            <div class="answer">
                <p>
                    <a href="yourpage.php?ident=<?= $ques['userid'] ?>">
                        <?= $ques['username'] ?>さん
                    </a>
                    への返信：
                </p>
                <p><?= $row['text'] ?></p>
            </div>
            <?php
            $count = $form->countLike($row['id']);
            $flag = $form->likeFlag($row['id'], $userid);

            if ($flag['count'] == 0) {
            ?>
                <div style="display: flex; justify-content: flex-end;">
                    <form class="rateform">
                        <input type="hidden" name="ansid" value="<?= $row['id'] ?>">
                        <input type="hidden" name="userid" value="<?= $userid ?>">
                        <input id="flag<?= $row['id'] ?>" type="hidden" name="type" value="0">
                        <input id="button<?= $row['id'] ?>" type="image" src="good.png">
                        <span id="count<?= $row['id'] ?>"><?= $count['count'] ?></span>
                    </form>
                </div>
            <?php
            } else {
            ?>
                <div style="display: flex; justify-content: flex-end;">
                    <form class="rateform">
                        <input type="hidden" name="ansid" value="<?= $row['id'] ?>">
                        <input type="hidden" name="userid" value="<?= $userid ?>">
                        <input id="flag<?= $row['id'] ?>" type="hidden" name="type" value="1">
                        <input id="button<?= $row['id'] ?>" type="image" src="good2.png">
                        <span id="count<?= $row['id'] ?>"><?= $count['count'] ?></span>
                    </form>
                </div>
        <?php
            }
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
    document.addEventListener('DOMContentLoaded', (event) => { //動画エフェクトが終了したとき
        var video = document.getElementById('goodVideo');
        video.onended = function() {
            video.style.display = 'none'; //動画を非表示にする
        };
    });


    $(".rateform").on("submit", function(e) {

        var dataString = $(this).serialize();
        var ansid = $(this).find("[name=ansid]").val();

        $.ajax({
            type: "POST",
            url: "anslike.php",
            data: dataString,
            success: function(result) {
                var countString = $(".rateform").find("#count" + ansid);
                var goodImage = $(".rateform").find("#button" + ansid);
                var flagInput = $(".rateform").find("#flag" + ansid);

                var img = goodImage.attr("src");
                if (img == "good.png") {
                    goodImage.attr("src", "good2.png");
                    const videoElement = document.getElementById('goodVideo');
                    goodVideo.style.display = 'block';
                    videoElement.play();
                } else {
                    goodImage.attr("src", "good.png");
                }

                var flag = flagInput.val();
                if (flag == "0") {
                    flagInput.val("1");
                } else {
                    flagInput.val("0");
                }

                countString.text(result);
            }
        });
        e.preventDefault();
    });

    $(".rateques").on("submit", function(e) {

        var dataString = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "queslike.php",
            data: dataString,
            success: function(result) {
                var countString = $(".rateques").find("#quescount");
                var goodImage = $(".rateques").find("#quesbutton");
                var flagInput = $(".rateques").find("#quesflag");

                var img = goodImage.attr("src");
                if (img == "good.png") {
                    goodImage.attr("src", "good2.png");
                    const videoElement = document.getElementById('goodVideo');
                    goodVideo.style.display = 'block';
                    videoElement.play();
                } else {
                    goodImage.attr("src", "good.png");
                }

                var flag = flagInput.val();
                if (flag == "0") {
                    flagInput.val("1");
                } else {
                    flagInput.val("0");
                }

                countString.text(result);
            }
        });
        e.preventDefault();
    });
</script>

</html>