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

$id_oferta = $_GET["id_oferta"];
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
		var id_oferta = '<?php echo $id_oferta ?>';
		swal({
			  title: "¡Nombre de oferta invalido!",
			  text: "Nombre del puesto sin caracteres especiales, solo numeros y letras.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_oferta.php?id_oferta='+id_oferta+'#menu';
			}
			});
	</script>
	<?php
	exit;
}
if(!verificar_ciudad($ciudad)){
	?>
	<script type="text/javascript">
	var id_oferta = '<?php echo $id_oferta ?>';
		swal({
			  title: "¡Nombre de ciudad invalido!",
			  text: "Nombre de ciudad sin caracteres especiales, solo numeros y letras.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_oferta.php?id_oferta='+id_oferta+'#menu';
			}
			});
	</script>
	<?php
	exit;
}
if(!verificar_sueldo($sueldobajo)){
	?>
	<script type="text/javascript">
	var id_oferta = '<?php echo $id_oferta ?>';
		swal({
			  title: "¡Sueldo bajo invalido!",
			  text: "Solo numeros. 0-99999",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_oferta.php?id_oferta='+id_oferta+'#menu';
			}
			});
	</script>
	<?php
	exit;
}
if(!verificar_sueldo($sueldoalto)){
	?>
	<script type="text/javascript">
	var id_oferta = '<?php echo $id_oferta ?>';
		swal({
			  title: "¡Sueldo alto invalido!",
			  text: "Solo numeros. 0-99999",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_oferta.php?id_oferta='+id_oferta+'#menu';
			}
			});
	</script>
	<?php
	exit;
}
if($sueldoalto < $sueldobajo){
	?>
	<script type="text/javascript">
	var id_oferta = '<?php echo $id_oferta ?>';
		swal({
			  title: "¡Rango de sueldo incorrecto!",
			  text: "El sueldo alto no puede ser menor que el bajo.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'editar_oferta.php?id_oferta='+id_oferta+'#menu';
			}
			});
	</script>
	<?php
	exit;
}
if(verificar_nombre_oferta($puesto) AND verificar_ciudad($ciudad) AND verificar_sueldo($sueldobajo) AND verificar_sueldo($sueldoalto) ){
	$peticion_nueva_oferta = "UPDATE ofertas SET puesto = '$puesto', descripcion = '$descripcion', sueldo_baja = '$sueldobajo', sueldo_alta = '$sueldoalto', fecha_inicio = '$fechainicio', ciudad_oferta = '$ciudad', estado_oferta = '$estado', fecha_caducidad = '$fechacaducidad', campo = '$campo' WHERE id_oferta = '$id_oferta'";

	$resultado_nueva_oferta = mysqli_query($conexion, $peticion_nueva_oferta);
	if($resultado_nueva_oferta){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Oferta actualizada!",
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
		var id_oferta = '<?php echo $id_oferta ?>';
			swal({
				  title: "¡Error de sistema!",
				  text: "Favor de intentar una vez mas o contactar al Administrador del sistema.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
					window.location.href = 'editar_oferta.php?id_oferta='+id_oferta+'#menu';
				}
				});
		</script>
		<?php
	}
}
?>