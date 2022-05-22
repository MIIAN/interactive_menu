
var menu = document.getElementById("menuID")
var icon = document.getElementById("iconID")
var menuList = document.getElementById("interactiveMenu")
var open = false

function menuDrop() { 

    //if the menu button has been clicked 
    if (open == false) {
        icon.classList.add("rotatesOnClick")
        menuList.classList.remove("interactive_menu_hidden")
        menuList.classList.add("show_interactive_menu")
        return open = true
    }

    //if the button has not been clicked
    else{
        icon.classList.remove("rotatesOnClick")
        menuList.classList.remove("show_interactive_menu")
        menuList.classList.add("interactive_menu_hidden")
        return open = false
    }

    return open
}

menu.addEventListener("click", menuDrop)