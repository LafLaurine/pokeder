document.addEventListener("DOMContentLoaded", function (event) {

    var tabUser = [];
    var currentUser;
    //Get users that has been liked
    fetch('http://localhost/Pokeder/api/archive.php')
    .then(response => response.json())
    .then(data=>{      
        console.log(data);
        //push users into a tab to manipulate information
        initTab(data);
    });
  
    function initTab(tab)
    {
      tabUser = tab;
      currentUser = 0;
      switchUser();
  
    }

    //allow the current user to switch between users he has liked
    function switchUser()
    {
     
    
            //Get information about one of the user liked            
            if (tabUser[currentUser] != null)
            {
              const likedPseudo = document.querySelector('#likedpseudo');              
              likedPseudo.innerHTML = "Pseudo : " + tabUser[currentUser].pseudo;
              
              const likedFirstname = document.querySelector('#likedfirstname');
              likedFirstname.innerHTML = "Firstname : " + tabUser[currentUser].firstname;
              
              const likedName = document.querySelector('#likedname');
              likedName.innerHTML = "Name : " +tabUser[currentUser].name;  
            }
           


    }


  //Function applied to pokedex's cross : whenever it is clicked, we can change user
    
  leftButton = document.getElementById('leftcross');

  leftButton.addEventListener('click', e => {
    // If currentUser pass into negative : 0-1, pass last tab indice : tab-length-1, if not, just -1
    currentUser = currentUser-1<0 ? tabUser.length-1 : currentUser-1;
    switchUser();
  });

  rightButton = document.getElementById('rightcross');

  rightButton.addEventListener('click', e => {
        // If next currentUser is equal to the length of the tab that contains every user, we start over at the indice 0. Else, we just go to the next user
    currentUser = currentUser+1 == tabUser.length ? 0 : currentUser+1;
    switchUser();
  });
    
   
});