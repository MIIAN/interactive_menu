
var menu = document.getElementById("menuID")
var icon = document.getElementById("iconID")
var open = false

function menuDrop() { 
    console.log(open)

    //if the menu button has been clicked 
    if (open == false) {
        icon.classList.add("rotatesOnClick")
        return open = true
    }

    //if the button has not been clicked
    else{
        icon.classList.remove("rotatesOnClick")
        return open = false
    }

    console.log(open)

    return open
}

menu.addEventListener("click", menuDrop)