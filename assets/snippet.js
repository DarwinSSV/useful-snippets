document.querySelectorAll(".table-cell").forEach(function(elm){
elm.addEventListener("click", function(e){
 //e.target.style.backgroundColor = 'red'; 
  var copyText = e.target.parentNode.previousSibling.textContent; 
   const el = document.createElement('textarea');
  el.value = copyText;
  document.body.appendChild(el);
  el.select();
  document.execCommand('copy');
  document.body.removeChild(el);

  if( el.value ) {
  /* Alert the copied text */
  //alert("Copied the text: " + el.value);
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
  
});

})