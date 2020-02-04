<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Zebra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">ZEBRA</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Programmers</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Roles</a>
                </li>
            </ul>
        </div>
    </nav>
</header>


<div class="container">
    <div class="jumbotron">
        <h1 class="mt-4"><?= $title; ?></h1>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?= $_SESSION['message_type']; ?>">
        <?= $_SESSION['message']; ?>
    </div>
<?php
unset($_SESSION['message']);
unset($_SESSION['message_type']);
endif;
?>