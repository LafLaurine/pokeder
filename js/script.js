document.addEventListener("DOMContentLoaded", function (event) {

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


   

    /*var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("lesDiv");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }*/

    






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

    for (i = 1; i <= 151; i++) {
        const pokeImg = document.createElement("img");
        pokeImg.setAttribute('id', 'pokePic' + i);
        pokeImg.src = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' + i + '.png';
        const pokeZone = document.getElementById("pokemon");
        pokeZone.appendChild(pokeImg);
    }

    const pokeImg = document.querySelectorAll("img");

    for (var i = 0, len = pokeImg.length; i < len; i++) {
        pokeImg[i].addEventListener('click', e => {
            const pokemonId = e.target.id.split('pokePic')[1];
            console.log(pokemonId);
            fetch('https://pokeapi.co/api/v2/pokemon/' + pokemonId + "/")
                .then(response => response.json())
                .then(data => {
                    const pokeName = data.name;
                    const imgChosen = document.querySelector('#pokePic' + pokemonId);
                    imgChosen.style.backgroundColor = "red";
                    document.querySelector("#pokeName").value = pokeName;
                    document.querySelector("#chosen").innerHTML = pokeName;
                });
        });
    }


    /*
        function download(content, fileName, contentType) {
            var a = document.createElement("a");
            var file = new Blob([content], {
                type: contentType
            });
            a.href = URL.createObjectURL(file);
            a.download = fileName;
            a.click();
        }*/

    const handleFormSubmit = event => {

        // Stop the form from submitting since we’re handling that with AJAX.
        event.preventDefault();


        // Call our function to get the form data.
        const user = formToJSON(form.elements);

        // print the form data onscreen as a formatted JSON object.
        const dataContainer = document.getElementsByClassName('results__display')[0];

        // Use `JSON.stringify()` to make the output valid, human-readable JSON.
        const jsonUser = dataContainer.textContent = JSON.stringify(user, null, "  ");

        var listUser = [];

        //get list
        /* $.ajax({
              url: 'https://api.myjson.com/bins/14h1i6',
              type: "GET",
              contentType: "application/json; charset=utf-8",
              dataType: "json",
              success: function (dataRep, textStatus, jqXHR) {
                  listUser = JSON.parse(JSON.stringify(dataRep));
                  listUser.push(user);
                  console.log(listUser);
                  // do update
                  $.ajax({
                      url: 'https://api.myjson.com/bins/14h1i6',
                      type: "PUT",
                      data: listUser,
                      contentType: "application/json; charset=utf-8",
                      dataType: "json",
                      success: function (data, textStatus, jqXHR) {
                          var json = JSON.stringify(data);
                          console.log(json);

                      }
                  });
              }
          });*/


        fetch('https://api.myjson.com/bins/14h1i6', {
                mode: 'cors'
            })
            .then(response => response.json())
            .then(data => {
                listUser = JSON.parse(JSON.stringify(data));;
                console.log(listUser);
            });

        $.ajax({
            url: 'https://api.myjson.com/bins/14h1i6',
            type: "PUT",
            headers: {
                "accept": "application/json",
                "Access-Control-Allow-Origin": '*',
                "Content-type": "application/json"

            },
            data: listUser,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data, textStatus, jqXHR) {
                listUser.push() = JSON.stringify(data);
                console.log(json);

            }
        });





    };



    const form = document.getElementsByClassName('contact-form')[0];
    form.addEventListener('submit', handleFormSubmit);

});