<?php

class Database{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	public function __construct(){
		$this->connection();
	}

	private function connection(){

		$this->link= new mysqli($this->host,$this->user,$this->pass,$this->dbname);

		if(!$this->link){
			$this->error='Connection Failed'.$this->link->connect_error;
			return false;
		}
	}

	// to read data 
	public function select($selectData){

		$result=$this->link->query($selectData) or die($this->link->error.__LINE__);

		if($result->num_rows > 0){
			return $result;
		}
		else{
			return false;
		}
	}

	//to insert data 
	public function insert($insertData){
		$insert_row=$this->link->query($insertData) or die($this->link->error.__LINE__);
		if ($insert_row) {
			header("Location: index.php?msg=".urldecode("Data inserted successfully !"));
			exit();
		} else{
			die ("Error : (".$this->link->errno.")".$this->link->error);
		}
	}

	//to update data 
	public function update($insertData){
		$insert_row=$this->link->query($insertData) or die($this->link->error.__LINE__);
		if ($insert_row) {
			header("Location: index.php?msg=".urldecode("Data updated successfully !"));
			exit();
		} else{
			die ("Error : (".$this->link->errno.")".$this->link->error);
		}
	}

	//to delete data 
	public function delete($query){
		$delete_row=$this->link->query($query) or die($this->link->error.__LINE__);
		if ($delete_row) {
			header("Location: index.php?msg=".urldecode("Data deleted successfully !"));
			exit();
		} else{
			die ("Error : (".$this->link->errno.")".$this->link->error);
		}
	}

}