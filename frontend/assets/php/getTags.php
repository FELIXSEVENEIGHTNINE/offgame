<?php
    include_once("tags.php");

    echo "<p style='margin-bottom: -15px; text-align: center'> Tags </p> <hr>";
    for($i=0 ; $i < count($tags); $i++ ) {
        echo "<div class='form-check'>";
            echo "<input type='checkbox' id='".$i."tag' name='' value='".$tags[$i]."'>";
            echo "<label for='".$i."tag'>".$tags[$i]."</label></div>";
    }

?>