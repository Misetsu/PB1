<?php
require_once __DIR__ . '/dbdata.php';

// 接続
$dsn = 'mysql:dbname=ilove;host=localhost;charset=utf8';
$user = 'Ilove';
$password = '11111';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// レコード抽出
$sql = "SELECT * FROM question ORDER BY id DESC";
$stmt = $dbh->query($sql);

$dbh = null;

$options = array(
    'option1' => 'C言語',
    'option2' => 'C#',
    'option3' => 'C++',
    'option4' => 'Java',
    'option5' => 'Python',
    'option6' => 'HTML',
    'option7' => 'JavaScript',
    'option8' => 'SQL',
    'option9' => 'CSS',
    'option10' => 'PHP',
    'option11' => 'その他',
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
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="language">言語を選択してください:</label>
            <div>
                <span>
                    <select name="language" id="language">
                        <option value="">すべての言語</option>
                        <?php
                        // オプションの配列から選択肢を生成
                        foreach ($options as $key => $value) {
                            echo "<option value='{$key}'>{$value}</option>";
                        }
                        ?>
                    </select>
                </span>
                <span><input type="submit" value="検索"></span>
            </div>
        </form>

        <?php
        // 検索フォームで送信された言語を取得
        $search_language = isset($_GET['language']) ? $_GET['language'] : '';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // オプションが対応する言語名を持っているかを確認し、対応する言語名を取得する
            $language = isset($options[$row['selection']]) ? $options[$row['selection']] : 'Unknown Language';

            // 検索フォームで送信された言語が空でない場合、該当する言語の記事のみ表示
            if (empty($search_language) || $search_language === $row['selection']) {
                // リンクのテキストとして言語名を使用する
                echo "<article><h2><a href='shosai.php?ident={$row['id']}'>{$row['title']}</a><p>{$language}</p></h2></article>";
            }
        }

        // 検索フォームの選択肢に選択された言語を設定し、再度送信できるようにする
        echo "<script>document.getElementById('language').value = '{$search_language}';</script>";

        ?>

    </main>

    <div class="right">
        <a href="mypage.html"> マイページへ行く</a>
        <a href="question.html">質問投稿ページへ行く</a>
    </div>


    <footer>
        <p>iチーム 記事一覧</p>
    </footer>
</body>

</html>