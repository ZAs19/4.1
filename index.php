<?php
try {
$pdo = new PDO(
    "mysql:host=localhost; dbname=global",
    "root",
    "root",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$pdo->exec('SET NAMES utf8');
$sql = 'SELECT * FROM books';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div>
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>Год выпуска</th>
            <th>Жанр</th>
            <th>ISBN</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($pdo->query($sql) as $row) : ?>
            <tr>
                <td><?=$row['name']?></td>
                <td><?=$row['author']?></td>
                <td><?=$row['year']?></td>
                <td><?=$row['genre']?></td>
                <td><?=$row['isbn']?></td>
            </tr>
        <?php endforeach;?>

        </tbody>

    </table>
</div>

</body>

<?php
}  // try
catch (PDOException $e) {
    echo 'Невозможно установить соединение с базой данных' . $e->getMessage();
    die();
}
?>
