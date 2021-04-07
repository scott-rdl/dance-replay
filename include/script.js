
function EnableSubmit() {
    const send = document.getElementById("send");
    send.disabled = ok.checked ? false : true;
    if (!send.disabled) {send.focus();}
}

function MouseOver() {
    const send = document.getElementById("send");
    send.disabled = ok.checked ? false : true;
    if (send.disabled) {
        send.classList.add("shake");
        console.log('over');

        var delay = setTimeout(function() {
            send.classList.remove("shake");
        }, 300)
    }
}