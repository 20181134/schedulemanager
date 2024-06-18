<html>
    <head>
        <meta charset='utf-8'>
        <title>予定を追加</title>
    </head>
    <body>
        <?php
        //これポップアップウィンドウにしたい　jsでaタグからウィンドウ開いてデータ受け渡しできる方法知ってたら変更頼む
        //あと見た目がダサくなるので数字のとこはなるべくボタンにはしたくない
        $day = $_GET['day'];
        echo '<h1>8月'.$day.'日</h1>';
        ?>
        <form action='./output.php' method="post">
            <p>名前: <input type="text" name="name"></p>
            <input type="hidden" name="day" value="<?php echo $day; ?>">
            <p><input type="radio" name="availability" value="notavailable" checked>不可</p>
            <p><input type="radio" name="availability" value="flexible">変更可(なるべく避ける)</p>
            <p><input type="radio" name="availability" value="best">希望</p>
            <input type="submit" value="確定">
        </form>
    </body>
</html>