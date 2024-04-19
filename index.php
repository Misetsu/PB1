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

$options = array(
  'option1' => 'C言語',
  'option2' => 'C#',
  'option3'=>'C++',
  'option4'=>'Java',
  'option5'=>'Python',
  'option6'=>'HTML',
  'option7'=>'JavaScript',
  'option8'=>'SQL',
  'option9'=>'CSS',
  'option10'=>'PHP',
  'option11'=>'その他',
);

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
        .right {
            text-align: right;
        }
    </style>

<body>
  <header>
    <h1>iチーム 記事一覧</h1>
  </header>
  <main>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // $row['selection']が空でない場合にのみ処理を実行
      if (!empty($row['selection'])) {
        // オプションが対応する言語名を持っているかを確認し、対応する言語名を取得する
        $language = isset($options[$row['selection']]) ? $options[$row['selection']] : 'Unknown Language';

        // リンクのテキストとして言語名を使用する
        echo "<article><h2><a href='shosai.php?ident={$row['id']}'>{$row['title']}</a><p>{$language}</p></h2></article>";
      } else {
        // $row['selection']が空の場合に表示するメッセージ
        echo "オプションが指定されていません。";
      }

    }
    ?>

  </main>

    <div class="right">
      <a href="mypage.html">マイページへ行く</a>
      <a href="question.html">質問投稿ページへ行く</a>
  </div>

  <footer>
    <p>iチーム 記事一覧</p>
  </footer>
</body>

</html>