<?php 
session_start();
if(!isset($_SESSION["session-empresa"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_empresa.inc'; 
session_start();
$id = $_SESSION["id_empresa"];
$empresa = $_SESSION["empresa"];
$rfc = $_SESSION["rfc"];
$direccion = $_SESSION["direccion"];
$estado = $_SESSION["estado"];
$ciudad = $_SESSION["ciudad"];
$sector = $_SESSION["sector"];
$giro = $_SESSION["giro"];
$contacto = $_SESSION["contacto"];
$puesto = $_SESSION["puesto_contacto"];
$telefono = $_SESSION["telefono"];
$email = $_SESSION["email"];
$facebook = $_SESSION["facebook"];
$usuario = $_SESSION["usuario_empresa"];
echo'
<div id="formulario-empresa">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            	<h1 class="text-center animated bounce">Editar perfil empresarial</h1>
            	<div class="row">
            		<div class="col-xs-6">
            			<form name="form-nuevo-empresa" action="actualizar_perfil.php" method="POST" autocomplete="off">
            			<h3>Nombre de la empresa</h3>
		            	<input type="text" name="empresa" placeholder="Nombre de la empresa" required="on" class="animated bounce" value="'.$empresa.'"><span>*</span><br>
		            	<h3>RFC</h3>
		            	<input type="text" name="rfc" placeholder="RFC" maxlength="15" required="on" class="animated bounce" value="'.$rfc.'"><span>*</span><br>
		            	<h3>Dirección</h3>
		            	<input type="text" name="direccion" placeholder="Dirección" maxlength="50" class="animated bounce" value="'.$direccion.'"><br>
		            	<h3>Ciudad</h3>
		            	<input type="text" name="ciudad" placeholder="Ciudad" maxlength="20" class="animated bounce" value="'.$ciudad.'"><br>
		            	<h3>Estado</h3>
		            	<input type="text" name="estado" placeholder="Estado" maxlength="50" class="animated bounce" value="'.$estado.'"><br>
		            	<h3>Sector</h3>
		            	<input type="text" name="sector" placeholder="Sector" maxlength="10" class="animated bounce" value="'.$sector.'"><br>
            		</div>
            		<div class="col-xs-6">
		            	<h3>Giro</h3>
						<input type="text" name="giro" placeholder="Giro" maxlength="20" class="animated bounce" value="'.$giro.'"><br>
		            	<h3>Nombre de contacto</h3>
		            	<input type="text" name="contacto" placeholder="Contacto de la empresa" required="on" class="animated bounce" value="'.$contacto.'"><span>*</span><br>
		            	<h3>Puesto en la empresa</h3>
		            	<input type="text" name="puesto" placeholder="Puesto en la empresa" class="animated bounce" value="'.$puesto.'"><br>
		            	<h3>Telefono</h3>
		            	<input type="text" name="telefono" placeholder="Telefono" class="animated bounce" value="'.$telefono.'"><br>
		            	<h3>Email</h3>
		            	<input type="text" name="email" placeholder="Email" required="on" class="animated bounce" value="'.$email.'"><span>*</span><br>
		            	<h3>Facebook</h3>
		            	<input type="text" name="facebook" placeholder="Facebook" maxlength="20" class="animated bounce" value="'.$facebook.'"><br>
		            	<h3>Usuario</h3>
		            	<input type="text" name="usuario" placeholder="Usuario" maxlength="50" class="animated bounce" value="'.$usuario.'"><span>*</span><br>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-xs-12">
            			<p class="text-center">* Campos requeridos</p>
		            	<input class="center-block" type="submit" value="Actualizar Perfil Empresarial">
		            	</form>
            		</div>
            	</div>  
            </div>
        </div>
    </div>
</div>
';
include '../../inc/pie_comun_empresa.inc'; ?>