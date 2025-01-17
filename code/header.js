let isOpen = false;
let menuBack;
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
    menuBack = document.getElementById("layer1");
    menuBack.classList.add("layer1_active");
    menuBack.classList.remove("layer1_inactive");
    menu = document.getElementById("menu");
    menu.classList.add("menu_active");
    menu.classList.remove("menu_inactive");
    isOpen = true;
}

function closeHeader() {
    menuBack = document.getElementById("layer1");
    menuBack.classList.remove("layer1_active");
    menuBack.classList.add("layer1_inactive");
    menu = document.getElementById("menu");
    menu.classList.remove("menu_active");
    menu.classList.add("menu_inactive");
    isOpen = false;
}
