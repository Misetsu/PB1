<?php
require_once __DIR__ . '/dbdata.php';

// 接続
$dsn = 'mysql:dbname=ilove;host=localhost;charset=utf8';
$user = 'Ilove';
$password = '11111';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// レコード抽出
$sql = "SELECT * FROM seikabutu ORDER BY id DESC";
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

require_once __DIR__ . '/header.php';
?>

<h1>成果物一覧</h1>
<script>
    document.getElementById("menuBtn").addEventListener("click", function() {
        var menu = document.getElementById("menuContent");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    });
    document.addEventListener('click', function(event) { //全体にクリックイベントを設定
        if (!document.getElementById('menuBtn').contains(event.target)) { // メニューバー以外をクリックしたとき
            document.getElementById('menuContent').style.display = 'none'; // メニューバーを閉じる
        }
    });
</script>
</header>
<div style="position: fixed; bottom: 20px; right: 20px;">
    <span><a href="seikabutu.php"><button class="custom-button">成果物投稿</button></a></span>
</div>

<main>
    <div class="flex">
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="sort">
            <label for="language">言語を選択してください:</label>
            <div>
                <span style="display: inline;">
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
                <span style="display: inline;"><input type="submit" value="検索"></span>
            </div>
        </form>
    </div>

    <?php
    // 検索フォームで送信された言語を取得
    $search_language = isset($_GET['language']) ? $_GET['language'] : '';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // オプションが対応する言語名を持っているかを確認し、対応する言語名を取得する
        $language = isset($options[$row['selection']]) ? $options[$row['selection']] : 'Unknown Language';

        // 検索フォームで送信された言語が空でない場合、該当する言語の記事のみ表示
        if (empty($search_language) || $search_language === $row['selection']) {
            // リンクのテキストとして言語名を使用する
            echo "<article><h2><a href='seikabutushosai.php?ident={$row['id']}'>{$row['title']}</a><p>{$language}</p></h2></article>";
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