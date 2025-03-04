<?php
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        include_once('../api/api.php');
        $auth = UserLogin($email, $password);

        if($auth == 1) {
            //set($_SESSION['email']);
            // $_SESSION['email'];
            $id = getUser("GET", $email);
            header("Location: user/index.php?id=$id");
        }

        // include_once('../api/config.php');
        //$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$em'");
        //$row = $result->fetch_assoc();

        // if($row['password'] == $password) {
        //     header("Location: user/");
        // }
    }

    //echo session_status();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <link rel="stylesheet" href="../assets/css/index.css">
        <link rel="stylesheet" href="../assets/css/main.css">
        <link rel="stylesheet" href="../assets/css/profile.css">
        <script src="../assets/js/index.js"></script>
    </head>
    <body>
        
        <div class="row">
            <div class="col-2">
                <a href="..">
                    <div class="homepage transition-short inactive-link" id="main" onmouseover="linkHover()" onmouseout="linkHoverOff()">
                        <img src="../assets/img/game_logo_2.png" id="link-image"> 
                    </div>
                </a>

                <a href="../store/">
                    <div class="button-link transition inactive-link">
                        <p>Store</p>
                    </div>
                </a>

                <a href="../community/">
                    <div class="button-link transition inactive-link">
                        <p>Community</p>
                    </div>
                </a>

                <a href="">
                    <div class="button-link transition active-link">
                        <p>Profile</p>
                    </div>
                </a>

                <a href="../blog/">
                    <div class="button-link transition inactive-link">
                        <p>Blog</p>
                    </div>
                </a>
            </div>

            <div class="col-10" style="background-color: #454955; color: White; padding: 0px;">
                <h2> Login </h2>
                <form method='POST' action="login.php">
                    Email: <input type='text' name='email'> <br>
                    Password: <input type='password' name='password'> <br>
                    <button type='submit' name='submit'> Submit </button>
                </form>
                <p>Don't have an account? <a href="register.php">Register</a> now!</p>
            </div>

        </div>
        <div id="footer">
        </div>
    </body>
    <script type='text/javascript'> 
        function changeToRegister() {
            document.getElementById['frame'].src = 'register.php';
        }

        function changeToLogin() {
            document.getElementById['frame'].src = 'login.php';
        }
    </script>
</html>