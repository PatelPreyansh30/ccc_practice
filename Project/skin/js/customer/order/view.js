document.addEventListener("DOMContentLoaded", () => {
  setStatusClass();
});

function setStatusClass() {
  let statusTag = document.getElementById("order-status");
  let status = statusTag.getAttribute("status");

  if (status == "pending" || status == "shipped") {
    statusTag.setAttribute("class", "half-completed");
  } else if (status == "completed" || status == "refunded") {
    statusTag.setAttribute("class", "completed");
  } else if (status == "cancelled" || status == "declined") {
    statusTag.setAttribute("class", "not-completed");
  }
}
