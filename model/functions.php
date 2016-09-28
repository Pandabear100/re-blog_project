<?php


    function getSinglePost($id){
        global $posts;
        global $connection;
        
        $query_string = "SELECT * FROM $posts WHERE id=$id";
        
        $result = $connection->query($query_string);
        
        $post = $result->fetch_assoc();
        
        return $post;
    }
    
    function getAllPosts(){
        global $posts;
        global $connection;
        
        $query_string = "SELECT * FROM " . $posts . " ORDER BY date_posted DESC";
        
        $result = $connection->query($query_string);
        
        return $result;
    }

    function getAllApprovedPosts() {
        global $posts;
        global $connection;
        
        $query_string = "SELECT * FROM " . $posts . " WHERE approval='approved' ORDER BY id DESC";
        
        $result = $connection->query($query_string);
        
        return $result;
    }
    
    function getEightMostRecent(){
        
        global $posts;
        global $connection;
        
        $query_string = "SELECT * FROM $posts WHERE approval='approved' ORDER BY id DESC LIMIT 8 ";
        
        $result = $connection->query($query_string);
        
        if(!$result){
            die("An error occurred : " . $connection->error);
        }
        
        return $result;
    }
    
     function getNineMostRecent(){
        
        global $posts;
        global $connection;
        
        $query_string = "SELECT * FROM $posts WHERE approval='approved' ORDER BY id DESC LIMIT 9 ";
        
        $result = $connection->query($query_string);
        
        if(!$result){
            die("An error occurred : " . $connection->error);
        }
        
        return $result;
    }
    
    function getThreeMostRecent(){
        global $posts;
        global $connection;
        
        $query_string = "SELECT * FROM $posts WHERE approval='approved' ORDER BY id DESC LIMIT 3 ";
        
        $result = $connection->query($query_string);
        
        if(!$result){
            die("An error occurred : " . $connection->error);
        }
        
        return $result;
    }
    
    function getFeaturedPost(){
        
        global $posts;
        global $connection;
        
        $query_string = "SELECT * FROM $posts WHERE approval='approved' ORDER BY id DESC LIMIT 1 ";
        
        $result = $connection->query($query_string);
        
        $featured_post = $result->fetch_assoc();
        
        return $featured_post;
    }
    
    
    function editPost($id){

        global $posts;
        global $connection;

        $title = $_POST['title'];
        $content = $_POST['content'];
        $allow_comments = $_POST['allow_comments'];

        $img = $_FILES['image'];
        $target_dir = './images/'; // where you want file to be stored on server
        $target_path = $target_dir.$img['name'];

        if (file_exists($target_path)) {
            
            echo "file already exists";
        }
        else {

            $filetype = pathinfo($img['name'], PATHINFO_EXTENSION);

            if ($filetype == "jpg" || $filetype == "jpeg" || $filetype == "png" || $filetype == "gif") {
                
                move_uploaded_file($img['tmp_name'], $target_path);

                //createThumb($img['name'], $target_path);
            }
        }
        if ($img['name'] == "") {

            $query_string = "UPDATE $posts SET title='$title', content='$content', approval='pending', allow_comments='$allow_comments' WHERE id=$id ";
        }
        else {

             $query_string = "UPDATE $posts SET title='$title', content='$content', image='$target_path', approval='pending', allow_comments='$allow_comments' WHERE id=$id "; // the where is so that we only change the one record not ALL!!
        }


        $result = $connection->query($query_string);

        if(!$result){
            echo "An error occurred : " . $connection->error;
        }
        
    }


    function approvePost($id) {

        global $posts;
        global $connection;

        $query_string = "UPDATE $posts SET approval='approved' WHERE id=$id ";

        $result = $connection->query($query_string);

        if(!$result){
            echo "An error occurred : " . $connection->error;
        }

    }

     function disapprovePost($id) {

        global $posts;
        global $connection;

        $query_string = "UPDATE $posts SET approval='pending' WHERE id=$id ";

        $result = $connection->query($query_string);

        if(!$result){
            echo "An error occurred : " . $connection->error;
        }
        
    }
    
    function deletePost($id){

        global $posts;
        global $connection;

        $query_string = "DELETE FROM $posts WHERE id=$id ";

        $result = $connection->query($query_string);

        if(!$result){
            echo "An error occurred : " . $connection->error;
        }
    }

    function getPostFromAuthor($author) {

        global $posts;
        global $connection;

        $query_string = "SELECT * FROM $posts WHERE author='$author' ";

        $result = $connection->query($query_string);

        if(!$result){
            echo "An error occurred : " . $connection->error;
        }

        return $result;

    }

    function addPost(){

        global $posts;
        global $connection;

        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];

        $allow_comments = $_POST['allow_comments'];

        $img = $_FILES['image'];
        $target_dir = './images/'; // where you want file to be stored on server
        $target_path = $target_dir.$img['name'];

        if (file_exists($target_path)) {
            
            echo "file already exists";
        }
        else {

            $filetype = pathinfo($img['name'], PATHINFO_EXTENSION);

            if ($filetype == "jpg" || $filetype == "jpeg" || $filetype == "png" || $filetype == "gif") {
                
                move_uploaded_file($img['tmp_name'], $target_path);

                //createThumb($img['name'], $target_path);
            }
        }

        $query_string = "INSERT INTO $posts (title, author, content, num_comments, image, approval, allow_comments) VALUES ('$title', '$author', '$content', 0, '$target_path', 'pending', '$allow_comments')";

        $result = $connection->query($query_string);

        if (!$result) {
            
            echo "An error occurred " . $connection->error;
        }

    }

    function createThumb($img_name, $target_path) {

        $thumbname = "./images/thumb_" . $img_name;

        $filetype = pathinfo($img_name, PATHINFO_EXTENSION);

        //$image;

        switch ($filetype) {
            case 'jpg':
                $image = imagecreatefromjpeg($target_path);
                break;

            case 'jpeg':
                $image = imagecreatefromjpeg($target_path);
                break;

            case 'png' :
                $image = imagecreatefrompng($target_path);
                break;

            case 'gif':
                $image = imagecreatefrompng($target_path);
            
            default:
                # code...
                break;
        }

        // load the actual image data into a variable
        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);

        //create an empty space where the thumbnail will be placed
        $thumbnailWidth = 150;
        $thumbnailHeight = 150;
        $thumb = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);

        imagecopyresized($thumbnail, $image, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, $imageWidth, $imageHeight);

        // output image
        imagejpeg($thumb, $thumbnail);

        // free up memory
        imagedestroy($image);
        imagedestroy($thumb);

    }

    function getPostsByCategory($category) {

         global $posts;
         global $connection;

         $query_string = "SELECT * FROM $posts WHERE category='$category' AND approval='approved' ";

         $result = $connection->query($query_string);

         if (!$result) {
             
             die("an error occurred" . $connection->error);
         }

         return $result;
    }

?>






























