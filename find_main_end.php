<?php
$lines = file('c:\xampp\htdocs\Laravel\.Portfolio-Artha\resources\views\welcome.blade.php');
foreach ($lines as $i => $l) {
    if (strpos($l, '</main>') !== false) {
        echo "Line " . ($i+1) . ": " . trim($l) . "\n";
    }
}
