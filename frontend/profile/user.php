<?php
    include_once('../api/api.php');
    //echo session_status();
    $userid = $_GET['id'];

    if($userid == NULL) {
        header("Location: index.php");
    }

    $userArray = UserId("GET", $userid);

    if(Developer("Check", $userid)) {
        $devid = Developer("GET", $userid);
        $gamesOwned = DeveloperGames($devid);
    }

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

                <a href="../recommendation/">
                    <div class="button-link transition inactive-link">
                        <p>Recommendation</p>
                    </div>
                </a>
            </div>

            <div class="col-10 main">
                <div class="row">
                    <div class="col-10">
                        <div class='container-fluid banner' style="background-image:url('../assets/img/<?php echo $userArray['banner_name']?>.png')">
                            <div class="d-inline-flex">
                                <div class="profilepicture"><img src="../assets/img/<?php echo $userArray['profile_picture_name']?>.png" style=""></div> 
                                <p class="username"><?php echo $userArray['username'] ?></p> 
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <h2>Options</h2>
                        <a href="edit.php?id=<?php echo $userid ?>"><button class="btn btn-primary">Edit Profile</button></a>
                        <a href="logout.php"><button class="btn btn-primary">Log out</button></a>
                    </div>
                </div>

                <div class="row profile-main">
                    <div class="col-12">
                        <h1>Published</h1> <hr>
                        <div class="container-fluid">
                            <div class="d-inline-flex">
                                <?php 
                                    
                                    echo "<a href='game.php?gameid=".$gamesOwned['game_id']."'><div>";
                                    echo "<img src='../assets/img/".$gamesOwned['game_logo'].".jpg' style='width:10%'>";
                                    echo "<p style='color: White;'>".$gamesOwned['game_name']."</p></div></a>";
                                    // echo $gamesOwned['developer_name']
                                ?>
                            </div>
                        </div>

                        <h1>Following</h1> <hr>
                        <div class="container-fluid">
                            <div class="d-inline-flex">
                                <?php 
                                    
                                    echo "<a href='game.php?gameid=".$gamesOwned['game_id']."'><div>";
                                    echo "<img src='../assets/img/".$gamesOwned['game_logo'].".jpg' style='width:10%'>";
                                    echo "<p style='color: White;'>".$gamesOwned['game_name']."</p></div></a>";
                                    // echo $gamesOwned['developer_name']
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="footer">
        </div>
    </body>
</html>