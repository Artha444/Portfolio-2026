<?php
$file = 'c:\xampp\htdocs\Laravel\.Portfolio-Artha\resources\views\welcome.blade.php';
$lines = file($file);
$new_lines = [];
$in_duplicate = false;
$config_count = 0;

foreach ($lines as $i => $l) {
    if (strpos($l, '<script id="tailwind-config">') !== false) {
        $config_count++;
        if ($config_count == 2) {
            $in_duplicate = true;
        }
    }
    
    if (!$in_duplicate) {
        // Fix the missing brace in the first tailwind config block
        if ($config_count == 1 && strpos($l, '</script>') !== false) {
            // Check if the previous lines have 3 braces.
            // We know exactly what it looks like so we can just replace.
        }
        $new_lines[] = $l;
    }
    
    if ($in_duplicate && strpos($l, '</script>') !== false) {
        $in_duplicate = false;
        // Don't add this closing script tag
        continue;
    }
}

$content = implode("", $new_lines);

// Now fix the missing brace in the remaining config block
$target = '              }
            }
        }
    </script>';
$replacement = '              }
            }
          }
        }
    </script>';

// Normalize line endings
$target_norm = str_replace("\r\n", "\n", $target);
$content_norm = str_replace("\r\n", "\n", $content);
$pos = strpos($content_norm, $target_norm);

if ($pos !== false) {
    $replacement_norm = str_replace("\n", "\r\n", $replacement);
    $content = substr_replace($content_norm, $replacement_norm, $pos, strlen($target_norm));
    file_put_contents($file, $content);
    echo "SUCCESS";
} else {
    // Maybe it's already using \r\n or \n exclusively
    $pos = strpos($content, $target);
    if ($pos !== false) {
        $content = substr_replace($content, $replacement, $pos, strlen($target));
        file_put_contents($file, $content);
        echo "SUCCESS 2";
    } else {
        echo "FAILED TO FIND TARGET BRACE";
    }
}
