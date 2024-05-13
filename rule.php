<?php
require_once __DIR__ . '/header.php';
?>
<h1>利用規約</h1>
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
<div class="content-rule">
    <h1>利用規約</h1>
    <p>この利用規約（以下、「本規約」といいます。）は、本サービスの利用条件を定めるものです。本サービスの利用者は、本規約に同意した上で本サービスを利用してください。</p>
    <h2>第1条（利用者の定義）</h2>
    <p>本規約において、「利用者」とは、本サービスを利用する個人または法人を指します。</p>
    <h2>第2条（利用登録）</h2>
    <p>本サービスの利用にあたっては、利用者は本規約に同意の上、本サービスの定める方法によって利用登録を行う必要があります。</p>
    <h2>第3条（禁止事項）</h2>
    <p>利用者は、以下の行為を行ってはなりません。</p>
    <ol>
        <li>法令または公序良俗に違反する行為</li>
        <li>他者の知的財産権、肖像権、プライバシー等の権利を侵害する行為</li>
        <li>本サービスの運営を妨害する行為</li>
        <li>虚偽の情報を提供する行為</li>
        <li>その他、本サービスが不適切と判断する行為</li>
    </ol>
    <h2>第4条（免責事項）</h2>
    <p>本サービスは、利用者が本サービスを利用したことにより生じた一切の損害について、一切の責任を負いません。</p>
    <h2>第5条（利用規約の変更）</h2>
    <p>本サービスは、本規約を任意に変更する権利を有します。変更後の利用規約は、本サービス上に表示した時点から効力を生じるものとします。</p>
    <h2>第6条（準拠法・裁判管轄）</h2>
    <p>本規約の解釈にあたっては、日本法を準拠法とします。また、本規約に関する紛争については、本サービスの所在地を管轄する裁判所を専属的合意管轄とします。</p>
    <p>以上が利用規約となります。本規約は利用者と本サービスとの間の契約書となりますので、ご理解の上、ご同意の上でご利用ください。</p>
</div>
<footer>
    <p>&copy; I love 「愛」チーム情報共有サイト</p>
</footer>
</body>

</html>