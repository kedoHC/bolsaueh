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
$peticion_no_aplicates = "SELECT id_oferta_a FROM aplicantes WHERE id_oferta_a = '$id_oferta'";
$resultado_no_aplicates = mysqli_query($conexion, $peticion_no_aplicates);

if(mysqli_num_rows($resultado_no_aplicates)){
	?>
	<script type="text/javascript">
	var id_oferta = '<?php echo $id_oferta ?>';
		swal({
			  title: "¡No es posible editar oferta!",
			  text: "Existen aplicantes para la oferta. Si es necesario cierre (elimine) la oferta y publique una nueva. ¡Gracias!.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'detalle_oferta.php?id_oferta='+id_oferta+'#menu';
			}
			});
	</script>
	<?php
	exit;
}
$peticion_oferta = "SELECT * FROM ofertas WHERE id_oferta = '$id_oferta' ";
$resultado_oferta = mysqli_query($conexion, $peticion_oferta);

while($fila_oferta = mysqli_fetch_array($resultado_oferta)){
	echo '
<div id="formulario-oferta">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            	<h1 class="text-center">Editar Oferta</h1>
            	<div class="row">
            		<div class="col-xs-1"></div>
            		<div class="col-xs-10">
            			<form name="form-nueva-oferta" action="actualizar_oferta.php?id_oferta='.$id_oferta.'" method="POST" autocomplete="off">
            			<div class="row">
            				<div class="col-xs-4">
            					<h2>Puesto a ofertar:</h2>
            				</div>
            				<div class="col-xs-8">
            					<input type="text" name="puesto" placeholder="Puesto a ofertar" required="on" class=" form-control" value="'.$fila_oferta["puesto"].'">
            				</div>
            			</div>
		            	<div class="row">
		            		<div class="col-xs-12">
		            			<h2>Descripción del puesto</h2>
		            			<textarea name="descripcion" required="on">'.$fila_oferta["descripcion"].'</textarea>
		            		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-xs-4">
		            			<h2>Fecha de inicio:</h2>
		            		</div>
		            		<div class="col-xs-8">
		            			 <input name="fechainicio" type="text" class="form-control" id="datetimepickerinicio" required="on" placeholder="Fecha en que inicia la convocatoria para el puesto." value="'.$fila_oferta["fecha_inicio"].'"/>
		            		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-xs-4">
		            			<h2>Fecha de caducidad:</h2>
		            		</div>
		            		<div class="col-xs-8">
		            			 <input name="fechacaducidad" type="text" class="form-control" id="datetimepickercaducidad" required="on" placeholder="Fecha en que termina la convocatoria para el puesto." value="'.$fila_oferta["fecha_caducidad"].'"/>
		            		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-xs-4">
		            			<h2>Ciudad:</h2>
		            		</div>
		            		<div class="col-xs-8">
		            			<input type="text" name="ciudad" placeholder="Ciudad" required="on" class="form-control" value="'.$fila_oferta["ciudad_oferta"].'">
		            		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-xs-4">
		            			<h2>Estado:</h2>
		            		</div>
		            		<div class="col-xs-8 select">
		            			 <select  name="estado" class="selectpicker" data-live-search="true">
									<option>'.$fila_oferta["estado_oferta"].'</option>
									<option data-tokens="Aguascalientes">Aguascalientes</option>
						            <option data-tokens="Baja California">Baja California</option>
						            <option data-tokens="Baja California Sur">Baja California Sur</option>
						            <option data-tokens="Campeche">Campeche</option>
						            <option data-tokens="Chiapas">Chiapas</option>
						            <option data-tokens="Chihuahua">Chihuahua</option>
						            <option data-tokens="Coahuila">Coahuila de Zaragoza</option>
						            <option data-tokens="Colima">Colima</option>
						            <option data-tokens="Durango">Durango</option>
						            <option data-tokens="Estado de Mexico">Estado de México</option>
						            <option data-tokens="Guanajuato">Guanajuato</option>
						            <option data-tokens="Guerrero">Guerrero</option>
						            <option data-tokens="Hidalgo">Hidalgo</option>
						            <option data-tokens="Jalisco">Jalisco</option>
						            <option data-tokens="Michoacan">Michoacán</option>
						            <option data-tokens="Morelos">Morelos</option>
						            <option data-tokens="Nayarit">Nayarit</option>
						            <option data-tokens="Nuevo Leon">Nuevo León</option>
						            <option data-tokens="Oaxaca">Oaxaca</option>
						            <option data-tokens="Puebla">Puebla</option>
						            <option data-tokens="Queretaro">Querétaro</option>
						            <option data-tokens="Quintana Roo">Quintana Roo</option>
						            <option data-tokens="San Luis Potosí">San Luis Potosí</option>
						            <option data-tokens="Sonora">Sonora</option>
						            <option data-tokens="Tabasco">Tabasco</option>
						            <option data-tokens="Tamaulipas">Tamaulipas</option>
						            <option data-tokens="Tlaxcala">Tlaxcala</option>
						            <option data-tokens="Veracruz">Veracruz</option>
						            <option data-tokens="Yucatan">Yucatán</option>
						            <option data-tokens="Zacatecas">Zacatecas</option>
								</select>
		            		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-xs-4">
		            			<h2>Campo:</h2>
		            		</div>
		            		<div class="col-xs-8 select">
		            			<select name="campo" class="selectpicker" data-live-search="true">
		            				<option>'.$fila_oferta["campo"].'</option>
									<option data-tokens="Administrativos">Administrativos</option>
									<option data-tokens="Biología">Biología</option>
									<option data-tokens="Comunicaciones">Comunicaciones</option>
									<option data-tokens="Construcción">Construcción</option>
									<option data-tokens="Contabilidad">Contabilidad</option>
									<option data-tokens="Diseño Comercial">Diseño Comercial</option>
									<option data-tokens="Derecho">Derecho</option>
									<option data-tokens="Educación">Educación</option>
									<option data-tokens="Gastronomia">Gastronomia</option>
									<option data-tokens="Ingeniería">Ingeniería</option>
									<option data-tokens="Mercadotecnia">Mercadotecnia</option>
									<option data-tokens="Producción">Producción</option>
									<option data-tokens="Relaciones Públicas">Relaciones Públicas</option>
									<option data-tokens="Recursos Humanos">Recursos Humanos</option>
									<option data-tokens="Salud">Salud</option>
									<option data-tokens="Seguros">Seguros</option>
									<option data-tokens="Tecnologia y Sistemas">Tecnologia y Sistemas</option>
									<option data-tokens="Transporte">Transporte</option>
									<option data-tokens="Turismo">Turismo</option>
									<option data-tokens="Ventas"></option>
								</select>
		            		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-xs-4">
		            			<h3>Sueldo mensual aproximado rango.</h3>
		            		</div>
		            		<div class="col-xs-3">
    			  				<input name="sueldobajo" type="text" class="form-control" id="exampleInputAmount" placeholder="Rango bajo. Ej: 10000" required="on" value="'.$fila_oferta["sueldo_baja"].'">
		            		</div>
		            		<div class="col-xs-1">
		            			<h3 class="text-center">a:</h3>
		            		</div>
		            		<div class="col-xs-3">
    			  				<input name="sueldoalto" type="text" class="form-control" id="exampleInputAmount" placeholder="Rango alto . Ej: 10000" required="on" value="'.$fila_oferta["sueldo_alta"].'">
		            		</div>
		            	</div>
		            	<h3 class="text-center">* Todos los campos son requeridos</h3>
		            	<input class="btn btn-primary btn-lg center-block" type="submit" value="Publicar oferta">
		            	</form>  
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
';
}
?>
<?php include '../../inc/pie_comun_empresa.inc'; ?>