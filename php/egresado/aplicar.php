<?php 
session_start();
if(!isset($_SESSION["session-egresado"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_egresado.inc';
include '../../inc/config.inc';

$id = $_GET["id_oferta"];
$id_egresado = $_SESSION["id_egresado"];

$peticion_ya_aplico = "SELECT * FROM aplicantes WHERE id_alumno_a = '$id_egresado' AND id_oferta_a = '$id' ";
$resultado_ya_aplico = mysqli_query($conexion, $peticion_ya_aplico);

if(!mysqli_num_rows($resultado_ya_aplico)){
	$peticion = "INSERT INTO aplicantes (id_oferta_a, id_alumno_a) VALUES ('$id', '$id_egresado');";
	$resultado = mysqli_query($conexion, $peticion);
	if($resultado){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Has aplicado!",
			  text: "¡Mucha suerte, confia en tus conocimientos!.",
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
			  title: "¡Ya aplicaste para esta oferta!",
			  text: "Verificalo en tus ofertas. ¡Gracias!.",
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
include '../../inc/cabecera_comun_egresado.inc'; ?>