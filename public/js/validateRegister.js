$(document).ready(function() {
  var countriesSelect = document.getElementById("country");
  var citiesSelect = document.getElementById("cities");
  var citiesCol = document.getElementById("citiesCol");

  function fetchCall(url, callback) {
    window
      .fetch(url)
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        callback(data);
      })
      .catch(function(error) {
        console.log(error);
      });
  }

  function fillCitiesSelect(data) {
    for (var oneCity of data) {
      citiesSelect.innerHTML += "<option>" + oneCity.state + "</option>";
    }
  }

  function fillCountrySelect(data) {
    for (var oneCountrie of data) {
      countriesSelect.innerHTML += "<option>" + oneCountrie.name + "</option>";
    }
  }

  fetchCall("https://restcountries.eu/rest/v2/all", fillCountrySelect);

  countriesSelect.onchange = function() {
    if (this.value === "Argentina") {
      citiesCol.classList.remove("d-none");
      fetchCall(
        "https://dev.digitalhouse.com/api/getProvincias",
        fillCitiesSelect
      );
    } else {
      citiesCol.classList.add("d-none");
      citiesSelect.innerHTML = "";
    }
  };

  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    var botonPerfil = document.getElementsByClassName("custom-file-upload")[0];
    var extension = fileName.split(".").pop();
    console.log(filename)
    console.log(botonPerfil)
    console.log(extension)

    if (extension == "jpg" || extension == "jpeg" || extension == "png") {
      botonPerfil.innerHTML = fileName;
      botonPerfil.style.border = "1px solid green";
    } else {
      botonPerfil.innerHTML = "Solo se aceptan png, jpg o jpeg";
      botonPerfil.style.border = "1px solid red";
    }
  });
});
