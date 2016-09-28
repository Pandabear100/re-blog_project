<?php

	if(isset($_POST['email']) && isset($_POST['password'])){
		login();
	}

?>
<main>
	<div class="container">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=login' ?>">
		    <label>Email</label><input type="email" name="email"/>
		    <label>Password</label><input type="password" name="password"/>
		    <input type="submit" value="submit" name="submit"/>
		</form>

		<a href="index.php?page=login">Reload</a>
		<a href="index.php?page=login&amp;logout=true">Logout</a>
		<a href="index.php?page=register">Register</a>
	</div>
</main>