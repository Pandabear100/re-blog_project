<?php
	if (isset($_GET['postid']) || isset($_GET['category'])) {
		
		if (isset($_GET['postid'])) { // clicked on a post
			
			include "view/singlepost.php";
		}
		else { // clicked on a category

			$category = $_GET['category'];

			switch ($category) {
				case 'all':
					$posts = getAllApprovedPosts();
					break;
				
				default:
					$posts = getPostsByCategory($category);
					break;
			}

			include "view/archive.php";
		}
	}
	else {

		$posts = getNineMostRecent();
		include "view/archive.php";
	}




?>