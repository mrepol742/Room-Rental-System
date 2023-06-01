<?php
$page_title = "Chat with Us | Room Rental System";
include("../include/header.php");
?>

<link rel="stylesheet" href="../api/project-orion/main.css">

<main>
        <noscript>
            <div class="nojs">
                An error occurred. Try reloading this page, or enable JavaScript if it is disabled in your browser.
            </div>
        </noscript>
        <div class="toast" id="notif" style="position: fixed; top: 0; left: 0; z-index: 9999; float: right; margin: 3%;"
            data-bs-autohide="true" data-bs-delay="3000">
        </div>
        <noscript>
            <div class="nojs">
                An error occurred. Try reloading this page, or enable JavaScript if it is disabled in your browser.
            </div>
        </noscript>
        <div id="root" class="root">
            <div class="text-center" id="welcome">
                <h1>Hello how may i assist you?</h1>
            </div>
            <ul id="chats" class="chats">
            </ul>
            <div class="edittxt">
                <div class="inner">
                    <button class="newchat top-icon" id="newchat"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" width="25">
                            <title>New Chat</title>
                            <path
                                d="M17.65,6.35C16.2,4.9 14.21,4 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20C15.73,20 18.84,17.45 19.73,14H17.65C16.83,16.33 14.61,18 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6C13.66,6 15.14,6.69 16.22,7.78L13,11H20V4L17.65,6.35Z" />
                        </svg></button>
                    <button class="voice top-icon" id="voice"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" width="25">
                            <title>Voice</title>
                            <path
                                d="M12,2A3,3 0 0,1 15,5V11A3,3 0 0,1 12,14A3,3 0 0,1 9,11V5A3,3 0 0,1 12,2M19,11C19,14.53 16.39,17.44 13,17.93V21H11V17.93C7.61,17.44 5,14.53 5,11H7A5,5 0 0,0 12,16A5,5 0 0,0 17,11H19Z" />
                        </svg></button>
                    <button class="more top-icon" href="#" id="navbarDropdown22" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown22" style="padding: 20px;">
                            <li><a href="https://github.com/mrepol742/mrepol742.github.io/compare">Submit a pull request</a><br>- Send your changes to reflect on live.</li>
                            <li><a href="https://github.com/mrepol742/mrepol742.github.io/issues/new">Submit a issue</a><br>- Found any mistake?</li>
                            <li><a href="https://github.com/prj-orion/issues">Submit a internal issue</a><br>- Found any error in api, Bot and or in AI?</li>
                            </ul>
                    </button>
                      
                </div>
                <div class="inner">
                    <textarea id="txt" class="txt"></textarea>
                    <button class="send" id="send"><svg id="sendsvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="35"><title>message</title><path d="M3,20.59L6.59,17H18C19.1,17 20,16.1 20,15V6C20,4.9 19.1,4 18,4H5C3.9,4 3,4.9 3,6V20.59M3,22H2V6C2,4.34 3.34,3 5,3H18C19.66,3 21,4.34 21,6V15C21,16.66 19.66,18 18,18H7L3,22Z" /></svg></button>

                </div>
            </div>
        </div>
    </main>

    <script>
            document.body.style.background = "url('../backgrounds/a" + (Math.floor(Math.random() * (12 - 1) ) + 1) + ".jpg') no-repeat fixed center";
            document.body.style.backgroundSize = "cover";
            document.body.style.transition = "all 1s ease";

            function showErr(err) {
                let bsAlert = new  bootstrap.Toast(document.getElementById("error-toast"));
                bsAlert.show();
                document.getElementById("error").innerText = err;
            }
            let isShow = true;
            qwe111.addEventListener("click", function() {
                if (isShow) {
                    isShow = false;
                    qwe.style.background = 'url("../chevron-up.svg")';
                } else {
                    isShow = true;
                    qwe.style.background = 'url("../chevron-down.svg")';
                }
            });
            
          
        </script>
     
        <script src="../assets/jquery-3.6.0.min.js"></script>
        <script src="../assets/bootstrap.min.js"></script>
        <script src="../api/project-orion/main.js"></script>
    </body>
</html>
<?php
include("../include/connections.php");
?>

