function showCart() {
  if(document.webshop.cart_buybttn.checked) {
    document.getElementById("cart").style.visibility = "visible";
    document.getElementById("rows").style.visibility = "visible";
  } else {
    document.getElementById("cart").style.visibility = "hidden";
    document.getElementById("rows").style.visibility = "hidden";
  }
  let rows = "<table><th width='120'>Name</th><th>Brand</th>" +
      "<th>Price</th><th>Amount</th><th>Delete</th>";
  let  row = "";
  loop = document.getElementById("loop").value;
  for(x=0; x<loop; x++) {
    if(document.getElementById("stock[" + x + "]").value == 0) {
      continue;
    }
    row = "<tr>";
    namelaptop = document.getElementById("namelaptop[" + x + "]").value;
    brand = document.getElementById("brand["+ x + "]").value;
    price = document.getElementById("price["+ x + "]").value;
    stock = document.getElementById("stock["+ x + "]").value;
    row += "<td width='120'>" + namelaptop + "</td>" +
        "<td>" + brand + "</td>" + "<td>" + price + "</td>" +
        "<td>" + stock + "</td>" + "<td onclick='deleteRow(" + x +");'>&#10008;</td></tr>";
    rows += row;
  }
  rows += "</table>";
  document.getElementById("rows").innerHTML = rows;

}

function deleteRow(id) {
  let del = confirm("Do you want to delete " + document.getElementById("namelaptop["+ id + "]").value ||
      document.getElementById("namephone["+ id + "]").value + "?");
  if(del) {
    document.getElementById("stock[" + id + "]").value = 0;
    showCart();
  }
}
