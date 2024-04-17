<?php
    require_once('./dbConfig.php');

    // 接続
    try {
        $dsn = 'mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME . ';charset=utf8';
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        die("接続に失敗しました" . $e->getMessage());
    }

    // レコード抽出
    $sql = "SELECT * FROM kari";
    $stmt = $pdo->query($sql);

    echo "<ul>";
    foreach($stmt as $row) {
        echo "<li>" . $row['title'] . "</li>";
    }
    echo "</ul>";

    $pdo = null;

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>記事一覧</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header>
      <h1>記事一覧</h1>
    </header>
    <main>
      <article>
        <h2></h2>
    </main>
    <footer>
      <p>&copy;記事ページ</p>
    </footer>
  </body>
</html>
