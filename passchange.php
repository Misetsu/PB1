<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>パスワード変更ページ</title>
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
        </script>
    </header>
    </header>
    <h1>現在のパスワードと新しいパスワードを入力してください</h1>
    <form action="login_db.php" method="post">
        <div class="form-group">
            <label for="password">現在のパスワード：</label>
            <input type="password" id="password" name="password" required />
        </div>
        <div class="form-group">
            <label for="password">新しいパスワード：</label>
            <input type="password" id="password" name="password" required />
        </div>
        <button type="submit">変更</button>
    </form>
</body>

</html>