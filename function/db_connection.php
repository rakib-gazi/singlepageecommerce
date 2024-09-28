<?php
	function db_connect(){
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'singleecommerce';
		
		$db_connect = mysqli_connect($host,$user,$pass,$db);
			return $db_connect;
	}