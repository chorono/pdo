<?php
try {
    $pdo = new PDO('mysql:dbname=sql_lesson_1;host=127.0.0.1', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    if (!empty($_POST)) {
        $statement = $pdo->prepare('INSERT INTO users (name, pass) VALUES (:name, :password)');
        $statement->bindValue('name', $_POST['name']);
        $statement->bindValue('password', $_POST['password']);
        $statement->execute();
        echo '<p style="color: red;">' . htmlspecialchars($_POST['name'], ENT_QUOTES) . 'さんを登録したぞい</p>';
    }
} catch (Exception $e) {
    exit($e->getMessage());
}
$statement = $pdo->query('SELECT * FROM users');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>名前</th>
            <th>パスワード</th>
        </tr>
        <?php while ($user = $statement->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['name']?></td>
                <td><?=$user['pass']?></td>
            </tr>
        <?php endwhile ?>
    </table>
    <form action="" method="POST">
        <table>
            <tr>
                <th><label for="name">名前</label></th>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <th><label for="password">パスワード</label></th>
                <td><input type="text" name="password" id="password"></td>
            </tr>
            <tr>
                <th></th>
                <td><button type="submit">送信</button><button type="reset">リセット</button></td>
            </tr>
        </table>
    </form>
</body>
</html>