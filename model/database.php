<?php
    $dsn = 'mysql:host=sql2.njit.edu;dbname=sm2292';
    $username = 'sm2292';
    $password = 'cadmium5';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>