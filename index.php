<html>
    <head>
        <meta charset="utf-8">
        <title>予定管理</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <table border=1 width=60%>
            <tr>
            <!-- thで曜日を作成 -->
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            <tr>
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=schedule;charset=utf8', 'admin', 'admin1234');
            // カレンダー部分は行きの電車の中で思いついた方法なので調べればもっとスマートなやり方がありそう
            for ($i=1;$i<5;$i++) {
                echo '<td></td>';
            }
            for ($i=1;$i<32;$i++) {
                $stmt = $pdo->prepare('SELECT * FROM scheduletable WHERE day='.$i);
                if ($stmt->execute()) {
                    // 日付の数字をリンクにして押したらその日のデータを追加できるようにしたい　formタグで実装できるのかは不明
                    // ->get送信でも別に困らないためformは無効化
                    //echo '<form action="./addevent.php" method="post">';
                    $j = $i - 1;
                    //echo '<input type="hidden", value="'.$j.'">';
                    echo '<td><a href="./addevent.php?day='.$i.'">'.$i.'</a>';
                    //echo '</form>';
                    foreach ($stmt as $row) {
                        echo '<br>'.$row['user'].': '.$row['availability'];
                    }
                    echo '</td>';
                }
                if (($i+4)%7 == 0) {
                    echo '</tr><tr>';
                }
            }
            ?>
            </tr>
        </table>
        <p>または<a href="./range.php">範囲を指定して追加</a></p>
        <p><a href="./delete.php">予定を削除</a></p>
    </body>
</html>