<?php

echo "Running CI test...\n";

$a = 5;
$b = 5;

if ($a + $b === 10) {
    echo "✅ Test Passed\n";
} else {
    echo "❌ Test Failed\n";
    exit(1);
}