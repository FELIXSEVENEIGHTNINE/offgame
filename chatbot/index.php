<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <link rel="stylesheet" href="../frontend/assets/css/index.css">
        <link rel="stylesheet" href="../frontend/assets/css/main.css">
        <link rel="stylesheet" href="bot.css">
        <script>
            function Hover() {
                var img = document.getElementById('link-image');
                img.src='../frontend/assets/img/game_logo.png';
            }

            function HoverOff() {
                var img = document.getElementById('link-image');
                img.src='../frontend/assets/img/game_logo_2.png';
            }
        </script>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-2">
                <a href="../frontend/">
                    <div class="homepage transition-short inactive-link" id="main" onmouseover="Hover()" onmouseout="HoverOff()">
                        <img src="../frontend/assets/img/game_logo_2.png" id="link-image"> 
                    </div>
                </a>

                <a href="../frontend/store/">
                    <div class="button-link transition inactive-link">
                        <p>Store</p>
                    </div>
                </a>

                <a href="../frontend/community/">
                    <div class="button-link transition inactive-link">
                        <p>Community</p>
                    </div>
                </a>

                <a href="../frontend/profile/">
                    <div class="button-link transition inactive-link">
                        <p>Profile</p>
                    </div>
                </a>

                <a href="../frontend/blog/">
                    <div class="button-link transition inactive-link">
                        <p>Blog</p>
                    </div>
                </a>

                <!-- <a href="../frontend/recommendation/">
                    <div class="button-link transition inactive-link">
                        <p>Recommendation</p>
                    </div>
                </a> -->

                <a href="">
                    <div class="button-link transition active-link">
                        <p>Chatbot</p>
                    </div>
                </a>
            </div>

            <div class="col-sm-10" style="background-color: #454955; color: White; padding: 40px;">
                <h2> Chatbot </h2>
                <div id="chatbot" style="white-space:pre-line; overflow-y:auto; height:500px; text-align: right;"></div>

                <div id="textstuff" class="input-textbot" style="color: Black;">
                    <!-- <form id="stuffyform"> -->
                        <div class="form-floating" style="color: Black;">
                            <textarea id='text' class="form-control" placeholder="Say something" name="text"></textarea>
                            <label for="text"> Ask </label>
                        </div>
                        <button onClick="connect()" type='submit' name='submit' class="btn btn-primary"> Submit </button>
                    <!-- </form> -->
                </div>
            </di>

        </div>
        <div id="footer">
        </div>
    </body>
    <script> 
        // function (e) {
        //     if (event.keyCode == 13) {
        //         connect();
        //     }
        // }

        function eraseText() {
            document.getElementById("text").value = "";
        }


        function scroll(element) {
            const scrollIntoViewOptions = { behavior: "smooth", block: "center" }; 
            var bot = document.getElementById(element);
            bot.scrollIntoView(scrollIntoViewOptions);
            // objDiv.scrollTop = objDiv.scrollHeight;
        }
    
        function connect() {
            var x = document.getElementById("text").value;
            eraseText();

            const element = document.getElementById("chatbot");
            const prompt = document.createElement("div");
            prompt.style.cssText = `border-radius: 25px;background:rgb(59, 162, 206); padding: 20px; margin-left: auto; text-align: left; max-width: 70%; margin-bottom: 20px; display: inline-block; right: 0px;`
            promptText = document.createTextNode(x);
            prompt.appendChild(promptText);
            element.appendChild(prompt);
            let url = 'http://192.168.64.11:8081/chatbot-api?message=\"' + x + '\"';
            let xhr = new XMLHttpRequest() ;
            xhr.addEventListener ('readystatechange' , function() {
                if(xhr.readyState == 4)
                {
                    const para = document.createElement("div");
                    para.style.cssText = `border-radius: 25px;background: #73AD21; padding: 20px; margin-right: auto; text-align: left; max-width: 70%;`
                    y = xhr.responseText.slice(1, -1).replaceAll("*", "").split("\\n");
                    let yLen = y.length;
                    for (let i = 0; i < yLen; i++) {
                        console.log(y[i])
                        if(y[i] != "") {
                            const line = document.createElement("p");
                            node = document.createTextNode(y[i].replaceAll("\\", ""));
                            line.appendChild(node);
                            para.appendChild(line);
                        }        
                    }
                    element.appendChild(para);
                }
            }) ;
            xhr.open('get',url, true);
            xhr.send();

            scroll("chatbot");
        }
    </script>
</html>
