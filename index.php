
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Principal</title>
        <meta charset="UTF-8" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.bgImageMenu.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="js/perfect-scrollbar-0.4.5.with-mousewheel.min.js"></script>
        <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
        <script type="text/javascript" src="highcharts/js/highcharts.js"></script>
        <script type="text/javascript" src="js/jquery.media.js"></script>
        <script type="text/javascript" src="js/bjqs-1.3.js"></script>
        <script type="text/javascript" src="js/jquery.gdocsviewer.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="js/gmap3.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>	
        
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/sbimenu.css" />
        <link rel="stylesheet" type="text/css" href="css/footerestilo.css" />
        <link rel="stylesheet" type="text/css" href="css/perfect-scrollbar-0.4.5.min.css" />
        <link rel="stylesheet" type="text/css" href="css/nivo-slider.css" />
        <link rel="stylesheet" type="text/css" href="css/ui_portal.css" />
        <link rel="stylesheet" type="text/css" href="css/bjqs.css" />

        <style>
        .ui-progressbar {
          position: relative;
          background-color: #FFFFFF;
        }
        .progress-label {
          position: absolute;
          margin-left: 44%;
          color: black;
          top: 4px;
          font-weight: bold;

        }
        </style>
    </head>
    <body>
		<div class="container" >
                    <center>
			<div class="header" style="display:none">
                            <table border='0' style="margin-top: -5px; margin-left: 190px;">
                                <tr >
                                    <td><img src="images/gem.png"></td>
                                    <td></td>
                                </tr>
                                <tr style="height:92px;">
                                    <td style="width: 500px;"><h3>Observatorio Ciudadano</h3></td>
                                    <td style="width: 270px;"><img src="images/logoh.png"></td>
                                </tr>
                            </table>
			</div>
                    </center>    
			<div class="content" style="margin-top:10px;">
				<div id="sbi_container" class="sbi_container">
                                   
				</div>
                            <div id="dataContent" class="dataContent" style="display:none;">
                                <div class="data">
                                
                                </div>

                            </div>
			</div>
			
			
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
