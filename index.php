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
            $pdo = new PDO('mysql;host=localhost;dbname=db;charset=utf8', 'admin', 'password');
            for (i=1,i<4,i++) {
                echo '<td></td>';
            }
            for (i=1,i<32,i++) {
                $stmt = $pdo->prepare('SELECT * FROM db WHERE day='.i);
                if ($stmt->execute) {
                    // 日付の数字をリンクにして押したらその日のデータを追加できるようにしたい　formタグで実装できるのかは不明
                    echo '<form action="./addevent.php" method="post">';
                    echo '<input type=hidden, value="'.i.'">';
                    echo '<td><a>'.i.'</a>';
                    echo '</form>';
                    foreach ($stmt as $row) {
                        echo '<br>'.$row['user'].': '.$row['availability'];
                    }
                }
                if ((i+4)%7 == 0) {
                    echo '</tr><tr>';
                }
            }
            ?>
            </tr>
    </body>
</html>