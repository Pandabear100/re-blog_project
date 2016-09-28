<?php

	$post;
	
	if(isset($_GET['postid'])){
		$id = $_GET['postid'];

		$post = getSinglePost($id);
		$comments = getComments($id);

		$title = $post['title'];
		$content = $post['content'];
		$author = $post['author'];
		$image = $post['image'];
	}

?>

<main class="singlepost">
	<div class="container">
		<article class="wow slideInRight">

			<?php
				echo "<form method='post' action='index.php?page=login&action=update&postid=$id' enctype='multipart/form-data'>";
				echo "<label for='title'>Title</label>";
				echo "<input type='text' id='title' name='title' value='$title'/>";

				echo "<label for='image'>Change Image</label>";
				echo "<input type='file' name='image' value='$image'/>";

				echo "<img src='$image'/>";

				echo "<label for='content'>Content</label>";
				echo "<textarea name='content' id='content'>$content</textarea>";

				echo "<label for='author'>Author</label>";
				echo "<input type='text' id='author' name='author' value='$author' readonly />";

				echo "<select name='allow_comments'>";
					echo "<option value='allow'>Allow</option>";
					echo "<option value='block'>Block</option>";
				echo "</select>";
				
				echo "<input type='submit' name='save' value='save' />";
				echo "</form>";
			?>

		</article>

		<section class="comments">

			<?php 

				while($comm = $comments->fetch_assoc()) {

					$src = $comm['avatar'];
					$content = $comm['content'];
					$author = $comm['author'];
					$date = $comm['date_posted'];

					echo "<div class='comment'>";
						echo "<img class='avatar' src='$src'/>";
						echo "<blockquote>$content</blockquote>";
						echo "<cite>$author</cite>";
						echo "<datetime>on : $date</datetime>";
					if ($_SESSION['user'] == $author) {
						echo "<a href='index.php?login&action=deleteComment&postid=$id' class='pull_right'>Delete</a>";
					}
					echo "</div>";
				}

			?>
		</section>
		
		<a href="index.php?page=login" class="readmore">Go back</a>
	</div>

</main>