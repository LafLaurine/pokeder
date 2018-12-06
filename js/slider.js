var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("lesDiv");
        if (n > x.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
         x[i].classList.remove("divActive");  
        }
      x[slideIndex-1].classList.add("divActive");  
    }


    // onclick="plusDivs(-1)"
    //onclick="plusDivs(+1)"
    