<meta charset="utf-8" />
<?php
$id = $_GET['id']; //recibir el ID por URL
?>
<center>
 <h2>¿Estás seguro de eliminar el registro</h2>
 <a href="eliminar.php?id=<?=$id?>">si estoy seguro</a> || <a href="index.php"> No, cancelar</a>
 </center>
