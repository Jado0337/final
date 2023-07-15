<?php

$Servername = "localhost";
$username = "recycleproco_sohaib";
$password = "123@Screw@@";

$Servername = "localhost";
$username = "recycleproco_sohaib";
$password = "123@Screw@@";

try {
  $pdo = new PDO("mysql:host=$Servername;dbname=recycleproco_experiment", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
