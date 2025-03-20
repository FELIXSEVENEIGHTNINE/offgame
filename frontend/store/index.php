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
        <div class="col-sm-2">
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

                <a href="../recommendation/">
                    <div class="button-link transition inactive-link">
                        <p>Recommendation</p>
                    </div>
                </a>

                <a href="../chatbot/">
                    <div class="button-link transition inactive-link">
                        <p>Chatbot</p>
                    </div>
                </a>
            </div>

            <div class="col-sm-10" style="background-color: #454955; padding: 50px;">
                <!-- <div class="col-1" style="color: White;"> -->
                <!-- <a href="../profile/cart.php?id="><button class='btn btn-primary'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                    </svg> Cart
                </button></a> -->
                <!-- </div> -->
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