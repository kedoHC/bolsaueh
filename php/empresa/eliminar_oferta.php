<?php 
session_start();
if(!isset($_SESSION["session-empresa"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_empresa.inc';
include '../../inc/config.inc'; 

$id_oferta = $_GET["id_oferta"];
/*Verificar primero que no hay aplicantees para la empresas*/
$peticion = "SELECT id_oferta_a FROM aplicantes WHERE id_oferta_a = '$id_oferta' ";
$resultado = mysqli_query($conexion, $peticion);
if(mysqli_num_rows($resultado)){
	$peticion_eliminar = "DELETE FROM ofertas WHERE id_oferta = '$id_oferta' ";
	$resultado_eliminar = mysqli_query($conexion, $peticion_eliminar);
	if($resultado_eliminar){
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Oferta con aplicantes!",
				  text: "Los aplicantes seran notificados por email del cierre de la oferta. ¡Gracias!.",
				  type: "warning",
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
		exit;
	}
	else{
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Oferta NO eliminada!",
				  text: "¡Error del destino? =). Vuelve a intentarlo. ¡Gracias!.",
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
		exit;
	}
}
else{
	$peticion_eliminar_2 = "DELETE FROM ofertas WHERE id_oferta = '$id_oferta' ";
	$resultado_eliminar_2 = mysqli_query($conexion, $peticion_eliminar_2);

	if($resultado_eliminar_2){
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Oferta sin aplicantes eliminada!",
				  text: "La oferta fue cerrada. ¡Gracias!.",
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
		exit;
	}
	else{
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Oferta sin aplicantes, NO eliminada!",
				  text: "¡Error del destino? =). Vuelve a intentarlo. ¡Gracias!.",
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
		exit;
	}
}

include '../../inc/pie_comun_empresa.inc'; ?>