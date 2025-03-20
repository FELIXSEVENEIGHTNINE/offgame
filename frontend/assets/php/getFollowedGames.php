<?php
    include_once('../api/api.php');

?>

<h1>Followed Games</h1> <hr>
    <div class="container-fluid">
        <div class="d-inline-flex">
            <?php 
                
                while ($row = $followed->fetch_assoc()) {
                    echo "<div class='d-inline-flex'>";
                        echo "<a href='game.php?gameid=".$followed['game_id']."'><div>";
                        echo "<img src='../assets/img/".$followed['game_logo'].".jpg' style='width:10%'>";
                        echo "<p style='color: White;'>".$followed['game_name']."</p></div></a>";
                    echo "<div>";
                }
            ?>
        </div>
    </div>