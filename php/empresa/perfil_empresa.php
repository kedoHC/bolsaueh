<?php 
session_start();
if(!isset($_SESSION["session-empresa"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php'>";
  exit;
}
include '../../inc/cabecera_comun_empresa.inc'; 
include '../../inc/config.inc'; 

$id = $_SESSION['id_empresa'];
$peticion_empresas = "SELECT * FROM empresas WHERE id_empresa = '$id'";
$resultado_empresas = mysqli_query($conexion, $peticion_empresas);

while($fila_empresas = mysqli_fetch_array($resultado_empresas)){
    echo '
<div id="perfil-empresa">
    <div class="container">
        <div class="row">
          <div id="logo" class="col-xs-6">
				    <img class="img-responsive center-block" src="../../img/logos/logo_empresa_1.jpg">
	        </div>
            <div id="info" class="col-xs-6">
            	<div class="row">
            		<div class="col-xs-4"></div>
            		<div class="col-xs-4">
            			<img class="img-responsive center-block" src="../../img/logos/logo_empresa_1.jpg">
            		</div>
            		<div class="col-xs-4"></div>
            	</div>
            	<div id="nombre-empresa" class="row">
            		<div class="col-xs-12">
            			<h3 class="text-center">'.$fila_empresas["empresa"].'</h3>
            		</div>
            	</div>
            	<div id="contacto" class="row">
            		<div id="direccion" class="col-xs-3"><p class="text-center"><span class="fa fa-map-marker"></span></p></div>
            		<div id="telefono" class="col-xs-3"><p class="text-center"><span  class="fa fa-phone"></span></p></div>
            		<div id="facebook" class="col-xs-3"><p class="text-center"><span  class="fa fa-facebook-official"></span></p></div>
            		<div id="email" class="col-xs-3"><p class="text-center"><span  class="fa fa-envelope"></span></p></div>
            	</div>
                <div id="contacto-datos" class="row">
                      	<div  class="col-xs-12 direccion"><p class="text-center">
                      		'.$fila_empresas["direccion_empresa"].'
                      	</p></div>
                      	<div  class="col-xs-12 telefono"><p class="text-center">
                      		'.$fila_empresas["telefono_empresa"].'
                      	</p></div>
                      	<div  class="col-xs-12 facebook"><p class="text-center">
                      		'.$fila_empresas["facebook_empresa"].'
                      	</p></div>
                      	<div  class="col-xs-12 email"><p class="text-center">
                      		'.$fila_empresas["email_empresa"].'
                      	</p></div>
                </div>
                <div id="datos-empresa" class="row">
                      	<div class="col-xs-6 datos">
                      		<h4>RFC</h4>
                      		<p>'.$fila_empresas["rfc"].'</p>
                      		<h4>CIUDAD</h4>
                      		<P>'.$fila_empresas["ciudad_empresa"].'</P>	
                      		<h4>ESTADO</h4>
                      		<p>'.$fila_empresas["estado_empresa"].'</p>
                      	</div>
                      	<div class="col-xs-6 datos">
                      		<h4>SECTOR</h4>
                      		<p>'.$fila_empresas["sector"].'</p>
                      		<h4>GIRO</h4>
                      		<p>'.$fila_empresas["giro"].'</p>
                      	</div>
                      </div>      
            </div>
        </div>
        <div id="opciones-perfil" class="row">
          <div class="col-xs-5"></div>
          <div class="col-xs-2">
            <a href="salir_sistema.php"><button class="btn btn-lg boton-opcion">Salir del sistema</button></a>
          </div>
          <div class="col-xs-2">
            <a href="editar_perfil.php"><button class="btn btn-lg boton-opcion">Editar perfil</button></a>
          </div>
          <div class="col-xs-3">
            <a href="editar_contra.php"><button class="btn btn-lg boton-opcion">Cambiar contraseña</button></a>
          </div>
        </div>
    </div>
</div>
';
}
include '../../inc/pie_comun_empresa.inc'; ?>