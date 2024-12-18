// Background
let currImage = 0;
let maxImage = 5;
let body;

// Background functions
function init(body) {
    console.log("word ge-init");
    setTimeout(() => {
        change();
    }, "5000");

    function change() {
        console.log("function change actief");
        if (currImage < maxImage) {
            body = document.querySelector('body');
            console.log("currImage is kleiner dan maxImage");
            body.classList.remove("background" + [currImage]);
            currImage++;
            body.classList.add("background" + [currImage]);
        } else {
            console.log("currImage is groter dan maxImage");
            currImage = 0;
            active = false;
        }
        console.log("background changed to: " + currImage);
        reset();
    }


}

function reset() {
    init();
    console.log("init word reset");
}
init();

