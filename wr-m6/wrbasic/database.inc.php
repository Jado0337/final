<?php
	/*****************************************************************************
		Database Class for MySQL Server. Please do not change anything
	*****************************************************************************/
	class database {
		protected $Con;
		protected $dbhost;
		protected $dbport;
		protected $dbuser;
		protected $dbpass;
		protected $dbname;
						
		public function __construct($database_host,$database_port,$database_user,$database_password,$database_name) {
			$this->dbhost=$database_host;
			$this->dbport=$database_port;
			$this->dbuser=$database_user;
			$this->dbpass=$database_password;
			$this->dbname=$database_name;
		}
		
		public function __destruct() {
      		$this->pdo_close();
			//$this->close();
   		}
		public function con_open() {
			//crappy, but fast and dirty fix
			if($this->Con==false)
			{
				//$this->Con = @mysql_connect($this->dbhost.":".$this->dbport,$this->dbuser,$this->dbpass) or die($this->error(mysql_error(),__FILE__,__LINE__));
				//@mysql_select_db($this->dbname,$this->Con) or die($this->error(mysql_error()));
			}
		}
		public function close() {
			//@mysql_close($this->Con);
		}	
		
		/*************************************************************************
		*************************************************************************/
		public function pdo_open(){
			try {
				$dbh = new PDO("mysql:dbname=$this->dbname;host=$this->dbhost","$this->dbuser","$this->dbpass");
				return $dbh;
			} catch (PDOException $e) {
				return false;
			}
		}
		
		public function pdo_close(){
	 		# Set the PDO object to null to close the connection
	 		# http://www.php.net/manual/en/pdo.connections.php
	 		$this->pdo = null;
	 	}
		
		/**
	*	Every method which needs to execute a SQL query uses this method.*/	
		private function Init($query,$parameters = "",$dbh='')
		{
			# Connect to database
			//$stmt = $dbh->prepare($sql);
			# Prepare query
			$this->sQuery = $dbh->prepare($query);
			
			# Add parameters to the parameter array	
			$this->bindMore($parameters);

			# Bind parameters
			if(!empty($this->parameters)) {
				foreach($this->parameters as $param)
				{
					$parameters = explode("\x7F",$param);
					$this->sQuery->bindParam($parameters[0],$parameters[1]);
				}		
			}

			# Execute SQL 
			$this->success = $this->sQuery->execute();		
			
			

			# Reset the parameters
			$this->parameters = array();
		}
		
		public function bindMore($parray)
		{
			if(empty($this->parameters) && is_array($parray)) {
				$columns = array_keys($parray);
				foreach($columns as $i => &$column)	{
					$this->bind($column, $parray[$column]);
				}
			}
		}
		
		public function fetch_query($query, $dbh='', $params = null, $fetchmode = PDO::FETCH_ASSOC)
		{
			$stmt = $dbh->prepare($query);
			$query = trim($query);

			$this->Init($query,$params,$dbh);

			$rawStatement = explode(" ", $query);
			
			# Which SQL statement is used 
			$statement = strtolower($rawStatement[0]);
			
			if ($statement === 'select' || $statement === 'show') {
				return $this->sQuery->fetchAll($fetchmode);
			}
			elseif ( $statement === 'insert' ||  $statement === 'update' || $statement === 'delete' ) {
				return $this->sQuery->rowCount();	
			}	
			else {
				return NULL;
			}
		}
		
		public function pdoquery($sql,$errorFile,$errorLine, $arry, $dbh='') {
			$stmt = $dbh->prepare($sql);
			if( $arry!=null ){
				if($result = $stmt->execute($arry)){
					$row = $stmt->fetch();
					if(($row)-1>0)
						foreach($row as $key=>$value)
							$row[$key]=stripslashes($value);
					return $row;
				}
			}else{
				if($result = $stmt->execute()){
					$row = $stmt->fetch();
					if(($row)-1>0)
						foreach($row as $key=>$value)
							$row[$key]=stripslashes($value);
					return $row;
				}
			}
			
		}
		
	   /**
       *  Returns the last inserted id.
       *  @return string
       */	
		public function lastInsertId($dbh) {
			return $dbh->pdo->lastInsertId();
		}	
		
		public function num_rows($dbh='') {
			return $dbh->prepare("SELECT FOUND_ROWS()"); 
		}
       /**
		*	Returns an array which represents a column from the result set 
		*
		*	@param  string $query
		*	@param  array  $params
		*	@return array
		*/	
		public function column($query,$dbh='',$params = null)
		{
			$this->Init($query,$params,$dbh);
			$Columns = $this->sQuery->fetchAll(PDO::FETCH_NUM);		
			
			$column = null;

			foreach($Columns as $cells) {
				$column[] = $cells[0];
			}

			return $column;
			
		}
		
		public function getTableData($table,$col,$checkby,$val,$dbh){
			$sql = "select $col from $table where $checkby='$val' ";
			$record = $this->column($sql,$dbh);
			return $record[0];
		}
		
		/**
	*	Returns an array which represents a row from the result set 
	*
	*	@param  string $query
	*	@param  array  $params
	*   	@param  int    $fetchmode
	*	@return array
	*/	
		public function row($query,$dbh='',$params = null,$fetchmode = PDO::FETCH_ASSOC)
		{				
			$this->Init($query,$params,$dbh);
			return $this->sQuery->fetch($fetchmode);			
		}
		
		public function pdoinsert($table,$DataArray, $printSQL = false) {
			 $arry=array();
			if(count($DataArray) == 0) {
				die($this->error("INSERT INTO statement has not been created",__FILE__,__LINE__));
			}
			foreach($DataArray as $key => $val) {
				$strFields.= "`".$key."`,";
				if($val == "CURDATE()") {
					$strValues.= "0,";
				} elseif($val == "CURTIME()") {
					$strValues.= "0,";
				} else {
					$strValues.= "?,";
					array_push($arry, $val);
				}
			}
			$strFields = substr($strFields,0,strlen($strFields)-1);
			$strValues = substr($strValues,0,strlen($strValues)-1);
			$sql = "INSERT INTO `".$table."`(".$strFields.") VALUES(".$strValues.")";
			if($printSQL == true) {
				echo $this->error($sql,__FILE__,__LINE__);
			} else {
				
				$dbh=$this->pdo_open();
				$this->pdoquery($sql,__FILE__,__LINE__,$arry,$dbh);
				return $dbh->lastInsertId();
				
			}
		}
		
		public function pdoupdate($table,$DataArray,$updateOnField,$updateOnFieldValue,$printSQL = false)
		{
			$arry = array();
			if(count($DataArray) == 0) 
			{
				die($this->error("UPDATE statement has not been created",__FILE__,__LINE__));
			}
			
			$sql = "UPDATE ".$table." SET ";
			foreach($DataArray as $key => $val)
			{
				$strFields = "`".$key."`";
				if($val == "CURDATE()") {
					$strValues = "0";
				} elseif($val == "CURTIME()") {
					$strValues = "0";
				} else {
					$strValues = "?";
					array_push($arry, $val);
				}
				$sql.= $strFields."=".$strValues.", ";
			}
			
			$sql = substr($sql,0,strlen($sql)-2);
			$sql.= " WHERE `".$updateOnField."`=?";
			array_push($arry, $updateOnFieldValue);
			if($printSQL == true)
			{
				echo $this->error($sql,__FILE__,__LINE__);
			} 
			else 
			{
				$this->pdoquery($sql,__FILE__,__LINE__,$arry,$this->pdo_open());
			}
		}
		
		
		/*************************************************************************
		 MYSQL Quries 
		 ************************************************************************/
		public function query($sql,$errorFile,$errorLine) {
			$result = @mysql_query($sql,$this->Con) or die($this->error($sql."<br />".mysql_error(),$errorFile,$errorLine));
			return $result;
		}
		
		public function fetch_array($result) {
		$row=mysql_fetch_array($result);
		
		if(count($row)-1>0)
		foreach($row as $key=>$value)
		$row[$key]=stripslashes($value);
		
		return $row;
		}
		
		public function fetch_row($result) {
		$row=mysql_fetch_row($result);
		
		if(count($row)-1>0)
		foreach($row as $key=>$value)
		$row[$key]=stripslashes($value);
		
		return $row;
		}
			
			
		
		/*************************************************************************
		Can be used to send error msgs of server to Admin.
		*************************************************************************/


		
	}
?>