<?php
require_once("wrbasic/config.inc.php");
require_once('apps/wrback/class/config.back.php');
$auth = new Authentication();
$auth->Destroy_Session();
?>