<?php 
session_start();
if(!isset($_SESSION["session-egresado"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_egresado.inc'; 
include '../../inc/config.inc';
include '../../inc/verificar.inc';

$id= $_SESSION["id_egresado"];
$usuario_egresado = $_SESSION["usuario_egresado"];
$nombre_egresado = $_SESSION["nombre"];
$matricula_egresado = $_SESSION["matricula"];
$rfc_egresado = $_SESSION["rfc"];
$correo_egresado = $_SESSION["correo"];



$usuario= $_POST["usuario"];
$nombre = $_POST["nombre"];
$matricula = $_POST["matricula"];
$direccion = $_POST["direccion"];
$fechaNac = $_POST["fechaNac"];
$sexo = $_POST["sexo"];
$rfc = $_POST["rfc"];
$habilidad1 = $_POST["habilidad1"];
$habilidad2 = $_POST["habilidad2"];
$habilidad3 = $_POST["habilidad3"];
$habilidad4 = $_POST["habilidad4"];
$habilidad5 = $_POST["habilidad5"];
$idioma1 = $_POST["idioma1"];
$idioma2 = $_POST["idioma2"];
$idioma3 = $_POST["idioma3"];
$titulo = $_POST["titulo"];
$anioTitulo = $_POST["anioTitulo"];
$ciudad = $_POST["ciudad"];
$estado = $_POST["estado"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$facebook = $_POST["facebook"];
$titulo2 = $_POST["titulo2"];
$anioTitulo2 = $_POST["anioTitulo2"];
$titulo3 = $_POST["titulo3"];
$anioTitulo3 = $_POST["anioTitulo3"];
$titulo4 = $_POST["titulo4"];
$anioTitulo4 = $_POST["anioTitulo4"];
$titulo5 = $_POST["titulo5"];
$anioTitulo5 = $_POST["anioTitulo5"];
$anioLabor1 = $_POST["anioLabor1"];
$empresaLabor1 = $_POST["empresaLabor1"];
$actividadLabor1 = $_POST["actividadLabor1"];
$anioLabor2 = $_POST["anioLabor2"];
$empresaLabor2 = $_POST["empresaLabor2"];
$actividadLabor2 = $_POST["actividadLabor2"];
$anioLabor3 = $_POST["anioLabor3"];
$empresaLabor3 = $_POST["empresaLabor3"];
$actividadLabor3 = $_POST["actividadLabor3"];
$anioLabor4 = $_POST["anioLabor4"];
$empresaLabor4 = $_POST["empresaLabor4"];
$actividadLabor4 = $_POST["actividadLabor4"];

if(empty($nombre) || empty($usuario) || empty($matricula) || empty($rfc) || empty($titulo) || empty($anioTitulo) || empty($correo)){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡Datos requeridos vacios!",
		  text: "Alguno de los campos requeridos esta vacio, estan marcados con: *.",
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
/*Verificar nombre de egresado*/
$peticion_nombre = "SELECT nombre FROM alumno WHERE nombre != '$nombre_egresado'";
$resultado_nombre = mysqli_query($conexion, $peticion_nombre);
$nombre_mayusculas = strtoupper($nombre);
while($fila_nombre = mysqli_fetch_array($resultado_nombre)){
	if($nombre == $fila_nombre["nombre"] || $nombre_mayusculas == $fila_nombre["nombre"]){
		?>
		<script type="text/javascript">
			swal({
			  title: "¡Nombre No disponible!",
			  text: "El nombre que nos proporcionas ya existe en nuestro sistema. Favor de verificarlo.",
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
	elseif(!verificar_nombre($nombre)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre egresado incorrecto!",
			  text: "El nombre no puede incluir los caracteres especiales, ni numeros.",
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
/*Verificar usuario de egresado*/
$peticion_usuario = "SELECT usuario_alumno FROM alumno WHERE usuario_alumno != '$usuario_egresado'";
$resultado_usuario = mysqli_query($conexion, $peticion_usuario);
$usuario_mayusculas = strtoupper($usuario);
while($fila_usuario = mysqli_fetch_array($resultado_usuario)){
	if($usuario == $fila_usuario["usuario_alumno"] || $usuario_mayusculas == $fila_usuario["usuario_alumno"]){
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
			  title: "¡Usuario egresado incorrecto!",
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
/*Verificar Matricula*/
$peticion_matricula = "SELECT matricula FROM alumno WHERE matricula != '$matricula_egresado'";
$resultado_matricula = mysqli_query($conexion, $peticion_matricula);
$matricula_mayusculas = strtoupper($matricula);
while($fila_matricula = mysqli_fetch_array($resultado_matricula)){
	if($matricula == $fila_matricula["matricula"] || $matricula_mayusculas == $fila_matricula["matricula"]){
		?>
		<script type="text/javascript">
			swal({
			  title: "¡Matricula No disponible!",
			  text: "La matricula que nos proporcionas ya existe en nuestro sistema. Favor de verificarlo.",
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
	elseif(!verificar_matricula($matricula)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Matricula egresado incorrecta!",
			  text: "Seguir el formato. Ej: EH1101SC300.",
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
/*Verificar RFC*/
$peticion_rfc = "SELECT rfc FROM alumno WHERE rfc != '$rfc_egresado'";
$resultado_rfc = mysqli_query($conexion, $peticion_rfc);
$rfc_mayusculas = strtoupper($rfc);
while($fila_rfc = mysqli_fetch_array($resultado_rfc)){
	if($rfc == $fila_rfc["rfc"] || $rfc_mayusculas == $fila_rfc["rfc"]){
		?>
		<script type="text/javascript">
			swal({
			  title: "¡RFC No disponible!",
			  text: "El nombre que nos proporcionas ya existe en nuestro sistema. Favor de verificarlo.",
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
			  title: "¡RFC incorrecto!",
			  text: "Seguir el formato estandar.",
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
/*Verificar direccion - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($direccion)){
	$verificar_direccion = true;
}
else{
	if(!verificar_direccion($direccion)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Direccion invalida!",
			  text: "Direccion solo letras y numeros. Caracteres especiales solo: ,.#.",
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
	$verificar_direccion = false;
	exit;
	}
	else{
		$verificar_direccion = true;
	}
}
/*Verificar ciudad - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($ciudad)){
	$verificar_ciudad = true;
}
else{
	if(!verificar_ciudad($ciudad)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Ciudad invalida!",
			  text: "Nombre de ciudad sin caracteres especiales o numeros.",
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
	$verificar_ciudad = false;
	exit;
	}
	else{
		$verificar_ciudad = true;
	}
}
/*Verificar estado - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($estado)){
	$verificar_estado = true;
}
else{
	if(!verificar_estado($estado)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Estado invalido!",
			  text: "Nombre de estado sin caracteres especiales o numeros.",
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
	$verificar_estado = false;
	exit;
	}
	else{
		$verificar_estado = true;
	}
}
/*Verificar telefono - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($telefono)){
	$verificar_telefono = true;
}
else{
	if(!verificar_telefono($telefono)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Telefono invalido!",
			  text: "Formato de 12 caracteres nacional y 13 para celulares. Solo numeros.",
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
	$verificar_telefono = false;
	exit;
	}
	else{
		$verificar_telefono = true;
	}
}
/*Verificar sexo - Puede o no estar definida*/
if(empty($sexo)){
	$verificar_sexo = true;
}
else{
	$verificar_sexo = true;
}
/*Verificar correo de egresado*/
$peticion_correo = "SELECT correo FROM alumno WHERE correo != '$correo_egresado'";
$resultado_correo = mysqli_query($conexion, $peticion_correo);
$correo_mayusculas = strtoupper($correo);
while($fila_correo = mysqli_fetch_array($resultado_correo)){
	if($correo == $fila_correo["correo"] || $correo_mayusculas == $fila_correo["correo"]){
		?>
		<script type="text/javascript">
			swal({
			  title: "¡Correo No disponible!",
			  text: "El correo que nos proporcionas ya existe en nuestro sistema. Favor de verificarlo.",
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
	elseif(!verificar_email($correo)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Correo egresado incorrecto!",
			  text: "El correo debe seguir el formato estandar de correo electronico.",
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
/*Verificar titulo2 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($facebook)){
	$verificar_facebook = true;
}
else{
	if(!verificar_facebook($facebook)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Facebook invalido!",
			  text: "Seguir formato estandar de usuarios de Facebook.",
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
	$verificar_facebook = false;
	exit;
	}
	else{
		$verificar_facebook = true;
	}
}

/*Verificar Titulo*/
if(!verificar_titulo($titulo)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡titulo invalida!",
			  text: "titulo solo letras y numeros. Caracteres especiales solo: ,.#.",
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
/*Verificar titulo2 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($titulo2)){
	$verificar_titulo2 = true;
}
else{
	if(!verificar_titulo($titulo2)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Titulo 2 invalido!",
			  text: "Titulo sin caracteres especiales ni numeros.",
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
	$verificar_titulo2 = false;
	exit;
	}
	else{
		$verificar_titulo2 = true;
	}
}
/*Verificar titulo3 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($titulo3)){
	$verificar_titulo3 = true;
}
else{
	if(!verificar_titulo($titulo3)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Titulo 3 invalido!",
			  text: "Titulo sin caracteres especiales ni numeros.",
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
	$verificar_titulo3 = false;
	exit;
	}
	else{
		$verificar_titulo3 = true;
	}
}
/*Verificar titulo4 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($titulo4)){
	$verificar_titulo4 = true;
}
else{
	if(!verificar_titulo($titulo4)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Titulo 4 invalido!",
			  text: "Titulo sin caracteres especiales ni numeros.",
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
	$verificar_titulo4 = false;
	exit;
	}
	else{
		$verificar_titulo4 = true;
	}
}
/*Verificar titulo5 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($titulo5)){
	$verificar_titulo5 = true;
}
else{
	if(!verificar_titulo($titulo5)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Titulo 5 invalido!",
			  text: "Titulo sin caracteres especiales ni numeros.",
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
	$verificar_titulo5 = false;
	exit;
	}
	else{
		$verificar_titulo5 = true;
	}
}
/*Verificar empresaLabor1 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($empresaLabor1)){
	$verificar_empresaLabor1 = true;
}
else{
	if(!verificar_nombre_empresa($empresaLabor1)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre empresa 1 invalido!",
			  text: "Titulo sin caracteres especiales, solo letras y numeros.",
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
	$verificar_empresaLabor1 = false;
	exit;
	}
	else{
		$verificar_empresaLabor1 = true;
	}
}
/*Verificar empresaLabor2 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($empresaLabor2)){
	$verificar_empresaLabor2 = true;
}
else{
	if(!verificar_nombre_empresa($empresaLabor2)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre empresa 2 invalido!",
			  text: "Titulo sin caracteres especiales, solo letras y numeros.",
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
	$verificar_empresaLabor2 = false;
	exit;
	}
	else{
		$verificar_empresaLabor2 = true;
	}
}
/*Verificar empresaLabor3 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($empresaLabor3)){
	$verificar_empresaLabor3 = true;
}
else{
	if(!verificar_nombre_empresa($empresaLabor3)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre empresa 3 invalido!",
			  text: "Titulo sin caracteres especiales, solo letras y numeros.",
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
	$verificar_empresaLabor3 = false;
	exit;
	}
	else{
		$verificar_empresaLabor3 = true;
	}
}
/*Verificar empresaLabor4 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($empresaLabor4)){
	$verificar_empresaLabor4 = true;
}
else{
	if(!verificar_nombre_empresa($empresaLabor4)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre empresa 4 invalido!",
			  text: "Titulo sin caracteres especiales, solo letras y numeros.",
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
	$verificar_empresaLabor4 = false;
	exit;
	}
	else{
		$verificar_empresaLabor4 = true;
	}
}
/*Verificar actividadLabor1 - Puede o no estar definida, si lo esta que pase la verificacion*/
if(empty($actividadLabor1)){
	$verificar_actividadLabor1 = true;
}
else{
	if(!verificar_actividad_empresa($actividadLabor1)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Actividad en empresa 1 invalido!",
			  text: "Actividad sin caracteres especiales, solo letras y numeros, hasta 250 caracteres.",
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
	$verificar_actividadLabor1 = false;
	exit;
	}
	else{
		$verificar_actividadLabor1 = true;
	}
}
if(empty($actividadLabor2)){
	$verificar_actividadLabor2 = true;
}
else{
	if(!verificar_actividad_empresa($actividadLabor2)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Actividad en empresa 2 invalido!",
			  text: "Actividad sin caracteres especiales, solo letras y numeros, hasta 250 caracteres.",
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
	$verificar_actividadLabor2 = false;
	exit;
	}
	else{
		$verificar_actividadLabor2 = true;
	}
}
if(empty($actividadLabor3)){
	$verificar_actividadLabor3 = true;
}
else{
	if(!verificar_actividad_empresa($actividadLabor3)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Actividad en empresa 3 invalido!",
			  text: "Actividad sin caracteres especiales, solo letras y numeros, hasta 250 caracteres.",
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
	$verificar_actividadLabor3 = false;
	exit;
	}
	else{
		$verificar_actividadLabor3 = true;
	}
}
if(empty($actividadLabor4)){
	$verificar_actividadLabor4 = true;
}
else{
	if(!verificar_actividad_empresa($actividadLabor4)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Actividad en empresa 4 invalido!",
			  text: "Actividad sin caracteres especiales, solo letras y numeros, hasta 250 caracteres.",
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
	$verificar_actividadLabor4 = false;
	exit;
	}
	else{
		$verificar_actividadLabor4 = true;
	}
}
/*Verificar idiomas*/
if(empty($idioma1)){
	$verificar_idioma1 = true;
}
else{
	if(!verificar_idioma($idioma1)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Idioma 1 invalido!",
			  text: "Formato ejemplo: Ingles 50%.",
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
	$verificar_idioma1 = false;
	exit;
	}
	else{
		$verificar_idioma1 = true;
	}
}
if(empty($idioma2)){
	$verificar_idioma2 = true;
}
else{
	if(!verificar_idioma($idioma2)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Idioma 2 invalido!",
			  text: "Formato ejemplo: Ingles 50%.",
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
	$verificar_idioma2 = false;
	exit;
	}
	else{
		$verificar_idioma2 = true;
	}
}
if(empty($idioma3)){
	$verificar_idioma3 = true;
}
else{
	if(!verificar_idioma($idioma3)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Idioma 3 invalido!",
			  text: "Formato ejemplo: Ingles 50%.",
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
	$verificar_idioma3 = false;
	exit;
	}
	else{
		$verificar_idioma3 = true;
	}
}
/*Verificar Hablidades*/
if(empty($habilidad1)){
	$verificar_habilidad1 = true;
}
else{
	if(!verificar_habilidad($habilidad1)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Habilidad 1 invalida!",
			  text: "Habilidades especificas. Ej: empatia, comunicación asertiva, trabajo bajo presión, etc. Sin numeros ni caracteres especiales.",
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
	$verificar_habilidad1 = false;
	exit;
	}
	else{
		$verificar_habilidad1 = true;
	}
}
if(empty($habilidad2)){
	$verificar_habilidad2 = true;
}
else{
	if(!verificar_habilidad($habilidad2)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Habilidad 2 invalida!",
			  text: "Habilidades especificas. Ej: empatia, comunicación asertiva, trabajo bajo presión, etc. Sin numeros ni caracteres especiales.",
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
	$verificar_habilidad2 = false;
	exit;
	}
	else{
		$verificar_habilidad2 = true;
	}
}
if(empty($habilidad3)){
	$verificar_habilidad3 = true;
}
else{
	if(!verificar_habilidad($habilidad3)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Habilidad 3 invalida!",
			  text: "Habilidades especificas. Ej: empatia, comunicación asertiva, trabajo bajo presión, etc. Sin numeros ni caracteres especiales.",
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
	$verificar_habilidad3 = false;
	exit;
	}
	else{
		$verificar_habilidad3 = true;
	}
}
if(empty($habilidad4)){
	$verificar_habilidad4 = true;
}
else{
	if(!verificar_habilidad($habilidad4)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Habilidad 4 invalida!",
			  text: "Habilidades especificas. Ej: empatia, comunicación asertiva, trabajo bajo presión, etc. Sin numeros ni caracteres especiales.",
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
	$verificar_habilidad4 = false;
	exit;
	}
	else{
		$verificar_habilidad4 = true;
	}
}
if(empty($habilidad5)){
	$verificar_habilidad5 = true;
}
else{
	if(!verificar_habilidad($habilidad5)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Habilidad 5 invalida!",
			  text: "Habilidades especificas. Ej: empatia, comunicación asertiva, trabajo bajo presión, etc. Sin numeros ni caracteres especiales.",
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
	$verificar_habilidad5 = false;
	exit;
	}
	else{
		$verificar_habilidad5 = true;
	}
}

/*confirmación final de variables*/

if(verificar_nombre($nombre) AND verificar_usuario($usuario) AND verificar_matricula($matricula) AND verificar_rfc_empresa($rfc) AND $verificar_direccion AND $verificar_ciudad AND $verificar_estado AND $verificar_telefono AND $verificar_sexo AND verificar_email($correo) AND $verificar_facebook AND verificar_titulo($titulo) AND $verificar_titulo2 AND $verificar_titulo3 AND $verificar_titulo4 AND $verificar_titulo5 AND $verificar_empresaLabor1 AND $verificar_empresaLabor2 AND $verificar_empresaLabor3 AND $verificar_empresaLabor4 AND $verificar_actividadLabor1 AND $verificar_actividadLabor2 AND $verificar_actividadLabor3 AND $verificar_actividadLabor4 AND $verificar_idioma1 AND $verificar_idioma2 AND $verificar_idioma3 AND $verificar_habilidad1 AND $verificar_habilidad2 AND $verificar_habilidad3 AND $verificar_habilidad4 AND $verificar_habilidad5){

	$peticion_actualizacion = "UPDATE alumno SET nombre = '$nombre', usuario_alumno= '$usuario', matricula= '$matricula', rfc= '$rfc', direccion= '$direccion', ciudad= '$ciudad', estado= '$estado', telefono= '$telefono', sexo= '$sexo', correo= '$correo', facebook= '$facebook', titulo = '$titulo', titulo2 = '$titulo2',	titulo3 = '$titulo3', titulo4 = '$titulo4',	titulo5 = '$titulo5', anioTitulo = '$anioTitulo', anioTitulo2 = '$anioTitulo2',	anioTitulo3 = '$anioTitulo3', anioTitulo4 = '$anioTitulo4',	anioTitulo5 = '$anioTitulo5', anioLabor1= '$anioLabor1', anioLabor2= '$anioLabor2',	anioLabor3= '$anioLabor3', anioLabor4= '$anioLabor4', empresaLabor1= '$empresaLabor1', empresaLabor2= '$empresaLabor2',	empresaLabor3= '$empresaLabor3', empresaLabor4= '$empresaLabor4', actividadLabor1= '$actividadLabor1', actividadLabor2= '$actividadLabor2',	actividadLabor3= '$actividadLabor3', actividadLabor4= '$actividadLabor4', idioma1 = '$idioma1',	idioma2 = '$idioma2', idioma3 = '$idioma3',	habilidad1 = '$habilidad1',
		habilidad2 = '$habilidad2',	habilidad3 = '$habilidad3',	habilidad4 = '$habilidad4',	habilidad5 = '$habilidad5'	WHERE id_alumno = '$id' ";
		$resultado_actualizacion = mysqli_query($conexion, $peticion_actualizacion);

		if ($resultado_actualizacion) {
				?>
			<script type="text/javascript">
				swal({
					  title: "¡Perfil de egresado actualizado!",
					  text: "Se actualizo correctamente el perfil de egresado.",
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
		}
		else{
			?>
			<script type="text/javascript">
				swal({
					  title: "¡Perfil de egresado NO modificado!",
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
include '../../inc/pie_comun_egresado.inc'; ?>