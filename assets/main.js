
var menu = document.getElementById("menuID")
var icon = document.getElementById("iconID")
var menuList = document.getElementById("menu")
var open = false

function menuDrop() { 

    //if the menu button has been clicked 
    if (open == false) {
        icon.classList.add("rotatesOnClick")
        menuList.classList.remove("hidden")
        menuList.classList.add("show")
        return open = true
    }

    //if the button has not been clicked
    else{
        icon.classList.remove("rotatesOnClick")
        menuList.classList.remove("show")
        menuList.classList.add("hidden")
        return open = false
    }

    return open
}

menu.addEventListener("click", menuDrop)