<?php
//inputのtype属性を指定->完了
$since = $_REQUEST['since'];
$until = $_REQUEST['until'];
$user = $_REQUEST['user'];
switch ($_REQUEST['availability']) {
    case 'notavailable':
        $availability = '×';
        break;
    case 'flexible':
        $availability = '△';
        break;
    case 'best':
        $availability = '◎';
        break;
}
// 現状since>untilの時をrange.phpで判別できないので便宜上ここで。jsで判別してこのif文処理でtrueの時はそもそも送信ボタン押せないようにしたい
if ($since > $until) {
    echo 'エラー：sinceの値がuntilより大きい';
} else {
    $pdo = new PDO('mysql:host=localhost;dbname=schedule;charset=utf8', 'admin', 'admin1234');
    for ($i=$since;$i<=$until;$i++) {
        $stmt = $pdo->prepare('INSERT INTO scheduletable VALUES(:id, :year, :month, :day, :user, :availability)');
        $stmt->bindValue(':id', null);
        $stmt->bindValue(':year', '2024');
        $stmt->bindValue(':month', '8');
        $stmt->bindValue(':day', $i);
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':availability', $availability);
        if ($stmt->execute()) {
            header('Location:./index.php');
        } else {
            echo 'エラー：データ追加失敗';
        }
    }
}
?>