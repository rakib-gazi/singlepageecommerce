<?php
    require_once 'db_connection.php';
    
    function login(){
        $db_connect = db_connect();
        $username = mysqli_real_escape_string($db_connect, $_POST['username']);
        $password = mysqli_real_escape_string($db_connect, $_POST['password']);
        
        $errors = [];
        if(empty($username) || empty($password)){
            $errors[] = 'Username/Password Must be needed';
        }

        $sql_view = "SELECT * FROM users WHERE email = '$username' && password = '$password' " ;
		$result = mysqli_query($db_connect,$sql_view);
       
		if(mysqli_num_rows($result) > 0){
			$error['email_username'] = 'Invalid email/username or password';
			return[
				'status' => 'error',
				'message' => $error,
			];
		}
        return [
            'status' => 'success',
            'message' => 'Login successful',
        ];
    }
    function logout(){
		session_destroy();
		session_unset();
		header('Location:../index.php');
	}