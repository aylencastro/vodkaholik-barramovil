// Nav que se esconde en mobile 
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("header_mobile").style.top = "0";
  } else {
    document.getElementById("header_mobile").style.top = "-11vh";
  }
  prevScrollpos = currentScrollPos;
}


// Menú desplegable en mobile
function openNav() {
    document.getElementById("mySidenav").style.width = "45vw";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
