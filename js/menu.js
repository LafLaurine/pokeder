document.addEventListener("DOMContentLoaded", function (event) {
    
    var bouton = document.querySelector("#bouton");
    bouton.addEventListener("click", appMenu);
    
    function appMenu(evt) {
        var menu = document.querySelector("nav");
        this.classList.toggle("decale");
        menu.classList.toggle("actived");
    }

    
    
    
});