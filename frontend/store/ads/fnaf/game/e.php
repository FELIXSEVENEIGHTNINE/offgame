<?php
    if(isset($_POST['submita'])) {
        $game_id = $_POST['game_id'];
        $user_id = $_POST['user_id'];
        $achievement_id = $_POST['achievement_id'];

        include_once('../../../../api/api.php');
        Achievement("PUT", $game_id, $user_id, $achievement_id);
    }
?>

<html>
    <head>
      </head>
    <body>
        
        <form method='POST' id="achievementform">
            <div>
                <input type='text' name='user_id' value='1'>
                <input type='text' name='game_id' value='1'>
                <input type='text' name='achievement_id' value='1'>
                <button type='submit' name='submita' class='btn btn-primary' id="submitbutton"> Submit </button>
            </div>
        </form>
    </body>
</html>