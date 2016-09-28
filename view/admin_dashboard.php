<?php 

    $posts = getAllPosts();

?>

<main>
    <div class="container">
        <h1>This is the dashboard</h1>
        <h2>Welcome <?php echo $_SESSION['user'] ?> you are now logged in</h2>
        
        <a href="index.php?page=login&amp;logout=true">Logout</a>

        <br/>

        <a href="index.php?page=login&amp;action=add&amp;postid=">Add new post</a>
        
        <br/><br/>
        
        <table>
            <tr>
                <th>title</th>
                <th>author</th>
                <th>comments</th>
                <th>approval</th>
                <th>allow comments</th>
                <th>actions</th>
            </tr>

            <?php

                while($row = $posts->fetch_assoc()) {

                    $id = $row['id'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $comments = $row['num_comments'];
                    $approval = $row['approval'];
                    $allow_comments = $row['allow_comments'];

                    echo "<tr>";
                    echo "<td>$title</td>";
                    echo "<td>$author</td>";
                    echo "<td>$comments</td>";
                    echo "<td>$approval</td>";


                    echo "<td>$allow_comments</td>";


                    echo "<td>";
                    echo "<a href='index.php?page=login&action=view&postid=$id'>View</a>";
                    echo "<a href='index.php?page=login&action=edit&postid=$id'>Edit</a>";

                    echo "<a href='index.php?page=login&action=approve&postid=$id'>Approve</a>";
                    echo "<a href='index.php?page=login&action=disapprove&postid=$id'>Disapprove</a>";

                    echo "<a href='index.php?page=login&action=allow_comments&postid=$id'>Allow Comments</a>";
                    echo "<a href='index.php?page=login&action=disable_comments&postid=$id'>Disable Comments</a>";

                    echo "<a href='index.php?page=login&action=delete&postid=$id'>Delete</a>";
                    echo "</td>";

                    echo "</tr>";
                }

            ?>
<!--             <tr>
                <td>post title</td>
                <td>author</td>
                <td>number of comments</td>
                <td>pending</td>
                <td>
                   <a href="#">View</a> 
                   <a href="#">Edit</a>
                   <a href="#">Approve</a>
                   <a href="#">Disapprove</a>
                   <a href="#">Delete</a>
                </td>
            </tr> -->
        </table>
        
    </div>
</main>