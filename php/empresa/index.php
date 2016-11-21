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

$id = $_SESSION["id_empresa"];

$peticion_ofertas_2 = "SELECT fecha_inicio, fecha_caducidad FROM ofertas WHERE id_empresa = '$id' ";
$resultado_ofertas_2 = mysqli_query($conexion, $peticion_ofertas_2);
while($fila_fechas = mysqli_fetch_array($resultado_ofertas_2)){
  $primera = $fila_fechas["fecha_caducidad"];
 }
$fecha_hoy = time();
$segunda = date("d/m/Y", $fecha_hoy);

if(compararFechas ($primera, $segunda) == 0){
   $oferta_caducada = 0;
  ?>
  <script type="text/javascript">
  swal("Empresa: tienes ofertas que caducan el dia de hoy, puedes extender la fecha editando la oferta.");
  </script>
  <?php
}
if(compararFechas ($primera, $segunda) == 1){
   $oferta_caducada = 0;
  ?>
  <script type="text/javascript">
  swal("Empresa: tienes ofertas que caducan mañana, puedes extender la fecha editando la oferta.");
  </script>
  <?php
}
if(compararFechas ($primera, $segunda) < 0){
  $oferta_caducada = 1;
  ?>
  <script type="text/javascript">
  swal("Empresa: ofertas caducadas han sido retiradas.");
  </script>
  <?php
}
if(compararFechas ($primera, $segunda) > 1){
  $oferta_caducada = 0;
}


$peticion_ofertas = "SELECT * FROM ofertas WHERE id_empresa = '$id' AND $oferta_caducada != 1 ";
$resultado_ofertas = mysqli_query($conexion, $peticion_ofertas);
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
    if( mysqli_num_rows($resultado_ofertas)){
      while($fila_oferta = mysqli_fetch_array($resultado_ofertas)){
        $id_oferta_actual = $fila_oferta["id_oferta"];
        $peticion_num_apli = "SELECT * FROM aplicantes WHERE id_oferta_a = '$id_oferta_actual'";
        $resultado_num_apli = mysqli_query($conexion, $peticion_num_apli);
        $num_aplicantes = 0;
        while($fila_num_apli = mysqli_fetch_array($resultado_num_apli)){
          $num_aplicantes = $num_aplicantes + 1;
        }
        /*<p id="descripcion">'.$fila_oferta["descripcion"].'</p>*/
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
                    <p class="text-center"><span class="fa fa-bullseye"></span></p>
                  </div>
                  <div class="col-xs-10">
                    <p>'.$fila_oferta["campo"].'</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-2">
                    <p class="text-center"><span class="fa fa-users"></span></p>
                  </div>
                  <div class="col-xs-10">
                    <p class="aplicantes">Aplicantes: '.$num_aplicantes.'</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <a href="aplicantes.php?id_oferta='.$fila_oferta["id_oferta"].'"><button id="btn-aplicantes" class="btn center-block">Ver Aplicantes</button></a>
                  </div>
                </div>
              </div>
          </div>
        ';
      }
    }else{
      echo '
      <div id="sin-aplicantes">
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
<?php include '../../inc/pie_comun_empresa.inc'; ?>