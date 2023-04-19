<?
session_start();
unset($_SESSION["Login"]);
session_destroy();
echo"<script type='text/javascript'> window.location=\"index.php\"; </script>";

?>