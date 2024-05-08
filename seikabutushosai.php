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
        <button id="menuBtn"><img id="menubutton" src="menubutton.png" alt="ボタン画像"/></button>
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
        <style>
    .right {
        text-align: right;
    }
    img:hover {/*画像にポインタが触られたとき*/
        opacity: 0.5;/*アイコンを薄くする*/
        cursor: pointer;/* カーソルをポインターに変更 */
    }

    img:active {/*画像がクリックされたとき*/
        position: relative;/*画像の位置を元に戻す*/
        top: 3px;/* 画像を少し下に移動させる */
    }

</style>
        </nav>
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
        document.addEventListener('click', function(event) {//全体にクリックイベントを設定
                if (!document.getElementById('menuBtn').contains(event.target)) {// メニューバー以外をクリックしたとき
                    document.getElementById('menuContent').style.display = 'none';// メニューバーを閉じる
                       }
                });
        </script>
    </header>
    <div class="detail-container">
        <?php foreach ($seikabutuList as $seikabutu) : ?>
            <div class="detail-block">
                <h1>タイトル：<?= $seikabutu['title'] ?></h1>
                <p>ユーザー名: <?= $seikabutu['username'] ?></p>
                <p>コード</p>
                <pre><?= htmlspecialchars($seikabutu['message']) ?></pre>
                <p>外部サイト：<a href="<?= htmlspecialchars($seikabutu['site']) ?>" target="_blank"><?= htmlspecialchars($seikabutu['site']) ?></a></p>
                <label>詳細：<?= $seikabutu['shosai'] ?></label>
                <p>開発言語：<?= $options[$seikabutu['selection']] ?></p>

            </div>
        <?php endforeach; ?>
        <div style="text-align: left; margin-top: 20px;">

        </div>
    </div>
</body>

</html>