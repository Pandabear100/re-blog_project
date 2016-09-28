<?php
    
    function allowComments($id){
        
        global $posts;
        global $connection;
        
        $query_string = "UPDATE $posts SET allow_comments='allow' WHERE id=$id";
        
        $result = $connection->query($query_string);
        
        if(!$result){
            echo "an error occurred" . $connection->error;
        }
    }
    
    function disableComments($id){
        
        global $posts;
        global $connection;
        
         $query_string = "UPDATE $posts SET allow_comments='block' WHERE id=$id";
        
        $result = $connection->query($query_string);
        
        if(!$result){
            echo "an error occurred" . $connection->error;
        }
    }
    
    
    function getComments($post_id){
        
        $users = "users";
        $comments = "comments";
        global $connection;
        
        $query_string = "SELECT $users.avatar, $comments.content, $comments.author, $comments.date_posted FROM $users, $comments WHERE $comments.article_id=$post_id AND $comments.author=$users.firstname";
        
        $result = $connection->query($query_string);
        
        if(!$result){
            echo "an error occurred" . $connection->error;
        }
        
        return $result;
    }
    
    function addComment($post_id){
        
        $comments = "comments";
        $posts = "blog_posts";
        global $connection;
        
        $content = $_POST['comment'];
        $author = $_SESSION['user'];
        
        //Step 1 Query the db for the article the user is currently accessing, to see if comments are allowed
        $query_string = "SELECT id, allow_comments FROM $posts WHERE id=$post_id";
        //Step 2 Save the results of that query, so we can later access them
        $result = $connection->query($query_string);
        //Step 3 if something went wrong with the request to the db, display the error on the screen
        if(!$result){
            echo "an error occurred " . $connection->error;
        }
        //Step 4 ...otherwise, if everything's ok, proceed to check if comments are allowed on this particular article
        else{
            //code to grab the particular row in the "posts" table
            $post = $result->fetch_assoc(); 
            //save the value of the "allow_comments" column so we can evaluate its value using an if,else statement
            $allow_comment = $post['allow_comments'];
            
            if($allow_comment == 'allow'){
                // Step 5 if comments are allowed, we can proceed to add that comment to the database
                $query_string = "INSERT INTO $comments (content, author, article_id) VALUES('$content', '$author', $post_id)";
                
                $result = $connection->query($query_string);
                
                if(!$result){
                    echo "an error occurred" . $connection->error;
                }
                else{
                    incrementNumComments($post_id);
                }
            }
            // if the article is blocking comments, display a nice message to the user
            else{
                echo "<span class='notice'>Comments are not enabled on this article</span>";
            }
        }
    }
    
    function incrementNumComments($post_id){
        
        $posts = 'blog_posts';
        global $connection;
        
        //$query_string = SELECT MAX(column_name) FROM table_name;
         //$post_id = 275;
         $query_string = "UPDATE $posts SET num_comments=num_comments+1 WHERE id=$post_id";
        
        $result = $connection->query($query_string);
        
        if(!$result){
            echo "an error occurred" . $connection->error;
            //echo "<script>logMessage($connection->error);</script>";
        }
    }
    
    function decrementNumComments(){
        //todo
    }

?>