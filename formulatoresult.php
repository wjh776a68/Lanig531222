<?php
function formula2result($formula)
{
  
  $source=$formula;
  $source=str_replace("+","?+?",$source);
  $source=str_replace("-","?-?",$source);
  $source=str_replace("*","?*?",$source);
  $source=str_replace("/","?/?",$source);
  $numarray=explode("?", $source);
  for ($i=0; $i <count($numarray)-1 ; $i++) {

    if($numarray[$i+1]=="+"){
      $numarray[$i+2]=$numarray[$i+2]+$numarray[$i];
    }elseif ($numarray[$i+1]=="-") {
      $numarray[$i+2]=$numarray[$i+2]-$numarray[$i];
    }elseif ($numarray[$i+1]=="*") {
      $numarray[$i+2]=$numarray[$i+2]*$numarray[$i];
    }elseif ($numarray[$i+1]=="/") {
      $numarray[$i+2]=$numarray[$i+2]/$numarray[$i];
    }
    $i++;
  }
  $result=$numarray[count($numarray)-1];
  return $result;
}

?>
