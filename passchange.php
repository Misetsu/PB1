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
        <button onclick="location.href='home.html'" style="font-size: 24px;">🏠</button>
        <h1>パスワード変更ページ</h1>
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