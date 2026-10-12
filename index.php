<?php
$message = "Привет, мир!";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $message ?></title>
</head>
<body>
    
    <p>Сегодня: <?= date('d.m.Y H:i') ?></p>
<h1><?= $message ?></h1>
</body>
</html>
