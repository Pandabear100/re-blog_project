<?php
	$featured = getFeaturedPost(); 
	$latest = getThreeMostRecent();
	$popular = getEightMostRecent();
?>

		<main class="home">
			<div class="container">
				<article class="featured wow slideInRight">
					<?php
						
						$title = $featured['title'];
						$content = $featured['content'];
						$author = $featured['author'];
						$date = $featured['date_posted'];
						$id = $featured['id'];
						$image = $featured['image'];
						
						echo "<h3>$title</h3>";
						echo "<img src='$image'/>";
						echo "<blockquote>$content</blockquote>";
						echo "<br/>";
						echo "<cite>$author</cite>";
						echo "<datetime>$date</datetime>";
						echo "<a href='index.php?postid=$id' class='readmore'>read more</a>";
					?>
					
				</article>
				<aside class="wow slideInRight">
					<div class="search">
						<input type="search" placeholder="search input"/>
						<i class="fa fa-search" aria-hidden="true"></i>
					</div>
					<h3>Popular posts</h3>
					<ul>
						<?php
							
							while($post = $popular->fetch_assoc()){
								
								$id = $post['id'];
								$title = $post['title'];
								$image = $post['image'];
								
								echo "<li>";
								echo "<img src='$image'/>";
								echo "<a href='index.php?postid=$id'>$title</a>";
								echo "</li>";
							}
						?>
						
					</ul>
				</aside>
				<div class="latest">
					<?php 
						while($post = $latest->fetch_assoc()){
								
							$id = $post['id'];	
							$content = substr($post['content'], 0, 300);
							$image = $post['image'];
							
							echo "<article class='wow slideInRight'>";	
							echo "<img src='$image'/>";
							echo "<p> $content...</p>";
							echo "<a href='index.php?postid=$id' class='readmore'>read more</a>";
							echo "</article>";
						}
					?>
				
				</div>
			</div>
		</main>