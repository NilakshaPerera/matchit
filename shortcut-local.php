<?php
// Run XAMPP as admin for this to work!
$target = 'C:\xampp\htdocs\homebrew\matchit\_matchit\storage\app\public'; 
$shortcut = 'storage'; 
symlink($target, $shortcut); 
?>