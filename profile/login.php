<?php
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        include_once('../api/api.php');
        $auth = UserLogin($email, $password);

        header("Location:", "{userid}/index.php");
    }

?>




<h2> Login </h2>
<form method='POST'>
    Email: <input type='text' name='email'> <br>
    Password: <input type='password' name='password'> <br>
    <button type='submit' name='submit'> Submit </button>
</form>