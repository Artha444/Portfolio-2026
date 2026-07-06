<?php
$lines = file('c:\xampp\htdocs\Laravel\.Portfolio-Artha\resources\views\welcome.blade.php');
foreach ($lines as $i => $l) {
    if (strpos($l, 'data-barba="wrapper"') !== false || strpos($l, 'data-barba="container"') !== false) {
        echo "Line " . ($i+1) . ": " . trim($l) . "\n";
    }
}
