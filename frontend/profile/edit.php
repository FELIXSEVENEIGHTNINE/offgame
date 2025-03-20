<?php
    include_once('../api/api.php');
    //echo session_status();
    $userid = $_GET['id'];

    if(isset($_POST['submit'])) {
        
        if(($_POST['username']) == NULL) {
            $username = UserDetail("username", $userid);
        } else $username = $_POST['username'];

        if(($_POST['password']) == NULL) {
            $password = UserDetail("password", $userid);
        } else $password = $_POST['password'];

        if(($_POST['email']) == NULL) {
            $email = UserDetail("email", $userid);
        } else $email = $_POST['email'];

        // $image= $_POST['image'];
        
        $userinfo = array($userid, $username, $password, $email);
        $edit = Users("PUT", $userinfo);

        if ($edit == 1) echo "Edit Successful.";
        header("Location: user.php?id=$userid#mainstuff");
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

            <div class="col-sm-10 main" style="padding:40px;" id="mainedit">
                <a href="user.php?id=<?php echo $userid ?>"><button class="btn btn-primary">Back </button></a>
                <form method="POST">
                    <div class="mb-3 mt-3">
                        <label for="un" class="form-label">Change Username:</label>
                        <input id="un" type="text" name="username" class="form-control" placeholder="<?php echo UserDetail("username", $userid); ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="pw" class="form-label">Change Password:</label>
                        <input id="pw" type="text" name="password" class="form-control" placeholder="<?php echo UserDetail("password", $userid); ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="e" class="form-label">Change Email:</label>
                        <input id="e" type="text" name="email" class="form-control" placeholder="<?php echo UserDetail("email", $userid); ?>">
                    </div>
                    <!-- <div class="mb-3 mt-3">
                        <label for="pfp" class="form-label">Change Email:</label>
                        <input id="pfp" type="file" name="pfp" class="form-control" placeholder="<?php echo UserDetail("profile_picture", $userid); ?>">
                    </div> -->

                    <input type="submit" name="submit">
                </form>
                
            </div>

        </div>
        <div id="footer">
        </div>
    </body>
</html>