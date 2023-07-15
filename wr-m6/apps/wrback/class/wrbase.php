<?php 

class FrontBase{
	
	var $auth;

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
	$this->auth = new Authentication();
}

function __destruct(){
	$this->db->pdo_close();
}

function frontLogin(){

/*$this->db->pdo_open();
$insert_sql_array = array();
$insert_sql_array['username']			=	'aa';				
$insert_sql_array['password']			=	'bb';	
$last_id=$this->db->pdoinsert(WR_ADMIN,$insert_sql_array,false);
$this->db->pdo_close();*/

?>
<form action="" method="post">
	<img src="assets/images/logo.png" style="max-width:160px;" />
	<h1>WR Dashboard Login</h1>
	<div>
		<input type="text" class="form-control" placeholder="Username" required="" name="wrusername" />
	</div>
	<div>
		<input type="password" class="form-control" placeholder="Password" required="" name="wrpassword" />
	</div>
	<div>
		<button class="btn btn-default submit" type="submit" name="loginsbmt" value="SubmitLogin">Log in</button>
	<?php /*?><a class="reset_pass" href="#">Lost your password?</a><?php */?>
	</div>
	<p style="margin-top:30px;">Powered By <a class="reset_pass" href="http://wriglecs.com" target="_blank">Wriglecs Online Solutions</a></p>
	<div class="clearfix"></div>
</form>

<?php 
}

function frontLoginSubmit($wrusername,$wrpassword)
{
	
	// With PDO //////
	$sql = "select * from ".WR_ADMIN." where username='".$wrusername."' and password='".$wrpassword."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
	if(count($record)>0){
		foreach ($record as $arr)
		{
			$this->auth->Create_Session($arr['id'],$arr['username'],$arr['role']);
		}
		echo "<script>window.location='home.php'; </script>";
		exit();
	}
	else{
		echo "<script>window.location='index.php?err=invalidlogin';</script>";
	}
	
	
}


///////// This is a testing fucntion for PDO queries ////////////////
function TestingFunction($wrusername,$wrpassword)
{
	
	// With PDO //////
	$sql = "select * from ".WR_ADMIN." where username='wradmin' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
	foreach ($record as $arr)
	{
		echo $arr['username'].', '.$arr['password'].', '.$arr['timestamp'].'<br>';
	}
	echo '<pre>';
	print_r($record);
	echo '</pre>';
	
	// Without PDO //////
	echo '<br> //////////// Widthout PDO /////////////////////////<br>';
	$sql2	= "select * from ".WR_ADMIN." ";
	$this->db->con_open();
	$result2	= $this->db->query($sql2,__FILE__,__LINE__);
	while($row2	= $this->db->fetch_array($result2))
	{
		echo $row2['username'].', '.$row2['password'].', '.$row2['timestamp'].'<br>';
	}
	$this->db->close();
	
}

} // End of FrontBase 
?>