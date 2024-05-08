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
    img:hover {/*画像にポインタが触られたとき*/
        opacity: 0.5;/*アイコンを薄くする*/
        cursor: pointer;/* カーソルをポインターに変更 */
    }

    img:active {/*画像がクリックされたとき*/
        position: relative;/*画像の位置を元に戻す*/
        top: 3px;/* 画像を少し下に移動させる */
    }

</style>



<body>
<header>
        <button id="menuBtn">
            <img id="menubutton" src="menubutton.png" alt="ボタン画像"/>
        </button>
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
        <h1>質問一覧</h1>
        <script>
            document.getElementById("menuBtn").addEventListener("click", function() {
        var menu = document.getElementById("menuContent");
        if (menu.style.display === "block") {
        menu.style.display = "none";
        } else {
        menu.style.display = "block";
         }
        });
        document.addEventListener('click', function(event) {//全体にクリックイベントを設定
                if (!document.getElementById('menuBtn').contains(event.target)) {// メニューバー以外をクリックしたとき
                    document.getElementById('menuContent').style.display = 'none';// メニューバーを閉じる
                }
            });
        </script>
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


    <footer>
        <p>&copy; I love 「愛」チーム情報共有サイト</p>
    </footer>
</body>

</html>