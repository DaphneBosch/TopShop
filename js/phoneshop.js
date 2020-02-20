function showCarts() {
  if(document.phoneshop.cart_buybttn.checked) {
    document.getElementById("cart").style.visibility = "visible";
    document.getElementById("rows").style.visibility = "visible";
  } else {
    document.getElementById("cart").style.visibility = "hidden";
    document.getElementById("rows").style.visibility = "hidden";
  }
  let rows = "<table><th width='120'>Name</th><th>Brand</th>" +
      "<th>Price</th><th>Amount</th><th>Delete</th>";
  let  row = "";
  loop = document.getElementById("loop2").value;
  for(x=0; x<loop; x++) {
    if(document.getElementById("stock[" + x + "]").value == 0) {
      continue;
    }
    row = "<tr>";
    namephone = document.getElementById("namephone[" + x + "]").value;
    brand = document.getElementById("brand["+ x + "]").value;
    price = document.getElementById("price["+ x + "]").value;
    stock = document.getElementById("stock["+ x + "]").value;
    row += "<td width='120'>" + namephone + "</td>" +
        "<td>" + brand + "</td>" + "<td>" + price + "</td>" +
        "<td>" + stock + "</td>" + "<td onclick='deleteRows(" + x +");'>&#10008;</td></tr>";
    rows += row;
  }
  rows += "</table>";
  document.getElementById("rows").innerHTML = rows;

}

function deleteRows(id) {
  let del = confirm("Do you want to delete " + document.getElementById("namephone["+ id + "]").value + "?");
  if(del) {
    document.getElementById("stock[" + id + "]").value = 0;
    showCarts();
  }
}
