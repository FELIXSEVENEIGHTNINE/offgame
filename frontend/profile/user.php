<?php
    include_once('../api/api.php');
    //echo session_status();
    $userid = $_GET['id'];

    if($userid == NULL || empty($userid)) {
        // header("Location: index.php");
        header("Refresh:0.1; url=index.php");
    }

    $authkey = "123ASD123ASD";

    // if(!(UserAuthKey("CHECK", $userid))) {
        if(UserAuthKey("CHECK", $userid)) {
        echo UserAuthKey("CHECK", $userid);
        header("Refresh:0; url=index.php");
    }

    $userArray = UserId("GET", $userid);

    $isDev;
    if(Developer("Check", $userid)) {
        $devid = Developer("GET", $userid);
        $gamesOwned = DeveloperGames($devid);
        $isDev = 1;
    }
    else {
        return;
        $isDev = 0;
    }

    $followed = UserFollow("Game", $userid);

    $credit = UserCredit("GET", $userid);


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
            <div class="col-sm-2">
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

            <div class="col-sm-10 main" id="mainstuff">
                <div class="row">
                    <div class="col">
                        <div class='container-fluid banner' style="background-image:url('../assets/img/<?php echo $userArray['banner_name']?>.png')">
                            <div class="d-inline-flex">
                                <div class="profilepicture">
                                    <?php 
                                        if ($userArray['profile_picture_name'] == NULL) $pfp = "defaultpfp";
                                        else $pfp = $userArray['profile_picture_name'];
                                    ?>
                                    <img src="../assets/img/<?php echo $pfp ?>.png" style="">
                                </div> 
                                <p class="username"><?php echo $userArray['username'] ?></p> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row profile-main">
                    <div class="col-sm-4">
                        <h1>Posts</h1> <hr>
                    </div>
                    <div class="col-sm-4">
                    <?php
                        if($isDev > 0) {
                            echo "<h1>Published Games</h1> <hr>";
                            echo "<div class='container-fluid'>";
                                echo "<div class='d-inline-flex'>";
                                    echo "<a href='game.php?gameid=".$gamesOwned['game_id']."&id=".$userid."'><div>";
                                    echo "<img src='../assets/img/".$gamesOwned['game_logo'].".jpg' style='width:40%'>";
                                    echo "<p style='color: White;'>".$gamesOwned['game_name']."</p></div></a>";
                                    // echo $gamesOwned['developer_name']    
                                echo "</div>";
                            echo "</div>";
                        }

                        if(empty($followed)) {
                            include_once("../../assets/php/getFollowedGames");
                        }
                    ?>
                    </div>
                    <div class="col-sm-4">
                        <h1>Options</h1> <hr>
                        <h3>$<?php echo $credit?></h3>
                        <h3>Profile</h3><hr>
                        <a href="edit.php?id=<?php echo $userid ?>#mainedit"><button class="btn btn-primary">Edit Profile</button></a>
                        <a href="logout.php"><button class="btn btn-primary">Log out</button></a>
                        <h3>Games</h3><hr>
                        <a href="cart.php?id=<?php echo $userid ?>"><button class="btn btn-primary">View Cart</button></a>
                        <a href="wishlist.php?id=<?php echo $userid ?>"><button class="btn btn-primary">View Wishlist</button></a>
                        <h3>Seller</h3><hr>
                        <a href="game/add.php?id=<?php echo $userid ?>"><button class="btn btn-primary">Add Game</button></a>
                    </div>
                </div>
            </div>

        </div>
        <div id="footer">
        </div>
    </body>
</html>