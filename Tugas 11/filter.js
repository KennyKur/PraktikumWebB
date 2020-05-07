function myFunction() {

  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('filter');
  filter = input.value.toUpperCase();
  ul = document.getElementById("list");
  li = ul.getElementsByTagName('li');

  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
function sortListDir() {
   var list, i, switching, b, shouldSwitch, dir, switchcount = 0;
   list = document.getElementById("list");
   switching = true;

   dir = "asc";
   while (switching) {
   
     switching = false;
     b = list.getElementsByTagName("LI");
     
     for (i = 0; i < (b.length - 1); i++) {
      
       shouldSwitch = false;
       if (dir == "asc") {
         if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
           shouldSwitch = true;
           break;
         }
       } else if (dir == "desc") {
         if (b[i].innerHTML.toLowerCase() < b[i + 1].innerHTML.toLowerCase()) {
           shouldSwitch= true;
           break;
         }
       }
     }
     if (shouldSwitch) {

       b[i].parentNode.insertBefore(b[i + 1], b[i]);
       switching = true;
       switchcount ++;
     } else {
       if (switchcount == 0 && dir == "asc") {
         dir = "desc";
         switching = true;
       }
     }
   }
 }