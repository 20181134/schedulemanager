<?php
$pdo = new PDO('mysql:host=localhost;dbname=schedule;charset=utf8;', 'admin', 'admin1234');
$stmt = $pdo->prepare('INSERT INTO scheduletable VALUES(:id, :year, :month, :day, :user, :availability)');
$stmt->bindValue(':id', null);
$stmt->bindValue(':year', '2024');
$stmt->bindValue(':month', '8');
$stmt->bindValue(':day', $_REQUEST['day']);
$stmt->bindValue(':user', $_REQUEST['name']);
switch ($_REQUEST['availability']) {
    case 'notavailable':
        $stmt->bindValue(':availability', '×');
        break;
    case 'flexible':
        $stmt->bindValue(':availability', '△');
    case 'best':
        $stmt->bindValue(':availability', '◎');
}
if ($stmt->execute()) {
    header('Location:./index.php');
} else {
    echo 'エラー';
}