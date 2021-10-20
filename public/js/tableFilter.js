function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("lstatus");
  filter = input.value;
  table = document.getElementById("leaveReqTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}