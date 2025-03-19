<?php
    include_once('../api/api.php');
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

                <a href="">
                    <div class="button-link transition active-link">
                        <p>Store</p>
                    </div>
                </a>

                <a href="../community/">
                    <div class="button-link transition inactive-link">
                        <p>Community</p>
                    </div>
                </a>

                <a href="../profile/">
                    <div class="button-link transition inactive-link">
                        <p>Profile</p>
                    </div>
                </a>

                <a href="../blog/">
                    <div class="button-link transition inactive-link">
                        <p>Blog</p>
                    </div>
                </a>

                <a href="../../chatbot/">
                    <div class="button-link transition inactive-link">
                        <p>Chatbot</p>
                    </div>
                </a>
            </div>

            <div class="col-10" style="background-color: #454955; padding: 50px;">
                <header>
                    <h1> Adversited Games </h1>
                    <hr>
                    <?php 
                        $request = Ads("GET");
                        include_once('../assets/php/getAdGames.php');
                    ?>
                </header>
                <br>
                <header>
                    <h1> Games </h1>
                    <hr>
                    <?php 
                        $request = Games("GET");
                        include_once('../assets/php/getGames.php');
                    ?>
                </header>
                <!-- <header>
                    <h1> Recommendations </h1>
                    <hr>
                    <div id="recomms"></div>
                </header> -->
                
            </div>

            <!-- <div class="col-2" style="background-color: #394053; color: White;">
                <?php
                    //include("../assets/php/getTags.php");
                    //include("../assets/php/getGenres.php");
                    //include("../assets/php/getCategories.php");
                    
                ?>
                <iframe src="https://127.0.0.1:5001/recommend" height="100%"></iframe>
            </div> -->

        </div>
        <div id="footer">
            hi
        </div>
    </body>
</html>