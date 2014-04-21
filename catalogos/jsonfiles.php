<?php
class JsonFiles{
	
    public static function crear_archivo($archivo, $cadena){
									
        $datos = json_encode($cadena
                              );		

        if(JsonFiles::escribir_archivo($datos, $archivo)){
                return TRUE;
        }
        else{
                echo "Error al escribir el archivo";
        }

    }
	
    //funcion encargada de escribir los archivos json con la informacion de los arboles	
    public static function escribir_archivo($cadena, $file){

        $file = fopen("../arc/".$file, "wb");
        if(fwrite($file, $cadena)){
                //si se realizo la escritura correcta del archivo se cierra			
                fclose($file);
                return TRUE;				
        }
        else{			
                return FALSE;			
        }										
    }
	
	//funcion encargada de escribir los archivos json con la informacion de los arboles	
    
    public static function crear_archivo_imagenes($pilar,$prg,$array){

        //REVISAR LA INSERCION DE LAS IMAGENES !!!!!!!!!!!!!!!!!!!!!
        $file = @fopen("../arc/".$pilar."contenido.json", "rb");
            //Verifica si existe el archivo
            if($file){
                
              $contenido = fread($file,filesize("../arc/".$pilar."contenido.json"));
              fclose($file);
             $arrayDatos = (array)json_decode($contenido);
             $ban=0;
             foreach ($arrayDatos as $k=>$v){
                 if($v->idPrg==$prg){
                    
                     $array2=end($array);
                     
                     $v->imagenes=$array2['imagenes'];
                     $v->descripcion=$array2['descripcion'];                     
                     $ban=1;
                 }

             }
             if($ban==0){
                  array_push($arrayDatos,end($array));
             }
             
             $arrayDatos = json_encode($arrayDatos);
           $file = fopen("../arc/".$pilar."contenido.json", "wb");
                if(fwrite($file, $arrayDatos)){
                        //si se realizo la escritura correcta del archivo se cierra			
                        fclose($file);
                        return TRUE;				
                }
                else{			
                        return FALSE;			
                }		
          }
          //Cuando no existe el archivo lo crea e inserta los los datos
          else{
              
              $file = fopen("../arc/".$pilar."contenido.json", "wb");
              $arrayDatos = json_encode($array);
                if(fwrite($file, $arrayDatos)){
                        //si se realizo la escritura correcta del archivo se cierra			
                        fclose($file);
                        return TRUE;				
                }
                else{			
                        return FALSE;			
                }		
          }
          
         
    }
    public static function crear_archivo_imagenesPlr($pilar,$array){
        
        //REVISAR LA INSERCION DE LAS IMAGENES !!!!!!!!!!!!!!!!!!!!!
        $file = @fopen("../arc/imagenesPilar.json", "rb");
            //Verifica si existe el archivo
            if($file){
                
              $contenido = fread($file,filesize("../arc/imagenesPilar.json"));
              fclose($file);
             $arrayDatos = (array)json_decode($contenido);
             $ban=0;
             foreach ($arrayDatos as $k=>$v){
                 if($v->idPlr==$pilar){
                     $array = end($array);
//                     echo 'si '.$array['imagenes'];
                     $v->imagenes=$array['imagenes'];       
                     $ban=1;
                 }

             }
             if($ban==0){
                  array_push($arrayDatos,end($array));
             }
             
             $arrayDatos = json_encode($arrayDatos);
             
           $file = fopen("../arc/imagenesPilar.json", "wb");
                if(fwrite($file, $arrayDatos)){
                        //si se realizo la escritura correcta del archivo se cierra			
                        fclose($file);
                        echo 'Imagen Guardada';				
                }
                else{			
                        echo 'Error';	
                }		
          }
          //Cuando no existe el archivo lo crea e inserta los los datos
          else{
              
              $file = fopen("../arc/imagenesPilar.json", "wb");
              $arrayDatos = json_encode($array);
                if(fwrite($file, $arrayDatos)){
                        //si se realizo la escritura correcta del archivo se cierra			
                        fclose($file);
                        return TRUE;				
                }
                else{			
                        return FALSE;			
                }		
          }
          
         
    }
	
	//funcion encargada de escribir los archivos json con la informacion de los arboles	

        
	
}
	 
?>