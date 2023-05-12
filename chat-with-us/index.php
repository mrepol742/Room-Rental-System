<?php
$page_title = "Chat with Us | Room Rental System";
include("../include/header.php");
?>

<style>
    @font-face {
    font-family: 'Maven Pro';
    font-style: normal;
    font-weight: 400;
    font-display: swap;
    src: url("../assets/MavenPro.woff2") format('woff2');
}

.flex-left {
    align-self: flex-start;
}

.flex-right {
    align-self: flex-end;
}

a {
    text-decoration: none;
    cursor: pointer;
    transition: all 0.5s ease;
}

a:hover {
    color: #000000;
    transition: all 0.5s ease;
}

* {
    font-family: 'Maven Pro', sans-serif;
    margin: 0;
    padding: 0;
    scroll-behavior: smooth;
    outline: none;
    box-sizing: border-box;
}

.root {
    height: 100%;
    width: 100%;
    background: transparent;
    flex: 1;
}

:root {
    --et-height: 4rem;
}

body {
    height: 100vh;
    width: 100%;
    background: #fff;
    margin: 0;
    padding: 0;
    position: fixed;
    display: flex;
    flex-direction: column;
}

main {
    height: 80%;
    width: 100%;
}

.chats {
    padding: 1rem 0;
    list-style: none;
    top: 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    width: 100%;
    box-sizing: border-box;
    overflow: scroll;
    flex: 1;
    /*height: calc(94vh - 4rem);*/
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
}

.card-group {
    height: 50vh;
    overflow: scroll;
    overflow-x: hidden;
    overflow-y: auto;
}

.mj {
    background: #f3f3f3;
    width: auto;
    margin: 5px;
    padding: 10px 20px 10px 20px;
    color: #000;
    border-radius: 3px 15px 15px 15px;
    clear: both;
    /*    float: left; */
    align-self: flex-start;
    position: relative;
    max-width: 65vw;
    min-width: 5vw;
    transition: all 0.5s ease;
    animation-fill-mode: forwards;
}

@keyframes mjinsert {
    0% {
        transform: translateX(-1000px);
    }

    44% {
        transform: translateX(0);
    }
}

@keyframes meinsert {
    0% {
        transform: translateY(1000px);
    }

    44% {
        transform: translateX(0);
    }
}

.chat-bubble {
    background-color: #f3f3f3;
    padding: 12px 22px;
    margin: 5px;
    border-radius: 3px 15px 15px 15px;
    display: inline-block;
}

.typing {
    align-items: center;
    display: flex;
    height: 17px;
}

.typing .dot {
    animation: mercuryTypingAnimation 1.8s infinite ease-in-out;
    background-color: #f3f3f3;
    border-radius: 50%;
    height: 7px;
    margin-right: 4px;
    vertical-align: middle;
    width: 7px;
    display: inline-block;
}

.typing .dot:nth-child(1) {
    animation-delay: 200ms;
}

.typing .dot:nth-child(2) {
    animation-delay: 300ms;
}

.typing .dot:nth-child(3) {
    animation-delay: 400ms;
}

.typing .dot:last-child {
    margin-right: 0;
}



@keyframes mercuryTypingAnimation {
    0% {
        transform: translateY(0px);
        background-color: #f3f3f3;
        /* rgba(20,105,69,.7); */
    }

    28% {
        transform: translateY(-7px);
        background-color: #f3f3f3;
        /*rgba(20,105,69,.4);*/
    }

    44% {
        transform: translateY(0px);
        background-color: #d1cdcd;
        /*rgba(20,105,69,.2);*/
    }
}

.attch {
    background-color: transparent !important;
    padding: 0 !important;
    margin-left: 5px;
    width: auto;
    border-radius: 3px 20px 20px 20px;
    clear: both;
    float: left;
    position: relative;
    max-width: 80vw;
    transition: all 0.5s ease;
}

.me {
    background: #4285f4;
    color: #fff;
    width: auto;
    margin: 5px;
    padding: 10px 20px 10px 20px;
    border-radius: 15px 15px 3px 15px;
    clear: both;
    /*    float: right; */
    align-self: flex-end;
    position: relative;
    max-width: 65vw;
    min-width: 5vw;
    transition: all 0.5s ease;
    animation-fill-mode: forwards;
    animation-timing-function: ease-in;
}

.time1 {
    color: #000;
    width: auto;
    clear: both;
    float: right;
    font-size: 12px;
    margin-right: 13px;
    position: relative;
}


.time2 {
    color: #000;
    width: auto;
    clear: both;
    float: left;
    font-size: 12px;
    margin-left: 13px;
    position: relative;
}

@media (max-width:1080px) {

    .mj,
    .me {
        max-width: 80vw;
    }
}

.edittxt {
    position: fixed;
    bottom: 0%;
    width: 100%;
    display: flex;
    align-items: center;
    box-shadow: 0 0 2em #2121215e;
    background-color: #ffffff;
}

 .txt {
    flex: 1;
    border: none;
    box-sizing: border-box;
    padding: 1rem;
}

/*
svg fill = #4285f4
*/
.edittxt .send {
    background: #fff;
    border: none;
    box-sizing: border-box;
    padding: 1rem;
    font-size: 1.4rem;
    color: #0078ff;
    display: flex;
    align-items: center;
    opacity: 0.7;
    fill: #757575;
}

textarea {
    resize: none;
}

::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background-color: #ffffff;
}

::-webkit-scrollbar-thumb {
    border: none;
    background-color: #4285f4;
    border-radius: 0.2em;
}

::-webkit-scrollbar-thumb:hover {
    background-color: #3a76d8;
}

.nojs {
    position: fixed;
    z-index: 999999;
    bottom: 0%;
    left: 0%;
    right: 0;
    text-align: center;
    background-color: #de5246;
    color: #ffffff;
    padding: 4px;
}

.toast {
    box-shadow: 0 0 5em rgba(0, 0, 0, .1);
    transition: box-shadow .3s;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 10px;
    border: none;
}

.toast:hover {
    transition: box-shadow .3s;
    box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175);
}

.text-center {
    padding-top: 10%;
}

.btn {
    border-radius: 7px;
    padding-left: 6%;
    padding-right: 6%;
    transition: all 1s ease;
}

.btn:focus {
    background-color: #ffffff;
    border-color: #4285f4;
    color: #4285f4;
    transition: all 1s ease;
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
    transition: background-color 5000s ease-in-out 0s;
    -webkit-text-fill-color: #fff !important;
}

.dropdown-menu {
    background-color: #ffffff !important;
    border-color: #ffffff !important;
    border-radius: 20px;
    box-shadow: 0 0 5em rgba(0, 0, 0, .1);
}
    </style>
<main>
        <noscript>
            <div class="nojs">
                An error occurred. Try reloading this page, or enable JavaScript if it is disabled in your browser.
            </div>
        </noscript>
        <div id="root" class="root">
            <div class="text-center" id="welcome">
            <ul id="chats" class="chats">
            </ul>
            <div class="edittxt">
                <textarea id="txt" class="txt" placeholder="Type your message"></textarea>
                <button class="send" id="send" onclick="sendMsg()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30"><title>Send</title><path id="sendsvg" d="M3 20V4L22 12M5 17L16.85 12L5 7V10.5L11 12L5 13.5M5 17V7 13.5Z" /></svg></button>
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
<script>
let isLoaded = true;
let chats = document.getElementById('chats')
let messages = [];
let hasChat = true;
let edttxt = document.querySelector('.edittxt')
let root = document.querySelector(':root')
let etheight = getComputedStyle(edttxt).getPropertyValue('height')

root.style.setProperty('--et-height', etheight)
const changeBtnClr = () => {
    if (txt.value.trim().length == 0) {
        sendsvg.style.fill = '#757575'
        sendsvg.style.opacity = '0.7'
    } else {
        sendsvg.style.fill = '#4285f4'
        sendsvg.style.opacity = '1.0'
    }
}

txt.addEventListener('input', () => {
    changeBtnClr()
})

async function sendMsg() {
    let txtInp = document.getElementById('txt').value;

    if (txtInp.trim().length == 0) {
        return;
    }

    let li = document.createElement('li')
    li.setAttribute('class', 'me')
    li.style.animation = 'meinsert 350ms 1'
    li.innerText = txtInp;
    if (messages.length > 1) {
        messages.shift();
    }
    let li3 = document.createElement('li')
    li3.setAttribute('class', 'time1')
    li3.classList.add('flex-right')
    li3.innerText = getTime();

    chats.appendChild(li);
    chats.appendChild(li3);
    document.getElementById('txt').value = ''
    let construct = "";

    let chatBubbleLi = document.createElement('li')
    chatBubbleLi.classList.add('incoming-response')

    let chatBubbleDiv = document.createElement('div')
    chatBubbleDiv.classList.add('chat-bubble')

    let typing = document.createElement('div')
    typing.classList.add('typing')

    for (let i = 0; i < 3; i++) {
        let dot = document.createElement('dot')
        dot.classList.add('dot')
        typing.appendChild(dot)
    }
    chatBubbleDiv.appendChild(typing)
    chatBubbleLi.appendChild(chatBubbleDiv)
    chats.appendChild(chatBubbleLi)

    if (!(messages[0] === undefined)) {
        construct += messages[0];
    }
    if (!(messages[1] === undefined)) {
        construct += "\nUser:" + messages[1];
    }
    construct += "%jk__lio%" + txtInp;
    $.ajax({
        url: "https://project-orion.mrepol853.repl.co/chat?" + construct,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        type: "GET",
        success: function (result) {
            if (/\[url=/.test(result)) {
                try {
                    let qq = result.match(/\[(.*?)\]/)[1]
                    let img = document.createElement('img');
                    img.setAttribute('src', qq.replace("url=", ""));
                    img.setAttribute('class', 'attch w-50 p-3');
                    result = result.replaceAll("[" + qq + "]", "");
                    chats.appendChild(img);

                } catch (err) {
                    result = result.replaceAll("[" + qq + "]", "");
                }
            }
            if (result.trim().length != 0) {
                let li1 = document.createElement('li')
                li1.setAttribute('class', 'mj')
                if (result.startsWith("\n")) {
                    result = result.replace("\n", "")
                }

                li1.innerText = result

                let li2 = document.createElement('li')
                li2.setAttribute('class', 'time2')

                let time = getTime()
                li2.innerText = 'Now';

                setTimeout(function() {
                    li2.innerText = time
                }, 60*1000);

                messages.push(txtInp);

                chats.appendChild(li1);
                chats.appendChild(li2);
                chats.removeChild(document.querySelector('.incoming-response'))
            }
            $('#chats').animate({
                scrollTop: $("#chats")[0].scrollHeight
            }, 'fast');
        },
        error: function (result) {
            console.log(result);
        }
    });
    if (hasChat) {
      //  document.getElementById('welcome').style.display = 'none';
        hasChat = false;
    }
    $('#chats').animate({
        scrollTop: $("#chats")[0].scrollHeight
    }, 'fast');
    changeBtnClr()
}

if (isLoaded) {
    $(function() {
        $(document).click(function (event) {
            $('.navbar-collapse').collapse('hide');
        });
    });
    isLoaded = false;
}

txt.addEventListener("keypress", function(evt) {
    if (evt.key === "Enter" && !evt.shiftKey) {
        evt.preventDefault();
        document.getElementById("send").click();
    }
});


clear.onclick = function() {
    clear();
};

let sq = decodeURI(location.search.split('msg=')[1] ? location.search.split('msg=')[1]: '');
if (sq != '') {
    document.getElementById('txt').innerText = sq;
    sendMsg();
}

function getTime() {
    let options = {
        hour: 'numeric',
        minute: 'numeric'
    },
    formatter = new Intl.DateTimeFormat([], options);
    return formatter.format(new Date());
}

function clear() {
    document.getElementById('welcome').style.display = 'none';
    hasChat = true;
    $('chats').empty();
}
        if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('../sw.js').then((reg) => {
      console.log('[ServiceWorker] Registered');
    }).catch((err) => {
      console.error('[ServiceWorker] failed: ', err)
    });
}
    </script>
    </body>
</html>
<?php
include("../include/connections.php");
?>

