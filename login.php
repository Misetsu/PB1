<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ログインページ</title>
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <header>
        <button onclick="location.href='home.html'" style="font-size: 24px;">🏠</button>
        <h1>ログインページ</h1>
    </header>
    <h1>ログイン情報を入力してください</h1>
    <?php
    session_start();
    if (isset($_SESSION['login_error'])) {
        echo '<p class="errorclass">' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']);
    }
    ?>
    <form action="login_db.php" method="post">
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
    <a href="signup.php">利用登録ページへ</a>
    <br>
    <a href="rule.html">利用規約を確認</a>
</body>

</html>