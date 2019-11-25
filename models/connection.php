<?php 
class connection{
	var $conn;
	function __construct(){
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="blogproject";
		$this->conn=new mysqli($servername,$username,$password,$dbname);
		$this->conn->set_charset('utf8');
	}
}


?>