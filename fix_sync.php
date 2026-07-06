<?php
function removeSync($file) {
    $content = file_get_contents($file);
    // Find barba.init({ sync: true,
    $content = str_replace("sync: true,", "sync: false,", $content);
    file_put_contents($file, $content);
    echo "Removed sync: true from $file\n";
}

removeSync('c:\xampp\htdocs\Laravel\.Portfolio-Artha\resources\views\welcome.blade.php');
removeSync('c:\xampp\htdocs\Laravel\.Portfolio-Artha\resources\views\project-detail.blade.php');
