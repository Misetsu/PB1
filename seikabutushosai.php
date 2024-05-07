<?php
require_once __DIR__ . '/dbdata.php';

// 接続
$dsn = 'mysql:dbname=ilove;host=localhost;charset=utf8';
$user = 'Ilove';
$password = '11111';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once __DIR__ . '/class.php';

$form = new form();
$seikabutuList = $form->getAllSeikabutu();


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
    <title>成果物詳細</title>
    <link rel="stylesheet" href="seikabutushosai.css" /> <!-- デザイン用のCSSファイル -->
</head>

<body>
<header>
            <button onclick="location.href='home.html'" style="font-size: 24px;">🏠</button>
            <h1>成果物詳細ページ</h1>
        </header>
    <div class="detail-container">
        <?php foreach ($seikabutuList as $seikabutu): ?>
            <div class="detail-block">
                <h1>タイトル：<?= $seikabutu['title'] ?></h1>
                <p>ユーザー名: <?= $seikabutu['username'] ?></p>
                <p>コード</p>
                <pre><?= htmlspecialchars($seikabutu['message']) ?></pre>
                <p>外部サイト：<a href="<?= htmlspecialchars($seikabutu['site']) ?>" target="_blank"><?= htmlspecialchars($seikabutu['site']) ?></a></p>
                <label>詳細：<?= $seikabutu['shosai'] ?></label>
                <p>開発言語：<?= $options[$seikabutu['selection']] ?></p>
                <?php
// アドバイスが送信されたかどうかを確認
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから送信されたアドバイスを取得
    $advice = $_POST['advice'];

    // アドバイスが空でない場合、表示
    if (!empty($advice)) {
        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<h2>アドバイス</h2>";
        echo "<p>" . htmlspecialchars($advice) . "</p>";
        echo "</div>";
    }
}
?>
            </div>
            <?php endforeach; ?>
        <div style="text-align: left; margin-top: 20px;">
            <h2>アドバイスを入力</h2>
            <!-- アドバイス入力フォーム -->
            <form method="post" action="">
                <textarea name="advice" rows="4" cols="118"></textarea><br>
                <input type="submit" value="送信">
            </form>
        </div>
        <div style="text-align: center;">
            <a href="home.html">ホームページへ戻る</a>
        </div>
    </div>
</body>

</html>