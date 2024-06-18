<html>
    <head>
        <meta charset="utf-8">
        <title>範囲指定</title>
    </head>
    <body>
        <h1>範囲を指定して追加</h1>
        <form action="./range_output.php" method="post">
            <p>名前: <input type="text" name="user"></p>
            <p><select name="since">
                <!-- <option value=""></option> -->
                <?php
                for ($i=1;$i<=31;$i++) {
                    echo '<option value="'.$i.'">'.$i.'日</option>';
                }
                ?>
            </select>から<select name="until">
                <?php
                for ($i=1;$i<=31;$i++) {
                    echo '<option value="'.$i.'">'.$i.'日</option>';
                }
                ?>
            </select>まで</p>
            <p><input type="radio" name="availability" value="notavailable" selected>不可</p>
            <p><input type="radio" name="availability" value="flexible">変更可(なるべく避ける)</p>
            <p><input type="radio" name="availability" value="best">希望</p>
            <input type="submit" value="追加">
        </form>
    </body>
</html>