<?php

    function db_connect() {
        $pdo = new PDO('mysql:host=localhost;dbname=classroom', 'root', '');

        return $pdo;
    }
?>