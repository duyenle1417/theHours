<?php
    // connect to database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'thehours';

    $conn = new MySQLi($host, $user, $pass, $db_name);

    if ($conn->connect_error) {
        die('Database connection error: ' . $conn->connect_error);
    }
