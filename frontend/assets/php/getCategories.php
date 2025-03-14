<?php
    $tags = array(
        "Singleplayer",
        "Multiplayer"
    );

    echo "<p style='margin-bottom: -15px; text-align: center'> Categories </p> <hr>";
    for($i=0 ; $i < count($tags); $i++ ) {
        echo "<div class='form-check'>";
            echo "<input type='checkbox' id='".$i."cat' name='' value='".$tags[$i]."'>";
            echo "<label for='".$i."cat'>".$tags[$i]."</label></div>";
    }

?>