document.addEventListener("DOMContentLoaded", function () {
  setStatus();
  setCategory();
  // console.log(categoryId);
});

function setStatus() {
  var status_element = document.getElementsByClassName("status");
  for (let i = 0; i < status_element.length; i++) {
    if (status == status_element[i].innerHTML) {
      status_element[i].selected = "selected";
    }
  }
}

function setCategory() {
  var category_element = document.getElementsByClassName("category");
  for (let i = 0; i < category_element.length; i++) {
    if (categoryId == category_element[i].value) {
      category_element[i].selected = "selected";
    }
  }
}
