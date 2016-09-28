<?php    
    if(isset($_POST['new_email']) && isset($_POST['new_password'])){
        register();
    }
?>

<main>
    <div class="container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=register'?>">
            <label>First Name</label><input type="text" name="firstname"/>
            <label>Last Name</label><input type="text" name="lastname"/>
            <label>Email</label><input type="email" name="new_email" required/>
            <label>Gender</label>
            <select name="gender">
                <option value="female">Female</option>
                <option value="male">Male</option>
            </select>
            <label>Password</label><input type="password" name="new_password" required/>
            <input type="submit" value="submit"/>
        </form>

        <a href="index.php?page=register&amp;logout=true">Reset</a>
    </div>
</main>