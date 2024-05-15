<?php
require_once __DIR__ . '/dbdata.php';
require_once __DIR__ . '/class.php';
require_once __DIR__ . '/pre.php';

$userid = $_SESSION['userid'];
$seikaID = $_GET['ident'];
$form = new form();
$seikabutuList = $form->getseikasyousai($seikaID);
$allAns = $form->getAllAns($seikaID);


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
<h1>成果物詳細ページ</h1>
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
<div class="detail-container">
    <div class="detail-block">
        <h1>タイトル：<?= $seikabutuList['title'] ?></h1>
        <p>ユーザー名：<a href="yourpage.php?ident=<?= $seikabutuList['userid'] ?>" style="text-align: right; display: inline;"><?= $seikabutuList['username'] ?></a>さん</p>
        <p>コード</p>
        <pre><?= htmlspecialchars($seikabutuList['message']) ?></pre>
        <p>外部サイト：<a href="<?= htmlspecialchars($seikabutuList['site']) ?>" target="_blank"><?= htmlspecialchars($seikabutuList['site']) ?></a></p>
        <label>詳細：<?= $seikabutuList['shosai'] ?></label>
        <p>開発言語：<?= $options[$seikabutuList['selection']] ?></p>

    </div>
    <div style="text-align: left; margin-top: 20px;">

    </div>
</div>
<!-- コメント -->
<div id="answer-container">
    <h2>コメント</h2>
    <div id="answers-list">
        <!-- コメント -->
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
        }
        ?>
    </div>
    <div id="add-ans" onclick="showAnsForm()">
        <p>✙ここにコメントを追加する</p>
    </div>
    <div id="answer-form" style="display: none;">
        <form action="answer.php" method="POST">
            コメント内容：
            <br>
            <textarea id="answer_text" name="answer_text" placeholder="コメントを入力してください"></textarea>
            <br>
            <input type="hidden" value="<?= $quesID ?>" name="ques_id">
            <input type="hidden" value="<?= $userid ?>" name="userid">
            <input id="submit-ans" type="submit" value="コメントする">
            <button class="cancel-button" onclick="hideAnsForm()" type="button">キャンセル</button>
        </form>
    </div>
</div>
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
                if (img == "image/good.png") {
                    goodImage.attr("src", "image/good2.png");
                    const videoElement = document.getElementById('goodVideo');
                    goodVideo.style.display = 'block';
                    setTimeout(function() {
                        goodVideo.style.display = 'none';
                    }, 1500);
                } else {
                    goodImage.attr("src", "image/good.png");
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
                if (img == "image/good.png") {
                    goodImage.attr("src", "image/good2.png");
                    const videoElement = document.getElementById('goodVideo');
                    goodVideo.style.display = 'block';
                    setTimeout(function() {
                        goodVideo.style.display = 'none';
                    }, 1500);
                } else {
                    goodImage.attr("src", "image/good.png");
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