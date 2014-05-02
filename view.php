<?php
$file = fopen('list.txt', 'r');
echo fgets($file);
fclose($file);
?>