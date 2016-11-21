<?php 
session_start();
if(!isset($_SESSION["session-egresado"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_egresado.inc'; ?>

	<script type="text/javascript">
		swal({
		  title: "Petición de salir del sistema enviada a la administración.",
		  text: "Estaremos en contacto contigo muy pronto por email.",
		  type: "success",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'index.php';
		}
		});
	</script>

<?php include '../../inc/pie_comun_egresado.inc'; ?>
