<?php
require_once __DIR__ . '/dbdata.php';

// 接続
$dsn = 'mysql:dbname=ilove;host=localhost;charset=utf8';
$user = 'Ilove';
$password = '11111';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// レコード抽出
$sql = "SELECT * FROM question";
$stmt = $dbh->query($sql);

$dbh = null;

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>iチーム 記事一覧</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<style>
        .center {
            text-align: center;
        }
    </style>

<body>
  <header>
    <h1>iチーム 記事一覧</h1>
  </header>
  <main>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<article><h2><a href='shosai.php?ident={$row['id']}'>{$row['title']}</a></h2></article>";
    }
    ?>

  </main>

  <div class="center">
        <a href="question.html">質問投稿ページへ行く</a>
    </div>

  <footer>
    <p>iチーム 記事一覧</p>
  </footer>
</body>

</html>