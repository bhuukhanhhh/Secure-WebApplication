<?php
require_once 'utils.php';

// if user has not logged in then redirect to index.php
if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header('location: ../index.php');
} else {
    $conn = Database_Connection();
    if ($conn) {
        if (!isset($_GET['id']) || !isset($_SESSION['id'])) {
            // [ERROR 2] Cannot add to cart if it doesn't have id of items and id of users
            echo 2;
        } else {
            $item_id = mysqli_real_escape_string($conn, $_GET['id']);
            $user_id = mysqli_real_escape_string($conn, $_SESSION['id']);
            $insert_item = SQL_Insert($conn, "INSERT INTO users_items(user_id, item_id, status) VALUES (?, ?, ?)", "sss", $user_id, $item_id, "Added to cart");
            if ($insert_item === -1) {
                // [ERROR 3] Cannot insert into users_items table
                echo 3;
            } else {
                // Added successfully
                echo 0;
                header('location: ../cart.php');
            }
        }
    } else {
        // [ERROR 1] Cannot connect to database
        echo 1;
    }
}