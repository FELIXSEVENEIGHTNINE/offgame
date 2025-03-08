<?php
    include_once('../api/api.php');
    //echo session_status();
    $userid = $_GET['id'];

    $userArray = UserId("GET", $userid);
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
                <a href="../">
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

                <a href="../">
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

            <div class="col-10 main">
                <div class="row">
                    <div class="col-10">
                        <div class="container-fluid banner">
                            <div class="d-inline-flex">
                                <div class="profilepicture"></div> 
                                <p class="username"><?php echo $userArray['username'] ?></p> 
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="logout.php">Log out</a>
                    </div>
                </div>
            </div>

        </div>
        <div id="footer">
        </div>
    </body>
</html>