<?php

	/******************** Registering functions *******************/
	
	function register(){
		
			global $users;
			global $connection;
	
			$new_password = md5($_POST['new_password']);
			$ip = $_SERVER['REMOTE_ADDR'];
	
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$new_email = $_POST['new_email'];
			$gender = $_POST['gender'];
	
			$query_string = "INSERT INTO " . $users . " (firstname, lastname, email, gender, ip_address, password) VALUES ('$firstname', '$lastname', '$new_email', '$gender', '$ip', '$new_password')";
	
			$result = $connection->query($query_string);
	
			if(!$result){
				echo "Unable to add new record to db " . $connection->error;
			}
			else{
				echo "New record added to db";
				$_SESSION['registered'] = true;
				echo "<script> window.location.href='index.php?page=register'; </script>";
			}
	
	}

	/*********************** Login functions ***********************/

	if(isset($_GET['logout'])){

		session_unset();
		session_destroy();
	}
	
	function login(){

			global $users;
			global $connection;
	
			$password = md5($_POST['password']);
			$email = $_POST['email'];
	
			$query_string = "SELECT * FROM $users WHERE email LIKE '%$email%' AND password LIKE '%$password%'";
	
			$result = $connection->query($query_string);
	
			if($row = $result->fetch_assoc()){
	
				//echo "Welcome " . $row['firstname'] . " you are now logged in.";
	
				$_SESSION['user'] = $row['firstname'];
				$_SESSION['loggedin'] = true;
				echo "<script> window.location.href='index.php?page=login'; </script>";
			}
			else{
				echo "Either email or password are incorrect";
			}
		
	}

?>