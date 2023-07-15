<?php 
// Dashboard Class contains all functions of dashboard page. 
class DashboardClass{

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}




} // EOF Dashboard Class
?>