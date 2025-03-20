<?php

$count = 0;
echo "<div class='row'>";
while ($row = $request->fetch_assoc()) {
    if($count == 4) {
        $count = 0;
        echo "</div><br>";
        echo "<div class='row'>";
    }

    echo "<div class='col-sm-3'>";
        echo "<a href='ads/".$row['ad_name']."'> <div class='card' id='game-card'>";
            echo "<img src='../assets/img/".$row['game_logo'].".jpg' class='card-img-top'>";
            echo "<div class='card-body'>";
                echo "<h5 class='card-title'>".$row['game_name']."</h5>";
            echo "</div>";
        echo "</div> </a>";
    echo "</div>";

    $count++;
}
?>