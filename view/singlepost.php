<?php

	$post;
	
	if(isset($_GET['postid'])){
		$id = $_GET['postid'];

		$post = getSinglePost($id);
		$comments = getComments($id);
	}

	if (isset($_SESSION['user'])) {
		
		$user = $_SESSION['user'];
	}
	else {

		$user = "";
	}

	if (isset($_POST['comment_submitted'])) {
		
		if (isset($_SESSION['user'])) {
			
			//echo "The form was submitted";
			addComment($id);
			echo "<script type='text/javascript'>window.location.href='index.php?page=$page&action=view&postid=$id'; </script>";

		}
		else {
			echo "<span class='notice'>You need to be logged in to comment on this article. Please consider registering if you have not already done so.</span>";
		}
	}

?>

<main class="singlepost">
	<article class="wow slideInRight">

		<?php
			$title = $post['title'];
			$image = $post['image'];
			$content = $post['content'];
			$author = $post['author'];
			$date = $post['date_posted'];

			echo "<h3>" . $title .  "</h3>";
			echo "<img src='$image'/>";
			echo "<p>" . $content .  "</p>";
			echo "<cite>by: " . $author . "</cite>";
			echo "<datetime>" . $date . "</datetime>";
			
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			}
			else{
				$page = "home";
			}
		?>

	</article>
	
	<a href="<?php echo 'index.php?page=' . $page; ?>" class="readmore">Go back</a>
	<hr/>
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
				echo "</div>";
			}

		?>
		<!-- <div class="comment">
			<img class="avatar" src="images/sin1.jpg"/>
			<blockquote>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</blockquote>
			<cite>by : John Doe,</cite>
			<datetime>on : 8th of August 2016</datetime>
		</div> -->
	</section>
	<form method="post" action="<?php echo 'index.php?page='. $page . '&action=view&postid=' . $id; ?>">
		<label for="comment">your comment</label>
		<textarea id="comment" name="comment" maxlength="500" required></textarea>

		<label for="author">author</label>
		<input type="text" id="author" name="author" value="<?php echo $user; ?>" readonly />

		<input type="submit" name="comment_submitted" class="readmore"/>
	</form>
</main>






