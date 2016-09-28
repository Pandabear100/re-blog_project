<?php
    
    $host = 'localhost';
    $user = 'root';
    $pwd = 'root';
    $db = 'users';
    $posts = 'blog_posts';
    $users = 'users';
    $port = 3306;
    $comments = 'comments';
    
    
    $connection = new mysqli($host, $user, $pwd, $db, $port);
    
    if($connection->connect_error){
        
        die("Unable to connect : " . $connection->connect_error);
    }

    // $query_string = "ALTER TABLE $posts ADD approval VARCHAR(20) ";

    // $result = $connection->query($query_string); // adding columns

    // $query_string = "UPDATE $posts SET num_comments=0, image=' ./images/t4.jpg', approval='approved' ";

    // $result = $connection->query($query_string);

    // if (!$result) {

    //     echo "an error occurred : " . $connection->error;
    // }

    

    // $query_string = "UPDATE $posts SET allow_comments='alow' ";

    // $result  = $connection->query($query_string);

    // if (!$result) {
    //     echo "an error occurred : " . $connection->error;
    // }

    // $query_string = "ALTER TABLE $users ADD avatar VARCHAR(100) ";

    // $result  = $connection->query($query_string);

    // if (!$result) {
    //     echo "an error occurred : " . $connection->error;
    // }

    // $query_string = "UPDATE $users SET avatar='./images/blogger.jpg' WHERE firstname='Amanda' ";

    // $result  = $connection->query($query_string);

    // if (!$result) {
    //     echo "an error occurred : " . $connection->error;
    // }

    // $query_string = "CREATE TABLE comments (

    //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     content VARCHAR(1000),
    //     author VARCHAR(10),
    //     article_id INT(6),
    //     inreplyto VARCHAR(10),
    //     date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP 

    // ) ";



    // $query_string = "INSERT INTO $comments (content, author, article_id) VALUES ('Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.', 'Amanda', 41) ";

    // $result = $connection->query($query_string);

    // if (!$result) {

    //     echo "an error occurred : " . $connection->error;
    // }

    

    // $query_string = "ALTER TABLE $posts ADD category VARCHAR(40) ";

    // $result = $connection->query($query_string); // adding columns

    // $query_string = "UPDATE $posts SET num_comments=0, image=' ./images/t4.jpg', approval='approved' ";

    // $result = $connection->query($query_string);

    // if (!$result) {

    //     echo "an error occurred : " . $connection->error;
    // }



    // $query_string = "UPDATE $posts SET category='news' WHERE id >= 38";

    // $result = $connection->query($query_string); // adding columns

    // if (!$result) {

    //     echo "an error occurred : " . $connection->error;
    // }
    
?>













