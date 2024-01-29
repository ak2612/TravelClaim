<?php
session_start();
if (!isset($_SESSION['empid'])) {
    header("Location: index.php");
    exit();
}