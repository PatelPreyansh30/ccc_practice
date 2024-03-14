document.addEventListener("DOMContentLoaded", function () {
  populateFieldBasedOnBillingAddress();
  fillAddressForm();
  countryAJAX();
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

function countryAJAX() {
  let billingSelect = document.getElementById("billing_country");
  let billingRegion = document.getElementById("billing_region");
  let json = JSON.parse(billingSelect.getAttribute("country"));

  let billingRegionId = 1;
  for (let key in json[billingRegionId]) {
    let option = document.createElement("option");
    option.value = key;
    option.innerHTML = json[billingRegionId][key];
    billingSelect.appendChild(option);
  }

  billingRegion.addEventListener("change", () => {
    billingSelect.innerHTML = "";
    let billingRegionId = billingRegion.value;
    for (let key in json[billingRegionId]) {
      let option = document.createElement("option");
      option.value = key;
      option.innerHTML = json[billingRegionId][key];
      billingSelect.appendChild(option);
    }
  });

  let shippingSelect = document.getElementById("shipping_country");
  let shippingRegion = document.getElementById("shipping_region");
  let shippingJson = JSON.parse(shippingSelect.getAttribute("country"));

  let shippingRegionId = 1;
  for (let key in json[shippingRegionId]) {
    let option = document.createElement("option");
    option.value = key;
    option.innerHTML = json[shippingRegionId][key];
    shippingSelect.appendChild(option);
  }

  shippingRegion.addEventListener("change", () => {
    shippingSelect.innerHTML = "";
    let shippingRegionId = shippingRegion.value;
    for (let key in shippingJson[shippingRegionId]) {
      let option = document.createElement("option");
      option.value = key;
      option.innerHTML = shippingJson[shippingRegionId][key];
      shippingSelect.appendChild(option);
    }
  });
}
