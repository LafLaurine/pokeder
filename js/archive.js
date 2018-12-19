document.addEventListener("DOMContentLoaded", function (event) {

    var tabUser = [];
    var currentUser;
    fetch('http://lucielesbats.fr/Pokeder/api/archive.php')
    .then(response => response.json())
    .then(data=>{      
        console.log(data);
        initTab(data);
    });
  
    function initTab(tab)
    {
      tabUser = tab;
      currentUser = 0;
      switchUser();
  
    }

    function switchUser()
    {
     
            const likedPseudo = document.querySelector('#likedpseudo');
            likedPseudo.innerHTML = tabUser[currentUser].pseudo;
            
            const likedFirstname = document.querySelector('#likedfirstname');
            likedFirstname.innerHTML = tabUser[currentUser].firstname;
            
            const likedName = document.querySelector('#likedname');
            likedName.innerHTML = tabUser[currentUser].name;


    }

    
  leftButton = document.getElementById('leftcross');

  leftButton.addEventListener('click', e => {
    currentUser = currentUser-1<0 ? tabUser.length-1 : currentUser-1;
    switchUser();
  });

  rightButton = document.getElementById('rightcross');

  rightButton.addEventListener('click', e => {
    currentUser = currentUser+1 == tabUser.length ? 0 : currentUser+1;
    switchUser();
  });
    
   
});