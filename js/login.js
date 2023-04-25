if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('../sw.js').then((reg) => {
      console.log('[ServiceWorker] Registered');
    }).catch((err) => {
      console.error('[ServiceWorker] failed: ', err)
    });
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

updateBg()
setInterval(function() {
updateBg();
}, 10000);

function updateBg() {
document.body.style.background = "url('../backgrounds/a" + (Math.floor(Math.random() * (12 - 1) ) + 1) + ".jpg') no-repeat fixed center";
document.body.style.backgroundSize = "cover";
document.body.style.transition = "all 1.5s ease";
}

function showErr(err) {
    let bsAlert = new  bootstrap.Toast(document.getElementById("error-toast"));
    bsAlert.show();
    document.getElementById("error").innerText = err;
}