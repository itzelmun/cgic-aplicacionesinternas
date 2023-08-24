<?  include('conexion.php'); ?>

<div id="accordion1" class="accordion">
<!-- Inicia area 1 -->
        <div class="accordion-group" style="display: none;">
                <div class="accordion-heading">
                        <a href="#nivel1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">Nivel Candidato</a>
                </div>
                <div class="accordion-body collapse in" id="nivel1">
                        <div class="accordion-inner">
                                <table id="sni" class="table table-striped">
                                <tr id="titular">
                                        <td>
                                        <strong>Investigador</strong>
                                </td>
                        <td>
                                        <strong>Dependencia</strong>
                                </td>
                        <td>
                                        <strong>E-mail</strong>
                                </td>
                                <td>
                                        <strong>&Aacute;rea</strong>
                                </td>
                                <!--<td>
                                        <strong>Nivel</strong>
                                </td>
                                <td>
                                        <strong>Vigencia</strong>
                                </td> -->
                                </tr>
                    <?

                                          $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND nivelsni='Candidato') ORDER BY apellido ASC";

                                        $consulta = mysqli_query($conexion, $cons) or die( "Error en query: $sql, el error  es: " . mysqli_error($cnx) );

          while($registros = mysqli_fetch_array($consulta))
                                         {
                                                $grado  = $registros['grado'];
                                                $nombre = htmlentities($registros['nombre']);
                                                $apellido       = htmlentities($registros['apellido']);
                                                $dependencia = $registros['dependencia'];
                                                $mail = $registros['mail'];
                                                $area   = $registros['area'];
                                                //$nivel        = $registros['nivelsni'];
                                                $vigencia = $registros['vigencia'];

                                         ?>
                                    <tr>
                                      <td valign="top" >
                                        <? echo $grado." ".$apellido.", ".$nombre?></td>

                                      <td valign="top" >
                                        <? echo $dependencia; ?></td>

                                      <td valign="top" >
                                        <a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>

                                      <td valign=top bordercolor="#F5F5F5">
                                         <? switch($area){
                                                                             case "fisico":
                                                                             echo "F&iacute;sico Matem&aacute;tico y Ciencias de la Tierra";
                                                                             break;

                                                                             case "biologia":
                                                                             echo "Biolog&iacute;a y Qu&iacute;mica";
                                                                             break;

                                                                             case "medicina":
                                                                             echo "Medicina y Ciencias de la Salud";
                                                                             break;

                                                                             case "humanidades":
                                                                             echo "Humanidades y de la Conducta";
                                                                             break;

                                                                             case "sociales":
                                                                             echo "Sociales y Econ&oacute;mico Administrativas";
                                                                             break;

                                                                             case "biotecnologia":
                                                                             echo "Biotecnolog&iacute;a y Ciencias Agropecuarias";
                                                                             break;

                                                                             case "ingenieria":
                                                                             echo "Ingenier&iacute;a";
                                                                             break;

                                                                             }

                                                                             ?></td>

                                    </tr>
                     <?
                                         }
                                         ?>



        </table>
                        </div>
                </div>
        </div>
<!--Cambia área, agregar nuevo grupo -->
        <div class="accordion-group" style="display: none;">
                <div class="accordion-heading">
                        <a href="#nivel2" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">Nivel 1</a>
                </div>
                <div class="accordion-body collapse" id="nivel2">
                        <div class="accordion-inner">
                                <table id="sni" class="table table-striped">
                                <tr id="titular">
                                        <td>
                                        <strong>Investigador</strong>
                                </td>
                        <td>
                                        <strong>Dependencia</strong>
                                </td>
                        <td>
                                        <strong>E-mail</strong>
                                </td>
                                <td>
                                        <strong>&Aacute;rea</strong>
                                </td>
                                <!--<td>
                                        <strong>Nivel</strong>
                                </td>

                                <td>
                                        <strong>Vigencia</strong>
                                </td> -->
                                </tr>
                    <?

                                          $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND nivelsni=1) ORDER BY apellido ASC";

                                        $consulta = mysqli_query($conexion, $cons) or die( "Error en query: $sql, el error  es: " . mysqli_error($cnx) );

          while($registros = mysqli_fetch_array($consulta))
                                         {
                                                $grado  = $registros['grado'];
                                                $nombre = htmlentities($registros['nombre']);
                                                $apellido       = htmlentities($registros['apellido']);
                                                $dependencia = $registros['dependencia'];
                                                $mail = $registros['mail'];
                                                $area   = $registros['area'];
                                                //$nivel        = $registros['nivelsni'];
                                                $vigencia = $registros['vigencia'];

                                         ?>
                                    <tr>
                                      <td valign="top" >
                                        <? echo $grado." ".$apellido.", ".$nombre?></td>

                                      <td valign="top" >
                                        <? echo $dependencia; ?></td>

                                      <td valign="top" >
                                        <a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>

                                      <td valign=top bordercolor="#F5F5F5">
                                         <? switch($area){
                                                                             case "fisico":
                                                                             echo "F&iacute;sico Matem&aacute;tico y Ciencias de la Tierra";
                                                                             break;

                                                                             case "biologia":
                                                                             echo "Biolog&iacute;a y Qu&iacute;mica";
                                                                             break;

                                                                             case "medicina":
                                                                             echo "Medicina y Ciencias de la Salud";
                                                                             break;

                                                                             case "humanidades":
                                                                             echo "Humanidades y de la Conducta";
                                                                             break;

                                                                             case "sociales":
                                                                             echo "Sociales y Econ&oacute;mico Administrativas";
                                                                             break;

                                                                             case "biotecnologia":
                                                                             echo "Biotecnolog&iacute;a y Ciencias Agropecuarias";
                                                                             break;

                                                                             case "ingenieria":
                                                                             echo "Ingenier&iacute;a";
                                                                             break;

                                                                             }

                                                                             ?></td>

                                    </tr>
                     <?
                                         }
                                         ?>



        </table>
                        </div>
                </div>
</div>
<!--Cambia área, agregar nuevo grupo -->
        <div class="accordion-group" style="display: none;">
                <div class="accordion-heading">
                        <a href="#nivel3" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">Nivel 2</a>
                </div>
                <div class="accordion-body collapse" id="nivel3">
                        <div class="accordion-inner">
                                <table id="sni" class="table table-striped">
                                <tr id="titular">
                                        <td>
                                        <strong>Investigador</strong>
                                </td>
                        <td>
                                        <strong>Dependencia</strong>
                                </td>
                        <td>
                                        <strong>E-mail</strong>
                                </td>
                                <td>
                                        <strong>&Aacute;rea</strong>
                                </td>
                                <!--<td>
                                        <strong>Nivel</strong>
                                </td>
                                <td>
                                        <strong>Vigencia</strong>
                                </td> -->
                                </tr>
                    <?

                                          $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND nivelsni=2) ORDER BY apellido ASC";

                                        $consulta = mysqli_query($conexion, $cons) or die( "Error en query: $sql, el error  es: " . mysqli_error($cnx) );

          while($registros = mysqli_fetch_array($consulta))
                                         {
                                                $grado  = $registros['grado'];
                                                $nombre = htmlentities($registros['nombre']);
                                                $apellido       = htmlentities($registros['apellido']);
                                                $dependencia = $registros['dependencia'];
                                                $mail = $registros['mail'];
                                                $area   = $registros['area'];
                                                //$nivel        = $registros['nivelsni'];
                                                $vigencia = $registros['vigencia'];
                                         ?>
                                    <tr>
                                      <td valign="top" >
                                        <? echo $grado." ".$apellido.", ".$nombre?></td>

                                      <td valign="top" >
                                        <? echo $dependencia; ?></td>

                                      <td valign="top" >
                                        <a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>

                                     <td valign=top bordercolor="#F5F5F5">
                                         <? switch($area){
                                                                             case "fisico":
                                                                             echo "F&iacute;sico Matem&aacute;tico y Ciencias de la Tierra";
                                                                             break;

                                                                             case "biologia":
                                                                             echo "Biolog&iacute;a y Qu&iacute;mica";
                                                                             break;

                                                                             case "medicina":
                                                                             echo "Medicina y Ciencias de la Salud";
                                                                             break;

                                                                             case "humanidades":
                                                                             echo "Humanidades y de la Conducta";
                                                                             break;

                                                                             case "sociales":
                                                                             echo "Sociales y Econ&oacute;mico Administrativas";
                                                                             break;

                                                                             case "biotecnologia":
                                                                             echo "Biotecnolog&iacute;a y Ciencias Agropecuarias";
                                                                             break;

                                                                             case "ingenieria":
                                                                             echo "Ingenier&iacute;a";
                                                                             break;

                                                                             }

                                                                             ?></td>
                                      <!--
                                      <td valign="top">
                                        <? echo $vigencia?></td> -->
                                    </tr>
                     <?
                                         }
                                         ?>



        </table>
                        </div>
                </div>
</div>
<!--Cambia área, agregar nuevo grupo -->
        <div class="accordion-group" style="display: none;">
                <div class="accordion-heading">
                        <a href="#nivel4" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">Nivel 3</a>
                </div>
                <div class="accordion-body collapse" id="nivel4">
                        <div class="accordion-inner">
                                <table id="sni" class="table table-striped">
                                <tr id="titular">
                                        <td>
                                        <strong>Investigador</strong>
                                </td>
                        <td>
                                        <strong>Dependencia</strong>
                                </td>
                        <td>
                                        <strong>E-mail</strong>
                                </td>
                                <td>
                                        <strong>&Aacute;rea</strong>
                                </td>
                                <!--<td>
                                        <strong>Nivel</strong>
                                </td>
                                <td>
                                        <strong>Vigencia</strong>
                                </td> -->
                                </tr>
                    <?

                                          $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND nivelsni=3) ORDER BY apellido ASC";

                                        $consulta = mysqli_query($conexion, $cons) or die( "Error en query: $sql, el error  es: " . mysqli_error($cnx) );

          while($registros = mysqli_fetch_array($consulta))
                                         {
                                                $grado  = $registros['grado'];
                                                $nombre = htmlentities($registros['nombre']);
                                                $apellido       = htmlentities($registros['apellido']);
                                                $dependencia = $registros['dependencia'];
                                                $mail = $registros['mail'];
                                                $area   = $registros['area'];
                                                //$nivel        = $registros['nivelsni'];
                                                $vigencia = $registros['vigencia'];

                                         ?>
                                    <tr>
                                      <td valign="top" >
                                        <? echo $grado." ".$apellido.", ".$nombre?></td>

                                      <td valign="top" >
                                        <? echo $dependencia; ?></td>

                                      <td valign="top" >
                                        <a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>

                                     <td valign=top bordercolor="#F5F5F5">
                                         <? switch($area){
                                                                             case "fisico":
                                                                             echo "F&iacute;sico Matem&aacute;tico y Ciencias de la Tierra";
                                                                             break;

                                                                             case "biologia":
                                                                             echo "Biolog&iacute;a y Qu&iacute;mica";
                                                                             break;

                                                                             case "medicina":
                                                                             echo "Medicina y Ciencias de la Salud";
                                                                             break;

                                                                             case "humanidades":
                                                                             echo "Humanidades y de la Conducta";
                                                                             break;

                                                                             case "sociales":
                                                                             echo "Sociales y Econ&oacute;mico Administrativas";
                                                                             break;

                                                                             case "biotecnologia":
                                                                             echo "Biotecnolog&iacute;a y Ciencias Agropecuarias";
                                                                             break;

                                                                             case "ingenieria":
                                                                             echo "Ingenier&iacute;a";
                                                                             break;

                                                                             }

                                                                             ?></td>
                                      <!--
                                      <td valign="top">
                                        <? echo $vigencia?></td> -->
                                    </tr>
                     <?
                                         }
                                         ?>



        </table>
                        </div>
                </div>
</div>
</div>