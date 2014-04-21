<?php   //session_start();
        error_reporting(0);
	include 'jsonfiles.php';
	
	/*echo "<pre>";
		var_dump($_POST);
	echo "</pre>";	
         * 
         */
	
if($_POST){
		extract($_POST);		                               
             
		switch ($combo){
                        case 'guardarImagenesPlr':
                                                           if(JsonFiles::crear_archivo_imagenesPlr($pilar,$contenido)){
                                                                    //echo true;
                                                            }	 
                                                            else{
                                                                    //echo false;
                                                            }
                                                            
                                                        
					
			break;
                        case 'guardarImagenes':
                                                           if(JsonFiles::crear_archivo_imagenes($pilar,$prg,$contenido)){
                                                                    echo true;
                                                            }	 
                                                            else{
                                                                    echo false;
                                                            }
                                                            
                                                        
					
			break;
                        
                        case 'guardarSeleccion':
                                                            $cadena = $_POST['cadena'];
                                                            $archivo =$_POST['nombre'].".json";

                                                            if(JsonFiles::crear_archivo($archivo,$cadena)){
                                                                    echo "Creacion correcta del archivo".$archivo;
                                                            }	 
                                                            else{
                                                                    echo "Ocurrio un erroe al escribir el archivo".$archivo;
                                                            }

					
			break;
                        
                        
                }
}
	
		
?>
