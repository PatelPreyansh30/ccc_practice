document.addEventListener("DOMContentLoaded", () => {
  setStatusClass();
});

function setStatusClass() {
  let statusTag = document.getElementsByClassName("order-status");

  for (let element of statusTag) {
    let status = element.getAttribute("status");

    if (status == "pending" || status == "shipped") {
      element.setAttribute("class", "order-status half-completed");
    } else if (status == "completed" || status == "refunded") {
      element.setAttribute("class", "order-status completed");
    } else {
      element.setAttribute("class", "order-status not-completed");
    }
  }
}
