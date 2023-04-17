<style type="text/css">
        .accordion-heading {
            background-color:#F5F5F5;
        }
        .accordion-heading a{
            color:#333333;
        }
    </style>
    
<?  include('../../conexion.php'); ?>

<div style="text-align: center;"><a href="publicaciones2019.htm"><span style="font-size: larger;">Consultar publicaciones 2019<br />
<br />
</span></a></div>
<div style="text-align: center;"><a href="publicaciones2018.htm"><span style="font-size: larger;">Consultar publicaciones 2018<br />
<br />
</span></a></div>
<div style="text-align: justify; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">La publicaci&oacute;n cient&iacute;fica representa la culminaci&oacute;n del trabajo cient&iacute;fico, el cual inicia con la generaci&oacute;n de ideas que se concretan en proyectos espec&iacute;ficos. Estos tienen que ser formulados y justificados t&eacute;cnicamente con la finalidad de obtener los recursos necesarios para llevarse a cabo. Si ello se logra, empieza el proceso m&aacute;s arduo, interesante y elaborado de la investigaci&oacute;n cient&iacute;fica: la ejecuci&oacute;n del proyecto. Es en esta parte del proceso donde la creatividad y la mayor parte del esfuerzo son ejercidos. Aqu&iacute; se determinar&aacute; si las ideas y experimentos rinden frutos originales que avancen en lo ya conocido, es decir, donde se determina si se logra o no generar nuevo conocimiento. Al concluir, en caso de hacerlo con &eacute;xito, los resultados se difunden ante la comunidad cient&iacute;fica especializada. Ello se hace precisamente a trav&eacute;s de las publicaciones cient&iacute;ficas, tales como art&iacute;culos, libros y cap&iacute;tulos de libros.</div>
<div style="text-align: justify; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">&nbsp;</div>
<div style="text-align: justify; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Un art&iacute;culo&nbsp;cient&iacute;fico necesita contar con al menos los siguientes elementos: debe estar <b>indizado</b> (obviamente con arbitraje por parte de pares acad&eacute;micos especializados), publicado en revistas de circulaci&oacute;n internacional y&nbsp;mostrando claramente su&nbsp;&ldquo;<b>factor de&nbsp;impacto</b>&rdquo;, que nos ayuda a determinar la calidad en general de la revista (este factor de impacto var&iacute;a de manera importante entre las diferentes disciplinas del conocimiento).&nbsp;Para el caso de los libros y cap&iacute;tulos de libros, de la misma manera, debe tener arbitraje de pares acad&eacute;micos y la editorial debe ser reconocida por su prestigio internacional.</div>
<div style="text-align: justify; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">&nbsp;</div>
<div style="text-align: justify; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">No existe una manera absolutamente objetiva de medir la calidad e impacto de una publicaci&oacute;n, sin&nbsp;embargo estos&nbsp;elementos ayudan a minimizar la subjetividad&nbsp;inherente en el proceso. La&nbsp;caracter&iacute;stica fundamental que se pretende manifestar con una&nbsp;publicaci&oacute;n cient&iacute;fica, es la difusi&oacute;n de ideas y resultados&nbsp;<b>originales</b>&nbsp;(nueva contribuci&oacute;n al conocimiento) y&nbsp;<b>verificables</b>&nbsp;por grupos independientes, as&iacute; como su posible&nbsp;<b>impacto</b>&nbsp;en la comunidad cient&iacute;fica del &aacute;rea asociada. Esto &uacute;ltimo se mide en t&eacute;rminos de las citas que las publicaciones logren adquirir a trav&eacute;s del tiempo (este &uacute;ltimo elemento es considerado para calcular los factores de impacto de las revistas).</div>
<div style="text-align: justify; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">&nbsp;</div>
<p style="text-align: justify;">Existen otro tipo de publicaciones que tambi&eacute;n ayudan a difundir el quehacer cient&iacute;fico y que sin embargo no son catalogadas como publicaciones&nbsp;cient&iacute;ficas sino de divulgaci&oacute;n.</p>
<div id="accordion2" class="accordion">
<div class="accordion-group">
<div class="accordion-heading"><a href="#collapseUno" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">                         F&iacute;sico Matem&aacute;tico y Ciencias de la Tierra</a></div>
<div class="accordion-body collapse in" id="collapseUno">
<div class="accordion-inner">
<div style="text-align: justify;"><br />

<ul>
<?
//$consulta = mysql_query("SELECT * FROM articulos ORDER BY id DESC");
$consulta = mysql_query("SELECT titulo, autores, editorial FROM articulos WHERE (vigente=1 AND area='fisico' AND year=2020)");

 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			//$id = $registros['id'];
			//$fuente = $registros['fuente'];
			$titulo = trim($registros['titulo']);
			$autores = $registros['autores'];
			//$apellido = $registros['nombreCompleto'];
			$nombre = $registros['nombre'];			
			//$area = $registros['area'];
			//$year = $registros['year'];  
			$editorial = $registros['editorial'];
			//$vigente = $registros['vigente'];
			//$doi = $registros['doi'];
			//$comentarios = $registros['comentarios'];
			
 ?>
	
    	<li><?=$autores." \"".$titulo."\". ".$editorial?></li>
        <br />
  		
	<? $i++; 
	  } ?>
</ul>


</div>
<div style="text-align: justify;">&nbsp;</div>
</div>
</div>
</div>
<div class="accordion-group">
<div class="accordion-heading"><a href="#collapseDos" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">Biolog&iacute;a y Qu&iacute;mica                     </a></div>
<div class="accordion-body collapse" id="collapseDos">
<div class="accordion-inner">&nbsp;</div>


<ul>
<?
//$consulta = mysql_query("SELECT * FROM articulos ORDER BY id DESC");
$consulta = mysql_query("SELECT titulo, autores, editorial FROM articulos WHERE (vigente=1 AND area='biologia' AND year=2020)");

 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			//$id = $registros['id'];
			//$fuente = $registros['fuente'];
			$titulo = trim($registros['titulo']);
			$autores = $registros['autores'];
			//$apellido = $registros['nombreCompleto'];
			$nombre = $registros['nombre'];			
			//$area = $registros['area'];
			//$year = $registros['year'];  
			$editorial = $registros['editorial'];
			//$vigente = $registros['vigente'];
			//$doi = $registros['doi'];
			//$comentarios = $registros['comentarios'];
			
 ?>
	
    	<li><?=$autores." \"".$titulo."\". ".$editorial?></li>
        <br />
  		
	<? $i++; 
	  } ?>
</ul>


</div>
</div>
<div class="accordion-group">
<div class="accordion-heading"><a href="#collapseTres" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">                         Medicina y Ciencias de la Salud                     </a></div>
<div class="accordion-body collapse" id="collapseTres"><br />
<div class="accordion-inner">&nbsp;</div>


<ul>
<?
//$consulta = mysql_query("SELECT * FROM articulos ORDER BY id DESC");
$consulta = mysql_query("SELECT titulo, autores, editorial FROM articulos WHERE (vigente=1 AND area='medicina' AND year=2020)");

 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			//$id = $registros['id'];
			//$fuente = $registros['fuente'];
			$titulo = trim($registros['titulo']);
			$autores = $registros['autores'];
			//$apellido = $registros['nombreCompleto'];
			$nombre = $registros['nombre'];			
			//$area = $registros['area'];
			//$year = $registros['year'];  
			$editorial = $registros['editorial'];
			//$vigente = $registros['vigente'];
			//$doi = $registros['doi'];
			//$comentarios = $registros['comentarios'];
			
 ?>
	
    	<li><?=$autores." \"".$titulo."\". ".$editorial?></li>
        <br />
  		
	<? $i++; 
	  } ?>
</ul>

</div>
</div>
<div class="accordion-group">
<div class="accordion-heading"><a href="#collapseCuatro" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">                         Humanidades y de la Conducta                     </a></div>
<div class="accordion-body collapse" id="collapseCuatro">
<div class="accordion-inner">&nbsp;</div>


<ul>
<?
//$consulta = mysql_query("SELECT * FROM articulos ORDER BY id DESC");
$consulta = mysql_query("SELECT titulo, autores, editorial FROM articulos WHERE (vigente=1 AND area='humanidades' AND year=2020)");

 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			//$id = $registros['id'];
			//$fuente = $registros['fuente'];
			$titulo = trim($registros['titulo']);
			$autores = $registros['autores'];
			//$apellido = $registros['nombreCompleto'];
			$nombre = $registros['nombre'];			
			//$area = $registros['area'];
			//$year = $registros['year'];  
			$editorial = $registros['editorial'];
			//$vigente = $registros['vigente'];
			//$doi = $registros['doi'];
			//$comentarios = $registros['comentarios'];
			
 ?>
	
    	<li><?=$autores." \"".$titulo."\". ".$editorial?></li>
        <br />
  		
	<? $i++; 
	  } ?>
</ul>

</div>
</div>
<div class="accordion-group">
<div class="accordion-heading"><a href="#collapseCinco" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">Sociales y Econ&oacute;mico Administrativas                     </a></div>
<div class="accordion-body collapse" id="collapseCinco">
<div class="accordion-inner">&nbsp;</div>


<ul>
<?
//$consulta = mysql_query("SELECT * FROM articulos ORDER BY id DESC");
$consulta = mysql_query("SELECT titulo, autores, editorial FROM articulos WHERE (vigente=1 AND area='sociales' AND year=2020)");

 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			//$id = $registros['id'];
			//$fuente = $registros['fuente'];
			$titulo = trim($registros['titulo']);
			$autores = $registros['autores'];
			//$apellido = $registros['nombreCompleto'];
			$nombre = $registros['nombre'];			
			//$area = $registros['area'];
			//$year = $registros['year'];  
			$editorial = $registros['editorial'];
			//$vigente = $registros['vigente'];
			//$doi = $registros['doi'];
			//$comentarios = $registros['comentarios'];
			
 ?>
	
    	<li><?=$autores." \"".$titulo."\". ".$editorial?></li>
        <br />
  		
	<? $i++; 
	  } ?>
</ul>

</div>
</div>
<div class="accordion-group">
<div class="accordion-heading"><a href="#collapseSeis" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">                         Biotecnolog&iacute;a y Ciencias Agropecuarias</a></div>
<div class="accordion-body collapse" id="collapseSeis"><br />
<div class="accordion-inner">&nbsp;</div>


<ul>
<?
//$consulta = mysql_query("SELECT * FROM articulos ORDER BY id DESC");
$consulta = mysql_query("SELECT titulo, autores, editorial FROM articulos WHERE (vigente=1 AND area='biotecnologia' AND year=2020)");

 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			//$id = $registros['id'];
			//$fuente = $registros['fuente'];
			$titulo = trim($registros['titulo']);
			$autores = $registros['autores'];
			//$apellido = $registros['nombreCompleto'];
			$nombre = $registros['nombre'];			
			//$area = $registros['area'];
			//$year = $registros['year'];  
			$editorial = $registros['editorial'];
			//$vigente = $registros['vigente'];
			//$doi = $registros['doi'];
			//$comentarios = $registros['comentarios'];
			
 ?>
	
    	<li><?=$autores." \"".$titulo."\". ".$editorial?></li>
        <br />
  		
	<? $i++; 
	  } ?>
</ul>

</div>
</div>
<div class="accordion-group">
<div class="accordion-heading"><a href="#collapseSiete" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">Ingenier&iacute;a                     </a></div>
<div class="accordion-body collapse" id="collapseSiete">
<div class="accordion-inner">&nbsp;</div>


<ul>
<?
//$consulta = mysql_query("SELECT * FROM articulos ORDER BY id DESC");
$consulta = mysql_query("SELECT titulo, autores, editorial FROM articulos WHERE (vigente=1 AND area='ingenieria' AND year=2020)");

 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			//$id = $registros['id'];
			//$fuente = $registros['fuente'];
			$titulo = trim($registros['titulo']);
			$autores = $registros['autores'];
			//$apellido = $registros['nombreCompleto'];
			$nombre = $registros['nombre'];			
			//$area = $registros['area'];
			//$year = $registros['year'];  
			$editorial = $registros['editorial'];
			//$vigente = $registros['vigente'];
			//$doi = $registros['doi'];
			//$comentarios = $registros['comentarios'];
			
 ?>
	
    	<li><?=$autores." \"".$titulo."\". ".$editorial?></li>
        <br />
  		
	<? $i++; 
	  } ?>
</ul>


<p>&nbsp;</p>
</div>
</div>
</div>
<p style="color:#FF0000">&nbsp;</p>
<p>&nbsp;</p>