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
                <a class="nav-link active" href="">Games</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="">Merch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="">Movies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="">Books</a>
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
            <!-- <form method="POST"> -->
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio1"> Easy </label>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Easy" checked>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio2"> Normal </label>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Normal">
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio3"> Hard </label>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Hard">
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="inlineRadio4"> Expert </label>
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="Expert">
                </div>

                <button class="btn btn-outline-primary" onclick="play()"> Play </button>
            <!-- </form> -->
        </div>
        <div class="col">
            <h2> Achievements: </h2>
        </div>
    </div>
</div>

<script>
    function play() {
        const currentUrl = window.location.href;
        console.log(currentUrl);

        window.location.href = currentUrl + "game/";
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
