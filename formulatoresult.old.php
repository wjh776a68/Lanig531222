<?php
$cursor=-1;
while(1){
$cursormul=strpos($QAppearance,"*",$cursor);
$cursordiv=strpos($QAppearance,"/",$cursor);
$cursoradd=strpos($QAppearance,"+",$cursor);
$cursorsub=strpos($QAppearance,"-",$cursor);
echo $cursormul.$cursordiv.$cursoradd.$cursorsub;
if($cursormul==$cursordiv && $cursoradd==$cursorsub && $cursoradd==$cursordiv){
  break;
}
if($cursormul>$cursordiv){
  $cursorhead1=$cursordiv;
  $cursortail1=$cursormul;
  $symbolhead1="/";
  $symboltail1="*";
}else{
  $cursorhead1=$cursormul;
  $cursortail1=$cursordiv;
  $symbolhead1="*";
  $symboltail1="/";
}
if($cursoradd>$cursorsub){
  $cursorhead2=$cursorsub;
  $cursortail2=$cursoradd;
  $symbolhead2="-";
  $symboltail2="+";
}else{
  $cursorhead2=$cursoradd;
  $cursortail2=$cursorsub;
  $symbolhead2="+";
  $symboltail2="-";
}
if($cursorhead1>$cursorhead2){
  $cursorhead=$cursorhead2;
  $symbolhead=$symbolhead2;
  if($cursorhead1>$cursortail2){
    $cursortail=$cursortail2;
    $symboltail=$symboltail2;
  }else{
    $cursortail=$cursorhead1;
    $symboltail=$symbolhead1;
  }
}else{
  $cursorhead=$cursorhead1;
  $symbolhead=$symbolhead1;
  if($cursorhead2>$cursortail1){
    $cursortail=$cursortail1;
    $symboltail=$symboltail1;
  }else{
    $cursortail=$cursorhead2;
    $symboltail=$symboltail2;
  }
}

if($symbolhead=="+"){
  $AAppearance=substr($AAppearance,$cursor+1,$cursorhead-$cursor)+substr($AAppearance,$cursorhead+1,$cursortail-$cursorhead) . substr($AAppearance,$cursortail);
  $cursor=$cursortail;
}elseif($symbolhead=="-"){
  $AAppearance=substr($AAppearance,$cursor+1,$cursorhead-$cursor)-substr($AAppearance,$cursorhead+1,$cursortail-$cursorhead) . substr($AAppearance,$cursortail);
  $cursor=$cursortail;
}elseif($symbolhead=="*"){
  $AAppearance=substr($AAppearance,$cursor+1,$cursorhead-$cursor)*substr($AAppearance,$cursorhead+1,$cursortail-$cursorhead) . substr($AAppearance,$cursortail);
  $cursor=$cursortail;
}elseif($symbolhead=="/"){
  $AAppearance=substr($AAppearance,$cursor+1,$cursorhead-$cursor)/substr($AAppearance,$cursorhead+1,$cursortail-$cursorhead) . substr($AAppearance,$cursortail);
  $cursor=$cursortail;
}
}
?>
