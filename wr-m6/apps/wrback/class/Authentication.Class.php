<?php // Basic class for authentication
class Authentication{
var $user_id;
var $adminname;
var $admin_type;
var $db;	
var $adminuser;


		 function __construct()
		 {
			$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
			if(isset($_SESSION['adminname'])){
			$this->adminname=$_SESSION['adminname'];
			$this->user_id=$_SESSION['adminid'];
			$this->admin_type=$_SESSION['admin_type'];
			}
		 }  
		 
		function setHttp_Referer($http_referer)
		{
			$_SESSION['http_referer'] =	'..'.$http_referer;		
		}
				  
		function Create_Session($adminid,$adminname,$admin_type){
			
			$this->adminid	=	$adminid;
			$this->adminname	=	$adminname;
			$this->admin_type	=	$admin_type;
			
			$_SESSION['adminid'] 	= $this->adminid;
			$_SESSION['adminname'] 	= $this->adminname;
			$_SESSION['admin_type']		= $this->admin_type;	
			$_SESSION['msg']		=$this->WelcomeMessage();
		}
		
		function CheckPageAccess($moduleId,$role,$permissionId)
		{
			$result_query=array();
			$sql	="select * from ".TBL_USERPERMISSION." where userid='".mysql_real_escape_string($role)."' AND module='".mysql_real_escape_string($moduleId)."' " ;
			$result	= $this->db->query($sql,__FILE__,__LINE__);
			$row 	= $this->db->fetch_array_ass($result);
			
			$list=explode(',',$row['permission']);
			
			if(!in_array($permissionId,$list))
			{
			$_SESSION['error_msg']='invalied attempt';
			?>
			<script type="text/javascript">
			window.location="home.php";
			</script>
			<?php
			}
		}
		function CheckButtonAccess($moduleId,$role)
		{
			
			$sql	="select * from ".TBL_USERPERMISSION." where userid='".mysql_real_escape_string($role)."' AND module='".mysql_real_escape_string($moduleId)."' " ;
			$result	= $this->db->query($sql,__FILE__,__LINE__);
			$row 	= $this->db->fetch_array_ass($result);
			$list=explode(',',$row['permission']);
			return $list;
			
		}
		
		function Get_user_id()
		{
			return $this->user_id;
		}

		function Get_adminname()
		{
			return $this->adminname;
		}
		
		function Get_user_type()
		{
			return $this->admin_type;
		}
		
		function Destroy_Session()
		{
    		unset($_SESSION['adminid']); 
			unset($_SESSION['adminname']); 
			unset($_SESSION['admin_type']); 
			unset($_SESSION['http_referer']); 
			$_SESSION['msg']='You have logged out successfully';
			?>
			<script type="text/javascript">
			window.location="index.php";
			</script>
			<?php
		}
				
		
		function checkAuthentication()
		{
			//check for the valid login
			if(isset($_SESSION['adminname']))
			return true;
			else return false;
		}
		
		
		function Checklogin()
		{
			$this->setHttp_Referer($_SERVER['REQUEST_URI']);  
			if(!$this->checkAuthentication()){
			$_SESSION['error_msg']='Please login here first..';
			$this->GotoLogin();
			exit();
			}
		
		
		}
		
		function GotoLogin()
		{
			?>
				<script type="text/javascript">
				window.location='index.php';
				</script>
			<?php
		}
			

		function SendToRefrerPage()
		{	
			if($_SERVER['HTTP_REFERER']==''){
			?>
			<script type="text/javascript">
			  window.location='home.php';
			  </script>
			<?php
			}
			else
			{
			?>
				<script type="text/javascript">
				window.location='<?php echo $_SERVER['HTTP_REFERER']; ?>';
				</script>
			<?php }		
			exit();
		}
		
		
		function WelcomeMessage()
		{
			return "Welcome ".$this->adminname." , You have logged in successfully.. ";
		
		}
	
	}	
?>
