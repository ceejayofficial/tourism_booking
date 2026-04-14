<?php
$conn = new mysqli("localhost", "root", "", "tourism_booking");

if ($conn->connect_error) {
    die("Database connection failed");
}
?>