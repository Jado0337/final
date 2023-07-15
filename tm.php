<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$temp_pointer = tmpfile();

// Write on temporary file
fwrite($temp_pointer, "GeeksforGeeks");

// Read 2k from file
echo fread($temp_pointer, 2048);

// This removes the file
fclose($temp_pointer);

?>