function blockChars(event) {
    let keyCode = event.keyCode || event.which;
    let input = event.target;
  
    // Check if the key code is for a number (0-9) or the Backspace key (8)
    if ((keyCode >= 48 && keyCode <= 57) || keyCode === 8) {
      // Check if the entered character is 0 and it's the first character in the input
      if (keyCode === 48 && input.value.length === 0) {
        event.preventDefault();
        return false;
      }
      
      return true;
    }
    
    // Prevent any other character from being entered
    event.preventDefault();
    return false;
}
  
  let inputElement = document.getElementById("js-quantity");
  
  inputElement.addEventListener("blur", function(event) {
    if (event.target.value.length === 0) {
      event.target.value = "1";
    }
});
  

function increaseQuantity() {
    let element = document.getElementById('js-quantity');
    let quantity = parseInt(element.value);

    if (!isNaN(quantity)) {
        if (quantity > 98) {
            return;
        }
        else {
            element.value = quantity + 1;
        }
    }
}

function decreaseQuantity() {
    let element = document.getElementById('js-quantity');
    let quantity = parseInt(element.value);

    if (!isNaN(quantity)) {
        if (quantity < 2) {
            return;
        }
        else {
            element.value = quantity - 1;
        }
    }
}

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
var postCodeInput = document.getElementById("post-code");

// Add event listener to the select element
valueSelect.addEventListener("change", function() {
  if (valueSelect.value === "1") {
    addressInput.style.display = "none";
    houseNumberInput.style.display = "none";
    cityInput.style.display = "none";
    postCodeInput.style.display = "none";
  } else {
    addressInput.style.display = "block";
    houseNumberInput.style.display = "block";
    cityInput.style.display = "block";
    postCodeInput.style.display = "block";
  }
});