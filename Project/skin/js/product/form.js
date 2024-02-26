document.addEventListener("DOMContentLoaded", function () {
  setStatus();
});

function setStatus() {
  var status_element = document.getElementsByClassName("status");
  for (let i = 0; i < status_element.length; i++) {
    if (status == status_element[i].innerHTML) {
      status_element[i].selected = "selected";
    }
  }
}
