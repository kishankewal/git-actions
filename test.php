<?php

$conn = new mysqli("mysql", "root", "root", "test_db");

$result = $conn->query("SELECT * FROM users");

if ($result && $result->num_rows > 0) {
    echo "Test Passed\n";
} else {
    echo "Test Failed\n";
    exit(1);
}