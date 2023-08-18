<?php
include('conexion.php');
?>

<div id="accordion1" class="accordion">
    <?php
    $nivelTitles = array("Nivel Candidato", "Nivel 1", "Nivel 2", "Nivel 3");
    for ($nivel = 0; $nivel < 4; $nivel++) {
        $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND nivelsni=$nivel) ORDER BY apellido ASC";
        $consulta = mysqli_query($conexion, $cons) or die("Error en query: $cons, el error es: " . mysqli_error($conexion));
    ?>
        <div class="accordion-group" style="display: none;">
            <div class="accordion-heading">
                <a href="#nivel<?= $nivel ?>" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle"><?= $nivelTitles[$nivel] ?></a>
            </div>
            <div class="accordion-body collapse" id="nivel<?= $nivel ?>">
                <div class="accordion-inner">
                    <table id="sni" class="table table-striped">
                        <tr id="titular">
                            <td><strong>Investigador</strong></td>
                            <td><strong>Dependencia</strong></td>
                            <td><strong>E-mail</strong></td>
                            <td><strong>&Aacute;rea</strong></td>
                        </tr>
                        <?php
                        while ($registros = mysqli_fetch_array($consulta)) {
                            $grado = $registros['grado'];
                            $nombre = htmlentities($registros['nombre']);
                            $apellido = htmlentities($registros['apellido']);
                            $dependencia = $registros['dependencia'];
                            $mail = $registros['mail'];
                            $area = $registros['area'];
                        ?>
                            <tr>
                                <td valign="top">
                                    <?php echo $grado . " " . $apellido . ", " . $nombre ?></td>

                                <td valign="top">
                                    <?php echo $dependencia; ?></td>

                                <td valign="top">
                                    <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></td>

                                <td valign=top bordercolor="#F5F5F5">
                                    <?php
                                    switch ($area) {
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
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>