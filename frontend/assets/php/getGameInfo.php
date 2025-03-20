<?php
    include_once('../api/api.php');
    $result = GameId("GET",$id);

    $id = $result['game_id'];

    $devid = $result['developer_id'];
    $developers = GameDeveloper("GET", $devid);

    echo "<div class='col'>";
        if($result['game_banner'] != NULL) echo "<img id='bannerimg' src='../assets/img/".$result['game_banner'].".png' onerror='hide('banner')' id='banner'>";
        echo "<h1>".$result['game_name']."</h1>";
        if($result['game_photo'] != NULL) echo "<img src='.".$result['game_photo']."' onerror='hide('photo')' id='photo'>";
    echo "</div>";
    echo "<div class='col'>";
        echo "<h3>by ".$developers['developer_name']."</h3>";
        echo "<p>".$result['game_description']."</p>";
        if ($result['price'] != NULL) { echo "<p>".$result['price']."</p>"; } 
        else {echo "<p>Free</p>";}
        echo "<a href='purchase.php?id=".$id."'><button class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bag' viewBox='0 0 16 16'><path d='M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z'/></svg>Buy Now</button></a>";
        echo "<a href='addcart.php?id=".$id."'><button class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart4' viewBox='0 0 16 16'><path d='M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0'/></svg>Add to Cart</button></a>";
        echo "<a href='wishlist.php?id=".$id."'><button class='btn btn-secondary'>Wishlist</button></a>";
    echo "</div>";
?>