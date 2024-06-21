<html>
    <head>
        <meta charset="utf-8">
        <title>予定を削除</title>
    </head>
    <body>
        <h1>削除</h1>
        <form action="./delete_output.php" method="post">
            <p>名前: <input type="text" name="user"></p>
            <p>削除する日程: <select name="date"><?php
            for($i=1;$i<=31;$i++) {
                echo '<option value="'.$i.'">'.$i.'日</option>';
            }
            ?>
            </select>
            <input type="submit" value="送信">
        </form>
        <!--<p>または<a href="./deleterange.php">範囲を指定して削除</a></p>-->
        <h3 style="color:red;">他人の予定は削除禁止</h3>
    </body>
</html>