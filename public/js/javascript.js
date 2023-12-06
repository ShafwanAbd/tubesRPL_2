var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbarRPL").style.top = "0";
    } else {
        document.getElementById("navbarRPL").style.top = "-70px";
    }
    prevScrollpos = currentScrollPos;
}

// attach to window.onload
setTimeout(function() {

    document.getElementById('sixSeconds').className += ' hidden';

}, 6000);