// Nav que se esconde en mobile 
if (document.getElementById("header_mobile"))
{
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("header_mobile").style.top = "0";
  } else {
    document.getElementById("header_mobile").style.top = "-70px";
  }
  prevScrollpos = currentScrollPos;
}
}


// Menú desplegable en mobile
function openNav() {
    document.getElementById("mySidenav").style.width = "50vw";
    document.getElementById("main").style.marginLeft = "50vw";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  }
  
  /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "#E6E6E9";
  }
