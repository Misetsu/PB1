<?php
require_once __DIR__ . '/dbdata.php';
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
<div style="position: fixed; bottom: 20px; right: 20px;">
    <span><a href="seikabutu.php"><button class="custom-button">成果物投稿</button></a></span>
</div>
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