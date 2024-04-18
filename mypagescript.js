// ページが読み込まれたときに実行される処理
window.onload = function() {
    // 編集ボタンにクリックイベントを追加
    document.getElementById('editButton').addEventListener('click', enableEditing);
}
document.getElementById('changeColorButton').addEventListener('click', changeBackgroundColor);

// 編集ボタンをクリックした時の処理
function enableEditing() {
    // プロフィール情報を編集可能にする
    document.getElementById('name').contentEditable = true;
    document.getElementById('age').contentEditable = true;
    document.getElementById('hobby').contentEditable = true;
    document.getElementById('company').contentEditable = true;
    document.getElementById('description').contentEditable = true;

    // ボタンのテキストとクリックイベントを変更
    document.getElementById('editButton').textContent = '保存する';
    document.getElementById('editButton').removeEventListener('click', enableEditing);
    document.getElementById('editButton').addEventListener('click', saveChanges);
}

// 保存ボタンをクリックした時の処理
function saveChanges() {
    // 変更内容を保存する処理
    alert('変更を保存しました。');

    // 編集可能状態を解除し、ボタンの状態を元に戻す
    document.getElementById('name').contentEditable = false;
    document.getElementById('age').contentEditable = false;
    document.getElementById('hobby').contentEditable = false;
    document.getElementById('company').contentEditable = false;
    document.getElementById('description').contentEditable = false;

    document.getElementById('editButton').textContent = '編集する';
    document.getElementById('editButton').removeEventListener('click', saveChanges);
    document.getElementById('editButton').addEventListener('click', enableEditing);
}
function changeBackgroundColor() {
    var body = document.querySelector('body');
    // 背景色をランダムに設定
    var colors = ['red', 'blue', 'brack', 'white', 'green', 'yellow'];
    var randomColor = colors[Math.floor(Math.random() * colors.length)];
    body.style.backgroundColor = randomColor;
}