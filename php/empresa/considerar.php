<?php 
session_start();
if(!isset($_SESSION["session-empresa"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_empresa.inc'; 

$id_oferta = $_GET["id_oferta"];
?>
	<script type="text/javascript">
		var id = '<?php echo $id_oferta ?>';
		swal({
		  title: "Persona considerada",
		  text: "¡En horabuena! egresado considerado.",
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
include '../../inc/pie_comun_empresa.inc'; ?>
