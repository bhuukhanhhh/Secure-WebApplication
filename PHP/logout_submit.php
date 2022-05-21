<?php
if (!isset($_SESSION['username'])) {
    header('location: ../index.php');
}
session_unset();
session_destroy();