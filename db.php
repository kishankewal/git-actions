<?php
$conn = new mysqli("mysql", "root", "root", "test_db");

if ($conn->connect_error) {
    die("Connection failed");
}

echo "DB Connected\n";