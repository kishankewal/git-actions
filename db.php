<?php
$conn = new mysqli("127.0.0.1", "root", "root", "test_db");

if ($conn->connect_error) {
    die("Connection failed");
}

echo "DB Connected\n";