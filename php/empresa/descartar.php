<?php
session_start();
if(!isset($_SESSION["session-empresa"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_empresa.inc';
include '../../inc/config.inc';

$id_aplicante = $_GET["id_aplicante"];
$id_oferta = $_GET["id_oferta"];

$peticion_descartar = "DELETE FROM aplicantes WHERE id_alumno_a = '$id_aplicante' AND id_oferta_a = '$id_oferta'  ";
$resultado_descartar = mysqli_query($conexion, $peticion_descartar);

if($resultado_descartar){
	?>
	<script type="text/javascript">
		var id = '<?php echo $id_oferta ?>';
		swal({
		  title: "Persona descartada =(",
		  text: "Egresado ya no es considerado para este puesto.",
		  type: "success",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'aplicantes.php?id_oferta='+id+'';
		}
		});
	</script>
	<?php
}
else{
	?>
	<script type="text/javascript">
		var id = '<?php echo $id_oferta ?>';
		swal({
		  title: "Persona NO descartada",
		  text: "Puede ser un error del destino =). Intentalo nuevamente.",
		  type: "error",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'aplicantes.php?id_oferta='+id+'';
		}
		});
	</script>
	<?php
}

include '../../inc/pie_comun_empresa.inc';
?>





