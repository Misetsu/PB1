<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>登録ページ</title>
    <link rel="stylesheet" href="login.css" />
</head>

<body>
<header>
        <button id="menuBtn">メニュー</button>
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
    </nav>
        <h1>利用登録ページ</h1>
        <script>
            document.getElementById("menuBtn").addEventListener("click", function() {
        var menu = document.getElementById("menuContent");
        if (menu.style.display === "block") {
        menu.style.display = "none";
        } else {
        menu.style.display = "block";
         }
        });
        </script>
    </header>
    <h1>利用開始に必要な情報を入力してください</h1>
    <?php
    session_start();
    if (isset($_SESSION['signup_error'])) {
        echo '<p class="errorclass">' . $_SESSION['signup_error'] . '</p>';
        unset($_SESSION['signup_error']);
    }
    ?>
    <form action="touroku.php" method="post">
        <div class="form-group">
            <label for="username">ユーザー名:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="school">所属学科:</label>
            <input type="school" id="school" name="school" required>
        </div>
        <div class="form-group">
            <label for="address">メールアドレス:</label>
            <input type="address" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">登録</button>
    </form>
    <a href="login.php">ログインページへ</a>
    <br>
    <a href="rule.html">利用規約を確認</a>
</body>

</html>