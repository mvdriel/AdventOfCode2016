<?php

function extractAbas($texts){
  $abas=[];
  foreach($texts as $text){
    for($i=0;$i<strlen($text)-2;$i++){
      if(
        (substr($text,$i,1)===substr($text,$i+2,1)) &&
        (substr($text,$i,1)!==substr($text,$i+1,1))){
        $abas[]=substr($text,$i,3);
      }
    }
  }
  return $abas;
}

$input = file_get_contents('day07.txt');
$input=trim($input);
$lines = explode("\n", $input);

$count = 0;
foreach($lines as $line) {
  $line=str_replace(']','[',$line);
  $parts=explode('[',$line);
  $outside=[];
  $inside=[];
  foreach($parts as $i=>$part){
    if($i%2===1){
      $outside[]=$part;
    }else{
      $inside[]=$part;
    }
  }
  $abas=extractAbas($outside);

  $m=false;

  if(empty($abas))continue;

  foreach($inside as $match){
    foreach($abas as $aba){
      $bab=substr($aba,1,1).substr($aba,0,1).substr($aba,1,1);
      if(strpos($match,$bab)!==false){
        $m=true;
//var_dump($bab);
      }
    }
  }
  if($m===false){
    preg_match_all("/\[^\]\[]*\[/", $line, $matches);

  }
  if($m){
//var_dump($abas);
//var_dump($line);exit;
    $count++;
  }
}
var_dump($count);

