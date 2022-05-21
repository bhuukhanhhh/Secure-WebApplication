<?php
require_once 'utils.php';

// if user has not logged in then redirect to index.php
if (!isset($_SESSION['username'])) {
    header('location: ../index.php');
} else {
    // if user has logged in but they type from the URL this file path then check "if condition" below
    // if oldPassword, newPassword and retypingPassword are not "posted" to then redirect to settingpassword.php
    if (!isset($_POST['oldPassword']) || !isset($_POST['newPassword']) || !isset($_POST['retypingPassword'])) {
        header('location: ../settingpassword.php');
    } else {
        $regex_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\~?!@#\$%\^&\*])(?=.{8,})/";
        $conn = Database_Connection();
        if ($conn) {
            $oldPassword = mysqli_real_escape_string($conn, $_POST['oldPassword']);
            $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
            $retypingPassword = mysqli_real_escape_string($conn, $_POST['retypingPassword']);
            $username = mysqli_real_escape_string($conn, $_SESSION['username']);
            if (empty($oldPassword) || empty($newPassword) || empty($retypingPassword) || ctype_space($oldPassword) || ctype_space($newPassword) || ctype_space($retypingPassword)) {
                // [ERROR 2] Empty or space characters input error
                echo 2;
            } else {
                $select_result = SQL_Select($conn, "SELECT * FROM user_info WHERE username=?", "s", $username);
                $fetch_result = $select_result->fetch_assoc();
                if (password_verify($oldPassword, $fetch_result['password'])) {
                    if ($retypingPassword === $newPassword) {
                        if (preg_match($regex_password, $newPassword)) {
                            $hashed_newpassword = password_hash($newPassword, PASSWORD_DEFAULT);
                            $update_password = SQL_Update($conn, "UPDATE user_info SET password=? WHERE username=?", "ss", $hashed_newpassword, $username);
                            // changing password successfully
                            echo 0;
                        } else {
                            // [ERROR 5] Password is not right with the format
                            echo 5;
                        }
                    } else {
                        // [ERROR 4] confirm-password and new password are not matched
                        echo 4;
                    }
                } else {
                    // [ERROR 3] Old password input and Queried password are not matched
                    echo 3;
                }
            }
        } else {
            // [ERROR 1] Cannot connect to database
            echo 1;
        }
    }
}