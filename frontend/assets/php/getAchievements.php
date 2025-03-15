<?php
//$ach = array();
//$i = 0;
///while ($row = $request->fetch_assoc()) {
//    $ach[$i] = $row['achieve_id'];
//}

//echo $ach[$i];
// $count = 0;
// echo "<div class='row'>";
// while ($row = $request->fetch_assoc()) {
//         echo "<div class='card' id='game-card'>";
//             echo "<img src='../assets/img/".$row['game_logo'].".jpg' class='card-img-top'>";
//             echo "<div class='card-body'>";
//                 echo "<h5 class='card-title'>".$row['game_name']."</h5>";
//             echo "</div>";
//         echo "</div>";

//     $count++;
// }
?>

<h4 class='
        <?php 
            if ($row['achieve_id'] == 1) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>
    '>
    Try Playing Dead
    <small class="text-body-secondary"> Beat the game in Easy mode.</small>
<h4>
<h4 class="<?php 
            if ($row['achieve_id'] == 2) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">Poor Choice Career<small class="text-body-secondary"> Beat the game in Normal mode.</small><h4>
<h4 class="<?php 
            if ($row['achievement_id'] == 3) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">Never Stood A Chance<small class="text-body-secondary"> Beat the game in Hard mode.</small><h4>
<h4 class="<?php 
            if ($row['achieve_id'] == 4) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">Together, We Are FNAF<small class="text-body-secondary"> Beat the game in Expert mode.</small><h4>

<h4 class="<?php 
            if ($row['achieve_id'] == 5) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">Give Gifts, Give Life<small class="text-body-secondary"> Unlock the merch page.</small><h4>
<h4 class="<?php 
            if ($row['achieve_id'] == 6) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">Earlier That Night<small class="text-body-secondary"> Unlock the movies page.</small><h4>
<h4 class="<?php 
            if ($row['achieve_id'] == 7) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">I'm Pretending<small class="text-body-secondary"> Unlock the books page.</small><h4>

<h4 class="<?php 
            if ($row['achieve_id'] == 8) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">Hello, Hello<small class="text-body-secondary"> Listen to the Phone Guy.</small><h4>

<h4 class="<?php 
            if ($row['achieve_id'] == 9) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">We Are Still Your Friends<small class="text-body-secondary"> Give Fredbear friends.</small><h4>
<h4 class="<?php 
            if ($row['achieve_id'] == 10) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">Keep It Wound Up<small class="text-body-secondary"> Wind up the music box.</small><h4>
<h4 class="<?php 
            if ($row['achieve_id'] == 11) {
                echo 'text-primary';
            } else echo 'text-danger';
        ?>">ITS ME<small class="text-body-secondary"> Secret~</small><h4>
        