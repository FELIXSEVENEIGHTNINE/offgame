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
                <a class="nav-link active" href="">Play</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive" href="games.php">Games</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive" href="merch.php">Merch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link inactive" href="movies.php">Movies</a>
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
            <h2> Choose Difficulty: </h2>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio1"> Easy </label>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Easy" checked onclick="setDifficulty(1)">
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio2"> Normal </label>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Normal" onclick="setDifficulty(2)">
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio3"> Hard </label>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Hard" onclick="setDifficulty(3)">
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio4"> Expert </label>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="Expert" onclick="setDifficulty(4)">
                </div>
                <!-- <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio5"> 20/20/20/20 </label>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="Expert" onclick="setDifficulty(5)">
                </div> -->

                <button class="btn btn-outline-primary" onclick="play()"> Play </button>
        </div>

        <div class="col">
            <h2> Achievements: </h2>
            <?php ?>
            <h4 class="text-primary">Try Playing Dead<small class="text-body-secondary"> Beat the game in Easy mode.</small><h4>
            <h4 class="text-danger">Poor Choice Career<small class="text-body-secondary"> Beat the game in Normal mode.</small><h4>
            <h4 class="text-danger">Never Stood A Chance<small class="text-body-secondary"> Beat the game in Hard mode.</small><h4>
            <h4 class="text-danger">Together, We Are FNAF<small class="text-body-secondary"> Beat the game in Expert mode.</small><h4>

            <h4 class="text-danger">Give Gifts, Give Life<small class="text-body-secondary"> Unlock the merch page.</small><h4>
            <h4 class="text-danger">Earlier That Night<small class="text-body-secondary"> Unlock the movies page.</small><h4>
            <h4 class="text-danger">I'm Pretending<small class="text-body-secondary"> Unlock the books page.</small><h4>

            <h4 class="text-danger">Hello, Hello<small class="text-body-secondary"> Listen to the Phone Guy.</small><h4>

            <h4 class="text-danger">We Are Still Your Friends<small class="text-body-secondary"> Give Fredbear friends.</small><h4>
            <h4 class="text-danger">Keep It Wound Up<small class="text-body-secondary"> Wind up the music box.</small><h4>
            <h4 class="text-danger">ITS ME<small class="text-body-secondary"> Secret~</small><h4>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2> Minigames Unlocked: </h2>
                <div class="form-check form-check">
                    <label class="form-check-label" for="gm1"> Minigame 1 </label>
                    <input class="form-check-input" type="radio" name="minigames" id="gm1" value="Easy" onclick="setMinigame(1)">
                </div>
                <div class="form-check form-check">
                    <label class="form-check-label" for="gm2"> Minigame 2 </label>
                    <input class="form-check-input" type="radio" name="minigames" id="gm2" value="Normal" onclick="setMinigame(2)">
                </div>
                <div class="form-check form-check">
                    <label class="form-check-label" for="gm3"> Minigame 3 </label>
                    <input class="form-check-input" type="radio" name="minigames" id="mg3" value="Hard" onclick="setMinigame(3)">
                </div>

                <button class="btn btn-outline-primary" onclick="miniplay()"> Play </button>
        </div>

        <div class="col">
            
        </div>
    </div>
</div>

<script>
    window.onload = setDifficulty(1);

    var difficulty;
    var minigame;


    function setDifficulty(diff) {
        if (diff == 1) {
            console.log("Easy");
            difficulty = 1;
        } else if (diff == 2) {
            console.log("Normal");
            difficulty = 2;
        } else if (diff == 3) {
            console.log("Hard");
            difficulty = 3;
        } else if (diff == 4) {
            console.log("Expert");
            difficulty = 4;
        }
    }

    function setMinigame(n) {
        if (n == 1) {
            minigame = 1;
        } else if (n == 2) {
            minigame = 2;
        } else if (n == 3) {
            minigame = 3;
        }
    }

    function play() {
        const currentUrl = window.location.href;

        if(difficulty == 1) {
            console.log(difficulty);
            window.location.href = currentUrl + "game/easy.html";
        }
        if(difficulty == 2) {
            console.log(difficulty);
            window.location.href = currentUrl + "game/normal.html";
        }
        if(difficulty == 3) {
            console.log(difficulty);
            window.location.href = currentUrl + "game/hard.html";
        }
        if(difficulty == 4) {
            console.log(difficulty);
            window.location.href = currentUrl + "game/expert.html";
        }
    }

    function miniplay() {
        const currentUrl = window.location.href;

        if(minigame == 1) {
            console.log(difficulty);
            window.location.href = currentUrl + "minigame/1/";
        }
        if(minigame == 2) {
            console.log(difficulty);
            window.location.href = currentUrl + "minigame/2/";
        }
        if(minigame == 3) {
            console.log(difficulty);
            window.location.href = currentUrl + "minigame/3/";
        }
    }
</script>

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
