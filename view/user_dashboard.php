<?php

	$posts = getPostFromAuthor(ucfirst($_SESSION['user']));

?>

<main>
    <div class="container">
        <h1>This is the dashboard</h1>
        <h2>Welcome <?php $_SESSION['user'] ?>you are now logged in</h2>
        
        <a href="index.php?page=login&amp;logout=true">Logout</a>

                <table>
            <tr>
                <th>title</th>
                <th>author</th>
                <th>comments</th>
                <th>approval</th>
                <th>actions</th>
            </tr>

            <?php

                while($row = $posts->fetch_assoc()) {

                    $id = $row['id'];
                    $title = $row['title'];
                    $author = $row['author'];
                    $comments = $row['num_comments'];
                    $approval = $row['approval'];

                    echo "<tr>";
                    echo "<td>$title</td>";
                    echo "<td>$author</td>";
                    echo "<td>$comments</td>";
                    echo "<td>$approval</td>";

                    echo "<td>";
                    echo "<a href='index.php?page=login&action=view&postid=$id'>View</a>";
                    echo "<a href='index.php?page=login&action=edit&postid=$id'>Edit</a>";
                    echo "<a href='#'>Delete</a>";
                    echo "</td>";

                    echo "</tr>";
                }

            ?>

        </table>
    </div>
</main>