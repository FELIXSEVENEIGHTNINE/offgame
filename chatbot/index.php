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
                <h1> Chatbot </h1>
                <div id="chatbot" style="white-space:pre-line; overflow-y:auto; height:400px; text-align: right; scrollbar-width: none;"></div>

                <div id="textstuff" class="input-textbot row" style="color: Black; padding: 10px;">
                    <div class="col-sm-1">
                        <img src='../frontend/assets/img/stout/icon.png' style='width:100%'>
                    </div>
                    <div class="form-floating col-sm-10" style="color: Black;">
                        <textarea id='text' class="form-control" placeholder="Say something" name="text"></textarea>
                        <label for="text" style='margin-left: 20px;'> Ask </label>
                    </div>
                    <div class="col-sm-1">
                        <button onClick="connect(); eraseText();" type='submit' name='submit' class="btn btn-primary" id="submit"> Submit </button>
                    </div>
                </div>
            </di>

        </div>
        <div id="footer">
        </div>
    </body>
    <script> 

        var input = document.getElementById("text");

        // Execute a function when the user presses a key on the keyboard
        input.addEventListener("keypress", function(event) {
        // If the user presses the "Enter" key on the keyboard
        if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("submit").click();
        }
        });

        function eraseText() {
            document.getElementById("text").value = "";
        }

        function scrollToBottom() {
            let scroll = document.getElementById('chatbot');
            scroll.scrollTop = scroll.scrollHeight;
        }
    
        function connect() {
            var x = document.getElementById("text").value;

            const element = document.getElementById("chatbot");
            const prompt = document.createElement("div");
            prompt.style.cssText = `border-radius: 25px;background:rgb(59, 162, 206); padding: 20px; margin-left: auto; text-align: left; max-width: 70%; margin-bottom: 20px; display: inline-block; right: 0px;`
            promptText = document.createTextNode(x);
            prompt.appendChild(promptText);
            element.appendChild(prompt);

            const fake = document.createElement("div");
            fake.style.cssText = `border-radius: 25px;background: #73AD21; padding: 20px; margin-right: auto; text-align: left; max-width: 70%;`;
            var elem = document.createElement("img");
            elem.src = '../frontend/assets/img/fnaf.jpg';
            fake.appendChild(elem);

            let url = 'http://192.168.64.11:8081/chatbot-api?message=\"' + x + '\"';
            let xhr = new XMLHttpRequest() ;
            xhr.addEventListener ('readystatechange' , function() {
                if(xhr.readyState == 4)
                {
                    const para = document.createElement("div");
                    para.style.cssText = `border-radius: 25px;background: #73AD21; padding: 20px; margin-right: auto; text-align: left; max-width: 70%;`;
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
                    scrollToBottom();
                }
            }) ;
            xhr.open('get',url, true);
            xhr.send();

            scrollToBottom();
        }
    </script>
</html>
