<?php
require_once __DIR__ . '/header.php';
?>


<h1>ログインページ</h1>
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
<?php
// URLからメッセージを取得
$message = isset($_GET['message']) ? $_GET['message'] : '';

// メッセージが空でない場合に表示
if (!empty($message)) {
    echo '<span class="message">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</span>';
}
?>

<h1>ログイン情報を入力してください</h1>
<?php
if (isset($_SESSION['login_error'])) {
    echo '<p class="errorclass">' . $_SESSION['login_error'] . '</p>';
    unset($_SESSION['login_error']);
}
?>
<form action="login_db.php" method="post" class="form-groupa">
    <div class="form-group">
        <label for="username">メールアドレス：</label>
        <input type="text" id="username" name="username" required />
    </div>
    <div class="form-group">
        <label for="password">パスワード：</label>
        <input type="password" id="password" name="password" required />
    </div>
    <button type="submit">ログイン</button>
</form>
<p><a href="signup.php">新規登録はこちら</a></p>
</body>

</html>