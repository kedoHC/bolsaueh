<?php 
session_start();
if(!isset($_SESSION["session-egresado"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_egresado.inc';
include '../../inc/config.inc';

$id = $_SESSION["id_egresado"];
?>
<div id="ofertas">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center">Ofertas Publicadas</h1>
            </div>
        </div>
    </div>
</div>
<div id="ofertas-publicadas">
    <div class="container">
<?php
$peticion_ofertas_egresado = "SELECT * FROM aplicantes WHERE id_alumno_a = '$id' ";
$resultado_ofertas_egresado = mysqli_query($conexion, $peticion_ofertas_egresado);

if(mysqli_num_rows($resultado_ofertas_egresado)){
while($fila_oferta_egresado = mysqli_fetch_array($resultado_ofertas_egresado)){
  $id_oferta_egresado = $fila_oferta_egresado["id_oferta_a"];

  $peticion_ofertas = "SELECT * FROM ofertas WHERE id_oferta = '$id_oferta_egresado'";
  $resultado_ofertas = mysqli_query($conexion, $peticion_ofertas);
      while($fila_oferta = mysqli_fetch_array($resultado_ofertas)){
        echo '
          <div class="row oferta">
              <div class="col-xs-8 descripcion">
                <h1>'.$fila_oferta["puesto"].'</h1>
                <h2>'.$fila_oferta["empresa"].'</h2>
                <div class="row">
                  <div class="col-xs-12">
                    <a href="detalle_oferta.php?id_oferta='.$fila_oferta["id_oferta"].'"><button class="btn center-block">Ver mas</button></a>
                  </div>
                </div>
              </div>
             <div class="col-xs-4 detalles">
                <div class="row">
                  <div class="col-xs-2">
                    <p class="text-center"><span class="fa fa-calendar-plus-o"></span></p>
                  </div>
                  <div class="col-xs-10">
                    <p>'.$fila_oferta["fecha_inicio"].'</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-2">
                    <p class="text-center"><span class="fa fa-map-marker"></span></p>
                  </div>
                  <div class="col-xs-10">
                    <p>'.$fila_oferta["ciudad_oferta"].', '.$fila_oferta["estado_oferta"].' </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-2">
                    <p class="text-center"><span class="fa fa-usd"></span></p>
                  </div>
                  <div class="col-xs-10">
                    <p>$'.$fila_oferta["sueldo_baja"].' - $ '.$fila_oferta["sueldo_alta"].' (MX) </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-2">
                    <p class="text-center"><span class="fa fa-bullseye"></span></p>
                  </div>
                  <div class="col-xs-10">
                    <p>'.$fila_oferta["campo"].'</p>
                  </div>
                </div>
              </div>
          </div>
        ';
      }
  }
}
else{
  echo'
  <div id="sin-ofertas">
        <div class="row">
          <div class="col-xs-12">
            <h1 class="text-center">No hay ofertas disponibles</h1>
            <img class="img-responsive center-block" src="../../img/escudoN.png">
          </div>
        </div>
      </div>    
    ';
}
?>
    </div>
</div>
<?php include '../../inc/pie_comun_egresado.inc'; ?>