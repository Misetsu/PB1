<?php
require_once __DIR__ . '/dbdata.php';
require_once __DIR__ . '/class.php';
require_once __DIR__ . '/pre.php';

$userid = $_SESSION['userid'];
$seikaID = $_GET['ident'];
$form = new form();
$seikabutuList = $form->getseikasyousai($seikaID);


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
</body>

</html>