// Get the select and input elements
var numberSelect = document.getElementById("select-phone");
var phoneInput = document.getElementById("phone");

// Add event listener to the select element
numberSelect.addEventListener("change", function() {
  if (numberSelect.value === "1") {
    phoneInput.style.display = "none"; // Hide the input
  } else {
    phoneInput.style.display = "block"; // Show the input
  }
});

// Get the select and input elements
var valueSelect = document.getElementById("select-address");
var addressInput = document.getElementById("address");
var houseNumberInput = document.getElementById("house-number");
var cityInput = document.getElementById("city");
var countyInput = document.getElementById("county");
var postCodeInput = document.getElementById("post-code");

// Add event listener to the select element
valueSelect.addEventListener("change", function() {
  if (valueSelect.value === "1") {
    addressInput.style.display = "none";
    houseNumberInput.style.display = "none";
    cityInput.style.display = "none";
    countyInput.style.display = "none";
    postCodeInput.style.display = "none";
  } else {
    addressInput.style.display = "block";
    houseNumberInput.style.display = "block";
    cityInput.style.display = "block";
    countyInput.style.display = "block";
    postCodeInput.style.display = "block";
  }
});