<?php

$input = file_get_contents('day12.txt');
$lines=explode("\n",$input);


$registers=[
  'a' => 0,
  'b' => 0,
  'c' => 1,
  'd' => 0
];

$i=0;
while($i < count($lines)){
//var_dump($i);
  $line=$lines[$i];
  $parts=explode(' ',$line);

  if($parts[0]==='jnz'){
    if($registers[$parts[1]]!==0){
      $i += $parts[2];
    }else{
      $i++;
    }
  }else{
    switch($parts[0]){
      case 'cpy':
        $value=$parts[1];
        if(!empty($registers[$value]))$value=$registers[$value];
        $registers[$parts[2]]=$value;
        break;
      case 'inc':
        $registers[$parts[1]]++;
        break;
      case 'dec':
        $registers[$parts[1]]--;
        break;
    }
    $i++;
  }
}


var_dump($registers['a']);
