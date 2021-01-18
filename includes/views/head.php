<?php
if (!isset($title)) {
    $title = 'PokeStats';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title><?= $title ?></title>
</head>
<body>
    <div class="navbar">
        <a href="/" class="navbar-content">Pokemon List</a>
    </div>