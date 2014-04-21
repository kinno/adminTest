<?php
include("adodb/adodb.inc.php");
include("inc/cnxbds.php");
$cnn->Execute("set names 'iso-8859-1'");

$sSql = "SELECT * FROM rdfbatidr where idIdr =489";
$sql2 = "SELECT * FROM infidr where idIdr =489";

$rs = &$cnn->Execute($sSql);
$rs2 = &$cnn->Execute($sql2);

$array=Array();
while(!$rs2->EOF){
   $array[($rs2->fields['IdVar'])]=$rs2->fields['Trim1'];
    $rs2->movenext();
}
print_r($array);
echo "<br>";
while(!$rs->EOF){
    
    echo (int)$for= $rs->fields['NotForCal'];
    echo "<br>";
    foreach ($array as $k=>$v){
        $sql3="SELECT * FROM rdfbatvar where idVar=".$k;
        $rs3 = &$cnn->Execute($sql3);
       
        while(!$rs3->EOF){
           $hey = $rs3->fields['idVar'];
        //echo strstr($for, $hey);
        $for = str_replace(10,(int)$v, (int)$for);
        
        $rs3->movenext();
  
        }
        
       
    }
    echo $for;
   
            $rs->movenext();
}

?>