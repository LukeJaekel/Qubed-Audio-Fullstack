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