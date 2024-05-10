<?php
class Database{
	public $host= DB_HOST;
	public $user= DB_USER;
	public $password= DB_PASS;
	public $db_name= DB_NAME;
	public $link;
	public $error;
	
	public function __construct(){
		//Call connection function
		$this->connect();
	}
	/*
	* Connection
	*/
	private function connect(){
		$this->link=new mysqli($this->host,$this->user,$this->password,$this->db_name);
		if(!$this->link){
			$this->error="Connection Failed".$this->link->connect_error;
			return false;
		}
	}
	/*
	* Select
	*/
	public function select($query){
		$result=$this->link->query($query) or die($query."<br>".$this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
			
		}else{
			return false;
		}
	}
	/*
	* Insert
	*/
	public function insert($query){
				$insert_row=$this->link->query($query) or die($query."<br>".$this->link->error.__LINE__);
				//validate insert
				if($insert_row){
					header('location: index.php?msg='.urlencode('Record Added Successfully'));
					exit();
				}else{
					die('Error: ('.$this->link->errno.")<br>".$this->link->error);
				}
	}
	/*
	* Insert
	*/
	public function update($query){
				$update_row=$this->link->query($query) or die($query."<br>".$this->link->error.__LINE__);
					//validate update
				if($update_row){
					header('location: index.php?msg='.urlencode('Record Updated Successfully'));
					exit();
				}else{
					die('Error: ('.$this->link->errno.")<br>".$this->link->error);
				}
	}
		/*
	* Insert
	*/
	public function delete($query){
				$delete_row=$this->link->query($query) or die($query."<br>".$this->link->error.__LINE__);
					//validate delete
				if($delete_row){
					header('location: index.php?msg='.urlencode('Record Deleted Successfully'));
					exit();
				}else{
					die('Error: ('.$this->link->errno.")<br>".$this->link->error);
				}
	}
}