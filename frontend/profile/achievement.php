<?php
    // include_once('../api/api.php');
    // //echo session_status();
    // $userid = $_GET['id'];

    // if($userid == NULL) {
    //     header("Location: index.php");
    // }

    // $userArray = UserId("GET", $userid);

    // if(Developer("Check", $userid)) {
    //     $devid = Developer("GET", $userid);
    //     $gamesOwned = DeveloperGames($devid);
    // }

    if(isset($_POST['submit'])) {
        $game_id = $_POST['game_id'];
        $user_id = $_POST['user_id'];
        $achievement_id = $_POST['achievement_id'];

        include_once('../api/api.php');
        $auth = Achievement("PUT", $game_id, $user_id, $achievement_id);

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
        <link rel="stylesheet" href="../assets/css/login.css">
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

                <a href="../recommendation/">
                    <div class="button-link transition inactive-link">
                        <p>Recommendation</p>
                    </div>
                </a>
            </div>

            <div class="col-10" style="background-color: #454955; color: White; padding: 40px;">
                <h1> Login </h1> <hr>
                <div style="border: 0px solid; width: 50%; height: 50%; padding: 40px;">
                    <form method='POST'>
                        <div hidden>
                            <div>
                                <label>Email </label>
                                <input type='text' name='user_id' value='1'>
                            </div>
                            <div>
                                <label>Password </label>
                                <input type='password' name='game_id' value='1'>
                            </div>
                            <div>
                                <label>Password </label>
                                <input type='password' name='achievement_id' value='5'>
                            </div>
                        </div>
                        <button type='submit' name='submit' class='btn btn-primary'> Submit </button>
                    </form>
                    <p>Don't have an account? <a href="register.php">Register</a> now!</p>
                </div>
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