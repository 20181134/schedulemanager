<?php
$user = $_REQUEST['user'];
$date = $_REQUEST['date'];
$pdo = new PDO('mysql:host=localhost;dbname=schedule;charset=utf8', 'admin', 'admin1234');
$stmt = $pdo->prepare('DELETE FROM scheduletable WHERE day=:day and user=:user');
$stmt->bindValue(':day', $date);
$stmt->bindValue(':user', $user);
if ($stmt->execute()) {
    header('Location:./index.php');
} else {
    echo ('<p>エラー：リクエストを処理できませんでした</p>');
    echo ('<p>名前と日付を確認してください</p>');
}