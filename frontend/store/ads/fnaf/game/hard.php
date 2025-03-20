<?php
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
?>

<html>
    <head>
        <link rel="stylesheet" href="demo.css">
      </head>
    <body>
        <script src="demo_hard.js"></script>
        <div class="game">
            <img id="screen" src="FNAF Assets/Office/Regular Office/1.png">
            <div id="left_side">
                <img id="door_left" src="FNAF Assets/Office/Left Door Animation/1.png">
                <img id="door_left_buttons" src="FNAF Assets/UI/Door Buttons/Left Button/Open Off.png" usemap="#left_button">
            </div>

            <div class="right_side">
                <img id="door_right" src="FNAF Assets/Office/Right Door Animation/1.png">
                <img id="door_right_buttons" src="FNAF Assets/UI/Door Buttons/Right Button/Open Off.png" usemap="#right_button">
            </div>

            <button onclick="test()" hidden>Turn on the light</button>
            <map name="left_button" id="left_button_map">
                <area shape="rect" coords="30,52,70,110" alt="Computer" onclick="leftDoorCloseInternal()"> <!-- 30,52,70,110 -->
                <area shape="rect" coords="30,132,70,185" alt="Phone" onclick="leftDoorLight()"> <!-- 30,132,70,185 -->
            </map>
            <map name="right_button" id="right_button_map">
                <area shape="rect" coords="30,52,70,110" alt="Computer" onclick="rightDoorCloseInternal()"> <!-- 30,52,70,110 -->
                <area shape="rect" coords="30,132,70,185" alt="Phone" onclick="rightDoorLight()"> <!-- 30,132,70,185 -->
            </map>

            <img id="camera_screen" src="FNAF Assets/Camera/West HC 2B/default.png">
            <div id="cameras" disabled>
                <h3 id="camera_name" src=""></h3>
                <img id="camera_map" src="">
                <img id="cam1a" src="FNAF Assets/UI/Camera Buttons/1a.png" onclick="cam1a()">
                <img id="cam1b" src="FNAF Assets/UI/Camera Buttons/1b.png" onclick="cam1b()">
                <img id="cam1c" src="FNAF Assets/UI/Camera Buttons/1c.png" onclick="cam1c()">
                <img id="cam2a" src="FNAF Assets/UI/Camera Buttons/2a.png" onclick="cam2a()">
                <img id="cam2b" src="FNAF Assets/UI/Camera Buttons/2b.png" onclick="cam2b()">
                <img id="cam3" src="FNAF Assets/UI/Camera Buttons/3.png" onclick="cam3()">
                <img id="cam4a" src="FNAF Assets/UI/Camera Buttons/4a.png" onclick="cam4a()">
                <img id="cam4b" src="FNAF Assets/UI/Camera Buttons/4b.png" onclick="cam4b()">
                <img id="cam5" src="FNAF Assets/UI/Camera Buttons/5.png" onclick="cam5()">
                <img id="cam6" src="FNAF Assets/UI/Camera Buttons/6.png" onclick="cam6()">
                <img id="cam7" src="FNAF Assets/UI/Camera Buttons/7.png" onclick="cam7()">


            </div>

            <map name="right_button" id="right_button_map">
                <area shape="rect" coords="30,52,70,110" alt="Computer" onclick="rightDoorCloseInternal()"> <!-- 30,52,70,110 -->
                <area shape="rect" coords="30,132,70,185" alt="Phone" onclick="rightDoorLight()"> <!-- 30,132,70,185 -->
            </map>

            <div class="camera_flip">
                <img id="camera_animation" src="">
                <img id="camera_button" src="FNAF Assets/UI/buttons/camera_flip.png" onclick="cameraFlipInterval()">
            </div>
            <div> 
                <h2 id="time">12 AM</h2>
            </div>
            <div id="battery"> 
                <h3 id="battery_text">Power Left: 100%</h3>
                <h3 id="battery_usage">Usage: </h3>
                <img id="battery_image" src="FNAF Assets/UI/Power/1.png">          
            </div>
                <h1 id="announce"></h1>
            <button id="retry" onclick="window.history.go(-1);">Main Menu</button>
        </div>

        <form method='POST' id="achievementform">
            <div hidden>
                <input type='text' name='user_id' value='1'>
                <input type='password' name='game_id' value='1'>
                <input type='password' name='achievement_id' value='3'>
                <button type='submit' name='submit' class='btn btn-primary' hidden> Submit </button>
            </div>
        </form>
        <script>
                var http = new XMLHttpRequest();
                http.open("POST", "formula", true);
                http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                var params = "search=" + <<get search value>>; // probably use document.getElementById(...).value
                http.send(params);
                http.onload = function() {
                    alert(http.responseText);
                }

                document.addEventListener("keydown", function(event) {
                    const key = event.key; // Or const {key} = event; in ES6+
                    if (key === "Escape") {
                        window.history.back();
                    }
                });
            </script>
    </body>
</html>