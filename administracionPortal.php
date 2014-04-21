<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Administración del Observatorio Ciudadano</title>
		<meta charset="UTF-8" />
                <script type="text/javascript" src="js/jquery.js"></script>
                <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
                <script type="text/javascript" src="js/fileuploader.js"></script>
                <script type="text/javascript" src="js/nicEdit.js"></script>
                <script type="text/javascript" src="js/jquery.cookie.js"></script>
                <script type="text/javascript" src="js/jquery.navgoco.js"></script>
                  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
                  <script type="text/javascript" src="js/gmap3.js"></script>
                
                <script type="text/javascript" src="js/funcionesAdm.js"></script>	
                <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/sbimenu.css" />
                <link rel="stylesheet" type="text/css" href="css/footerestilo.css" />
                <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.10.3.custom.css" />
                <link rel="stylesheet" type="text/css" href="css/fileuploader.css" />
                <link rel="stylesheet" type="text/css" href="css/jquery.navgoco.css" />
    </head>
    <body>
        
		<div class="container" >
                    <center>
			<div class="header" style="display:none;">
                            <table border='0' style="margin-top: -5px; margin-left: 190px;">
                                <tr >
                                    <td><img src="images/gem.png"></td>
                                    <td></td>
                                </tr>
                                <tr style="height:92px;">
                                    <td style="width: 500px;"><h3>Administración del Observatorio Ciudadano</h3></td>
                                    <td style="width: 270px;"><img src="images/logoh.png"></td>
                                </tr>
                            </table>
			</div>
                    </center>
                        <?php
                        if(isset($_SESSION['name'])){
                            echo '
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="FondoMenutopdependencias" >
                            <tbody><tr>
                              <td><table id="mnuBtn" height="50" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align: center;">
                            <tbody><tr>

                                                  <th valign="middle" id="m1" class="CeldaMenuTopdependencias active" onclick="administrarInformacion(this);"><div class="MenuDependenciasContenedor">			
                                                  <span class="MenuTopdependencias">Administración de información</span>	
                                                  </div></th>

                                                  <th valign="middle" id="m2" class="CeldaMenuTopdependencias" onclick="administrarContenido(this);"><div class="MenuDependenciasContenedor">			
                                                  <span class="MenuTopdependencias" >Administración de Contenido</span>	
                                                  </div></th>
                                                  
                                                  <th valign="middle" id="m3" class="CeldaMenuTopdependencias" onclick="logout();"><div class="MenuDependenciasContenedor">			
                                                  <span class="MenuTopdependencias" >Cerrar sesión</span>	
                                                  </div></th>
                          </tr>
                          </tbody></table></td>
                            </tr>
                          </tbody>
                        </table>';
                        }
                        
                         ?>       
			<div class="content" style="margin-top:10px;">
                            <div id="dataContent" class="dataContent">
                                <div class="data">
                                        <?php
                                            if(isset($_SESSION['name'])){
                                                echo '
                                                    <script>
                                                    despliegaPilaresAdm();
                                                    </script>    
                                                <div id="pilar" class="pilares">

                                                </div>
                                                <div id="programa" class="programas" style="display:none;">

                                                </div>
                                                <div id="proyecto" class="proyectos" style="display:none;">     
                                                </div>
                                                        ';
                                            }
                                            else{
                                                echo '<div align="center" style="width:300px; margin-left:37%; padding-top:5%;">
                                                            <h3 class="ui-corner-all" style="width:300px;background-color:#5b8032;color: white;">¡Bienvenido!<br>Administración del contenido</h3>
                                                                <div class="ui-corner-all" style="background-color:darkgray;border:solid 1px gray;">
                                                                <table>
                                                                    <tr><td>Usuario:</td><td><input type="text" id="NomEntUsu" name="NomEntUsu" placeholder="Ingrese su nombre"></td></tr>
                                                                    <tr><td>Contraseña:</td><td><input type="password" id="PwdEntUsu" name="PwdEntUsu" placeholder="Ingrese su password"></td></tr>
                                                                    <tr>
                                                                        <td colspan="2" align="center">
                                                                            <input type="button" onclick="verificaLogin();" id="envia" value="Ingresar">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                </div>
                                                            
                                                            <div id="error" style="margin-top:10px;">
                                                            </div>
                                                        </div>';
                                            }
                                        ?>
                                        
                                </div>
                                
                                <div class="admdata" style="display:none;">
                                    <div id='botonesMenu' class='botonesMenu'>
                                        <center><div id="btns"><input type="radio" id="radio3" onclick="cambiarContenidoPlr();" name="radio"/><label for="radio3">Contenido del pilar</label><input type="radio" id="radio2" onclick="cambiarContenido();" name="radio"/><label for="radio2">Contenido del programa</label><input type="radio" id="radio1" name="radio" onclick="cambiarContenidoIndicador();"/><label for="radio1">Contenido del indicador</label></div></center>
                                    </div>
                                    <div id="conteinerContenido" class="conteinerContenido" style="margin-top: 15px; display:none;">
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
			</div>
			
			
		</div>
                
                <div id="panelPilar" style="display:none">
                    <input type="hidden" id="nombrePlr" />
                    <input type="hidden" id="nombreFilePlr" />
                    
                                <div id="file-uploader-plr">       
                                       
                                </div>
                           
                           <button onclick="guardarContenidoPlr();">Guardar</button>
                           <div id="response"></div>
                        
                   
                    
                </div>
                <div id="panel" style="display:none">
                    <input type="hidden" id="nombrePilar" />
                    <input type="hidden" id="nombrePrg" />
                    <input type="hidden" id="nombreFile" />
                    <table border="1" style="width:100%">
                        <tr>
                            <td colspan="2">
                                <div id="file-uploader">       
                                       
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:200px;">Ingrese descripción del programa:</td><td><textarea id="dscPrograma" style="width: 950px;height: 100px;"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button onclick="guardarContenido();">Guardar</button></td>
                        </tr>
                        
                    </table>
                    
                </div>
                <div id="mnuContenido" style="display:none;">
                    <input type="hidden" id="IdPlr" />
                    <input type="hidden" id="IdPrg" />
                    <input type="hidden" id="IdIdr"/>
                    <input type="hidden" id="RtaDoc"/>
                    <input type="hidden" id="RtaImg"/>
                    <input type="hidden" id="RtaVdo"/>
                    <input type="hidden" id="Georef"/>
                    
                        <div id="acoEvidencia" style="width:100%">
                            <title>Documentos</title>
                            <div>
                                <div id="file-uploader-doc">       
                                </div>
                                
                            </div>
                            <title>Fotos</title>
                            <div>
                                <div id="file-uploader-img">       
                                </div>
                            </div>
                            <title>Videos</title>
                            <div id="vid">
                                <span class="btn" onclick="clonar()">+</span><div id="divrvideo">http://<input type="text"  style="width:300px;" id="rvideo" title="Agregue liga del video" onchange="agregaVideos(this)"/><br></div>
                            </div>
                            <title>Georeferencias</title>
                            <div id="tabMap">
                                    <div id="map"></div>
                                    <div id="coordenadas">
                                        <label for="address">Ingresar dirección: </label><input type="text" id="address" style="width:200px;"/><button type="button" onclick="buscaMapa();" id="test-ok">Buscar</button><br>
                                    </div>
                            </div>
                        </div>
                    <button onclick="guardarEvidencias();">Guardar</button>
                    <div id="respCont"></div>
                    
                </div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px; display: none;">
                    <tbody><tr>
                      <td height="252" align="center" valign="middle" style="background-image:url(images/BGreply.png)"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image: url(images/centro.png)">
                        <tbody><tr>
                          <td width="470" height="252"><table width="470" border="0" cellspacing="0" cellpadding="0">
                            <tbody><tr>
                              <td width="225" height="50"><a href="#" class="airArriba"><img src="images/flechaArriba.png" width="20" height="20" border="0">Ir arriba</a></td>
                              <td width="20" height="50">&nbsp;</td>

                              <td width="225" height="50">&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="225" height="40" class="TitulosFooter">Acerca de Gobierno</td>
                              <td width="20" height="40">&nbsp;</td>
                              <td width="225" height="40" class="TitulosFooter">Comunicación Social</td>
                            </tr>
                            <tr>

                              <td width="225" height="100" valign="top">
                                <a href="http://www.edomex.gob.mx/legistel" class="LinksFooter" target="_blank">Leyes y reglamentos</a><br>
                                <a href="http://www.edomex.gob.mx/portal/page/portal/legistel/gaceta-de-gobierno" class="LinksFooter" target="_blank">Periódico Oficial "Gaceta del Gobierno"</a><br>
                                <a href="http://transparencia.edomex.gob.mx/transparencia-fiscal/index.htm" class="LinksFooter" target="_blank">Transparencia Fiscal</a><br>
                                <a href="http://portal2.edomex.gob.mx/edomex/inicio/faqs/index.htm" class="LinksFooter" target="_blank">Preguntas Frecuentes</a><br>
                                <a href="http://portal2.edomex.gob.mx/edomex/gobierno/publicaciones/plan_de_desarrollo/index.htm" class="LinksFooter" target="_blank">Plan de Desarrollo</a>
                                <p></p></td>

                              <td width="20" height="100">&nbsp;</td>
                              <td width="225" height="100" valign="top">
                              <a href="http://www.gem.gob.mx/medios/" class="LinksFooter" target="_blank">Comunicados de Prensa</a><br>
                                <a href="http://www.gem.gob.mx/medios/w2video.asp" class="LinksFooter" target="_blank">Videos de las conferencias</a><br>
                                <a href="http://www.gem.gob.mx/medios/w2bolet.asp?Tser=F" class="LinksFooter" target="_blank">Archivo fotográfico</a><br>
                                <a href="http://www.gem.gob.mx/medios/w2bolet.asp?Tser=E" class="LinksFooter" target="_blank">Entrevistas</a><br>
                                <a href="http://www.gem.gob.mx/medios/w2bolet.asp?Tser=D" class="LinksFooter" target="_blank">Discursos</a></td>

                            </tr>
                            <tr>
                              <td width="225">&nbsp;</td>
                              <td width="20">&nbsp;</td>
                              <td width="225">&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="225" height="45" valign="top"><span class="TitulosFooterBlanco">SEGURIDAD</span><br>

                                <a href="http://www.edomex.gob.mx/ssc" class="LinksFooterBlanco" target="_blank">www.edomex.gob.mx/ssc</a></td>
                              <td width="20" height="45" valign="top">&nbsp;</td>
                              <td width="225" height="45" valign="top"><span class="TitulosFooterBlanco">TRANSPARENCIA</span><br>
                                <a href="http://transparencia.edomex.gob.mx/" class="LinksFooterBlanco" target="_blank">transparencia.edomex.gob.mx/</a></td>
                            </tr>
                          </tbody></table></td>
                          <td width="20" height="252">&nbsp;</td>

                          <td width="470" height="252" align="left" valign="top"><table width="470" border="0" cellspacing="0" cellpadding="0">
                            <tbody><tr>
                              <td width="50" height="252">&nbsp;</td>
                              <td width="420" height="252"><table width="420" border="0" align="right" cellpadding="0" cellspacing="0">
                         <tbody><tr>
                                  <td height="50" colspan="3" class="TextoActualizacion" align="right">&nbsp;</td>
                                </tr>
                                <tr>

                                  <td width="175" height="40" class="TitulosFooter">Contáctanos</td>
                                  <td width="20" height="40">&nbsp;</td>
                                  <td width="225" rowspan="2"><table width="225" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                      <td width="55" height="55"><a href="http://portal2.edomex.gob.mx/edomex/temas/vinculacionyparticipacion/opinion/index.htm"><img src="images/mejorar.png" width="46" height="41" border="0"></a></td>
                                      <td height="55" align="left" valign="top"><span class="TitulosFooterRojo">Ayúdanos a mejorar<br>
                                      </span><a href="http://portal2.edomex.gob.mx/edomex/temas/vinculacionyparticipacion/opinion/index.htm" class="LinksFooter" target="_blank">Danos tu opinión o vota una propuesta</a></td>

                                    </tr>
                                    <tr>
                                      <td width="55" height="55"><a href="/idcprod/../edomex/mobile/" target="_blank"><img src="images/movil.png" width="46" height="46" border="0"></a></td>
                                      <td height="55" align="left" valign="top"><span class="TitulosFooterRojo">Portal móvil<br>
                                      </span><a href="/idcprod/../edomex/mobile/" class="LinksFooter">Versión optimizada para dispositivos móviles.</a></td>
                                    </tr>
                                  </tbody></table></td>
                                </tr>

                                <tr>
                                  <td width="175" height="100" valign="top">
                                  <a href="http://www.gem.gob.mx/slin01/" class="LinksFooter" target="_blank">Atención Ciudadana</a><br>
                                    <a href="http://www.secogem.gob.mx/SAM/sit_atn_mex.asp" class="LinksFooter" target="_blank">Quejas</a><br>
                                    <a href="http://www.sicosiem.org.mx/" class="LinksFooter" target="_blank">Solicitudes de transparencia</a><br>
                                    <a href="http://portal2.edomex.gob.mx/edomex/temas/vinculacionyparticipacion/index.htm" class="LinksFooter" target="_blank">Redes Sociales</a><br>
                                    <a href="mailto:webmaster@edomex.gob.mx" class="LinksFooter" target="_blank">Escribe al webmaster</a></td>

                                  <td width="20" height="100">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td width="175">&nbsp;</td>
                                  <td width="20">&nbsp;</td>
                                  <td width="225">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td width="175" height="45" valign="top"><span class="TitulosFooterBlanco">SALUD</span><br>

                                    <a href="http://salud.edomex.gob.mx/" class="LinksFooterBlanco" target="_blank">salud.edomex.gob.mx/</a></td>
                                  <td width="20" height="45" valign="top">&nbsp;</td>
                                  <td width="225" height="45" valign="top" class="TitulosFooterBlanco"><a href="http://edomex.gob.mx" class="LinksFooterBlancoGrande" target="_blank">EDOMEX.GOB.MX</a></td>
                                </tr>
                              </tbody></table></td>
                            </tr>
                          </tbody></table></td>
                        </tr>

                      </tbody></table></td>
                    </tr>
                  </tbody></table>
	 
    </body>
</html>
