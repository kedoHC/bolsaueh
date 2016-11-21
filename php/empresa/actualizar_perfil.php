<?php 
session_start();
if(!isset($_SESSION["session-empresa"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_empresa.inc';
include '../../inc/config.inc';
include '../../inc/verificar.inc';

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");

/*declaracion de variables con datos actuales de la empresa*/
$id = $_SESSION["id_empresa"];
$nombre_empresa = $_SESSION["empresa"];
$rfc_empresa = $_SESSION["rfc"];
$usuario_empresa = $_SESSION["usuario_empresa"];
/*Variables con datos de actualizacion de la empresa*/
$empresa = $_POST["empresa"];
$rfc = $_POST["rfc"];
$direccion = $_POST["direccion"];
$estado = $_POST["estado"];
$ciudad = $_POST["ciudad"];
$sector = $_POST["sector"];
$giro = $_POST["giro"];
$contacto = $_POST["contacto"];
$puesto = $_POST["puesto"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$facebook = $_POST["facebook"];
$usuario =  $_POST["usuario"];
/*verificar que los campos requeridos no esten vacios*/
if(empty($empresa) || empty($rfc) || empty($contacto) || empty($email) || empty($usuario) ){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡Datos vacios!",
		  text: "Alguno de los campos requeridos esta vacio.",
		  type: "error",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'editar_perfil.php#menu';
		}
		});
	</script>
	<?php
	exit;
}
/*verificacion de nombre de empresa*/
$peticion_nombre_empresa = "SELECT empresa FROM empresas WHERE empresa != '$nombre_empresa'";
$resultado_nombre_empresa = mysqli_query($conexion, $peticion_nombre_empresa);
while($fila_nombre_empresa = mysqli_fetch_array($resultado_nombre_empresa)){
	if($empresa == $fila_nombre_empresa["empresa"]){
		?>
		<script type="text/javascript">
			swal({
			  title: "¡Empresa Registrada!",
			  text: "El nombre de la empresa que nos proporcionas ya existe en nuestro sistema. Favor de verificarlo.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
		</script>
		<?php
		exit;
	}
	elseif(!verificar_nombre_empresa($empresa)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre de empresa Incorrecto!",
			  text: "Nombre completo, sin caracteres especiales, solo numeros y letras.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	}
}
/*verificacion del rfc*/
$peticion_rfc = "SELECT rfc FROM empresas WHERE rfc != '$rfc_empresa'";
$resultado_rfc = mysqli_query($conexion, $peticion_rfc);
while($fila_rfc = mysqli_fetch_array($resultado_rfc)){
	if($rfc == $fila_rfc["rfc"]){
		?>
		<script type="text/javascript">
			swal({
			  title: "¡RFC Registrado!",
			  text: "El RFC de la empresa que nos proporcionas ya existe en nuestro sistema. Favor de verificarlo.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
		</script>
		<?php
		exit;
	}
	elseif(!verificar_rfc_empresa($rfc)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡RFC de empresa Incorrecto!",
			  text: "RFC invalido solo letras (no acentos) y numeros (0-9). Sin caracteres especiales. MAximo 15.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	}
}
/*verificar direccion (puede o no tener direccion, si la ponen debe pasar la verificacion de regexp)*/
if(empty($direccion)){
	$direccion_correcta = true;
}
else{
	if(!verificar_direccion($direccion)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Dirección de empresa incorrecta!",
			  text: "Direccion completa solo con caracteres especiales: ,.# .",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	$direccion_correcta = false;
	exit;
	}
	else{
		$direccion_correcta= true;
	}
}
/*Verificar ciudad.*/
if(empty($ciudad)){
	$ciudad_correcta = true;
}
else{
	if(!verificar_ciudad($ciudad)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Ciudad de empresa incorrecta!",
			  text: "Nombre de ciudad sin caracteres especiales ni numeros.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	$ciudad_correcta = false;
	}
	else{
		$ciudad_correcta= true;
	}
}
/*Verificar estado.*/
if(empty($estado)){
	$estado_correcta = true;
}
else{
	if(!verificar_estado($estado)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Estado de empresa incorrecto!",
			  text: "Nombre de estado sin caracteres especiales ni numeros.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	$estado_correcta = false;
	}
	else{
		$estado_correcta= true;
	}
}
/*Verificar sector*/
if(empty($sector)){
	$sector_correcta = true;
}
else{
	if(!verificar_sector($sector)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Sector de empresa incorrecto!",
			  text: "Nombre de sector sin caracteres especiales ni numeros.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	$sector_correcta = false;
	}
	else{
		$sector_correcta= true;
	}
}
/*Verificar giro*/
if(empty($giro)){
	$giro_correcta = true;
}
else{
	if(!verificar_giro($giro)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Giro de empresa incorrecto!",
			  text: "Nombre de giro sin caracteres especiales ni numeros.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	$giro_correcta = false;
	}
	else{
		$giro_correcta= true;
	}
}
/*Verificar Nombre de contacto con la empresa*/
if(!verificar_nombre($contacto)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Contacto empresa incorrecto!",
			  text: "Nombre de contacto sin caracteres especiales ni numeros.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
}
/*Verificar puesto de contacto en la empresa*/
if(empty($puesto)){
	$puesto_correcta = true;
}
else{
	if(!verificar_puesto($puesto)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Puesto de contacto incorrecto!",
			  text: "Nombre del puesto sin caracteres especiales ni numeros.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	$puesto_correcta = false;
	}
	else{
		$puesto_correcta= true;
	}
}
/*Verificar telefono de la empresa*/
if(empty($telefono)){
	$telefono_correcta = true;
}
else{
	if(!verificar_telefono($telefono)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Telefono de la empreesa incorrecto!",
			  text: "Formatos de 12 digistos nacional y 13 para celulares.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	$telefono_correcta = false;
	}
	else{
		$telefono_correcta= true;
	}
}
/*Verificar Nombre de contacto con la empresa*/
if(!verificar_email($email)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Email empresa incorrecto!",
			  text: "Cumplir con el formato correcto de un correo electronico.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
}
/*Verificar Facebook*/
if(empty($facebook)){
	$facebook_correcta = true;
}
else{
	if(!verificar_facebook($facebook)){
		?>
	<script type="text/javascript">
		swal({
			  title: "¡Facebook de empresa incorrecto!",
			  text: "Nombre de Facebook solo letras, numeros y punto (.). Debe tener al menos 5 caracteres.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	$facebook_correcta = false;
	}
	else{
		$facebook_correcta= true;
	}
}
/*Verificar usuario de empresa*/
$peticion_usuario = "SELECT usuario_empresa FROM empresas WHERE usuario_empresa != '$usuario_empresa'";
$resultado_usuario = mysqli_query($conexion, $peticion_usuario);
while($fila_usuario = mysqli_fetch_array($resultado_usuario)){
	if($usuario == $fila_usuario["usuario_empresa"]){
		?>
		<script type="text/javascript">
			swal({
			  title: "¡Usuario No disponible!",
			  text: "El nombre de usuario que nos proporcionas ya existe en nuestro sistema. Favor de verificarlo.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
		</script>
		<?php
		exit;
	}
	elseif(!verificar_usuario($usuario)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Usuario empresa incorrecto!",
			  text: "El usuario no puede incluir los caracteres especiales: ()#<>{}[]+:. Sin acentos.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
	exit;
	}
}
/*confirmación final de variables*/
if($facebook_correcta AND verificar_email($email) AND $telefono_correcta AND $puesto_correcta AND verificar_nombre($contacto) AND $giro_correcta AND $sector_correcta AND $estado_correcta AND $ciudad_correcta AND $direccion_correcta AND verificar_rfc_empresa($rfc) AND verificar_nombre_empresa($empresa) AND verificar_usuario($usuario)){

	/*Peticion para actualizar el perfil de empresa*/
	$peticion_actualizacion = "UPDATE empresas SET rfc = '$rfc', empresa= '$empresa', direccion_empresa= '$direccion', estado_empresa= '$estado', ciudad_empresa= '$ciudad', sector= '$sector', giro= '$giro', contacto= '$contacto', puesto_contacto= '$puesto', telefono_empresa= '$telefono', email_empresa= '$email', facebook_empresa= '$facebook', usuario_empresa='$usuario' WHERE id_empresa = '$id' ";
	$resultado_actualizacion = mysqli_query($conexion, $peticion_actualizacion);

	if ($resultado_actualizacion) {
			?>
		<script type="text/javascript">
			swal({
				  title: "¡Perfil de la empresa modificado!",
				  text: "Se actualizo correctamente el perfil empresarial.",
				  type: "success",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'editar_perfil.php#menu';
				}
				});
		</script>
		<?php
		/*Modificar las variables de session*/
		$_SESSION["empresa"] = $empresa;
		$_SESSION["rfc"] = $rfc;
		$_SESSION["direccion"] = $direccion;
		$_SESSION["estado"] = $estado;
		$_SESSION["ciudad"] = $ciudad;
		$_SESSION["sector"] = $sector;
		$_SESSION["giro"] = $giro;
		$_SESSION["contacto"] = $contacto;
		$_SESSION["puesto_contacto"] = $puesto;
		$_SESSION["telefono"] = $telefono;
		$_SESSION["email"] = $email;
		$_SESSION["facebook"] = $facebook;
		$_SESSION["usuario_empresa"] = $usuario;
	}
	else{
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Perfil de la empresa NO modificado!",
				  text: "No se pudo actualizar el perfil. Error de sistema.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'index.php#menu';
				}
				});
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Perfil de la empresa NO modificado!",
			  text: "Error en la conexion con el sistema.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_perfil.php#menu';
			}
			});
	</script>
	<?php
}
include '../../inc/pie_comun_empresa.inc'; ?>