<?php

$input=file_get_contents('day15.txt');
$input=trim($input);
$lines=explode("\n",$input);
$discs=[];
foreach($lines as $line){
  $parts=explode(' ',$line);
  $disc=[
    'size'=>$parts[3],
    'index'=>intval($parts[11])
  ];
  $discs[]=$disc;
}

for($i=0;true;$i++){
  $success=true;
  foreach($discs as $j=>$disc){
    if((($disc['index']+$i+$j+1)%$disc['size'])!==0){
      $success=false;
      break;
    }
  }
  if($success){
    var_dump($i);
    exit;
  }
}

var_dump($discs);
