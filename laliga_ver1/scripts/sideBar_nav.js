


function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  setTimeout(() => {
    document.getElementById("mySidenav").style.width = "0";
  }, 5000);
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";

}
