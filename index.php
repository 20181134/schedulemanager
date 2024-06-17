<html>
    <head>
        <meta charset="utf-8">
        <title>予定管理</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <table border=1 width='300'>
            <tr>
            <!-- thで曜日を作成 -->
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
    </body>
</html>