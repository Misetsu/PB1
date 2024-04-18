<?php
$quesID = $_GET['ident'];

require_once __DIR__ . '/class.php';

$form = new form();
$all = $form->getQues($quesID);
$allAns = $form->getAllAns($quesID);
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

    <header>質問表示詳細ページ</header>
    <div id="question-container">
        <?php
        foreach ($all as $row) {
            echo '<h2>' . $row['title'] . '<h2>';
            echo '<h4>' . $row['name'] . '<h4>';
            echo '<p>' . $row['message'] . '<p>';
        }
        ?>
    </div>

    <!-- 回答フォーム -->
    <div id="answer-container">
        <h2>回答</h2>
        <div id="answers-list">
            <!-- ここに回答が追加されます -->
            <?php
            foreach ($allAns as $row) {
                echo '<div class="answer"><h4>' . $row['name'] . '</h4>';
                echo '<p>' . $row['text'] . '<p></div>';
            }
            ?>
        </div>
        <form action="answer.php" method="POST">
            <input type="text" name="username" placeholder="ユーザー名">
            <textarea id=" answer_text" name="answer_text" placeholder="回答を入力してください" rows="5" cols="200"></textarea>
            <br>
            <input type="hidden" value="<?= $quesID ?>" name="ques_id">
            <input type="submit" value="回答を追加する">
        </form>
    </div>
</body>

</html>