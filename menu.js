function computeJava() {
  let javaQty = document.getElementById("javaQty").value;
  let subtotal = 0;
  subtotal = javaQty * 2.0;
  document.getElementById("javaCost").innerHTML = subtotal;
  computeTotal();
}

function computeCafe() {
  let cafeQty = document.getElementById("cafeQty").value;
  let subtotal = 0;
  if (document.getElementById("singleCafeRadio").checked) {
    subtotal = cafeQty * 2;
  } else if (document.getElementById("doubleCafeRadio").checked) {
    subtotal = cafeQty * 3;
  }
  document.getElementById("cafeCost").innerHTML = subtotal;
  computeTotal();
}

function computeIced() {
  let icedQty = document.getElementById("icedQty").value;
  let subtotal = 0;
  if (document.getElementById("singleIcedRadio").checked) {
    subtotal = icedQty * 4.75;
  } else if (document.getElementById("doubleIcedRadio").checked) {
    subtotal = icedQty * 5.75;
  }
  document.getElementById("icedCost").innerHTML = subtotal;
  computeTotal();
}

function computeTotal() {
  let total = 0;
  let cafeCost = Number(document.getElementById("cafeCost").innerHTML);
  let javaCost = Number(document.getElementById("javaCost").innerHTML);
  let icedCost = Number(document.getElementById("icedCost").innerHTML);
  total = cafeCost + javaCost + icedCost;
  document.getElementById("total").innerHTML = total;
}

function editJava() {
  console.log("CLICKED");
  console.log(document.getElementById("javaRadio").checked);
  if (document.getElementById("javaRadio").checked) {
    document.getElementById("javaForm").innerHTML = `
    <label>New Price: </label>
    <input type="number" size="3" maxlength="4" min="0" name="updatedJavaPrice" oninput="this.value = Math.abs(this.value)">
    `;
  } else {
    document.getElementById("javaForm").innerHTML = "";
  }
}

function editCafe() {
  console.log("CLICKED");
  console.log(document.getElementById("cafeRadio").checked);
  if (document.getElementById("cafeRadio").checked) {
    document.getElementById("cafeForm").innerHTML = `
      <div>
      <label>New Price(Single): 
      </div>
      <input type="number" size="3" maxlength="4" min="0" name="updatedCafeSinglePrice" oninput="this.value = Math.abs(this.value)">
      </label>
      <div>
      <label>New Price(Double): 
      <input type="number" size="3" maxlength="4" min="0" name="updatedCafeDoublePrice" oninput="this.value = Math.abs(this.value)"></label>
      </div>`;
  } else {
    document.getElementById("cafeForm").innerHTML = "";
  }
}
function editIced() {
  console.log("CLICKED");
  console.log(document.getElementById("icedRadio").checked);
  if (document.getElementById("icedRadio").checked) {
    document.getElementById("icedForm").innerHTML =
      '<label>New Price(Single): </label><input type="number" size="3" maxlength="4" min="0" name="updatedIcedSinglePrice" ><label>New Price(Double): </label><input type="number" size="3" maxlength="4" min="0" name="updatedIcedDoublePrice">';
  } else {
    document.getElementById("icedForm").innerHTML = "";
  }
}
