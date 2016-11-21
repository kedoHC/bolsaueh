/********************************************
*** Menu "sticky" y Navegación con Scroll ***
********************************************/
$(document).ready(function() {
  var menu = $('#divmenu');
  var contenedor = $('#menu-contenedor');
  var menu_offset = menu.offset();
  $(window).on('scroll', function() {
    if($(window).scrollTop() > menu_offset.top) {
      menu.addClass('menu-fijo');
    } else {
      menu.removeClass('menu-fijo');
    }
  });
   $("#ir-inicio").click(function() {
    $('html,body').animate({scrollTop: $("#cabecera").offset().top}, 1000);
  });
   
   $(".direccion, .telefono, .facebook, .email").hide();

   $("#direccion").mouseover(function(){
      $(".direccion").show();
    });
    $("#direccion").mouseout(function(){
      $(".direccion").hide();
    });

    $("#telefono").mouseover(function(){
      $(".telefono").show();
    });
    $("#telefono").mouseout(function(){
      $(".telefono").hide();
    });

    $("#facebook").mouseover(function(){
      $(".facebook").show();
    });
    $("#facebook").mouseout(function(){
      $(".facebook").hide();
    });

    $("#email").mouseover(function(){
      $(".email").show();
    });
    $("#email").mouseout(function(){
      $(".email").hide();
    });
});

/********************************************
************** Scroll Reveal ****************
********************************************/
window.sr = ScrollReveal({ reset: true });
/*Scroll Reveal Fabricantes*/
sr.reveal('#escudo', { duration: 1700, origin:'bottom', distance: '100px' });
/*SR titulos*/
sr.reveal('#titulo_bolsa_ueh', { duration: 1700, origin:'bottom', distance: '100px'});
/*SR redes*/
sr.reveal('#fb', { duration: 1700, origin:'bottom', distance: '100px', delay: 1100 });
sr.reveal('#twi', { duration: 1700, origin:'bottom', distance: '100px', delay: 1300 });
sr.reveal('#ins', { duration: 1700, origin:'bottom', distance: '100px', delay: 1500 });
sr.reveal('#yt', { duration: 1700, origin:'bottom', distance: '100px', delay: 1700 });
/*SR perfil empresa*/
sr.reveal('#logo', { duration: 1700, origin:'bottom', distance: '100px', delay: 1100 });
sr.reveal('#info', { duration: 1700, origin:'bottom', distance: '100px', delay: 1100 });
/*SR ofertas*/
sr.reveal('.oferta', { duration: 1000, origin:'bottom', distance: '100px'});
sr.reveal('.boton-opcion', { duration: 1700, origin:'bottom', distance: '100px' });

/*SR aplicantes*/
sr.reveal('.aplicante', { duration: 1000, origin:'top', distance: '100px'});
sr.reveal('#sin-aplicantes', { duration: 1000, origin:'top', distance: '100px'});






