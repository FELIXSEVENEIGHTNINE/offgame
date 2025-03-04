<?php
    //echo session_status();
    $userid = $_GET['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <link rel="stylesheet" href="../../assets/css/index.css">
        <link rel="stylesheet" href="../../assets/css/main.css">
        <link rel="stylesheet" href="../../assets/css/profile.css">
        <script src="../../assets/js/index.js"></script>
    </head>
    <body>
        
        <div class="row">
            <div class="col-2">
                <a href="../../">
                    <div class="homepage transition-short inactive-link" id="main" onmouseover="profileHover()" onmouseout="profileHoverOff()">
                        <img src="../../assets/img/game_logo_2.png" id="link-image"> 
                    </div>
                </a>

                <a href="../../store/">
                    <div class="button-link transition inactive-link">
                        <p>Store</p>
                    </div>
                </a>

                <a href="../../community/">
                    <div class="button-link transition inactive-link">
                        <p>Community</p>
                    </div>
                </a>

                <a href="">
                    <div class="button-link transition active-link">
                        <p>Profile</p>
                    </div>
                </a>

                <a href="../../blog/">
                    <div class="button-link transition inactive-link">
                        <p>Blog</p>
                    </div>
                </a>
            </div>

            <div class="col-10" style="background-color: #454955; color: White; padding: 0px;">
                <div class="row">
                    <div class="col-10">
                        <div class="container-fluid" style="background-color: White; color: Black; padding: 50px;">
                            <div class="d-inline-flex"> <div style="width:50px; height:50px; background-color: Black;"></div> <p>hi</p> </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="../logout.php">Log out</a>
                    </div>
                </div>
            </div>

        </div>
        <div id="footer">
        </div>
    </body>
</html>