<?  include('conexion.php'); ?>
  	    
<div id="accordion2" class="accordion">
<!-- Inicia area 1 -->
	<div class="accordion-group" style="display: none;">
		<div class="accordion-heading">
			<a href="#collapse1" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">F&iacute;sico Matem&aacute;tico y Ciencias de la Tierra</a>
		</div>
		<div class="accordion-body collapse in" id="collapse1">
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
            				<strong>Nivel</strong>
            			</td>            		
        			</tr>
                    <?  

					  $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND area='fisico') ORDER BY apellido ASC"; 
					  				 
					$consulta = mysqli_query($cons) or die( "Error en query: $sql, el error  es: " . mysqli_error() );
 
	  while($registros = mysqli_fetch_array($consulta))
					 { 					
					 	$grado	= $registros['grado'];
						$nombre	= htmlentities($registros['nombre']);
						$apellido	= htmlentities($registros['apellido']);
						//$area	= $registros['area'];
						$nivel	= $registros['nivelsni'];
						$dependencia = $registros['dependencia'];
						$mail = $registros['mail'];
						$vigencia = $registros['vigencia'];
						
					 ?>
                                    <tr>
                                      <td valign="top" > 
                                        <? echo $grado." ".$apellido.", ".$nombre; ?></td>
                                      
                                      <td valign="top" > 
                                        <? echo $dependencia; ?></td>
                                      
                                      <td valign="top" > 
                                       	<a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>
                                      
                                      <td valign="top">
									    <? echo $nivel; ?></td>                                      
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
			<a href="#collapse2" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">Biolog&iacute;a y Qu&iacute;mica</a>
		</div>
		<div class="accordion-body collapse" id="collapse2">
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
            			<!--<td>
            				<strong>&Aacute;rea</strong>
            			</td> -->
            			<td>
            				<strong>Nivel</strong>
            			</td>
                        <!-- 
            			<td>
            				<strong>Vigencia</strong>
            			</td> -->
        			</tr>
                    <?  

					  $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND area='biologia') ORDER BY apellido ASC"; 
					  				 
					$consulta = mysqli_query($cons) or die( "Error en query: $sql, el error  es: " . mysqli_error() );
 
	  while($registros = mysqli_fetch_array($consulta))
					 { 					
					 	$grado	= $registros['grado'];
						$nombre	= htmlentities($registros['nombre']);
						$apellido	= htmlentities($registros['apellido']);
						//$area	= $registros['area'];
						$nivel	= $registros['nivelsni'];
						$dependencia = $registros['dependencia'];
						$mail = $registros['mail'];
						$vigencia = $registros['vigencia'];
						
					 ?>
                                    <tr>
                                      <td valign="top" > 
                                        <? echo $grado." ".$apellido.", ".$nombre; ?></td>
                                      
                                      <td valign="top" > 
                                        <? echo $dependencia; ?></td>
                                      
                                      <td valign="top" > 
                                       	<a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>
                                      
                                      <td valign="top">
									    <? echo $nivel; ?></td>
                                       
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
			<a href="#collapse3" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">Medicina y Ciencias de la Salud</a>
		</div>
		<div class="accordion-body collapse" id="collapse3">
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
            			<!--<td>
            				<strong>&Aacute;rea</strong>
            			</td> -->
            			<td>
            				<strong>Nivel</strong>
            			</td>
                        <!-- 
            			<td>
            				<strong>Vigencia</strong> 
            			</td> -->
        			</tr>
                    <?  

					  $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND area='medicina') ORDER BY apellido ASC"; 
					  				 
					$consulta = mysqli_query($cons) or die( "Error en query: $sql, el error  es: " . mysqli_error() );
 
	  while($registros = mysqli_fetch_array($consulta))
					 { 					
					 	$grado	= $registros['grado'];
						$nombre	= htmlentities($registros['nombre']);
						$apellido	= htmlentities($registros['apellido']);
						//$area	= $registros['area'];
						$nivel	= $registros['nivelsni'];
						$dependencia = $registros['dependencia'];
						$mail = $registros['mail'];
						$vigencia = $registros['vigencia'];
						
					 ?>
                                    <tr>
                                      <td valign="top" > 
                                        <? echo $grado." ".$apellido.", ".$nombre; ?></td>
                                      
                                      <td valign="top" > 
                                        <? echo $dependencia; ?></td>
                                      
                                      <td valign="top" > 
                                       	<a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>
                                      
                                      <td valign="top">
									    <? echo $nivel; ?></td>
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
			<a href="#collapse4" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">Humanidades y de la Conducta</a>
		</div>
		<div class="accordion-body collapse" id="collapse4">
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
            				<strong>Nivel</strong>
            			</td>                        
        			</tr>
                    <?  

					  $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND area='humanidades') ORDER BY apellido ASC"; 
					  				 
					$consulta = mysqli_query($cons) or die( "Error en query: $sql, el error  es: " . mysqli_error() );
 
	  while($registros = mysqli_fetch_array($consulta))
					 { 					
					 	$grado	= $registros['grado'];
						$nombre	= htmlentities($registros['nombre']);
						$apellido	= htmlentities($registros['apellido']);
						//$area	= $registros['area'];
						$nivel	= $registros['nivelsni'];
						$dependencia = $registros['dependencia'];
						$mail = $registros['mail'];
						$vigencia = $registros['vigencia'];
						
					 ?>
                                    <tr>
                                      <td valign="top" > 
                                        <? echo $grado." ".$apellido.", ".$nombre; ?></td>
                                      
                                      <td valign="top" > 
                                        <? echo $dependencia; ?></td>
                                      
                                      <td valign="top" > 
                                       	<a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>
                                      
                                      <td valign="top">
									    <? echo $nivel; ?></td>                                       
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
			<a href="#collapse5" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">Sociales y Econ&oacute;mico Administrativas</a>
		</div>
		<div class="accordion-body collapse" id="collapse5">
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
            				<strong>Nivel</strong>
            			</td>                        
        			</tr>
                    <?  

					  $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND area='sociales') ORDER BY apellido ASC"; 
					  				 
					$consulta = mysqli_query($cons) or die( "Error en query: $sql, el error  es: " . mysqli_error() );
 
	  while($registros = mysqli_fetch_array($consulta))
					 { 					
					 	$grado	= $registros['grado'];
						$nombre	= htmlentities($registros['nombre']);
						$apellido	= htmlentities($registros['apellido']);
						//$area	= $registros['area'];
						$nivel	= $registros['nivelsni'];
						$dependencia = $registros['dependencia'];
						$mail = $registros['mail'];
						$vigencia = $registros['vigencia'];
						
					 ?>
                                    <tr>
                                      <td valign="top" > 
                                        <? echo $grado." ".$apellido.", ".$nombre; ?></td>
                                      
                                      <td valign="top" > 
                                        <? echo $dependencia; ?></td>
                                      
                                      <td valign="top" > 
                                       	<a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>
                                      
                                      <td valign="top">
									    <? echo $nivel; ?></td>                                       
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
			<a href="#collapse6" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">Biotecnolog&iacute;a y Ciencias Agropecuarias</a>
		</div>
		<div class="accordion-body collapse" id="collapse6">
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
            			<!--<td>
            				<strong>&Aacute;rea</strong>
            			</td> -->
            			<td>
            				<strong>Nivel</strong>
            			</td>
                        <!-- 
            			<td>
            				<strong>Vigencia</strong> 
            			</td> -->
        			</tr>
                    <?  

					  $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND area='biotecnologia') ORDER BY apellido ASC"; 
					  				 
					$consulta = mysqli_query($cons) or die( "Error en query: $sql, el error  es: " . mysqli_error() );
 
	  while($registros = mysqli_fetch_array($consulta))
					 { 					
					 	$grado	= $registros['grado'];
						$nombre	= htmlentities($registros['nombre']);
						$apellido	= htmlentities($registros['apellido']);
						//$area	= $registros['area'];
						$nivel	= $registros['nivelsni'];
						$dependencia = $registros['dependencia'];
						$mail = $registros['mail'];
						$vigencia = $registros['vigencia'];
						
					 ?>
                                    <tr>
                                      <td valign="top" > 
                                        <? echo $grado." ".$apellido.", ".$nombre; ?></td>
                                      
                                      <td valign="top" > 
                                        <? echo $dependencia; ?></td>
                                      
                                      <td valign="top" > 
                                       	<a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>
                                      
                                      <td valign="top">
									    <? echo $nivel; ?></td>
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
			<a href="#collapse7" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">Ingenier&iacute;a</a>
		</div>
		<div class="accordion-body collapse" id="collapse7">
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
            			<!--<td>
            				<strong>&Aacute;rea</strong>
            			</td> -->
            			<td>
            				<strong>Nivel</strong>
            			</td>
                        <!-- 
            			<td>
            				<strong>Vigencia</strong>
            			</td> -->
        			</tr>
                    <?  

					  $cons = "SELECT * FROM sniinvestigadores WHERE (vigente=1 AND area='ingenieria') ORDER BY apellido ASC"; 
					  				 
					$consulta = mysqli_query($cons) or die( "Error en query: $sql, el error  es: " . mysqli_error() );
 
	  while($registros = mysqli_fetch_array($consulta))
					 { 					
					 	$grado	= $registros['grado'];
						$nombre	= htmlentities($registros['nombre']);
						$apellido	= htmlentities($registros['apellido']);
						//$area	= $registros['area'];
						$nivel	= $registros['nivelsni'];
						$dependencia = $registros['dependencia'];
						$mail = $registros['mail'];
						$vigencia = $registros['vigencia'];
						
					 ?>
                                    <tr>
                                      <td valign="top" > 
                                        <? echo $grado." ".$apellido.", ".$nombre; ?></td>
                                      
                                      <td valign="top" > 
                                        <? echo $dependencia; ?></td>
                                      
                                      <td valign="top" > 
                                       	<a href="mailto:<? echo $mail; ?>"><? echo $mail; ?></a></td>
                                      
                                      <td valign="top">
									    <? echo $nivel; ?></td>
                                    </tr>
                     <? 
					 }
					 ?>
        
		
		
	</table>
			</div>
		</div>
</div>
<!--Cambia área, agregar nuevo grupo  por cada nueva area-->
       <!-- Mas grupos como numero de areas tengas.
</div>