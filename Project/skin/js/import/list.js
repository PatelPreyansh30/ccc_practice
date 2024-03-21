function importData() {
  let type = document.getElementById("import-type").getAttribute("type");
  let pending = document.getElementById("import-type").getAttribute("pending");
  let pendingCount = document.getElementById("pending-data");

  let count = 0;
  for (let i = 0; i < parseInt(pending); i++) {
    let xmlObj = new XMLHttpRequest();
    xmlObj.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        if (this.responseText === "true") {
          count += 1;
          document.getElementById(
            "progressbar"
          ).innerHTML = `(${count}/${pending})`;
          pendingCount.innerHTML = parseInt(pending) - parseInt(count);
        }
      }
    };
    xmlObj.open("get", `import?type=${type}`);
    xmlObj.send();
  }
}
