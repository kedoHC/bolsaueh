<?php include '../inc/cabecera_comun_grales.inc'; ?>
<div id="formulario-empresa">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            	<h1 class="text-center animated bounce">Nueva Empresa</h1>
            	<div class="row">
            		<div class="col-xs-3"></div>
            		<div class="col-xs-6">
            			<form name="form-nuevo-empresa" action="nueva_empresa.php" method="POST" autocomplete="off">
		            	<input type="text" name="nombre" placeholder="Nombre de la empresa" required="on" class="animated bounce"><span>*</span><br>
		            	<input type="text" name="rfc" placeholder="RFC" maxlength="15" required="on" class="animated bounce"><span>*</span><br>
		            	<input type="text" name="contacto" placeholder="Contacto de la empresa" required="on" class="animated bounce"><span>*</span><br>
		            	<input type="text" name="puesto" placeholder="Puesto en la empresa" class="animated bounce"><br>
		            	<input type="text" name="telefono" placeholder="Telefono" class="animated bounce"><br>
		            	<input type="text" name="email" placeholder="Email" required="on" class="animated bounce"><span>*</span><br>
		            	<p class="text-center">* Campos requeridos</p>
		            	<input class="center-block" type="submit" value="Enviar mis datos">
		            	</form>  
            		</div>
            		<div class="col-xs-3"></div>
            	</div>
            	    
            </div>
        </div>
    </div>
</div>

<?php include '../inc/pie_comun_grales.inc'; ?>
