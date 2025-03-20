<?php
    $movies = array(
        "Five Nights at Freddy's",
        "Five Nights at Freddy's 2",
        "Five Nights at Freddy's 3",
        "Five Nights at Freddy's 4",
        "Five Nights at Freddy's: Sister Location",
        "Freddy Fazbear's Pizzeria Simulator",
        "Five Nights at Freddy's: Help Wanted",
        "Five Nights at Freddy's AR: Special Delivery",
        "Five Nights at Freddy's: Security Breach",
        "Five Nights at Freddy's: Into the Pit"
    );
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="../../">Back</a>
            </li>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item">
                <a class="nav-link inactive" href="../fnaf/">Play</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive" href="games.php">Games</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive" href="merch.php">Merch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="">Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive" href="books.php">Books</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            
        </ul>
    </div>
</nav>


<div class="container" style="margin-top: 2%;">
    <div class="row">
        <div class="col">
            <?php 
                for ($i = 0; $i < count($movies); $i++) {
                    echo $movies[$i]."<br>";
                }
            ?>
        </div>

        
    </div>
</div>


<!-- 
<style>
    iframe {
        width: 100%;
        height: 100%;
        border: 1px;
    }

    body {
        background-color: Black;
    }
</style>
<body>
    <iframe src="demo.html" scrolling="no"></iframe>
</body> -->
