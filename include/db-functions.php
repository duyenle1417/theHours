<?php
require('config.php');

/* one for all */
function GetAll($table, $condition = [])
{
    // global $conn;
    // // $sql = "SELECT * FROM products";
    // // $result = mysqli_query($conn, $sql);

    // // $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // // $final = array();
    // // foreach ($products as $product) {
    // //     array_push($final, $product);
    // // }
    return $final;
}

/* ARTICLES */
function GetAllPosts()
{
    global $conn;
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final = array();
    foreach ($products as $product) {
        array_push($final, $product);
    }
    return $final;
}
