// Background
let currImage = 1;
let maxImage = 5;
let body;

// Background functions
function init(body) {

    function change() {
        console.log("function change actief");
        if (currImage <= maxImage) {
            body = document.querySelector('#background');
            console.log("currImage is kleiner dan maxImage");
            body.classList.remove("background" + currImage);
            currImage++;
            body.classList.add("background" + currImage);
        } else {
            body = document.querySelector('#background');
            console.log("currImage is groter dan maxImage");
            body.classList.remove("background" + currImage)
            currImage = 1;
            body.classList.add("background" + 1);
        }
        console.log("background changed to: " + currImage);
        reset();
    }

    console.log("word ge-init");
    setTimeout(() => {
        change();
    }, "5000");


}

function reset() {
    init();
    console.log("init word reset");
}

reset();

