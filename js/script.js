document.addEventListener("DOMContentLoaded", function (event) {

    //Change name after welcome when user type their username

    const inputName = document.querySelector('#pseudo'); 
    const title = document.querySelector('#who'); 
    const changeName = (value, element) => { 
    element.innerHTML = 'Welcome ' + value || 'Welcome';  
} 
inputName.addEventListener('keyup', event => changeName(event.target.value, title)); 
     
    
    //Get Pokemon types and display it
    const selector = document.querySelector('#pokeType');

    fetch('https://pokeapi.co/api/v2/type/', {
            mode: 'cors'
        })
        .then(response => response.json())
        .then(data => {
            const results = data.results;
            //results is an array
            results.forEach(function (elt) {
                const pokeTypes = elt.name;
                var opt = document.createElement('option');
                opt.value = pokeTypes;
                opt.innerHTML = pokeTypes;
                selector.appendChild(opt);
            });
        });

    //to return true, the elt must be non-empty
    const isValidElement = element => {
        return element.name && element.value;
    };

    //same but checked for radiobox
    const isValidValue = element => {
        return (!['checkbox', 'radio'].includes(element.type) || element.checked);
    };

    //in order to deal with multiple select selection
    const isMultiSelect = element => element.options && element.multiple;

    const getSelectValues = options => [].reduce.call(options, (values, option) => {
        return option.selected ? values.concat(option.value) : values;
    }, []);

    // the reduce() method uses a function to convert an array into a single value. Takes 2 arg : reducer function and initial value that is defaults to 0.

    //Actually, reduce function is to combine our form elements into a single object
    const formToJSON = elements => [].reduce.call(elements, (data, element) => { //aplied to each elt of the array

        // using call() allows us to force reduce() to work with elements, even though it’s technically not an array.

        // new property with the key of child.name and value child.value
        // Add the current field to the object and checked that elt not empty
        if (isValidElement(element) && isValidValue(element)) {
            if (isMultiSelect(element)) {
                data[element.name] = getSelectValues(element);
            } else {
                data[element.name] = element.value;
            }
        }
        //return data object
        return data;

    }, {});


    //Get pokemon images from a github file
    for (i = 1; i <= 151; i++) {
        const pokeImg = document.createElement("img");
        pokeImg.setAttribute('id', 'pokePic' + i);
        pokeImg.src = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' + i + '.png';
        const pokeZone = document.getElementById("pokemon");
        pokeZone.appendChild(pokeImg);
    }

    const pokeImg = document.querySelectorAll("img");
    //Get the ID of the pokemon that has been clicked, display the name into the html and put a red background to show the user what Poke he has chosen
    for (var i = 0, len = pokeImg.length; i < len; i++) {
        pokeImg[i].addEventListener('click', e => {
            //get pokemon id
            const pokemonId = e.target.id.split('pokePic')[1];
            console.log(pokemonId);
            //fetch the pokemon api in order to assign a class to the pokemon that has been clicked
            fetch('https://pokeapi.co/api/v2/pokemon/' + pokemonId + "/")
                .then(response => response.json())
                .then(data => {
                    //add and remove a class to the pokemon when we click on it or on another Pokemon
                    const actives = document.querySelectorAll('.picture-active');
                    actives.forEach(function (element) {
                        element.classList.remove("picture-active");
                    });

                    const pokeName = data.name;
                    const imgChosen = document.querySelector('#pokePic' + pokemonId);
                    imgChosen.classList.add('picture-active');

                    document.querySelector("#pokeName").value = pokeName;
                    document.querySelector("#chosen").innerHTML = pokeName;
                });
        });
    }

    const handleFormSubmit = event => {
        // Call our function to get the form data.
        const user = formToJSON(form.elements);
        // Use `JSON.stringify()` to make the output valid, human-readable JSON.
        const jsonUser = JSON.stringify(user, null, "  ");

        var listUser = [];
            
        

        //need to use AJAX because the call is POST
        //send user data to list.php (what the user has submited)
        $.ajax({
            url: 'http://localhost/Pokeder/api/list.php',
            type: "POST",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: jsonUser,
            success: function (dataRep, textStatus, jqXHR) {
           },
           error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);
         }

        });



      

    };

    //allow us to handle the form into JSON
    const form = document.getElementsByClassName('contact-form')[0];
    form.addEventListener('submit', handleFormSubmit);

});