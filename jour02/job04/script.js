function keylogger(event) {
    var keynum;

    if (document.event) { // IE
        keynum = event.keyCode;
    } else if (event.which) { // Netscape/Firefox/Opera
        keynum = event.which;
    }
    document.getElementById('textarea').textContent += String.fromCharCode(keynum);

}
// document.onkeypress = function () { keylogger(event) };
document.addEventListener("keypress", keylogger, true);
keylogger()