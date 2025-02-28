<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <script src="assets/js/index.js"></script>
    </head>
    <body>
        
        <div class="row">
            <div class="col-2" id="best-header">
                <a href="">
                    <div class="homepage transition-short" id="main" onmouseover="mainHover()" onmouseout="mainHoverOff()">
                        <img src="assets/img/game_logo.png" id="main-image"> 
                    </div>
                </a>

                <a href="store/">
                    <div class="button-link transition inactive-link">
                        <p>Store</p>
                    </div>
                </a>

                <a href="community/">
                    <div class="button-link transition inactive-link">
                        <p>Community</p>
                    </div>
                </a>

                <a href="profile/">
                    <div class="button-link transition inactive-link">
                        <p>Profile</p>
                    </div>
                </a>

                <a href="blog/">
                    <div class="button-link transition inactive-link">
                        <p>Blog</p>
                    </div>
                </a>
            </div>
            <div class="col-10" style="background-color: #454955">
                <header>
                    <section>
                        <div class="row">
                            <div class="col">
                                <h1 class="main-header">We sell games...</h1>
                                <p class="main-text">
                                    OFFGame offers a lot of games for new and experienced players. Ranging from story-rich games to your average first person shooter, OFFGame has the right game for everyone.
                                </p>
                            </div>
                            <div class="col">
                                <!-- <img src="../../assets/icons/selling.png" id="img-sell"> -->
                            </div>
                        </div>
                        <div id="spacer" class="row"></div>
                        <div class="row">
                            <div data-bs-toggle="collapse" data-bs-target="#about" class="main-collapse"><h1 class="collapse-main">About</h1></div>
                            <div id="about" class="collapse main-collapse-info">
                                <div class="main-collapse-info-text">
                                    OFFGame offers potential to fresh and experienced indie devs who are looking to sell their games in a platform.
                                    Here, you are free, away from any harm of the outside world!
                                </div>
                            </div>
            
                            <div data-bs-toggle="collapse" data-bs-target="#mission" class="main-collapse"><h1 class="collapse-main">Mission</h1></div>
                            <div id="mission" class="collapse main-collapse-info">
                                <div class="main-collapse-info-text">
                                    placeholder
                                </div>
                            </div>
            
                            <div data-bs-toggle="collapse" data-bs-target="#vision" class="main-collapse"><h1 class="collapse-main">Vision</h1></div>
                            <div id="vision" class="collapse main-collapse-info">
                                <div class="main-collapse-info-text">
                                    placeholder
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="opposite">
                        <div class="row">
                            <div class="col">
                                <!-- <img src="../../assets/icons/shopping-online.png" id="img-sell-opp"> -->
                            </div>
                            <div class="col">
                                <h1 class="main-header-opposite">...and we sell YOUR games!</h1>
                                <p class="main-text-opposite">
                                    OFFGame offers potential to fresh and experienced indie devs who are looking to sell their games in a platform.
                                    Here, you are free, away from any harm of the outside world!
                                </p>
                            </div>
                        </div>
                        <div id="spacer" class="row opposite"></div>
                        <div class="row">
                            <div data-bs-toggle="collapse" data-bs-target="#sellers" class="main-collapse"><h1 class="collapse-opposite">Sellers</h1></div>
                            <div id="sellers" class="collapse main-collapse-opposite">
                                <div class="main-collapse-info-text">
                                    placeholder
                                </div>
                            </div>
            
                            <div data-bs-toggle="collapse" data-bs-target="#compete" class="main-collapse"><h1 class="collapse-opposite">Competitors</h1></div>
                            <div id="compete" class="collapse main-collapse-opposite">
                                <div class="main-collapse-info-text">
                                    placeholder
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="row">
                            <div class="col">
                                <h1 class="main-header">Keep us a secret...</h1>
                                <p class="main-text">
                                    OFFGame is a simple game retailer from people, for the people. We believe our business should be conducted like a friend group.
                                </p>
                            </div>
                            <div class="col">
                                <img src="" id="img-sell-opp">
                            </div>
                        </div>
                        <div id="spacer" class="row"></div>
                        <div class="row">
                            <div data-bs-toggle="collapse" data-bs-target="#jobs" class="main-collapse"><h1 class="collapse-main">Jobs</h1></div>
                            <div id="jobs" class="collapse main-collapse-info">
                                <div class="main-collapse-info-text">
                                    OFFGames is always looking for new people in our team! <br>
                                    <br>
                                    OFFGames is a very small business, but that doesn't mean our jobs are small! We have plenty of jobs for you!
                                    Maybe you want to be our lead website designer. Maybe even our backend expert. Hell, we're hiring if you want 
                                    to make a game for OFFGames - not published, DEVELOP. <br>
                                    <br>
                                    So join the team now! <a href="contact">Contact us now</a>.
                                </div>
                            </div>
                            <div data-bs-toggle="collapse" data-bs-target="#terms" class="main-collapse"><h1 class="collapse-main">Terms of Service</h1></div>
                            <div id="terms" class="collapse main-collapse-info">
                                <div class="main-collapse-info-text">
                                    placeholder
                                </div>
                            </div>
                        </div>
                        
                    </section>
                    <section class="opposite">
                        <div class="row">
                            <div class="col">
                                <img src="" id="img-sell-opp">
                            </div>
                            <div class="col">
                                <h1 class="main-header-opposite">...and we'll keep yours.</h1>
                                <p class="main-text-opposite">
                                    OFFGame Hides the identities of developers, making the games anonymous. You'd still get a profile but it won't show up your name.
                                </p>
                            </div>
                        </div>
                        <div id="spacer" class="row"></div>
                        <div class="row">
                            <div data-bs-toggle="collapse" data-bs-target="#story" class="main-collapse"><h1 class="collapse-opposite">Story</h1></div>
                            <div id="story" class="collapse main-collapse-opposite">
                                <div class="main-collapse-info-text">
                                    placeholder
                                </div>
                            </div>
            
                            <div data-bs-toggle="collapse" data-bs-target="#policy" class="main-collapse"><h1 class="collapse-opposite">Privacy Policy</h1></div>
                            <div id="policy" class="collapse main-collapse-opposite">
                                <div class="main-collapse-info-text">
                                    placeholder
                                </div>
                            </div>
                        </div>
                    </section>
                </header>
                <main>
                    <div class="row">
                        <div class="col">
                            

                            
                            
                            

                
                        </div>
                    </div>

                </main>
            </div>

        </div>
        <div id="footer">
            hi
        </div>
    </body>
</html>