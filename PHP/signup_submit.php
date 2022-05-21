<?php
require_once 'utils.php';

// if user is logged in then redirect to products.php
if (isset($_SESSION['username'])) {
    header('location: ../products.php');
} else {
    // if user has not logged in but they type from the URL this file path then check "if condition" below
    // if name, email, username, password and confirm-password are not "posted" to then redirect to signup.php
    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['confirm-password'])) {
        header('location: ../signup.php');
    } else {
        $errors = [];
        $conn = Database_Connection();
        // checking connection to database
        if ($conn) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm-password']);

            // Name Format: only characters allowed (no numbers also)
            $regex_name = "/^[a-zA-Z ]+$/";
            // Contact Format: must be numbers only
            $regex_contact = "/^[\d ]*$/";
            // Email Format:
            $regex_email = "/[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,3}$/";
            // Username Format: buihuukhanh.-_2000
            $regex_username = "/^[a-zA-Z-._]+[0-9]*$/";
            // Password must have more than 8 characters and at least one lowercase, one uppercase, one digit and one special character
            $regex_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\~?!@#\$%\^&\*])(?=.{8,})/";

            if (!isset($name) || strlen($name) > 255 || !preg_match($regex_name, $name)) {
                // Name Error [ERROR 1]
                $errors[] = 1;
            }

            if (!isset($contact) || strlen($contact) > 50 || !preg_match($regex_contact, $contact)) {
                // Phone Number Error [ERROR 2]
                $errors[] = 2;
            }

            if (!isset($email) || strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Email Error [ERROR 3]
                $errors[] = 3;
            }

            if (!isset($username) || strlen($username) > 255 || !preg_match($regex_username, $username)) {
                // Username Error [ERROR 4]
                $errors[] = 4;
            }

            if (!isset($password) || strlen($password) > 255 || !preg_match($regex_password, $password)) {
                // Password Format Error [ERROR 5]
                $errors[] = 5;
            } else if (!isset($confirmPassword) || $confirmPassword !== $password) {
                // Confirm Password does not match with Password [ERROR 6]
                $errors[] = 6;
            }

            // Variable $errors equals to 0 means that all inputs are good to go
            if (count($errors) === 0) {
                // trying to query if there is a duplicated user
                $query_user = SQL_Select($conn, "SELECT * FROM user_info WHERE username=? OR email=?", "ss", $username, $email);
                if ($query_user->num_rows === 0) {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $newUserID = SQL_Insert($conn, "INSERT INTO user_info(name, contact, email, username, password) VALUES (?, ?, ?, ?, ?)", "sssss", $name, $contact, $email, $username, $hashed_password);
                    // Created new account successfully
                    $errors[] = 0;
                    $_SESSION['id'] = $newUserID;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $name;
                    $_SESSION['contact'] = $contact;
                } else {
                    // This Username or Email has been created before [ERROR 7]
                    $errors[] = 7;
                }
            }
        } else {
            // Cannot connect to database [ERROR 8]
            $errors[] = 8;
        }

        // Send variable $errors as json data to JavaScript file (including/script.js)
        echo json_encode($errors);
    }
}