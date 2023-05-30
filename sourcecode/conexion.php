<?php

$nombre_host = $_ENV['DB_HOST'];
$usuario_bd = $_ENV['DB_USER'];
$contrasena_bd = $_ENV['DB_PASS'];
$base_datos_nombre = $_ENV['DB_NAME'];

$maxUploadSize = $_ENV['UPLOAD_MAX_FILESIZE'];
echo "El tamaño máximo de carga permitido es: " . $maxUploadSize;
?>
