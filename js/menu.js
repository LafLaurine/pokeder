document.addEventListener("DOMContentLoaded", function (event) {
    
    //Allow us to have a menu thar is active when we click on it
     var bouton = document.querySelector("#bouton");
    bouton.addEventListener("click", appMenu);
    
    
    function appMenu(evt) {
        var menu = document.querySelector("nav");
        this.classList.toggle("decale");
        menu.classList.toggle("actived");
    }


    
    
    
});