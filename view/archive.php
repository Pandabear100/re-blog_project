<main class="archive">
			<div class="container">
				
					
					<?php
						
						while($row = $posts->fetch_assoc()){
							
							$id = $row['id'];
							$title = $row['title'];
							$author = $row['author'];
							$date = $row['date_posted'];
							$img = $row['image'];
							
							echo "<a href='index.php?page=archive&postid=$id' class='post wow slideInRight' style='background : url(" . $img . ") no-repeat; background-size : cover; background-position : bottom center;'>";
							echo "<div class='post-content'>";
							echo "<h5>$title</h5>";
							echo "<cite>$author</cite>";
							echo "<datetime>$date</datetime>";
							echo "</div>";
							echo "</a>";
						}
						
					?>
					
				
			</div>
		</main>
