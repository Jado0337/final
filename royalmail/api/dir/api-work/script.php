<?php
require_once('vendor/autoload.php');
session_start();


$Servername = "localhost";
$username = "recycleproco_sohaib";
$password = "123@Screw@@";

  $pdo = new PDO("mysql:host=$Servername;dbname=recycleproco_experiment", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";




?>
