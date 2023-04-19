<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Acceso Administraci&oacute;n</title>

		<style type="text/css">
		*{
			font-size: 14px;
			font-family: sans-serif;
		}
		form.login {
		    background: none repeat scroll 0 0 #F1F1F1;
		    border: 1px solid #DDDDDD;
		    margin: 0 auto;
		    padding: 20px;
		    width: 278px;
		}
		form.login div {
		    margin-bottom: 15px;
		    overflow: hidden;
		}
		form.login div label {
		    display: block;
		    float: left;
		    line-height: 25px;
		}
		form.login div input[type="text"], form.login div input[type="password"] {
		    border: 1px solid #DCDCDC;
		    float: right;
		    padding: 4px;
		}
		form.login div input[type="submit"] {
		    background: none repeat scroll 0 0 #DEDEDE;
		    border: 1px solid #C6C6C6;
		    float: right;
		    font-weight: bold;
		    padding: 4px 20px;
		}
		.error{
			color: red;
		    font-weight: bold;
		    margin: 10px;
		    text-align: center;
		}
		</style>
</head>

<body>

    <form action="logear.php" method="post" class="login">
		    <div><label>Username: </label><input name="usr" type="text"></div>
		    <div><label>Password: </label><input name="clave" type="password" ></div>
		    <div><input name="enviar" type="submit" value="login"></div>
			</form>

</body>
</html>      