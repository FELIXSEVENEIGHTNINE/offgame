<?php
    //echo session_status();
    $gameid = $_GET['gameid'];
    $userid = $_GET['id'];

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
        <link rel="stylesheet" href="../assets/css/game.css">
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

                <!-- <a href="../recommendation/">
                    <div class="button-link transition inactive-link">
                        <p>Recommendation</p>
                    </div>
                </a> -->

                <a href="../../chatbot/">
                    <div class="button-link transition inactive-link">
                        <p>Chatbot</p>
                    </div>
                </a>
            </div>

            <div class="col-10" style="background-color: #454955; color: White; padding: 40px;">
                <div class="row">
                    <div class="col">
                        <a href="user.php?id=<?php echo $userid ?>"><button>Back</button></a>
                        <!-- <h1>Stuff</h1><hr> -->
                        <h2> Your Options </h2><hr>
                        <a href="game/editname.php?id=<?php echo $userid ?>"><button class="btn btn-primary">Edit Game Name</button></a>
                        <a href="game/editdesc.php?id=<?php echo $userid ?>"><button class="btn btn-primary">Edit Game Description</button></a>
                        <a href="game/editfilter.php?id=<?php echo $userid ?>"><button class="btn btn-primary">Edit Game Filters</button></a>
                        <a href="logout.php"><button class="btn btn-primary">Log out</button></a>
                    
                        <!-- <h2>Game Retention</h2><hr>
                        show stuff -->
                    </div>
                </div>
            </div>

        </div>
        <div id="footer">
        </div>
    </body>
</html>