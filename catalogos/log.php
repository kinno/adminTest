<?php
session_start();
$ban=false;
if($_POST){
    extract($_POST);
    switch ($accion) {
        case 'login':
                       
                        $archivo = fopen ("../arc/logs.txt","r") or exit("No se puede leer el achivo");
                        $contador = 0;
                        while (!feof($archivo)) {
                                $linea = fgets($archivo);
                                if( ++$contador > 6 )
                                {
                                       
                                     if(trim($linea) == ''.$usuario.'-'.$pass.';'){
                                        $_SESSION['name']=$usuario;
                                        $ban=true;
                                     }
                                     
                                }
                        }
                        fclose ($archivo);
                            echo $ban;
            break;

        case 'logout':
                        session_destroy();
            break;
    
    

    }
}
else{
    echo $ban;
}

?>
