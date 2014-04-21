<?php
include("../adodb/adodb.inc.php");
include("../inc/cnxbds.php");
$cnn->Execute("set names 'iso-8859-1'");
$idIdr = $_POST['idIdr'];
$trim = $_POST['trim'];
$sSql = "SELECT * FROM rdfbatidr where idIdr =".$idIdr;
$sql2 = "SELECT * FROM infidr where idIdr =".$idIdr;

$rs = &$cnn->Execute($sSql);
$rs2 = &$cnn->Execute($sql2);

$arrayVariables = Array();
$valorVariable = Array();
$array=Array();
while(!$rs2->EOF){
   
   $valorVariable[($rs2->fields['IdVar'])]=$rs2->fields['Trim'.$trim];
   array_push($arrayVariables, $rs2->fields['IdVar']);
    $rs2->movenext();
}

while(!$rs->EOF){
    $notacion = Array();
      $for= $rs->fields['NotForCal'];
      preg_match_all('/\d+/',$for,$notacion);
      foreach(end($notacion) as $i=>$value){
          $var = stristr($for, $value);
          $replace = str_replace($var,"", $for);
          if(in_array($value,$arrayVariables)){
              $for = $replace.$valorVariable[$value].str_replace($value,"", $var);
          }
      }
      echo $for;
      $rs->movenext();
}
?>
