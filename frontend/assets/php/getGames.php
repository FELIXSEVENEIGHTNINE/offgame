<?php

$count = 0;
echo "<div class='row'>";
while ($row = $request->fetch_assoc()) {
    if($count == 6) {
        $count = 0;
        echo "</div><br>";
        echo "<div class='row'>";
    }

    echo "<div class='col-sm-2'>";
        echo "<a href='game.php?gameid=".$row['game_id']."'> <div class='card' id='game-card'>";
            echo "<img src='../assets/img/".$row['game_logo'].".jpg' class='card-img-top'>";
            echo "<div class='card-body'>";
                //echo "<img src='".$row['game_logo']."'>";
                echo "<h5 class='card-title'>".$row['game_name']."</h5>";
                // echo "<p class='card-text'>".$row['developer_name']."</p>";
                if ($row['price'] == NULL) echo "<p class='card-text'>Free</p>";
                else echo "<p class='card-text'>$".$row['price']."</p>";
            echo "</div>";
        echo "</div> </a>";
    echo "</div>";

    $count++;
}
?>