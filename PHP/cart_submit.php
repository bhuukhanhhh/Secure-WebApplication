<?php
require_once 'utils.php';

//$conn = Database_Connection();

function Get_TotalPrice()
{
    $conn = Database_Connection();
    $user_id = $_SESSION['id'];
    if ($conn) {
        $select_UserProducts = SQL_Select($conn, "SELECT items.id, items.name, items.price from users_items INNER JOIN items ON items.id=users_items.item_id WHERE users_items.user_id=?", "s", $user_id);
        $row_result = $select_UserProducts->num_rows;
        $total_price = 0;
        if ($row_result == 0) {
            return false;
        } else {
            $fetch_rows = $select_UserProducts->fetch_assoc();
            while ($fetch_rows) {
                $total_price += $fetch_rows['price'];
            }
            return $total_price;
        }
    } else {
        return false;
    }
}

// if user has not logged in then redirect to index.php
/* if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header('location: ../index.php');
} else {
    // if user has logged in but they type from the URL this file path then check "if condition" below
    // if ...
    $user_id = $_SESSION['id'];
    $conn = Database_Connection();
    $alert_messages = "";
    if ($conn) {
        $select_UserProducts = SQL_Select($conn, "SELECT items.id, items.name, items.price from users_items INNER JOIN items ON items.id=users_items.item_id WHERE users_items.user_id=?", "s", $user_id);
        $rows_result = $select_UserProducts->num_rows;
        if ($rows_result == 0) {
            $alert_messages = "There is no items in your cart.";
        } else {
            $total_price = 0;
            $item_order = 1;
            $fetch_rows = $select_UserProducts->fetch_assoc();

            while ($fetch_rows) {
                echo $total_price += $fetch_rows['price'];
            }
        }
    } else {
        // [ERROR 1] Cannot connect to database
        $alert_messages = "Cannot connect to database";
    }
} */