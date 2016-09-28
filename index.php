<?php 
if(!isset($_SESSION)){
    session_start();
} 
	
	include "model/connect.php";
	include "view/header.php";
	include "model/functions.php";
	include "model/login_sys.php";
	include "model/comments_func.php";
	
	if(isset($_GET['page'])){
		
		$page = $_GET['page'];
		
		switch($page){
			
			case "home" :
				if(isset($_GET['postid'])){
					include "view/singlepost.php";
				}
				else{
					
					$_GET['page'] = "home";
					include "view/home.php";
				}
				break;
			
			case "archive" : 
				
				if(isset($_GET['postid'])){
					include "view/singlepost.php";
				}
				else{
					include "controller/archive_controller.php";
				}
				break;
				
			case "about" : 
				include "view/about.php";
				break;
				
			case "contact" : 
				include "view/contact.php";
				break;
				
			case "login" :
				
				//if the users is already logged in
				if(isset($_SESSION['loggedin'])){
					
					//show him/her the dashboard
					include('controller/dashboard.php');
				}
				else{
					
					//otherwise, show them the login form
					include "view/login_form.php";
				}
				
				break;
				
			case "register" : 
				
				//if the user is already registered 
				if(isset($_SESSION['registered'])){

					//and if the user is already logged in
					if(isset($_SESSION['loggedin'])){
						
						//show him/her the dashboard
						include('controller/dashboard.php');
					}
					
					//otherwise, if they're registered but not logged in
					else{
						//show them the login form
						include "view/login_form.php";
					}
					
				//otherwise, if they're not yet registered
				}
				else{
					
					//show them the register form
					include "view/register_form.php";
				}
				
				break;
				
			default : 
		}
	}
	else{
		
		if(isset($_GET['postid'])){
			include "view/singlepost.php";
		}
		else{
			
			$_GET['page'] = "home";
			include "view/home.php";
		}
	}

	include "view/footer.php";
?>