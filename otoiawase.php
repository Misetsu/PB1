<?php
require_once __DIR__ . '/header.php';
?>
<h1>お問い合わせ</h1>
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
<div class="container-otoi">
    <form action="submit.php" method="post">
        <div class="form-group">
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">お問い合わせ内容:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="form-groupa">送信</button>
    </form>
</div>
</body>

</html>