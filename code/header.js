// Header
let isOpen = false;
let menu;

// Header functions
function header() {
    if (isOpen == true) {
        closeHeader();
    } else {
        openHeader();
    }
}

function openHeader() {
    menu = document.getElementById("layer1");
    menu.classList.add("layer1_active");
    menu.classList.remove("layer1_inactive")
    isOpen = true;
}

function closeHeader() {
    menu = document.getElementById("layer1");
    menu.classList.remove("layer1_active")
    menu.classList.add("layer1_inactive")
    isOpen = false;
}