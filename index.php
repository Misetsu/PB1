<?php
// データベース接続
$dsn = 'mysql:host=localhost;dbname=ilove;charset=utf8';
$user = `root`;
$password = ``;
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDo::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql_list = "SELECT list FROM kari";
$rec_rist = $dbh->prepare($sql_list);
$rec_rist->execute();
$list_items = $rec_rist->fetchAll(PDO::FETCH_ASSOC);


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
