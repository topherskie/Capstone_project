// Get the modal
const modal1 = document.getElementById('id01');
const modal2 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
      modal1.style.display = "none";
  }
}


window.onclick = function(event) {
  if (event.target == modal2) {
      modal2.style.display = "none";
  }
}
