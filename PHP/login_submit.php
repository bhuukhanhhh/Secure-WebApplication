<?php
require_once 'utils.php';

// if user is logged in then redirect to products.php
if (isset($_SESSION['username'])) {
    header('location: ../products.php');
} else {
    // if user has not logged in but they type from the URL this file path then check "if condition" below
    // if username and password are not "posted" to then redirect to login.php
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        header('location: ../login.php');
    } else {
        $conn = Database_Connection();
        // checking connection to database
        if ($conn) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password =  mysqli_real_escape_string($conn, $_POST['password']);
            if (empty($username) || empty($password) || ctype_space($username) || ctype_space($password)) {
                // [ERROR 2] Empty or space characters input error
                echo 2;
            } else {
                $select_result = SQL_Select($conn, "SELECT * FROM user_info WHERE username=?", "s", $username);
                if ($select_result->num_rows === 1) {
                    $user = $select_result->fetch_assoc();
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['name'] = $user['name'];
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['contact'] = $user['contact'];
                        // Login successfully
                        echo 0;
                    } else {
                        // [ERROR 3] Invalid username or password
                        echo 3;
                    }
                } else {
                    // [ERROR 3] Invalid username or password or select query has problem (but don't show this problem on display)
                    echo 3;
                }
            }
        } else {
            // [ERROR 1] Cannot connect to database
            echo 1;
        }
    }
}