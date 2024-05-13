<?php
require_once __DIR__ . '/pre.php';
require_once __DIR__ . '/class.php';

// 接続
$dsn = 'mysql:dbname=ilove;host=localhost;charset=utf8';
$user = 'Ilove';
$password = '11111';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if (isset($_SESSION['userId'])) {
    $userid = $_SESSION['userId'];
}

require_once __DIR__ . '/header.php'
?>
<h1>パスワード変更ページ</h1>
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
<h1>パスワードを変更するために現在のパスワードと新しいパスワードを入力してください</h1>
<?php
// URLからメッセージを取得
$message = isset($_GET['message']) ? $_GET['message'] : '';

// メッセージが空でない場合に表示
if (!empty($message)) {
    echo '<span class="message-red">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</span>';
}
?>

<form action="changepass.php" method="POST">
    <div class="form-group">
        <label for="old_password">現在のパスワード：</label>
        <input type="password" id="old_password" name="old_password" required />
    </div>
    <div class="form-group">
        <label for="new_password">新しいパスワード：</label>
        <input type="password" id="new_password" name="new_password" required />
    </div>
    <button type="submit">変更</button>
</form>
</body>

</html>