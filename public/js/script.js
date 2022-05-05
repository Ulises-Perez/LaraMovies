/* JS UNIVERSAL */
/*
function toggleTheme() {
  var cuerpoweb = document.body;
  cuerpoweb.classList.toggle("oscuro");
}
*/
/* JS UNIVERSAL */

$(function() {

  $('#sel-video').on('change', function() {
    var srcVideo = $(this).val();
      $('#demo-player').attr('src', srcVideo);
  });

});


/* JS NAVBAR */
var num = 1; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.menu').addClass('bg-back-oficial');
        $('.menu').addClass('border-b');
        $('.menu').addClass('border-gray-500');
        $('.menu').addClass('border-opacity-25');
    } else {
        $('.menu').removeClass('bg-back-oficial');
        $('.menu').removeClass('border-b');
        $('.menu').removeClass('border-gray-500');
        $('.menu').removeClass('border-opacity-25');
    }
});

function toggleNavbar(collapseID) {
  document.getElementById(collapseID).classList.toggle("hidden");
  document.getElementById(collapseID).classList.toggle("flex");
}

function toggleSearchMobile() {
  document.getElementById("searchMobile").classList.toggle("hidden");
  document.getElementById("searchMobile").classList.toggle("flex");
  document.getElementById("btn-lupa").classList.toggle("fa-search");
  document.getElementById("btn-lupa").classList.toggle("fa-times");
}

function closeAlert(event){
  let element = event.target;
  while(element.nodeName !== "BUTTON"){
    element = element.parentNode;
  }
  element.parentNode.parentNode.removeChild(element.parentNode);
}

function openDropdown(event, dropdownID) {
  let element = event.target;
  while (element.nodeName !== "BUTTON") {
    element = element.parentNode;
  }
  var popper = new Popper(element, document.getElementById(dropdownID), {
    placement: "bottom-start",
  });
  document.getElementById(dropdownID).classList.toggle("hidden");
  document.getElementById(dropdownID).classList.toggle("block");
}

function toggleModal(modalID) {
  document.getElementById(modalID).classList.toggle("hidden");
  document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
  document.getElementById(modalID).classList.toggle("flex");
  document.getElementById(modalID + "-backdrop").classList.toggle("flex");
  $("#modal-id iframe").attr("src", $("#modal-id iframe").attr("src"));
}

function cerrarModalVideo(modalID){
  document.getElementById(modalID).classList.toggle("hidden");
  document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
  document.getElementById(modalID).classList.toggle("flex");
  document.getElementById(modalID + "-backdrop").classList.toggle("flex");
  $("#modal-id iframe").attr("src", $("#modal-id iframe").attr("src"));
  //location.reload();
}

function openPopover(event, popoverID) {
  let element = event.target;
  while (element.nodeName !== "BUTTON") {
    element = element.parentNode;
  }
  var popper = new Popper(element, document.getElementById(popoverID), {
    placement: "bottom",
  });
  document.getElementById(popoverID).classList.toggle("hidden");
}

/*
var campo = $('#id_del_input').val();

if(campo === ''){
  alert("El campo esta vacío");
 return false;
 document.getElementById("myDIV").style.display = "none";
 }else{
  //Las validaciones que necesitas hacer
 }
 */

/* JS NAVBAR */

/* JS SLIDERS - HERO */
$(".owl-carousel-top").owlCarousel({
  loop: true,
  margin: 10,
  animateOut: "fadeOut",
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 3,
    },
    700: {
      items: 4,
    },
    1000: {
      items: 6,
    },
  },
});

$(".owl-carousel-1").owlCarousel({
  loop: true,
  margin: 10,
  animateOut: "fadeOut",
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

$(".owl-carousel-generos").owlCarousel({
  loop: true,
  margin: 10,
  responsive: {
    0: {
      items: 3,
    },
    600: {
      items: 4,
    },
    1000: {
      items: 6,
    },
  },
});

$(".owl-carousel-2").owlCarousel({
  loop: false,
  margin: 10,
  lazyLoad:true,
  animateOut: "fadeOut",
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 2,
    },
    376:{
      items: 3,
    },
    600: {
      items: 6,
    },
    1000: {
      items: 8,
    },
  },
});

$(".owl-carousel-3").owlCarousel({
  loop:false,
  margin: 10,
  lazyLoad:true,
  animateOut: "fadeOut",
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 4,
    },
  },
});

$(".owl-carousel-options").owlCarousel({
  loop:false,
  margin: 10,
  lazyLoad:true,
  animateOut: "fadeOut",
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});
/* JS SLIDERS - HERO */

function changeAtiveTab(event,tabID){
  let element = event.target;
  while(element.nodeName !== "A"){
    element = element.parentNode;
  }
  ulElement = element.parentNode.parentNode;
  aElements = ulElement.querySelectorAll("li > a");
  tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
  for(let i = 0 ; i < aElements.length; i++){
    aElements[i].classList.remove("text-white");
    aElements[i].classList.remove("bg-red-500");
    aElements[i].classList.add("text-white");
    aElements[i].classList.add("bg-back-oficial");
    tabContents[i].classList.add("hidden");
    tabContents[i].classList.remove("block");
  }
  element.classList.remove("text-white");
  element.classList.remove("bg-back-oficial");
  element.classList.add("text-white");
  element.classList.add("bg-red-500");
  document.getElementById(tabID).classList.remove("hidden");
  document.getElementById(tabID).classList.add("block");
}

$('.tilt-posters').tilt({
  scale: 1.04,
  perspective: 1000
})

$(document).ready(function(){
  $("#toogleA").on( "click", function() {	 
    $('#lista-peliculas').toggle();
    $('#lista-series').toggle();
     });
});
