<?php
session_start();
include("../adodb/adodb.inc.php");
include("../inc/cnxbds.php");
header('Content-Type: text/html; charset=utf-8');
if($_POST){
		extract($_POST);		                               
             
		switch ($combo){
                        case 'pilaresADM':
                                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            $sSql = "SELECT * from catplr";
                                                            
                                                            $rs = &$cnn->Execute($sSql);
                                                            echo '<table>
                                                                    <tr>
                                                                        <td><center><span class="h1">Pilares Temáticos</span></center></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                        <table border="0" class="tablaPilar" cellpadding="15">
                                                                        ';  
                                                                            $i=0;
                                                                            while(!$rs->EOF){
                                                                                    echo '<tr><td id="'.$rs->fields['idPlr'].'" onClick="buscaProgramasAdm('.$rs->fields['idPlr'].',this);">'.$rs->fields['DscPlr']."</td></tr>";
                                                                                    $rs->movenext();
                                                                                    $i++;
                                                                            }
                                                                echo '  
                                                                        </table>
                                                                    </td>
                                                                    </tr>
                                                                </table>
                                                                ';
                                                        
					
			break;
                        
                        case 'tablaContenidoPlr':
                                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            $sSql = "SELECT * from catplr";
                                                            
                                                            $rs = &$cnn->Execute($sSql);
                                                            echo '<center>
                                                                <table border="0" style="margin-top:40px;">
                                                                        ';  
                                                                            $i=1;
                                                                            while(!$rs->EOF){
                                                                                    echo ' <tr><td id="'.$i.'" onclick="showpanelPlr(this);" style="width:100%;" class="btnPlr" >'.$rs->fields['DscPlr']."</td></tr>";
                                                                                    $rs->movenext();
                                                                                    $i++;
                                                                            }
                                                                /*echo '  
                                                                    
                                                                    <tr class="menuPilares">';
                                                               
                                                                for($i=1;$i<=6;$i++){
                                                                    $file = @fopen("../arc/".$i.".json", "rb");
                                                                    $contenido = @fread($file,filesize("../arc/".$i.".json"));
                                                                    @fclose($file);
                                                                    $arrayDatos = json_decode($contenido);
                                                                    echo '<td id="p'.$i.'" style="display:none; position:absolute;">
                                                                            <ul>';
                                                                    if(is_array($arrayDatos)){
                                                                    foreach ($arrayDatos as $k=>$dat){
                                                                            echo '<li class="prgContenido" id="prg'.$dat->idPrg.'" style="width:99%; cursor:pointer;" onclick="configuraContenido('.$dat->idPrg.',this)">'.@$dat->nombrePrg.'</li>';
                                                                            
                                                                        }
                                                                    echo '</ul></td>';    
                                                                    }
                                                                }
                                                                */
                                                                echo '
                                                                <tr>    
                                                                </table></center>';
                                                        
					
			break;
                        
                        case 'tablaContenido':
                                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            $sSql = "SELECT * from catplr";
                                                            
                                                            $rs = &$cnn->Execute($sSql);
                                                            echo '<center><table border="0">
                                                                    
                                                                    <tr>
                                                                        ';  
                                                                            $i=1;
                                                                            while(!$rs->EOF){
                                                                                    echo '<td id="'.$i.'" onclick="showProgramas(this);" class="btnPlr" style="width:16%;">'.$rs->fields['DscPlr']."</td>";
                                                                                    $rs->movenext();
                                                                                    $i++;
                                                                            }
                                                                echo '  
                                                                    </tr>
                                                                    <tr class="menuPilares">';
                                                               
                                                                for($i=1;$i<=6;$i++){
                                                                    $file = @fopen("../arc/".$i.".json", "rb");
                                                                    $contenido = @fread($file,filesize("../arc/".$i.".json"));
                                                                    @fclose($file);
                                                                    $arrayDatos = json_decode($contenido);
                                                                    echo '<td id="p'.$i.'" style="display:none; position:absolute;">
                                                                            <ul>';
                                                                    if(is_array($arrayDatos)){
                                                                    foreach ($arrayDatos as $k=>$dat){
                                                                            echo '<li class="prgContenido" id="prg'.$dat->idPrg.'" style="width:99%; cursor:pointer;" onclick="configuraContenido('.$dat->idPrg.',this)">'.@$dat->nombrePrg.'</li>';
                                                                            
                                                                        }
                                                                    echo '</ul></td>';    
                                                                    }
                                                                }
                       
                                                                echo '
                                                                <tr>    
                                                                </table></center>';
                                                        
					
			break;
                        
                        case 'tablaContenidoIndicador':
                                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            $sSql = "SELECT * from catplr";
                                                            
                                                            $rs = &$cnn->Execute($sSql);
                                                            echo '<div style="width:100%">
                                                                    <ul class="nav" >
                                                                     ';
                                                            $i=1;
                                                            while(!$rs->EOF){
                                                                
                                                                echo '<li>
                                                                        <a>'.$rs->fields['DscPlr']."</a>";
                                                                
                                                                $rs->movenext();
                                                                
                                                                                
                                                                echo  '<ul>';
                                                                
                                                                    $file = @fopen("../arc/".$i.".json", "rb");
                                                                    $contenido = @fread($file,filesize("../arc/".$i.".json"));
                                                                    @fclose($file);
                                                                    $arrayDatos = json_decode($contenido);
                                                                    if(is_array($arrayDatos)){
                                                                    foreach ($arrayDatos as $k=>$dat){
                                                                            echo '<li id="prg'.$dat->idPrg.'">
                                                                                    <a>'.@$dat->nombrePrg.'</a>
                                                                                        <ul>';
                                                                                        $indicadores="";
                                                                                        foreach ($dat->IdIdr as $py){
                                                                                         $indicadores=$indicadores.",".$py;
                                                                                        }
                                                                                        $indicadores=substr($indicadores, 1);
                                                                                        $cnn->Execute("set names 'utf8'");
                                                                                        $sSql='';
                                                                                        $rs2='';
                                                                                        $sSql="select * from rdfbatidr
                                                                                                    left join rdfidraln on rdfbatidr.idIdr = rdfidraln.idIdr
                                                                                                    where rdfbatidr.idIdr in (
                                                                                                    select distinct
                                                                                                        (IdIdr)
                                                                                                    FROM
                                                                                                        infIdr
                                                                                                    where
                                                                                                        idIdr IN (SELECT 
                                                                                                                IdIdr
                                                                                                            FROM
                                                                                                                spp2012.rdfidraln
                                                                                                            where
                                                                                                                idIdr in (".$indicadores.")))";
                                                                                        
                                                                                         //$sSql = "SELECT * FROM prytxtidr where IdIdr in (".$indicadores.")";
                                                                                         
                                                                                        $rs2 = &$cnn->Execute($sSql);
                                                                                        
                                                                                        while(!$rs2->EOF){
                                                                                            echo '<li ><a onclick="agregaContenidoIndicador('.$rs2->fields['idPlr'].','.$rs2->fields['idPrg'].','.$rs2->fields['idIdr'].')" id='.$rs2->fields['idIdr'].'>'.$rs2->fields['NomIdr'].'</a></li>';
                                                                                            $rs2->movenext();
                                                                                        }
                                                                            echo       '</ul>
                                                                                  </li>';
                                                                            
                                                                        }
                                                                    echo '</ul>';    
                                                                    }
                                                                  
                                                                  
                                                        echo         '</li>
                                                                       ';
                                                                $i++;
                                                                
                                                            }
                                                            echo ' </ul>
                                                                </div>
                                                                
                                                                ';
                                                            /*
                                                            echo '<center><table border="0">
                                                                    
                                                                    <tr>
                                                                        ';  
                                                                            $i=1;
                                                                            while(!$rs->EOF){
                                                                                    echo '<td id="'.$i.'" onclick="showProgramas(this);" class="btnPlr" style="width:16%;">'.$rs->fields['DscPlr']."</td>";
                                                                                    $rs->movenext();
                                                                                    $i++;
                                                                            }
                                                                echo '  
                                                                    </tr>
                                                                    <tr class="menuPilares">';
                                                               
                                                                for($i=1;$i<=6;$i++){
                                                                    $file = @fopen("../arc/".$i.".json", "rb");
                                                                    $contenido = @fread($file,filesize("../arc/".$i.".json"));
                                                                    @fclose($file);
                                                                    $arrayDatos = json_decode($contenido);
                                                                    echo '<td id="p'.$i.'" style="display:none; position:absolute;">
                                                                            <ul>';
                                                                    if(is_array($arrayDatos)){
                                                                    foreach ($arrayDatos as $k=>$dat){
                                                                            echo '<li class="prgContenido" id="prg'.$dat->idPrg.'" style="width:99%; cursor:pointer;" onclick="configuraContenido('.$dat->idPrg.',this)">'.@$dat->nombrePrg.'</li>';
                                                                            
                                                                        }
                                                                    echo '</ul></td>';    
                                                                    }
                                                                }
                       
                                                                echo '
                                                                <tr>    
                                                                </table></center>';
                                                             * */
                                                             
                                                        
					
			break;
                        
                        case 'programasADM':
                                                            $_SESSION['idPlr']=$idPlr;
                                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            $sSql = "SELECT reldatprg.idPrg,catestprg.DscPrg from reldatprg
                                                                            join catestprg on catestprg.idPrg = reldatprg.idPrg 
                                                                            where idPlr ='$idPlr' and catestprg.TpoPrg='P';";
                                                            
                                                            $rs = &$cnn->Execute($sSql);
                                                            echo '  
                                                                    <table >
                                                                    <tr>
                                                                        <td><center><span class="h1">Programas</span></center></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td>
                                                                    ';    
                                                            $i=0;
                                                             $file = @fopen("../arc/".$idPlr.".json", "rb");
                                                                   
                                                                $contenido = @fread($file,filesize("../arc/".$idPlr.".json"));
                                                                if($contenido!='null'){
                                                                   
                                                                @fclose($file);
                                                               
                                                                    while(!$rs->EOF){
                                                                        
                                                                        $checked = '';
                                                                        if(stristr($contenido,'"idPrg":"'.$rs->fields['idPrg'].'"')){
                                                                            
                                                                            $checked = "checked=checked";
                                                                        }
                                                                            echo '<input type="checkbox" '.$checked.' id="prg'.$i.'" onclick="buscaProyectosAdm(this.value,this)" value="'.$rs->fields['idPrg'].'"/><span >'.$rs->fields['DscPrg']."</span><br>";
                                                                            $rs->movenext();
                                                                            $i++;
                                                                    }
                                                                }
                                                                 else {
                                                                     while(!$rs->EOF){
                                                                            echo '<input type="checkbox" id="prg'.$i.'" onclick="buscaProyectosAdm(this.value,this)" value="'.$rs->fields['idPrg'].'"/><span >'.$rs->fields['DscPrg']."</span><br>";
                                                                            $rs->movenext();
                                                                            $i++;
                                                                    }
                                                                 }
                                                              
                                                            echo '  
                                                                    </td>
                                                                    </tr>
                                                                </table>
                                                               ';
                                                        
					
			break;
                        
                        case 'proyectosADM':
                                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            //$sSql = "select * from catestprg where idPrg in (select idPrgPry from relprgpry where idPrgPrg ='$idPrg');";
                                                            $sSql="select * from rdfbatidr
                                                                        where idIdr in (
                                                                        select distinct
                                                                            (IdIdr)
                                                                        FROM
                                                                            infIdr
                                                                        where
                                                                            idIdr IN (SELECT 
                                                                                    IdIdr
                                                                                FROM
                                                                                    spp2012.rdfidraln
                                                                                where
                                                                                    idPlr = ".$_SESSION['idPlr']." and idPrg = ".$idPrg."))
                                                                        ;";
                                                            //$sSql = "SELECT * FROM spp2012.prytxtidr where idPlr=".$_SESSION['idPlr']." and IdPrg=".$idPrg."";
                                                            $rs = &$cnn->Execute($sSql);
                                                            echo '<h3 id="p'.$idPrg.'" onclick="muestraDiv('.$idPrg.')" style="float:none; cursor:pointer;" title="Mostrar/Ocultar">'.$head.'</h3>
                                                                    <div id="'.$idPrg.'" class="pry" style="display:none; padding-bottom: 10px;">
                                                                    ';    
                                                             $file = @fopen("../arc/".$_SESSION['idPlr'].".json", "rb");
                                                                   
                                                                $contenido = @fread($file,filesize("../arc/".$_SESSION['idPlr'].".json"));
                                                                @fclose($file);
                                                                $arrayDatos = json_decode($contenido);
                                                                
                                                            while(!$rs->EOF){
                                                                
                                                                    $checked = '';
                                                                    
                                                                       if(is_array($arrayDatos)){
                                                                            foreach ($arrayDatos as $k=>$v){
                                                                                    if(isset($v->IdIdr)){
                                                                                    foreach ($v->IdIdr as $py){
                                                                                         if($py==$rs->fields['idIdr']){
                                                                                             $checked = "checked=checked";
                                                                                         }
                                                                                    }
                                                                                    }

                                                                             }
                                                                       }
                                                                    echo '<input type="checkbox" '.$checked.' value="'.$rs->fields['idIdr'].'"/>'.$rs->fields['NomIdr'].
                                                                            "<br>";
                                                                    $rs->movenext();
                                                            }
                                                            echo '  </div>';
                                                            
                                                        
					
			break;
                        
                        case 'evidenciasADM':
                                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            //$sSql = "select * from catestprg where idPrg in (select idPrgPry from relprgpry where idPrgPrg ='$idPrg');";
                                                            $sSql = "SELECT IdIdr FROM sed_relidrevi where IdPlr=".$IdPlr." and IdPrg=".$IdPrg." and IdIdr=".$IdIdr."";
                                                            $rs = &$cnn->Execute($sSql);
                                                            if($rs->fields){
                                                                $campos='';
                                                                if($imagenes!=''){
                                                                    $campos = $campos.',RtaImg="'.$imagenes.'"';
                                                                }
                                                                if($videos!=''){
                                                                    $campos = $campos.',RtaVdo="'.$videos.'"';
                                                                }
                                                                if($documentos!=''){
                                                                    $campos = $campos.',RtaDoc="'.$documentos.'"';
                                                                }
                                                                if($referencias!=''){
                                                                    $campos = $campos.',Georef="'.$referencias.'"';
                                                                }
                                                                
                                                                $campos=substr($campos, 1);
                                                                
                                                                 $sSql = "UPDATE sed_relidrevi set ".$campos." WHERE idPlr=".$IdPlr." AND idPrg=".$IdPrg." AND idIdr=".$IdIdr.""; 
                                                                    
                                                                    if($rs = &$cnn->Execute($sSql))
                                                                        echo "Datos Guardados";
                                                                    else
                                                                        echo "Ocurrió un Error";
                                                            
                                                            }
                                                            else{
                                                                $sSql = "INSERT INTO sed_relidrevi (idPlr,idPrg,idIdr,RtaImg,RtaVdo,RtaDoc,Georef) VALUES (".$IdPlr.",".$IdPrg.",".$IdIdr.",'".$imagenes."','".$videos."','".$documentos."','".$referencias."')"; 
                                                                    
                                                                    if($rs = &$cnn->Execute($sSql))
                                                                        echo "Datos Guardados";
                                                                    else
                                                                        echo "Ocurrió un Error";
                                                                
                                                            }
                                                            
                                                            
                                                        
					
			break;
                        
                        case 'pilares':
                                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            $sSql = "SELECT * from catplr";
                                                            $imagenes = Array();
                                                            $rs = &$cnn->Execute($sSql);
                                                            $file = @fopen("../arc/imagenesPilar.json", "rb");
                                                                if($file){
                                                                    $contenido = @fread($file,filesize("../arc/imagenesPilar.json"));
                                                                    @fclose($file);
                                                                    $arrayDatos = json_decode($contenido);
                                                                    if(is_array($arrayDatos)){
                                                                    foreach ($arrayDatos as $k=>$dat){
                                                                   array_push( $imagenes,$dat->imagenes);
                                                                    }
                                                                    }
                                                                }
                                                                
                                                                            $i=0;
                                                                            
                                                                            while(!$rs->EOF){
                                                                                    echo '
                                                                                            <div class="sbi_panel" data-bg="images/'.@$imagenes[$i].'">
                                                                                                    <a href="#" class="sbi_label gc">'.$rs->fields['DscPlr'].'</a>
                                                                                                    <div id="plr'.$rs->fields['idPlr'].'" class="sbi_content">

                                                                                                    </div>    

                                                                                            </div>
                                                                                        ';
                                                                                    $rs->movenext();
                                                                                    $i++;
                                                                            }
                                                                             
                                                        
					
			break;
                        
                        case 'programasPilar':
                                                            $programas='';
                                                            $file = fopen("../arc/".$nPilar.".json", "rb");
                                                              if($file){      
                                                                $contenido = fread($file,filesize("../arc/".$nPilar.".json"));
                                                                if($contenido=='null')
                                                                    break;
                                                                fclose($file);
                                                                $arrayDatos = json_decode($contenido);

                                                                foreach ($arrayDatos as $k=>$v){
                                                                   $programas=$programas.",".$v->idPrg."";

                                                                }
                                                                $programas=substr($programas, 1);


                                                                $cnn->Execute("set names 'iso-8859-1'");
                                                                $sSql = "SELECT reldatprg.idPrg,catestprg.DscPrg from reldatprg
                                                                        join catestprg on catestprg.idPrg = reldatprg.idPrg where idPlr ='".$nPilar."' and catestprg.TpoPrg='P' and catestprg.idPrg in (".$programas.");";

                                                                $rs = &$cnn->Execute($sSql);
                                                                echo '
                                                                        
                                                                       <div class="nano">
                                                                        
                                                                        <ul>
                                                                        ';    
                                                                while(!$rs->EOF){
                                                                        echo '<li><a onclick=muestraInfo('.$nPilar.','.$rs->fields['idPrg'].',this); style="cursor:pointer;">'.$rs->fields['DscPrg'].'</a></li>';
                                                                        $rs->movenext();
                                                                }
                                                                echo '  </ul>
                                                                       
                                                                        </div>
                                                                        
                                                                        ';
                                                                        
                                                            }  
			break;
                        
                        case 'buscaProyectos':
                                                            $proyectos='';
                                                            $imagenes=Array();
                                                            $file = @fopen("../arc/".$idPlr.".json", "rb");
                                                            $fileContent = @fopen("../arc/".$idPlr."contenido.json", "rb");
                                                            
                                                              if($file){      
                                                                $contenido = @fread($file,filesize("../arc/".$idPlr.".json"));
                                                                $content = @fread($fileContent,filesize("../arc/".$idPlr."contenido.json"));
                                                                if($contenido=='null')
                                                                    break;
                                                                @fclose($file);
                                                                $arrayDatos = json_decode($contenido);
                                                                $arrayContent = json_decode($content);

                                                                foreach ($arrayDatos as $k=>$v){
                                                                    if($v->idPrg==$idPrg){
                                                                        foreach ($v->idPry as $pry) {
                                                                            $proyectos=$proyectos.",".$pry."";
                                                                        }
                                                                    }

                                                                }
                                                                if(is_array($arrayContent)){
                                                                foreach ($arrayContent as $k=>$v){
                                                                    if($v->idPrg==$idPrg){    
                                                                            foreach ($v->imagenes as $img) {
                                                                                array_push($imagenes, $img);
                                                                                }
                                                                            $descripcion = $v->descripcion;    
                                                                        }
                                                                    
                                                                }
                                                                }
                                                                
                                                                $proyectos=substr($proyectos, 1);
                                                               
                                                                //print_r($imagenes); 
                                                                $cnn->Execute("set names 'iso-8859-1'");
                                                                $sSql = "select * from catestprg where idPrg in (select idPrgPry from relprgpry where idPrgPry in (".$proyectos."));";

                                                                $rs = &$cnn->Execute($sSql);
                                                                echo '
                                                                       <div class="contentSelect" style="padding:15px;">
                                                                       <table style="width:100%" border="1">
                                                                        <tr><td colspan="2" class="headerTabla">'.$tituloPrograma.'</td></tr>
                                                                        <tr>
                                                                            <td style="width: 455px;padding: 10px;">
                                                                                <div class="contenedorSlider" style="width:500px;">
                                                                                    <div id="slider" class="nivoSlider">';
                                                                                    for($i=0;$i<count($imagenes);$i++){
                                                                                     echo '<img src="server/uploads/'.$imagenes[$i].'" />';
                                                                                    }
                                                                                echo'</div>
                                                                                </div>    
                                                                            </td>
                                                                            <td><p>'.@$descripcion.'</p></td></tr>
                                                                        <tr><td colspan="2" id="proyects"><div id="prys">
                                                                        ';    
                                                                                $i=0;
                                                                while(!$rs->EOF){
                                                                        echo '<input type="checkbox" id="'.$i.'" value="'.$rs->fields['idPrg'].'"/>'.$rs->fields['CvePrg']."-".$rs->fields['DscPrg']."<br>";
                                                                        $rs->movenext();
                                                                        $i++;
                                                                }
                                                                echo '
                                                                        </div>
                                                                        
                                                                        </td><td  colspan="2" id="tableros" style="display:none;"></td></tr>
                                                                        <tr><td colspan="2" id="btnProyects"><div style="float:right;"><button onclick="menu()">Regresar</button><button onclick="despliegaTableros();">Generar Consulta</button></div></td>
                                                                        <td colspan="2" id="btnTableros" style="display:none;"><div style="float:right;"><button onclick="proyectos()">Regresar</button></div></td></tr>
                                                                       </table>
                                                                       </div>
                                                                       ';
                                                                        
                                                            }  
			break;
                        
                        case 'buscaIndicadores':
                                                            echo '<script>var total=0;</script>';
                                                            $proyectos='';
                                                            $imagenes= Array();
                                                            $file = @fopen("../arc/".$idPlr.".json", "rb");
                                                            $fileContent = @fopen("../arc/".$idPlr."contenido.json", "rb");
                                                            
                                                              if($file){      
                                                                $contenido = @fread($file,filesize("../arc/".$idPlr.".json"));
                                                                $content = @fread($fileContent,filesize("../arc/".$idPlr."contenido.json"));
                                                                if($contenido=='null')
                                                                    break;
                                                                @fclose($file);
                                                                $arrayDatos = json_decode($contenido);
                                                                $arrayContent = json_decode($content);

                                                                foreach ($arrayDatos as $k=>$v){
                                                                    if($v->idPrg==$idPrg){
                                                                        foreach ($v->IdIdr as $pry) {
                                                                            $proyectos=$proyectos.",".$pry."";
                                                                        }
                                                                    }

                                                                }
                                                                if(is_array($arrayContent)){
                                                                foreach ($arrayContent as $k=>$v){
                                                                    if($v->idPrg==$idPrg){    
                                                                            foreach ($v->imagenes as $img) {
                                                                                array_push($imagenes, $img);
                                                                                }
                                                                            $descripcion = $v->descripcion;    
                                                                        }
                                                                    
                                                                }
                                                                }
                                                                
                                                                $proyectos=substr($proyectos, 1);
                                                               
                                                                //print_r($imagenes); 
                                                                $cnn->Execute("set names 'iso-8859-1'");
                                                                /*$sSql="select * FROM infIdr where idIdr IN (
                                                                                                            SELECT IdIdr FROM spp2012.rdfidraln where idPlr = ".$idPlr." and idPrg = ".$IdPrg.");
                                                                                                            ";*/
                                                                $sSql="select 
                                                                                *
                                                                            from
                                                                                rdfbatidr
                                                                                    left join
                                                                                rdfidraln ON rdfbatidr.idIdr = rdfidraln.idIdr
                                                                            where
                                                                                rdfbatidr.idIdr in (select distinct
                                                                                        (IdIdr)
                                                                                    FROM
                                                                                        infIdr
                                                                                    where
                                                                                        idIdr IN (SELECT 
                                                                                                IdIdr
                                                                                            FROM
                                                                                                spp2012.rdfidraln
                                                                                            where
                                                                                                idPlr = ".$idPlr." and idPrg = ".$idPrg." and
                                                                                                idIdr in (".$proyectos.")))";
                                                                
                                                                //$sSql = "SELECT * FROM spp2012.prytxtidr where idPlr=".$idPlr." and IdPrg=".$idPrg." and IdIdr in (".$proyectos.")";
                                                                
                                                                $rs = &$cnn->Execute($sSql);
                                                                echo '
                                                                       <div class="contentSelect" style="padding:15px;">
                                                                       <table  style="width:100%" border="0">
                                                                        <tr >
                                                                            <td style="border:solid 1px #DDD;" width="600px" class="ui-corner-all" rowspan="2" style="padding: 10px;">
                                                                                <div id="graficaPrograma">';
                                                                      echo  '   </div>
                                                                            </td>
                                                                            <td style="border:solid 1px #DDD; color:#fff; font-weight:bold; font-size:26px; text-align:center;" class="headerT ui-corner-all">'.$tituloPrograma.'</td>
                                                                        </tr>
                                                                       
                                                                            <tr style="background-color: rgba(0, 0, 0, 0.1);"><td style="border:solid 1px #DDD;" class="ui-corner-all"><div class="contenedorSlider" style="width:auto;">
                                                                                    <div id="slider" class="nivoSlider">';
                                                                                    for($i=0;$i<count($imagenes);$i++){
                                                                                     echo '<img src="server/uploads/imagenes/'.$imagenes[$i].'">';
                                                                                    }
                                                                            echo '</div>
                                                                                </div>
                                                                                <p style="padding:15px;">'.@$descripcion.'</p></td></tr>
                                                                        <tr><td colspan="2" id="proyects"><div id="prys" style="border:solid 1px #DDD; padding:15px;" class="ui-corner-all">
                                                                        ';    
                                                                                $i=1;
                                                                                $j=0;
                                                                        echo "<table id='tblInd' style='width:100%; border-spacing: 0;' border='0'>
                                                                                <tr class='headerT' style='color:#fff; font-weight:bold; font-size:26px;'><td width='2%' class='ui-corner-tl'></td><td width='78%'>Indicador</td><td width='20%' style='text-align:center' class='ui-corner-tr'>Avance</td></tr>
                                                                                ";        
                                                                while(!$rs->EOF){
                                                                        
                                                                        //echo '<input type="checkbox" id="'.$i.'" value="'.$rs->fields['idPrg'].'"/>'.$rs->fields['CvePrg']."-".$rs->fields['DscPrg']."<br>";
                                                                echo "<tr  style='font: bold 14px Arial; height:50px'><td style='text-align:center; font-weight:bold;'>".$i."</td><td class='indicadores' id='".$rs->fields['idIdr']."' title='Click para ver detalles' onclick='despliegaTableros(".$rs->fields['idIdr'].");' style='cursor:pointer;'>".$rs->fields['NomIdr']."</td><td class='alcanceMetas' id='r".$rs->fields['idIdr']."' style='display:none;'></td><td style='padding-right:10px;'><div id='pb".$j."' class='progressbar' ><div id='pl".$j."' class='progress-label' style='text-align:center'>Calculando...</div></div></td></tr>";
                                                                        echo '<script>
                                                                            var aCalculo=[];
                                                                                for(var a=1;a<=4;a++){
                                                                                $.ajax({
                                                                                                type: "POST",
                                                                                                async:false,
                                                                                                url: "catalogos/calculaIdr.php",
                                                                                                data: {trim:a,idIdr:'.$rs->fields['idIdr'].'}
                                                                                        }).done(function(data) {
                                                                                           console.log('.$rs->fields['idIdr'].',data);
                                                                                            
                                                                                            total =eval(data);
                                                                                             if(isNaN(total))
                                                                                                total = 0;
                                                                                                aCalculo.push(total);
                                                                                                //alert(data);
                                                                                            
                                                                                        });
                                                                                        }
                                                                                        total=(aCalculo[0]+aCalculo[1]+aCalculo[2]+aCalculo[3])/4;
                                                                                       
                                                                                  $("#r'.$rs->fields['idIdr'].'").html(total.toFixed(2));        
                                                                                </script>';
                                                                        $rs->movenext();
                                                                        $i++;
                                                                        $j++;
                                                                }
                                                                
                                                                        echo "</table>
                                                                                <script>
                                                                                 coloresTabla()
                                                                                   
                                                                                 graficaPrograma()
                                                                                </script>
                                                                                
                                                                                ";
                                                                echo '
                                                                        </div>
                                                                        </td>
                                                                        <tr><td colspan="2" id="btnProyects"><div style="float:right;"><button onclick="menu()">Regresar</button></div></td>
                                                                        <td colspan="2" id="btnTableros" style="display:none;"><div style="float:right;"><button onclick="proyectos()">Regresar</button></div></td></tr>
                                                                       </table>                                                                     
                                                                            <div id="dialog">
                                                                                <div id="contenedorDialog" style="padding:15px;">
                                                                                </div>
                                                                            </div>
                                                                       </div>
                                                                       
                                                                       ';
                                                                        
                                                            }  
			break;
                        
                        case 'tableros':
                                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            
                                                            $sSql = "select 
                                                                                *
                                                                            from
                                                                                rdfbatidr
                                                                                    left join
                                                                                rdfidraln ON rdfbatidr.idIdr = rdfidraln.idIdr
                                                                                left join
                                                                                catestorg on catestorg.idOrg = rdfbatidr.idOrg
                                                                            where
                                                                                rdfbatidr.IdIdr=".$IdIdr."";
          
                                                            $rs = &$cnn->Execute($sSql);
                                                            
                                                            echo '
                                                                           <div style="width: 100%;>
                                                                                <div id="dscIdr" style="float:left; width: 100%; height: 300px;" >';
                                                                                while(!$rs->EOF){
                                                                                 echo'   
                                                                                    <table border="0" width="100%">
                                                                                    <tr><td style="color:#294e00; font-size:22px; font-weight:bold; padding:5px;">'.$rs->fields['NomIdr'].'<br>
                                                                                            <p  style="color:red;font-size:12px; font-weight:bold; margin-top:0px;">'.$rs->fields['DscOrg'].'</p>
                                                                                            </td></tr>
                                                                                    
                                                                                    <tr style="background-color: rgba(0, 0, 0, 0.1);"><td style="padding:5px; border:solid 1px #DDD;" class="ui-corner-all"><p style="font-weight:bold; font-size:18px; margin-top:0px; color:black;">Meta del indicador:</p><br>
                                                                                            <p style="font-size:14px; margin-top:-25px; color:black;">'.$rs->fields['DscMet'].'</p></td></tr>
                                                                                    </table>';
                                                                                 $rs->movenext();
                                                                                }
                                                                                echo '
                                                                                <div id="menuIdr" style="width: 100%; margin-top:15px;">
                                                                                <center style="font-size:18px; color:#000; font-weight:bold;">Evidencias</center><br>
                                                                                <center>
                                                                                <input type="radio" id="e1" name="evidencias" onclick="muestraArchivos(\'documentos\',\''.$IdIdr.'\');"/><label for="e1">Documentos</label><input type="radio" id="e2" name="evidencias" onclick="muestraArchivos(\'galeria\',\''.$IdIdr.'\');" /><label for="e2">Galeria</label> <input type="radio" id="e3" name="evidencias" onclick="muestraArchivos(\'videos\',\''.$IdIdr.'\');"/><label for="e3">Videos</label><input type="radio" id="e4" name="evidencias" onclick="muestraArchivos(\'georeferencias\',\''.$IdIdr.'\');"/ ><label for="e4">Georeferencias</label>
                                                                                </center>
                                                                                </div>    
                                                                                </div>
                                                                           </div>
                                                                           <div id="contenidoIdr" style="clear:both; width:100%; margin-top:5px;display:none; font-size:38px; color:black; background-color: rgba(0, 0, 0, 0.1);"></div>
                                                                           ';     
                                                            
                                                            /*$sSql = "select * from
                                                                            (SELECT catestprg.idPrg,DscPrg,
                                                                            sum(calautanl.Mes1 + calautanl.Mes2 + calautanl.Mes3 + calautanl.Mes4 + calautanl.Mes5 + calautanl.Mes6 + calautanl.Mes7 + calautanl.Mes8 + calautanl.Mes9 + calautanl.Mes10 + calautanl.Mes11 + calautanl.Mes12) as Autorizado
                                                                            FROM spp2012.catestprg
                                                                            left join calautanl on calautanl.idPrg = catestprg.idPrg
                                                                            left join catpar ON catpar.idPar = calautanl.idPar
                                                                            where catestprg.idPrg in (".$proyectos.") and catpar.TpoPar='P'
                                                                                group by calautanl.idPrg) 
                                                                            as sum1
                                                                            Join
                                                                            (SELECT infdetejr.idPrg,sum(MntEje) as Ejercido FROM spp2012.infdetejr 
                                                                            join catpar on catpar.idPar = infdetejr.idPar
                                                                            where idPrg in(".$proyectos.") and TpoEjr='P' and catpar.TpoPar='P'
                                                                                group by infdetejr.idPrg) as sum2
                                                                            on sum1.idPrg = sum2.idPrg";
                                                            //echo $sSql;
                                                            
                                                            $rs = &$cnn->Execute($sSql);
                                                            
                                                                            while(!$rs->EOF){
                                                                                   echo '<table style="width:100%; padding-bottom:50px;" border="1">
                                                                                          ';
                                                                                    echo '<tr><td>Proyecto: '.$rs->fields['DscPrg']."</td><td>Presupuesto Autorizado: $".$rs->fields['Autorizado']."</td><td>Presupuesto Gastado: $".$rs->fields['Ejercido']."</td></tr>";
                                                                                    
                                                                                    $sSql2="SELECT adcrcdmta.idPrg,(calmta.pritrim+calmta.segtrim+calmta.tertrim+calmta.cuatrim) as metasProgramadas,
                                                                                            sum(infmta.ITrim1+infmta.ITrim2+infmta.ITrim3+infmta.ITrim4) as metasAlcanzadas, catunimed.NomUniMed,
                                                                                            adcrcdmta.DscMta,sum(MtoEst) as Presupuesto,adcrcdmta.idMtaPrg FROM adcrcdmta 
                                                                                            join catunimed on catunimed.idUniMed = adcrcdmta.idUniMed
                                                                                            join calmta on calmta.idMtaPrg = adcrcdmta.idMtaPrg
                                                                                            join infmta on infmta.idMtaPrg = adcrcdmta.idMtaPrg
                                                                                             WHERE adcrcdmta.idPrg = ".$rs->fields['idPrg']." 
                                                                                             group by adcrcdmta.idMta";
                                                                                    
                                                                                    $rs2 = &$cnn->Execute($sSql2);
                                                                                    echo '
                                                                                        <tr><td colspan="3">
                                                                                        <table style="width:100%" border="1">
                                                                                                <tr><td>Descripción de la meta</td><td>Metas programadas</td><td>Metas alcanzadas</td><td>Presupuesto aproximado</td></tr>';
                                                                                    while(!$rs2->EOF){
                                                                                        echo '<tr><td>'.$rs2->fields['DscMta'].'</td><td>'.$rs2->fields['metasProgramadas'].' '.$rs2->fields['NomUniMed'].'</td><td>'.$rs2->fields['metasAlcanzadas'].' '.$rs2->fields['NomUniMed'].'</td><td>'.$rs2->fields['Presupuesto'].'</td></tr>';
                                                                                        $rs2->movenext();
                                                                                    }
                                                                                    echo '</table>';
                                                                                    $rs->movenext();
                                                                                    
                                                                                    echo '</td></tr></table>';
                                                                            }*/
                                                                       
                                                               
                                                        
					
			break;
                        
                        case 'documentos':
                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            
                                                            $sSql = "SELECT RtaDoc FROM sed_relidrevi where IdIdr=".$IdIdr."";
                                                            
                                                            $rs = &$cnn->Execute($sSql);
                                                            
                                                            while(!$rs->EOF){
                                                                echo '<div id="menuDocs" class="ui-corner-all" style="width:250px; height:auto; background-color: rgba(0, 0, 0, 0.1); float:left;">
                                                                        <center><div style="background: #294e00;" class="ui-corner-top"><label style="font-size: 13px; font-weight:bold;" for="list">Lista de Documentos</label></div></center>
                                                                        
                                                                        <ul style="list-style-type:none; width: 180px; margin-top: 10px;">';
                                                                $docs=  explode(",",$rs->fields['RtaDoc']);
                                                                for($i=0;$i<count($docs);$i++){
                                                                    $ext=explode(".",$docs[$i]);
                                                                    if($ext[1]=='pdf')
                                                                        $tipo = 'pdf';
                                                                    else if($ext[1]=='doc'||$ext[1]=='docx')
                                                                            $tipo='doc';
                                                                    echo '<li id="doc'.$i.'" class="'.$tipo.'" onclick="despliegaDocumento(this,\''.$docs[$i].'\');">'.$docs[$i].'</li>';
                                                                //echo '<a class="media" href="server/uploads/documentos/'.$docs[$i].'"></a></div> ';
                                                                }
                                                                echo '  </ul>
                                                                    
                                                                        </div>
                                                                        <div style="margin-left:5px; width:870px; height:auto; float:left; background:gray;"  id="docContainer">
                                                                        </div>';
                                                                $rs->movenext();
                                                            }
                                            
                            break;
                        
                        case 'galeria':
                                             $cnn->Execute("set names 'iso-8859-1'");
                                                            
                                                            $sSql = "SELECT RtaImg FROM sed_relidrevi where IdIdr=".$IdIdr."";
                                                            //echo $sSql;
                                                            $rs = &$cnn->Execute($sSql);
                                                            
                                                            while(!$rs->EOF){
                                                                
                                                            echo '<center><div id="galery" class="nivoSlider" style="width:50%">';
                                                                $imgs=  explode(",",$rs->fields['RtaImg']);
                                                                for($i=0;$i<count($imgs);$i++){
                                                                echo '<img src="server/uploads/imagenes/'.$imgs[$i].'" width="50%"/>';
                                                                }
                                                                $rs->movenext();
                                                            echo '</div></center>';    
                                                            }          
                                            
                            break;
                        
                        case 'videos':  
                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            
                                                            $sSql = "SELECT RtaVdo FROM sed_relidrevi where IdIdr=".$IdIdr."";
                                                            //echo $sSql;
                                                            $rs = &$cnn->Execute($sSql);
                                                            
                                                            
                                                            while(!$rs->EOF){
                                                                
                                                            echo '  <center>
                                                                    <div id="vids">';
                                                            $vdeos=  explode(",",$rs->fields['RtaVdo']);
                                                            if(count($vdeos)!=1)
                                                                $clss='class="bjqs"';
                                                            else
                                                                $clss='style="list-style-type: none;"';
                                                            echo '        <ul '.$clss.'>';
                                                                
                                                                
                                                                
                                                                for($i=0;$i<count($vdeos);$i++){
                                                                    $video = explode("=",$vdeos[$i]);
                                                                echo '
                                                                    <li><iframe width="650" height="320" src="http://www.youtube.com/embed/'.$video[1].'" frameborder="0" allowfullscreen></iframe></li>
                                                                    ';
                                                                }
                                                                $rs->movenext();
                                                            echo "  </ul>
                                                                    </div>
                                                                    </center>
                                                                    
                                                                  ";
                                                            
                                                            }    
                                                            if(count($vdeos)!=1){
                                                            echo "<script>
                                                                        $('#vids').bjqs({
                                                                                        'height' : 320,
                                                                                        'width' : 650,
                                                                                        animtype : 'slide',
                                                                                        'responsive' : true,
                                                                                        showcontrols : true,
                                                                                        centercontrols : true,
                                                                                        nexttext : '<a href=\"#\"  data-direction=\"forward\" style=\"font-size: 15px; \"><div class=\"ctrls\">Siguiente</div></a>', 
                                                                                        prevtext : '<a href=\"#\"  data-direction=\"previous\" style=\"font-size: 15px; \"><div class=\"ctrls\">Anterior</div></a>',
                                                                                        showmarkers : false,
                                                                                        centermarkers : true,
                                                                                    });
                                                                    </script>";
                                                            }
                            break;
                        
                        case 'georeferencias':
                                            $cnn->Execute("set names 'iso-8859-1'");
                                                            
                                                            $sSql = "SELECT Georef FROM sed_relidrevi where IdIdr=".$IdIdr."";
                                                            //echo $sSql;
                                                            $rs = &$cnn->Execute($sSql);
                                                            
                                                            while(!$rs->EOF){
                                                            echo '<input type="hidden" id="coord" value="'.$rs->fields['Georef'].'"/>';
                                                                $rs->movenext();
                                                            }          
                                            echo '<div id="map"></div>
                                                
                                                 <script>
                                                 obtenerMapa();
                                                </script>


                                                    ';
                            break;
                        
                       
                }
}
?>
