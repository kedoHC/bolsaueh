<?php include 'inc/cabecera_comun.inc'; ?>
<!-- Contenedor de imagenes Slider Cabecera -->
<header id="inicio">
<ul class="cb-slideshow parallax">
<li><span></span></li>
<li><span></span></li>
<li><span></span></li>
<li><span></span></li>
<li><span></span></li>
<li><span></span></li>
</ul>
<div id="escudo" class="container">
<div class="row">
    <div class="col-xs-12">
        <img class="center-block"  src="img/escudo.png"/>
    </div>
</div>
</div>
<div class="container titulo">
<div class="row">
    <div class="col-xs-12">
        <h3 id="titulo_ueh" class="text-center">UNIVERSIDAD EUROHISPANOAMERICANA</h3>
        <h1 id="titulo_bolsa" class="text-center">BOLSA DE TRABAJO</h1>
    </div>
</div>
</div>
<div id="redes" class="container">
<div class="row">
    <div class="col-xs-12">
        <img id="fb" src="img/fb.png">
        <img id="twi" src="img/twi.png">
        <img id="ins" src="img/ins.png">
        <img id="yt" src="img/yt.png">
    </div>
</div>
</div>
</header>
<div id="menu" id="menu-contenedor">
<div class="container" id="divmenu">
    <div class="row" >
        <div class="col-xs-1"></div>
        <div id="btn-inicio" class="menu-item col-xs-2 text-right"><p>Inicio</p></div>
        <div id="btn-sesion" class="menu-item col-xs-2 text-right"><p>Iniciar sesión</p></div>
        <div class="col-xs-2"><img id="logo-menu" class="img-responsive center-block" src="img/escudoN.png"></div>
        <div id="btn-registrate" class="menu-item col-xs-2"><p>Registrate</p></div>
        <div id="btn-informacion" class="menu-item col-xs-2"><p>Información</p></div>
        <div class="col-xs-1"></div>
    </div>
</div>
</div>
<div id="mensaje">
<div class="container">
    <div class="row">
        <div id="mensaje-texto" class="col-xs-12">
              <p>"El hecho de que no estes donde quieras estar,</p>          
              <p>deberia ser suficiente motivación"</p>
              <p>-Anonimo</p>
        </div>
    </div>
</div>
</div>
<div id="titulo-log">
  <div class="container">
      <div class="row">
            <div class="col-xs-3"></div>
          <div class="col-xs-6">
            <p class="titulo-log">Bolsa de Trabajo UEH</p>
            <hr class="br-titulo-log">          
            <p>Si ya tienes cuenta con nosotros ingresa con tu noombre de usuario y contraseña. Si no es así y quieres ser parte de nuestra bolsa de trabajo, registrate seleccionando como quieres pertenecer, como egresado o como empresa.</p>
          </div>
            <div class="col-xs-3"></div>
      </div>
  </div>
</div> 
<div id="log">
   <div class="container">
       <div class="row">
           <div class="col-xs-2"></div>
           <div id="log-registrado" class="col-xs-4 text-center">
               <p id="titulo-sesion">Iniciar Sesión</p>
               <form name="form-registrado" method="POST" action="php/log_user.php">   
                    <input type="text" name="usuario" placeholder="Usuario"><br><br>
                    <input type="password" name="contra" placeholder="Contraseña"><br>
                    <input class="btn" type="submit" value="Ingresar">
               </form>
               <p id="olvide-contra"><a href="php/olvide_contra.php">Olvide mi contraseña</p></a>
           </div>
           <div id="log-registro" class="col-xs-4 text-center">
               <p id="titulo-registro">Registrate</p>
                <a href="php/registro_egresado.php#menu"><button id="btn-nuevo-egresado" class="btn">Egresado</button></a><br>
                <a href="php/registro_empresa.php#menu"><button id="btn-nueva-empresa" class="btn">Empresa</button></a>
                <p id="terminos"><a href="php/termycond.php">Terminos y condiciones</p></a>
           </div>
           <div class="col-xs-2"></div>
       </div>
   </div>
</div> 
<div id="descripcion">
   <div class="container">
       <div class="row">
           <div class="col-xs-12">
           <p id="titulo-descripcion">Bolsa de trabajo UEH</p>
           <hr class="br-titulo-log">
           <div class="row">
           <div class="col-xs-3"></div>
             <div class="col-xs-6">
               <p id="descripcion-texto" class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
             </div>
             <div class="col-xs-3"></div>
             </div>
           </div>
       </div>
   </div>
</div>
<div id="pie">
   <div class="container">
       <div class="row">
           <div class="col-xs-12">
              <p><span class="glyphicon glyphicon-copyright-mark"></span> 2016 Todos los derechos reservados</p>
              <p>Universidad Euro Hispanoamericana</p><br><br>
              <div class="row">
                <div class="col-xs-12">
                  <a style="cursor: pointer" id="ir-inicio">Ir al inicio</a>
                </div>
              </div>
           </div>
       </div>
   </div>
</div>
<?php include 'inc/pie_comun.inc'; ?>