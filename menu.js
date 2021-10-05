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

