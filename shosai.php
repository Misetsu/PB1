<?php
require_once __DIR__ . '/class.php';

$form = new form();
$all = $form->getAll();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>本文・詳細ページ</title>
    <link rel="stylesheet" href="shosai.css" />
</head>

<body>

    <header>プログラムが実行できない</header>
    <?php
    foreach ($all as $row)
        echo '<div class="form-container">' . $row['title'] . '<div>';
    ?>
</body>

</html>