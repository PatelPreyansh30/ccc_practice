document.addEventListener("DOMContentLoaded", () => {
  setStatus();
});

function setStatus() {
  let card = document.getElementById("set-status");

  card.innerHTML = `
                <div class="order-tracking">
                    <span class="is-complete"></span>
                    <p>Pending</p>
                </div>
                <div class="order-tracking">
                    <span class="is-complete"></span>
                    <p>Shipped</p>
                </div>
                <div class="order-tracking">
                    <span class="is-complete"></span>
                    <p>Completed</p>
                </div>
  `;
  let status = card.getAttribute("status");
  if (status == "pending") {
    card.innerHTML = `
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Pending</p>
                </div>
                <div class="order-tracking">
                    <span class="is-complete"></span>
                    <p>Shipped</p>
                </div>
                <div class="order-tracking">
                    <span class="is-complete"></span>
                    <p>Completed</p>
                </div>
  `;
  } else if (status == "shipped") {
    card.innerHTML = `
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Pending</p>
                </div>
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Shipped</p>
                </div>
                <div class="order-tracking">
                    <span class="is-complete"></span>
                    <p>Completed</p>
                </div>
  `;
  } else if (status == "declined") {
    card.innerHTML = `
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Pending</p>
                </div>
                <div class="order-tracking not-completed">
                    <span class="is-complete"></span>
                    <p>Declined</p>
                </div>
                <div class="order-tracking">
                    <span class="is-complete"></span>
                    <p>Completed</p>
                </div>
  `;
  } else if (status == "cancelled") {
    card.innerHTML = `
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Pending</p>
                </div>
                <div class="order-tracking not-completed">
                    <span class="is-complete"></span>
                    <p>Cancelled</p>
                </div>
                <div class="order-tracking">
                    <span class="is-complete"></span>
                    <p>Completed</p>
                </div>
  `;
  } else if (status == "refunded") {
    card.innerHTML = `
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Pending</p>
                </div>
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Completed</p>
                </div>
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Refunded</p>
                </div>
  `;
  } else if (status == "completed") {
    card.innerHTML = `
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Pending</p>
                </div>
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Shippied</p>
                </div>
                <div class="order-tracking completed">
                    <span class="is-complete"></span>
                    <p>Completed</p>
                </div>
  `;
  }
}
