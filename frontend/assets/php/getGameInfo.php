<?php
    include_once('../api/api.php');
    $result = GameId("GET",$id);

    $id = $result['game_id'];
    $developers = GameDeveloper("GET", $id);

    echo "<div class='col'>";
        echo "<img id='bannerimg' src='../assets/img/".$result['game_banner'].".png'>";
        echo "<h1>".$result['game_name']."</h1>";
        echo "<img src='.".$result['game_photo']."'>";
    echo "</div>";
    echo "<div class='col'>";
        echo "<h3>by ".$developers['developer_name']."</h3>";
        echo "<p>".$result['game_description']."</p>";
    echo "</div>";
?>