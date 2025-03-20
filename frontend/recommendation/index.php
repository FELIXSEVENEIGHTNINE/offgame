<!DOCTYPE html>
<!doctype html>
<html>
    <head>
        <!-- Recommended meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- PyScript CSS -->
        <link rel="stylesheet" href="https://pyscript.net/releases/2025.3.1/core.css">
        <!-- This script tag bootstraps PyScript -->
        <script type="module" src="https://pyscript.net/releases/2025.3.1/core.js"></script>

        <link rel="stylesheet" href="../assets/css/index.css">
        <link rel="stylesheet" href="../assets/css/main.css">
        <script src="../frontend/assets/js/index.js"></script>

    </head>
    <body>
        <div class="row">
            <div class="col-sm-2">
            <a href="../">
                    <div class="homepage transition-short inactive-link" id="main" onmouseover="recoHover()" onmouseout="recoHoverOff()">
                        <img src="../assets/img/game_logo_2.png" id="link-image"> 
                    </div>
                </a>

                <script>
                    function recoHover() {
                        var img = document.getElementById('link-image');
                        img.src='../assets/img/game_logo.png';
                    }
                    function recoHoverOff() {
                        var img = document.getElementById('link-image');
                        img.src='../assets/img/game_logo_2.png';
                    }
                </script>

                <a href="../store/">
                    <div class="button-link transition inactive-link">
                        <p>Store</p>
                    </div>
                </a>

                <a href="../community/">
                    <div class="button-link transition inactive-link">
                        <p>Community</p>
                    </div>
                </a>

                <a href="../profile/">
                    <div class="button-link transition inactive-link">
                        <p>Profile</p>
                    </div>
                </a>

                <a href="../blog/">
                    <div class="button-link transition inactive-link">
                        <p>Blog</p>
                    </div>
                </a>

                <a href="">
                    <div class="button-link transition active-link">
                        <p>Recommendation</p>
                    </div>
                </a>

                <a href="../chatbot/">
                    <div class="button-link transition inactive-link">
                        <p>Chatbot</p>
                    </div>
                </a>
            </div>
            <div class="col-sm-10" style="background-color: #454955; padding: 50px; color: White;">
                <div class="row">
                    <div class="col-sm-3"><h1>Byte's Recommendations</h1></div>
                    <div class="col-sm-9"><div id="waving"><img src="../assets/img/stout/waveup.png" id="wave" style="width: 10%;"></div></div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h2>Select Genre(s):</h2><hr>
                        <?php

                            $genre = array(
                                "Accounting",
                                "Action",
                                "Adventure",
                                "Animation",
                                "Animation & Modeling",
                                "Audio Production",
                                "Casual",
                                "Design & Illustration",
                                "Documentary",
                                "Early Access",
                                "Education",
                                "Episodic",
                                "Free to Play",
                                "Game Development",
                                "Gore",
                                "Indie",
                                "Massively Multiplayer",
                                "Movie",
                                "Nudity",
                                "Photo Editing",
                                "RPG",
                                "Racing",
                                "Sexual Content",
                                "Short",
                                "Simulation",
                                "Software Training",
                                "Sports",
                                "Strategy",
                                "Tutorial",
                                "Utilities",
                                "Video Production",
                                "Violent",
                                "Web Publishing"
                            );

                            for($i = 0; $i < count($genre); $i++) {
                                echo "<div class='form-check'>";
                                    echo "<input class='form-check-input' id='check".$i."' type='checkbox' name='genre' value='".$genre[$i]."' onchange='check()'>";
                                    echo "<label class='form-check-label' for='check".$i."'>".$genre[$i]."</label>";
                                echo "</div>";
                            }
                            
                        ?>
                
                        <label for="category"><h2>Select Category:</h2></label><hr>
                        <input class="form-check-input" type="checkbox" id="single" name="category" value="Single-player" onchange="check()"> Single-player<br>
                        <input class="form-check-input" type="checkbox" id="multi" name="category" value="Multi-player" onchange="check()"> Multi-player<br><br>

                        <button onClick="check()" class="btn btn-primary" style="margin-bottom: 10px;">Get Recommendations from Bite</button>
                    </div>
                    <div class="col-sm-9">
                        <div id="gameList"></div>
                    </div>
                </div>
            </div>
        </div>
        

        <script>   
            var checkboxesCheckedGenre = [];     
            var checkboxesCheckedCategory = [];         
            function check() {
                var checkboxes = document.getElementsByName("genre");
                checkboxesCheckedGenre = [];
                // loop over them all
                for (var i=0; i<checkboxes.length; i++) {
                    // And stick the checked ones onto an array...
                    if (checkboxes[i].checked) {
                        checkboxesCheckedGenre.push(checkboxes[i].value);
                    }
                }
                var checkboxes = document.getElementsByName("category");
                checkboxesCheckedCategory = [];
                // loop over them all
                for (var i=0; i<checkboxes.length; i++) {
                    // And stick the checked ones onto an array...
                    if (checkboxes[i].checked) {
                        checkboxesCheckedCategory.push(checkboxes[i].value);
                    }
                }
                // Return the array if it is non-empty, or null
                document.getElementById("gameList").innerHTML="";
                connect()
            }

            // Call as
            

            function parse(s) {
                return JSON.parse(s
                    .replace(/(?<=\[)([^\[\]])/g, "\"$1")
                    .replace(/([^\[\]])(?=\])/g, "$1\""));
                }
            function connect() {

                const element = document.getElementById("gameList");

                if (checkboxesCheckedGenre.length == 0) {
                    return 0;
                }

                genres = checkboxesCheckedGenre.join()
                categories = checkboxesCheckedCategory.join()
                let url = 'http://192.168.64.11:8082/items?genre=' + genres + '&category=' + categories;
                // document.getElementById("output").innerHTML = url;
                
                let xhr = new XMLHttpRequest();

                xhr.addEventListener ('readystatechange' , function() {
                    if(xhr.readyState == 4) {
                        var textResponse = JSON.parse(xhr.responseText);
                        // document.getElementById("output").innerHTML = textResponse

                        var gameCard;
                        for (let texter = 0; texter < textResponse.length; texter++) {
                        // document.getElementById("input").innerHTML = texter
                            gameCard = document.createElement("div");
                            gameTitle = document.createElement("h2");
                            gameCard.style.cssText = `border-radius: 25px;background: #73AD21; padding: 20px; max-width: 100%; margin-bottom: 10px; text-overflow: ellipsis;`;
                            let name1 = document.createTextNode(textResponse[texter][0])
                            let genres1 = document.createTextNode(textResponse[texter][1])
                            let categories1 = document.createTextNode(textResponse[texter][2])
                            // let recommend1 = document.createTextNode(textResponse[texter][3])
                            gameTitle.appendChild(name1);
                            gameCard.appendChild(gameTitle);
                            gameCard.appendChild(genres1);
                            gameCard.appendChild(document.createElement("br"));
                            gameCard.appendChild(categories1);
                            gameCard.appendChild(document.createElement("br"));
                            // gameCard.appendChild(recommend1);
                            // gameCard.appendChild(document.createElement("br"));
                            element.appendChild(gameCard);
                        }
                    }
                });
                xhr.open('POST',url, true);
                xhr.send();
            }
            // }


            </script>

            <script>
                var is_up = true;

                window.onload = function() {
                    waving();
                };

                function waving() {

                    wave_interval = setInterval(function () {
                    if (is_up) {
                        document.getElementById('wave').src=`../assets/img/stout/wavedown.png`
                        is_up = false
                    } else {
                        document.getElementById('wave').src=`../assets/img/stout/waveup.png`
                        is_up = true
                    }
                    }, 1000);
                }
            </script>

    </body>
</html>