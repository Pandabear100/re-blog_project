<?php
	
	$author = ucfirst($_SESSION['user']);
?>

<main class="singlepost">
	<div class="container">
		<article class="wow slideInRight">

			<?php
				echo "<form method='post' action='index.php?page=login&action=save&postid=$id' enctype='multipart/form-data'>";
				echo "<label for='title'>Title</label>";
				echo "<input type='text' id='title' name='title'/>";

				echo "<label for='image'>Select an image</>";
				echo "<input type='file' name='image' id='image'/>";

				echo "<label for='content'>Content</label>";
				echo "<textarea name='content' id='content'></textarea>";

				echo "<label for='author'>Author</label>";
				echo "<input type='text' id='author' name='author' value='$author' readonly />";

				echo "<select name='allow_comment'>";
					echo "<option value='allow'>Allow</option>";
					echo "<option value='block'>Block</option>";
				echo "</select>";
				
				echo "<input type='submit' name='save' value='save' />";
				echo "</form>";
			?>

		</article>
		
		<a href="index.php?page=login" class="readmore">Go back</a>
	</div>

</main>