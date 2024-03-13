document.addEventListener("DOMContentLoaded", function () {
  populateFieldBasedOnBillingAddress();
  fillAddressForm();
});

function populateFieldBasedOnBillingAddress() {
  let checkbox = document.getElementById("checkbox");

  if (checkbox.checked) {
    checkbox.checked = false;
    console.log(123);
  }
  if (!checkbox.checked) {
    checkbox.checked = true;
  }
}

function fillAddressForm() {
  let addressElement = document.getElementsByClassName("address-card");

  for (let element of addressElement) {
    element.addEventListener("click", () => {
      let json = JSON.parse(element.getAttribute("data-json"));
      for (let key in json) {
        document.getElementById(key).value = json[key];
      }
    });
  }
}
