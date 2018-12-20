document.addEventListener("DOMContentLoaded", function (event) {
  
  //tab objet
  var tabUser = [];
  var currentUser;
  fetch('http://localhost/Pokeder/api/list.php')
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

  //allow the current user to switch between users that have the same Poketype as him

  function switchUser()
  { 
    const userDesc = document.querySelector('.lesDiv');
    userDesc.innerHTML = tabUser[currentUser].pseudo;
    const firstname = document.createElement("p");
    firstname.innerHTML = tabUser[currentUser].firstname;
    userDesc.appendChild(firstname);
    const name = document.createElement("p");
    name.innerHTML = tabUser[currentUser].name;
    userDesc.appendChild(name);
    const pokeName = tabUser[currentUser].pokeName;
    //in order to get Giphy API to generate a gif bc we didn't have time to generate avatars
    fetch('http://api.giphy.com/v1/gifs/search?q=' + pokeName + '&api_key=0qYhEAykwPTrHJL3iD9GRnDSsoOfuabN&limit=5' + '/', {mode:'cors'})
    .then(response => response.json())
    .then(data => {
        const gif = data;
        const pokeImg = gif.data[2].images.downsized.url;
        console.log(pokeImg);
        const pokeZone = document.createElement("img");
        pokeZone.setAttribute('id', 'pokeGif');
        pokeZone.src = pokeImg;
        userDesc.appendChild(pokeZone);
        //changeLike();

    });

  }

  //kinda broken function that add another heart. We wanted to get a heart whenever someone was liked
  function changeLike()
  {
    const actives = document.querySelector('.like-active');

    if (actives!=null)
    {
      actives.classList.remove("like-active"); 

    }
    else
    {
      
    const like = document.querySelector("#heart");
    like.classList.add('like-active');
    }
    
  };    


  //Call to the API like
  function liked()
  {
    $.ajax({
      url: 'http://localhost/Pokeder/api/like.php',
      type: "POST",
      dataType: "text",
      data: {
        pseudo : tabUser[currentUser].pseudo
      },
      success: function (dataRep) {
          //changeLike();
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest, textStatus, errorThrown);
     }     

    });
  }


  leftButton = document.getElementById('leftButton');

  leftButton.addEventListener('click', e => {
      // If currentUser pass into negative : 0-1, pass last tab indice : tab-length-1, if not, just -1
    currentUser = currentUser-1<0 ? tabUser.length-1 : currentUser-1;
    switchUser();
  });

  rightButton = document.getElementById('rightButton');

  rightButton.addEventListener('click', e => {
    // If next currentUser is equal to the length of the tab that contains every user, we start over at the indice 0. Else, we just go to the next user
    currentUser = currentUser+1 == tabUser.length ? 0 : currentUser+1;
    switchUser();
  });

  likeButton = document.getElementById('like');

  likeButton.addEventListener('click', e => {
    liked();
  });


});
    