<style type="text/css">
.link{
	font-size:14px;
	font-weight:bold;
	color:#000;
	}
.link:hover{
	color:#CCC;
	text-decoration:underline;
	}
	
</style>
<?
	if(isset($_POST['enviar']) && $_POST['usr']!="" && $_POST['clave']!="")
	{
		//include('conexion.php');
		error_reporting(E_ALL);
		session_register('Login');
		$usuario=$_POST['usr'];
		$contra=$_POST['clave'];
		
		//$consulta=mysql_query("SELECT * FROM general WHERE usuario='$usuario' AND contrasena='$contra'") or die(mysql_error()."<br/><br/><br/><center>ERROR: ");
			if($usuario=="administrador" && $contra=="cgic")
			{
				$_SESSION['Login']['usuario']="administrador";
				$_SESSION['Login']['contrasena']="cgic";
				//$_SESSION['Login']['tipo']=$registros['tipo'];
				//$_SESSION['Login']['flag']=$registros['flag'];
				//$_SESSION['Login']['id']=$registros['id'];

		//header("menu_administracion.php");		
		 echo"<script type='text/javascript'> window.location=\"index.php\"; </script>";
		


			} else {
			
			//include("error.php");
			//echo("Usuario desconocido, intente de nuevo.<br /><a href='index.php'>Regresar...</a>");
			echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>Usuario desconocido, intente de nuevo.
				<br /><br /><a class='link' href='index.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
			
			}
	}else{
/* 
		//print("<meta http-equiv=\"refresh\" content=\"0; URL=index.php?clv=error>");
		//include("error.php"); */
		
		//echo("Usuario desconocido, intente de nuevo.<br /><a href='index.php'>Regresar...</a>");
		echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>Usuario desconocido, intente de nuevo.
				<br /><br /><a class='link' href='index.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}

?>