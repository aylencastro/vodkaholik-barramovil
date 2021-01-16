// imgs (PONER IMÁGENES REALES)
var imgSrc ={
  'eventos': ["event.png", "event2.png", "https://via.placeholder.com/600/92c952", "https://via.placeholder.com/600/771796", "https://via.placeholder.com/600/24f355", "https://via.placeholder.com/600/d32776"],

  'tragos': [
    {"nombre": "Lynchburg Lemonade", "src": "lynch.png"},
    {"nombre": "trago 2", "src": "https://via.placeholder.com/600/66b7d2"},
    {"nombre": "trago 3", "src": "https://via.placeholder.com/600/197d29"},
    {"nombre": "trago 4", "src": "https://via.placeholder.com/600/61a65"},
    {"nombre": "trago 5", "src": "https://via.placeholder.com/600/f9cee5"},
    {"nombre": "trago 6", "src": "https://via.placeholder.com/600/9c184f"},
    {"nombre": "trago 7", "src": "https://via.placeholder.com/600/1fe46f"},
    {"nombre": "trago 8", "src": "https://via.placeholder.com/600/56acb2"}
  ]
};

//función que muestra diferentes img: display random de imágenes
function mostrarImg(){

  //que tome cada <img> de class 'picture', dentro del div "events" que contenga las clases "pics_events". Cada una de esas img es un EVENTO.
  var eventosDoc = document.querySelectorAll('div#events > div.pics_events');
  for (evento of eventosDoc)
  {
    let numero = imgSrc.eventos[Math.floor(Math.random()*imgSrc.eventos.length)];
    evento.style.backgroundImage = `url(${imgSrc.eventos[numero]})`;
  }
  
  //lo mismo pero para los tragos. Cada una de esas img es un TRAGO.
  var tragosDoc = document.querySelectorAll('div#drinks > div.pics_drinks');
  for (trago of tragosDoc)
  {
    let numero = imgSrc.tragos[Math.floor(Math.random()*imgSrc.tragos.length)];
    trago.style.backgroundImage = `url(${imgSrc.tragos.src[numero]})`;
    trago.querySelector('.name').innerHTML = `<p>${imgSrc.tragos.nombre[numero]}</p>`;
  }

}

mostrarImg();

//que cambien las img cada 8 segundos
setTimeout(mostrarImg, 8000);


// Nav que se esconde en mobile 
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("header_mobile").style.top = "0";
    document.querySelector(".consult").style.left = "0";
    document.querySelector(".wp").style.left = "0";
  } else {
    document.getElementById("header_mobile").style.top = "-11vh";
    document.querySelector(".consult").style.left = "-25vw";
    document.querySelector(".wp").style.left = "-25vw";
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
