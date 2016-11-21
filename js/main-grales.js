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
/*SR mensaje*/
sr.reveal('#mensaje-texto', { duration: 3000, origin:'bottom', distance: '100px'});
/*SR log (secciones)*/
sr.reveal('#titulo-log', { duration: 1000, origin:'bottom', distance: '100px' });
sr.reveal('#log-registrado', { duration: 2000, origin:'left', distance: '50px' });
sr.reveal('#log-registro', { duration: 2000, origin:'right', distance: '50px' });
/*SR descripción*/
sr.reveal('#descripcion', { duration: 2000, origin:'bottom', distance: '200px' });
