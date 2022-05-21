<?php
require_once 'utils.php';
if (!isset($_SESSION['username'])) {
    header('location: ../login.php');
}

$conn = Database_Connection();