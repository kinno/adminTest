<?
	$avXY = array();
	$sSql = " Select Yi,X1,X2,X3,X4,X5,X6,X7,X8,X9 from relusuacc where idUsu = ".$_SESSION["USERID"];
	$rs = &$cnn->Execute($sSql);
	while(!$rs->EOF){
		$y = $rs->fields["Yi"];
		$avXY[1][$y] = $rs->fields["X1"];
		$avXY[2][$y] = $rs->fields["X2"];
		$avXY[3][$y] = $rs->fields["X3"];
		$avXY[4][$y] = $rs->fields["X4"];
		$avXY[5][$y] = $rs->fields["X5"];
		$avXY[6][$y] = $rs->fields["X6"];
		$avXY[7][$y] = $rs->fields["X7"];
		$avXY[8][$y] = $rs->fields["X8"];
		$avXY[9][$y] = $rs->fields["X9"];	
		$rs->movenext();
	} 
	
?>
<dl id="menu">			



        <dt onclick="javascript:montre('smenu1');"><a><? print $avMnuGE[1][0] ?></a></dt>
            <dd id="smenu1">
                <ul>                        	
                    <? if($avXY[1][1]){?><li><a href="javascript:cambia_contenido(1,1)"><? print $avMnuGE[1][1] ?></a></li><? } ?>
                </ul>
                <ul> 
                    <div style="color:#669999; margin-left:15px;"> PLANEACI&Oacute;N  </div> <li>&nbsp;</li>
                    <li><a href="javascript:cambia_contenido(0,4)"><? print $avMnuGE[0][4]?></a></li>                     
					<li><a href="javascript:cambia_contenido(0,5)"><? print $avMnuGE[0][5]?></a></li>  
                    <? if($avXY[1][2]){?><li><a href="javascript:cambia_contenido(1,2)"><? print $avMnuGE[1][2] ?></a></li><? } ?>
                    <? if($avXY[1][3]){?><li><a href="javascript:cambia_contenido(1,3)"><? print $avMnuGE[1][3] ?></a></li><? } ?>
                    <? if($avXY[1][4]){?><li><a href="javascript:cambia_contenido(1,4)"><? print $avMnuGE[1][4] ?></a></li><? } ?>		    		
                    <? if($avXY[1][5]){?><li><a href="javascript:cambia_contenido(1,5)"><? print $avMnuGE[1][5] ?></a></li><? } ?>
                    <? if($avXY[1][6]){?><li><a href="javascript:cambia_contenido(1,6)"><? print $avMnuGE[1][6] ?></a></li><? } ?>
                    <? if($avXY[1][10]){?><li><a href="javascript:cambia_contenido(1,10)"><? print $avMnuGE[1][10] ?></a></li><? } ?>
                    <? if($avXY[1][11]){?><li><a href="javascript:cambia_contenido(1,11)"><? print $avMnuGE[1][11] ?></a></li><? } ?>
                    <li>&nbsp;</li>
				</ul>
                <ul>
                    <div style="color:#993333;  margin-left:15px;"> PRESUPUESTO </div>
            		<li>&nbsp;</li>
                    <? if($avXY[1][7]){?><li><a href="javascript:cambia_contenido(1,7)"><? print $avMnuGE[1][7] ?></a></li><? } ?>
                    <? if($avXY[1][8]){?><li><a href="javascript:cambia_contenido(1,8)"><? print $avMnuGE[1][8] ?></a></li><? } ?>
                    <? if($avXY[1][9]){?><li><a href="javascript:cambia_contenido(1,9)"><? print $avMnuGE[1][9] ?></a></li><? } ?>
                    <li>&nbsp;</li>
                </ul>
            </dd>
                                                        
        <dt onclick="javascript:montre('smenu2');"><a><? print $avMnuGE[2][0] ?></a></dt>
            <dd id="smenu2">
                <ul>  
                    <div style="color:#669999; margin-left:15px;"> PLANEACI&Oacute;N  </div>                   
            		<li>&nbsp;</li>
                    <? if($avXY[2][1]){?><li><a href="javascript:cambia_contenido(2,1)"><? print $avMnuGE[2][1] ?></a></li><? } ?>
                </ul>
                <ul>
                    <div style="color:#993333;  margin-left:15px;"> PRESUPUESTO  </div><li>&nbsp;</li>
                    <? if($avXY[2][2]){?><li><a href="javascript:cambia_contenido(2,2)"><? print $avMnuGE[2][2] ?></a></li><? } ?>
                    <? if($avXY[2][3]){?><li><a href="javascript:cambia_contenido(2,3)"><? print $avMnuGE[2][3] ?></a></li><? } ?>
                    <? if($avXY[2][4]){?><li><a href="javascript:cambia_contenido(2,4)"><? print $avMnuGE[2][4] ?></a></li><? } ?>
                    <? if($avXY[2][5]){?><li><a href="javascript:cambia_contenido(2,5)"><? print $avMnuGE[2][5] ?></a></li><? } ?>
		    <? if($avXY[2][6]){?><li><a href="javascript:cambia_contenido(2,6)"><? print $avMnuGE[2][6] ?></a></li><? } ?>
                </ul>
            </dd>	

        <dt onclick="javascript:montre('smenu3');"><a><? print $avMnuGE[3][0] ?></a></dt>
            <dd id="smenu3">
                <ul style="margin-left:15px;">   
                    <div style="color:#669999;">PLANEACI&Oacute;N</div>
                    <li>&nbsp;</li>
                    <? if($avXY[3][1]){?><li><a href="javascript:cambia_contenido(3,1)"><? print $avMnuGE[3][1] ?></a></li><? } ?>
                    <? if($avXY[3][2]){?><li><a href="javascript:cambia_contenido(3,2)"><? print $avMnuGE[3][2] ?></a></li><? } ?>
                    <? if($avXY[3][3]){?><li><a href="javascript:cambia_contenido(3,3)"><? print $avMnuGE[3][3] ?></a></li><? } ?>
                    <? if($avXY[3][4]){?><li><a href="javascript:cambia_contenido(3,4)"><? print $avMnuGE[3][4] ?></a></li><? } ?>
                    <? if($avXY[3][5]){?><li><a href="javascript:cambia_contenido(3,5)"><? print $avMnuGE[3][5] ?></a></li><? } ?> 
		    <? if($avXY[3][6]){?><li><a href="javascript:cambia_contenido(3,6)"><? print $avMnuGE[3][6] ?></a></li><? } ?>        
                </ul>
            </dd>

        <dt onclick="javascript:montre('smenu4');"><a><? print $avMnuGE[4][0] ?></a></dt>
            <dd id="smenu4">
                <!--ul style="background-color:#F0FFF0;"-->    
                <ul style="margin-left:15px;">
                    <div style="color:#669999;">PLANEACI&Oacute;N </div><li>&nbsp;</li>
                    <? if($avXY[4][1]){?><li><a href="javascript:cambia_contenido(4,1)"><? print $avMnuGE[4][1] ?></a></li><? } ?>
		    <? if($avXY[4][2]){?><li><a href="javascript:cambia_contenido(4,2)"><? print $avMnuGE[4][2] ?></a></li><? } ?>
            	</ul>
                <!--ul style="background-color:#FFFFF0;"-->
                <ul style="margin-left:15px;">
                    <div style="color:#993333;">&nbsp;&nbsp;PRESUPUESTO</div><li>&nbsp;</li>
                    <? if($avXY[4][3]){?><li><a href="javascript:cambia_contenido(4,3)"><? print $avMnuGE[4][3] ?></a></li><? } ?>
                    <? if($avXY[4][4]){?><li><a href="javascript:cambia_contenido(4,4)"><? print $avMnuGE[4][4] ?></a></li><? } ?>
                    <? if($avXY[4][5]){?><li><a href="javascript:cambia_contenido(4,5)"><? print $avMnuGE[4][5] ?></a></li><? } ?>
                    <? if($avXY[4][6]){?><li><a href="javascript:cambia_contenido(4,6)"><? print $avMnuGE[4][6] ?></a></li><? } ?>
                    <!--li><a href="#">< ? print $avMnuGE[4][7] ?></a></li>
                    <li><a href="#">< ? print $avMnuGE[4][8] ?></a></li>
                    <li><a href="#">< ? print $avMnuGE[4][9] ?></a></li--> 
                </ul>
            </dd>	
                        
  		<dt onclick="javascript:montre('smenu5');"><a><? print $avMnuGE[5][0] ?></a></dt>
            <dd id="smenu5">
                <!--ul style="background-color:#F0FFF0;"-->  
                <ul style="margin-left:15px;">  
                    <div style="color:#669999;"> PLANEACI&Oacute;N  </div> <li>&nbsp;</li>
					<? if($avXY[5][9]){?><li><a href="javascript:cambia_contenido(5,9)"><? print $avMnuGE[5][9] ?></a></li><? } ?>
                    <? if($avXY[5][1]){?><li><a href="javascript:cambia_contenido(5,1)"><? print $avMnuGE[5][1] ?></a></li><? } ?>
                    <? if($avXY[5][2]){?><li><a href="javascript:cambia_contenido(5,2)"><? print $avMnuGE[5][2] ?></a></li><? } ?>
		    <? if($avXY[5][6]){?><li><a href="javascript:cambia_contenido(5,6)"><? print $avMnuGE[5][6] ?></a></li><? } ?>
				</ul>
                <!--ul style="background-color:#FFFFF0;"-->
                <ul style="margin-left:15px;">
                    <div style="color:#993333;"> PRESUPUESTO  </div> <li>&nbsp;</li>
                    <? if($avXY[5][3]){?><li><a href="javascript:cambia_contenido(5,3)"><? print $avMnuGE[5][3] ?></a></li><? } ?>
                    <? if($avXY[5][4]){?><li><a href="javascript:cambia_contenido(5,4)"><? print $avMnuGE[5][4] ?></a></li><? } ?>
                    <? if($avXY[5][5]){?><li><a href="javascript:cambia_contenido(5,5)"><? print $avMnuGE[5][5] ?></a></li><? } ?>
                    <? if($avXY[5][6]){?><li><a href="#"><? print $avMnuGE[5][6] ?></a></li><? } ?>
                    <? if($avXY[5][7]){?><li><a href="#"><? print $avMnuGE[5][7] ?></a></li><? } ?>
                    <? if($avXY[5][8]){?><li><a href="javascript:cambia_contenido(5,8)"><? print $avMnuGE[5][8] ?></a></li><? } ?>                    
                </ul>
            </dd>             

  		<dt onclick="javascript:montre('smenu6');"><a><? print $avMnuGE[6][0] ?></a></dt>
            <dd id="smenu6">
                <!--ul style="background-color:#F0FFF0;"-->  
                <ul style="margin-left:15px;">  
                    <div style="color:#669999;"> PLANEACI&Oacute;N  </div> <li>&nbsp;</li>
                    <? if($avXY[6][1]){?><li><a href="javascript:cambia_contenido(6,1)"><? print $avMnuGE[6][1] ?></a></li><? } ?>
                    <? if($avXY[6][2]){?><li><a href="javascript:cambia_contenido(6,2)"><? print $avMnuGE[6][2] ?></a></li><? } ?>
                    <? if($avXY[6][3]){?><li><a href="javascript:cambia_contenido(6,3)"><? print $avMnuGE[6][3] ?></a></li><? } ?>
		    <? if($avXY[6][12]){?><li><a href="javascript:cambia_contenido(6,12)"><? print $avMnuGE[6][12] ?></a></li><? } ?>
				</ul>
                <!--ul style="background-color:#FFFFF0;"-->
                <ul style="margin-left:15px;">
                    <div style="color:#993333;"> PRESUPUESTO  </div> <li>&nbsp;</li>
                    <? if($avXY[6][4]){?><li><a href="javascript:cambia_contenido(6,4)"><? print $avMnuGE[6][4] ?></a></li><? } ?>
                    <? if($avXY[6][5]){?><li><a href="javascript:cambia_contenido(6,5)"><? print $avMnuGE[6][5] ?></a></li><? } ?>
                    <? if($avXY[6][6]){?><li><a href="javascript:cambia_contenido(6,6)"><? print $avMnuGE[6][6] ?></a></li><? } ?>
                    <? if($avXY[6][7]){?><li><a href="javascript:cambia_contenido(6,7)"><? print $avMnuGE[6][7] ?></a></li><? } ?>
                    <? if($avXY[6][8]){?><li><a href="javascript:cambia_contenido(6,8)"><? print $avMnuGE[6][8] ?></a></li><? } ?>
                    <? if($avXY[6][9]){?><li><a href="javascript:cambia_contenido(6,9)"><? print $avMnuGE[6][9] ?></a></li><? } ?>
                    <? if($avXY[6][10]){?><li><a href="javascript:cambia_contenido(6,10)"><? print $avMnuGE[6][10] ?></a></li><? } ?>
                    <? if($avXY[6][11]){?><li><a href="javascript:cambia_contenido(6,11)"><? print $avMnuGE[6][11] ?></a></li><? } ?>
		    
                </ul>
            </dd>       

  <dt onclick="javascript:montre('smenu7');"><a><? print $avMnuGE[7][0] ?></a></dt>
            <dd id="smenu7">
                <ul>              	
                    <div style="color:#339999; margin-left:15px;">Perfil de usuarios</div>
                    <li>&nbsp;</li>	
                    <li><a href="../contenido/LogOut.php"><? print $avMnuGE[7][1] ?></a></li>                    
                    <? if($avXY[7][2]){ ?><li><a href="javascript:cambia_contenido(7,2)"><? print $avMnuGE[7][2] ?></a></li><? } ?>
                    <? if($avXY[7][3]){ ?><li><a href="javascript:cambia_contenido(7,3)"><? print $avMnuGE[7][3] ?></a></li><? } ?>                    
                    <? if($avXY[7][5]){ ?><li><a href="javascript:cambia_contenido(7,5)"><? print $avMnuGE[7][5] ?></a></li><? } ?>
                    <? if($avXY[7][4]){ ?><li><a href="javascript:cambia_contenido(7,4)"><? print $avMnuGE[7][4] ?></a></li><? } ?>
                    <li>&nbsp;</li>
                 </ul>
                 <ul>
                    <div style="color:#993333; margin-left:15px;">Base de Datos</div>
                    <li>&nbsp;</li>
                    <? if($avXY[7][6]){ ?><li><a href="javascript:cambia_contenido(7,6)"><? print $avMnuGE[7][6] ?></a></li><? } ?>
                    <? if($avXY[7][7]){ ?><li><a href="#"><? print $avMnuGE[7][7] ?></a></li><? } ?>
                    <? if($avXY[7][8]){ ?><li><a href="#"><? print $avMnuGE[7][8] ?></a></li><? } ?>
                    <? if($avXY[7][9]){ ?><li><a href="javascript:cambia_contenido(7,9)"><? print $avMnuGE[7][9] ?></a></li><? } ?>
                    <? if($avXY[7][13]){ ?><li><a href="javascript:cambia_contenido(7,13)"><? print $avMnuGE[7][13] ?></a></li><? } ?>
					<li>&nbsp;</li>
                </ul>
                 <ul>
                    <div style="color:#669900; margin-left:15px;">Descargas</div>
                    <li>&nbsp;</li>	    
                    <li><a href="#"><? print $avMnuGE[7][10] ?></a></li>
                    <li><a href="javascript:cambia_contenido(7,11)"><? print $avMnuGE[7][11]?></a></li>
                    <li><a href="javascript:cambia_contenido(7,12)"><? print $avMnuGE[7][12]?></a></li> 
                    <li>&nbsp;</li>
                </ul>
            </dd>

                                                    
</dl>            