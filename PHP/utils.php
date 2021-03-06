<?php
require_once 'config.php';

// connect to database function
function Database_Connection()
{
    $conn = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME) or die(mysqli_error($conn));
    if ($conn->connect_error) {
        return false;
    }
    return $conn;
}

// SQL Select Command function
function SQL_Select($conn, $query, $format = false, ...$vars)
{
    $statement = $conn->prepare($query);
    if ($format) {
        $statement->bind_param($format, ...$vars);
    }

    if ($statement->execute()) {
        $result = $statement->get_result();
        $statement->close();
        return $result;
    }

    $statement->close();
    return false;
}

// SQL Insert Command fucntion
function SQL_Insert($conn, $query, $format = false, ...$vars)
{
    $statement = $conn->prepare($query);
    if ($format) {
        $statement->bind_param($format, ...$vars);
    }

    if ($statement->execute()) {
        $id = $statement->insert_id;
        $statement->close();
        return $id;
    }

    $statement->close();
    return -1;
}

// SQL Update Command function
function SQL_Update($conn, $query, $format = false, ...$vars)
{
    $statement = $conn->prepare($query);
    if ($format) {
        $statement->bind_param($format, ...$vars);
    }

    if ($statement->execute()) {
        $statement->close();
        return true;
    }

    $statement->close();
    return false;
}

// Showing button's value of products.php page
// if user has logged in then value of the button will be "Add to Cart"
// or else then value of the button will be "See More"
function ShowButtonValue($id_item)
{
    if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
        echo "<p><a href='login.php' role='button' class='btn btn-primary btn-block'>See More</a></p>";
    } else {
        $id_item = htmlspecialchars($id_item);
        $sendTo = "PHP/products_add.php?id=$id_item";
        echo "<p><a href='PHP/products_add.php?id=$id_item' class='btn btn-primary btn-block'>Add to Cart</a></p>";
    }
}