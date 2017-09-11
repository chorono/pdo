<?php
try {
    $pdo = new PDO('mysql:dbname=sql_lesson_1;host=127.0.0.1', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $e) {
    exit('PDOの接続エラーです');
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
        </tr>
        <?php while ($user = $statement->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['name']?></td>
            </tr>
        <?php endwhile ?>
    </table>
</body>
</html>