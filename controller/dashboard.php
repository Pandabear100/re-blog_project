<?php
   
   if($_SESSION['user'] == 'admin'){
       
       //show the admin dashboard
       if(isset($_GET['action'])){
           
           $action = $_GET['action'];
           $id = $_GET['postid'];
           
           switch($action){
               
               case "add" :
                  include "view/addpost.php";
                  break;

               case "view" : 
                   include "view/singlepost.php";
                   break;
                   
               case "edit" : 
                   include "view/edit_singlepost.php";
                   break;
               
               case "delete" : 
                   deletePost($id);
                   include "view/admin_dashboard.php";
                   break;
                   
               case "approve" : 
                   approvePost($id);
                   include "view/admin_dashboard.php";
                   break;
                   
               case "disapprove" :
                   disapprovePost($id);
                   include "view/admin_dashboard.php";
                   break;

                case "allow_comments" :
                  allowComments($id);
                  include "view/admin_dashboard.php";
                  break;

                case "disable_comments" :
                  disableComments($id);
                  include "view/admin_dashboard.php";
                  break;
                   
               case "update" : 
                   editPost($id);
                   echo "<span>This post was edited</span><br/>";
                   include "view/edit_singlepost.php";
                   break;

                case "save" :
                  addPost();
                  echo "<span>A new record was added</span>";
                  include "view/addpost.php";
                     
                 default : 
           }
       }
       //if the user did not click on anything, just show him the dashboard by default
       else{
           include "view/admin_dashboard.php";
       }
       
   }
   else{
       //it's a regular user
       
       //show the user dashboard
       if(isset($_GET['action'])){
           
           $action = $_GET['action'];
           $id = $_GET['postid'];
           
           switch($action){
               
               case "view" : 
                   include "view/singlepost.php";
                   break;
                   
               case "edit" : 
                   include "view/edit_singlepost.php";
                   break;
               
               case "delete" : 
                   deletePost($id);
                   include "view/user_dashboard.php";
                   break;

                case "allow_comments" :
                  allowComments($id);
                  include "view/user_dashboard.php";
                  break;

                case "disable_comments" :
                  disableComments($id);
                  include "view/user_dashboard.php";
                  break;
                   
               case "update" : 
                   editPost($id);
                   echo "<span>This post was edited</span><br/>";
                   include "view/edit_singlepost.php";
                   break;
                   
               default : 
           }
       }
       //if the user did not click on anything, just show him the dashboard by default
       else{
           include "view/user_dashboard.php";
       }
   }
   
?>