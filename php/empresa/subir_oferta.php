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
session_start();

$id = $_SESSION["id_empresa"];
$empresa = $_SESSION["empresa"];
$contacto = $_SESSION["contacto"];
$puesto_contacto = $_SESSION["puesto_contacto"];
$telefono_empresa = $_SESSION["telefono_empresa"];
$email_empresa = $_SESSION["email_empresa"];
$puesto = $_POST["puesto"];
$descripcion = $_POST["descripcion"];
$fechainicio = $_POST["fechainicio"];
$fechacaducidad = $_POST["fechacaducidad"];
$ciudad = $_POST["ciudad"];
$estado = $_POST["estado"];
$campo = $_POST["campo"];
$sueldobajo = $_POST["sueldobajo"];
$sueldoalto = $_POST["sueldoalto"];


if(empty($puesto) || empty($descripcion) || empty($fechainicio) || empty($fechacaducidad) || empty($ciudad) || empty($estado) || empty($campo) || empty($sueldobajo) || empty($sueldoalto) ){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡Datos vacios!",
		  text: "Alguno de los campos esta vacio. Todos los datos son requeridos.",
		  type: "error",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'registro_empresa.php#menu';
		}
		});
	</script>
	<?php
	exit;
}
if(!verificar_nombre_oferta($puesto)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre de oferta invalido!",
			  text: "Nombre del puesto sin caracteres especiales, solo numeros y letras.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'nueva_oferta.php#menu';
			}
			});
	</script>
	<?php
	exit;
}
if(!verificar_ciudad($ciudad)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre de ciudad invalido!",
			  text: "Nombre de ciudad sin caracteres especiales, solo numeros y letras.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'nueva_oferta.php#menu';
			}
			});
	</script>
	<?php
	exit;
}
if(!verificar_sueldo($sueldobajo)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Sueldo bajo invalido!",
			  text: "Solo numeros. 0-99999",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'nueva_oferta.php#menu';
			}
			});
	</script>
	<?php
	exit;
}
if(!verificar_sueldo($sueldoalto)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Sueldo alto invalido!",
			  text: "Solo numeros. 0-99999",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'nueva_oferta.php#menu';
			}
			});
	</script>
	<?php
	exit;
}
if($sueldoalto < $sueldobajo){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Rango de sueldo incorrecto!",
			  text: "El sueldo alto no puede ser menor que el bajo.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'nueva_oferta.php#menu';
			}
			});
	</script>
	<?php
	exit;
}
if(verificar_nombre_oferta($puesto) AND verificar_ciudad($ciudad) AND verificar_sueldo($sueldobajo) AND verificar_sueldo($sueldoalto) ){
	$peticion_nueva_oferta = "INSERT INTO ofertas (id_empresa, puesto, empresa, descripcion, sueldo_baja, sueldo_alta, fecha_inicio, ciudad_oferta, estado_oferta, contacto, puesto_contacto, telefono_empresa, email_empresa, fecha_caducidad, campo) VALUES ('$id', '$puesto', '$empresa', '$descripcion', '$sueldobajo', '$sueldoalto', '$fechainicio', '$ciudad', '$estado', '$contacto', '$puesto_contacto', '$telefono_empresa', '$email_empresa', '$fechacaducidad', '$campo');";

	$resultado_nueva_oferta = mysqli_query($conexion, $peticion_nueva_oferta);
	if($resultado_nueva_oferta){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Oferta publicada!",
			  text: "Oferta publicada en bolsa de trabajo UEH. ¡Gracias!",
			  type: "success",
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
	else{
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Error de sistema!",
				  text: "Favor de intentar una vez mas o contactar al Administrador del sistema.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'registro_empresa.php#menu';
				}
				});
		</script>
		<?php
	}
}
?>