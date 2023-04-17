<style type="text/css">
tr#titular{
background:#2CA93C;
color:#FFFFFF;
}
/*para alternar el color entre las filas*/
tr:nth-child(odd){ background: #CFE2CE;}
tr:nth-child(even){ background: #FFFFFF;}	
</style>
    <h2 class="verde"><img src="imagenes/vineta.jpg" /><strong>SNI Nivel</strong></h2>
    
    <div align="right"><p align="right"><strong><font color="#FD8431">Buscar Nivel</font></strong>
                                  <select style="display:inline; float:none; width:100px" name="nivel" onchange = "location.href='home-gral.php?opc=sni_nivel&res='+this.value" >
                                    <option selected> ... </option>
                                    <option value="candidato">Candidato</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                  </select>
                                </p>
                              </div>
    
     <p align="center" class="titulo"><strong class="verde"><strong class="verde"><strong class="verde"><strong class="verde"><strong class="verde"><strong class="verde">Nivel: 
                                  <? 
					 if (isset($_GET['res']))
					  {
					  $res= $_GET['res'];
					  }else 
					  $res= "Todos"; 
					  echo "$res";
					  ?>
                                  </strong></strong></strong></strong></strong> 
                                  </strong></p>
    
  	<table id="sni">
    	<tr id="titular" class="blanco fondo_verde">
        	<td>
            	<strong>Investigador</strong>
            </td>
            <td>
            	<strong>&Aacute;rea</strong>
            </td>
            <td>
            	<strong>Nivel</strong>
            </td>
            <td>
            	<strong>Vigencia</strong>
            </td>
        </tr>
        
         <?  
		  if (isset($_GET['res'])){
				  $cons = "SELECT * FROM sniinvestigadores WHERE vigente=1 AND nivelsni = '$res' ORDER BY area ASC";	  }
				else{ 
					  $cons = "SELECT * FROM sniinvestigadores WHERE vigente=1 ORDER BY area ASC"; }
					  				 
					 include('conexion.php');
					 
					$consulta = mysql_query($cons) or die( "Error en query: $sql, el error  es: " . mysql_error() );
 
	  while($registros = mysql_fetch_array($consulta))
					 { 					
					 	$grado	= $registros['grado'];
						$nombre	= $registros['nombre'];
						$area	= $registros['area'];
						$nivel	= $registros['nivelsni'];
						$vigencia = $registros['vigencia'];
						
					 ?>
                                    <tr>
                                      <td valign=top bordercolor="#F5F5F5"> 
                                        <? echo $grado." ".$nombre?></td>
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
                                      <td valign=top bordercolor="#F5F5F5">
									    <? echo $nivel?></td>
                                      <td valign=top bordercolor="#F5F5F5"> 
                                        <? echo $vigencia?></td>
                                    </tr>
                     <? 
					 }
					 ?>
        
		
		
	</table>