<?php 
session_start();
if(!isset($_SESSION["session-empresa"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_empresa.inc'; ?>

	<script type="text/javascript">
		swal({
		  title: "Solicitud de nueva contraseña enviada a la administración.",
		  text: "Estaremos en contacto con ustedes muy pronto por email.",
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

<?php include '../../inc/pie_comun_empresa.inc'; ?>
